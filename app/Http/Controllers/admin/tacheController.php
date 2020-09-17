<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\tache;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
class tacheController extends Controller
{
    public function add_tache(){
        return view('gestion_membre/add_tache');
    }
    
    
    
    public function table_tache(){
        if(Request::get('del')){
            DB::table('taches')->where('id', Request::get('del'))->delete();
            Session::flash('warning','tache a été  supprimer ');
            return redirect('admin/tables_tache');
    
        }
        $tache=DB::table('taches')->get();
        return view('gestion_membre/table_tache',compact('tache'));
    }
    
    
    
    public function create_tache(){
        if( Request::session()->has('auth')){
            $id=session('auth');
            $e=DB::table('employers')->where('id',$id)->first();
            if(!($e->fonction=="Directeur") || !($e->fonction=="Directeur") ){
                Session::flash('warning','que le Directeur ou chef de projet peut ajouter un tàche ');
                return redirect('admin/add_tache');
            }
        }
    
        $validator=Validator::make(Request::all(),[
            'nomtache' =>'required|alpha_dash',
            'project_id' =>'required|numeric',
            'date_debut' =>'required|date' ,
            'date_fin'=> 'required|date',
            'description'=>'required|alpha_dash' ,
            'etat_de_tache'=>'required' ,
            'priorité'=> 'required',
            'chef_tache'=> 'required|numeric',
        ]);
        //dd($validator->fails());
        
        
        $tache = DB::table('taches')->where('nomtache', Request::get('nomtache'))->where('project_id',Request::get('project_id'));
        if($tache){

        }

        if ($validator->fails()) {
            return redirect('admin/add_tache')->withErrors($validator);
                    Session::flash('danger','cette tache déja éxiste pour ce projet');  
                    return redirect('admin/add_tache'); 
        }
    
        DB::table('taches')->insert(
            ['nomtache' => Request::get('nomtache'),
              'project_id' =>Request::get('project_id'),
             'date_debut' => Request::get('date_debut'),
             'date_fin'=> Request::get('date_fin'),
             'description'=> Request::get('description'),
             'etat_de_tache'=> Request::get('etat_de_tache'),
             'priorité'=> Request::get('priorité'),
             'chef_tache'=> Request::get('chef_tache'),
             ]
        );
        Session::flash('success','la tache a bien été ajouté');
        return redirect('admin/tables_tache');
    }
    public function  tache_statistique(){
        return view('gestion_membre/statistique_tache');
    }
    



    public function tache_profile(){
        if(Request::get('maj')){
            return view('gestion_membre/maj_tache');
        }
       
        
        $tache=DB::table('taches')->where('id', Request::get('id'))->get();
       
        return view("gestion_membre/tache_profile",compact('tache'));
    }
    
    
    
    // public function maj_projet(){
    //     return redirect('admin/maj_projet');
    // }
    public function update_tache(){
        $validator=Validator::make(Request::all(),[
            'nomtache' =>'required|alpha_dash',
            'project_id' =>'required|numeric',
            'date_debut' =>'required|date' ,
            'date_fin'=> 'required|date',
            'description'=>'required|alpha_dash' ,
            'etat_de_tache'=>'required' ,
            'priorité'=> 'required',
            'chef_tache'=> 'required|numeric',
        ]);
        //dd($validator->fails());
        
        
        // $tache = DB::table('taches')->where('nomtache', Request::get('nomtache'))->where('project_id',Request::get('project_id'));
        // if($tache){

        // }

        if ($validator->fails()) {
            return redirect('admin/add_tache')->withErrors($validator);
                    Session::flash('danger','cette tache déja éxiste pour ce projet');  
                    return redirect('admin/add_tache'); 
        }
    
        DB::table('projets')->where('nomptache', Request::get('nomtache'))->update(
            ['nomtache' => Request::get('nomtache'),
              'project_id' =>Request::get('project_id'),
             'date_debut' => Request::get('date_debut'),
             'date_fin'=> Request::get('date_fin'),
             'description'=> Request::get('description'),
             'etat_de_tache'=> Request::get('etat_de_tache'),
             'priorité'=> Request::get('priorité'),
             'chef_tache'=> Request::get('chef_tache'),
             ]
        );
            Session::flash('success','le mise a jour a bien été effectué');
        return redirect('admin/tables_projet');
    }
    

}
