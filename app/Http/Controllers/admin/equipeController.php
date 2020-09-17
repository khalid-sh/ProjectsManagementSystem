<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\equipe;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class equipeController extends Controller
{
   

    public function table_equipe(){
        if(Request::get('del')){
            DB::table('equipes')->where('id', Request::get('del'))->delete();
            Session::flash('warning','équipe a été supprimer ');
            return redirect('admin/tables_equipe');
    
        }
        $equipe=DB::table('equipes')->get();
        return view('gestion_membre/table_equipe',compact('equipe'));
    }
    
    public function add_equipe(){
        return view('gestion_membre/add_equipe');
    }
    public function create_equipe(){
        if( Request::session()->has('auth')){
            $id=session('auth');
            $e=DB::table('employers')->where('id',$id)->first();
            if(!($e->fonction=="Directeur") || !($e->fonction=="Directeur") ){
                Session::flash('warning','que le Directeur ou chef de projet peut ajouter une équipe ');
                return redirect('admin/add_equipe');
            }
        }
    
        $validator=Validator::make(Request::all(),[
            'nom' =>'required|alpha_dash',
            'idchefprojet' =>'required|alpha_dash' ,
            'nbre_membres'=> 'required|numeric',
            'project_id' => 'required|numeric',
            'description'=>'required|alpha_dash' ,
            'sevices'=>'required' ,
        ]);
        //dd($validator->fails());
    
        if ($validator->fails()) {
            return redirect('admin/add_equipe')->withErrors($validator)->withInput();
                       
        }
       
    else{
        $v=DB::table('equipes')->where('nom', Request::get('nom'))->get();
        if($v){
            Session::flash('danger','ce nom équipe a déja utiliser');
            return redirect('admin/add_equipe');
        }
        DB::table('equipes')->insert(
            ['nom' => Request::get('nom'),
             'idchefprojet' => Request::get('idchefprojet'),
             'nbre_membres'=> Request::get('nbre_membres'),
             'project_id' =>Request::get('project_id'),
             'description'=> Request::get('description'),
             'sevices'=> Request::get('sevices'),
             ]
        );
        Session::flash('success','équipe a bien été ajouté');
       
         return redirect('admin/tables_equipe');
    }
    }
    
    public function  equipe_statistique(){
        return view('gestion_membre/statistique_equipe');
    }


public function equipe_profile(){
  
        
        $equipe=DB::table('equipes')->where('id', Request::get('id'))->get();
        $nom=DB::table('equipes')->where('id', Request::get('id'))->value('nom');
        $employer=DB::table('employers')->where('nomequipe', $nom)->get();
        
        
        return view("gestion_membre/equipe_profile",compact('equipe'),compact('employer'));
    }
}





