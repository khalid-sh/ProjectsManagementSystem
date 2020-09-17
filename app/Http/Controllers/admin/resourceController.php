<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\resource;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
class resourceController extends Controller
{
    public function table_resource(){
       
            if(Request::get('del')){
                DB::table('resources')->where('id', Request::get('del'))->delete();
                Session::flash('warning','ressource a été supprimer ');
                return redirect('admin/tables_resource');
        
            }
        $resource=DB::table('resources')->get();
        return view('gestion_membre/table_resource',compact('resource'));
    }
    
    public function add_resource(){
        return view('gestion_membre/add_resource');
    }
    public function create_resource(){
        if( Request::session()->has('auth')){
            $id=session('auth');
            $e=DB::table('employers')->where('id',$id)->first();
            if(!($e->fonction=="Directeur") || !($e->fonction=="Directeur") ){
                Session::flash('warning','que le Directeur ou chef de projet peut ajouter une ressource ');
                return redirect('admin/add_resource');
            }
        }
    
        $validator=Validator::make(Request::all(),[
            'date'=>'required|date',
            'project_id' =>'required|numeric',
            'catégorie'=>'required',
            'montant'=> 'numeric|required',
            'description'=>'required|alpha_dash',
            
        ]);
        //dd($validator->fails());
    
        if ($validator->fails()) {
            return redirect('admin/add_resource')->withErrors($validator);
                       
        }
    
        DB::table('resources')->insert(
            ['date' => Request::get('date'),
            'project_id' =>Request::get('project_id'),
             'catégorie' => Request::get('catégorie'),
             'montant'=> Request::get('montant'),
             'description'=> Request::get('description'),
           
             ]
        );
        Session::flash('success','resource a bien été ajouté');
        return redirect('admin/tables_resource');
    }
 
    public function  resource_statistique(){
        return view('gestion_membre/statistique_resource');
    }
}
