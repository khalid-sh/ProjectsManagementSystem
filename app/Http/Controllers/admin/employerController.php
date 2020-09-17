<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\employer;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
//use Illuminate\Http\Request;


class employerController extends Controller
{
    /***pour  login  ***/

    public function login(){
        return view('gestion_membre/login');
    }

    public function dashbord(){
       // $emp=employer::where('email',Request::get('email'))->first();
      // $nom=DB::table('employers')->where('email',Request::get('email'))->value('nom');
      // $id=DB::table('employers')->where('email',Request::get('email'))->value('id');
       $e=DB::table('employers')->where('email',Request::get('email'))->first();

       $emp=DB::table('employers')->where('email',Request::get('email'))->exists();

        if($emp){
           //dd($employ);
           Request::session()->put('auth', $e->id);
           if(password_verify(Request::get('password'),'$2y$10$2JqdvOj/ZoE9yGBcMpQHSOzMTKD4B/fV9QkZAcQWyOmxccE/KFQrO')){
            Session::flash('success',"Bienvenue Monsieur $e->nom ");
           return redirect('admin/statistique');
           }
           elseif(password_verify(Request::get('password'),$e->motdepasse) && $e->fonction==="Chef_projet"){
            return redirect('admin/statistique2');

           }

          elseif(password_verify(Request::get('password'),$e->motdepasse) && $e->fonction==="Employer"){
            return redirect('admin/statistique3');

          }

          // dd("hello");
          else{
            Session::flash('danger','mot de passe incorrecte ');
            return redirect('admin/login');
          }
        }
        else{
            Session::flash('danger','ce compte n\'existe pas ');
            return redirect('admin/login');
        }
    }

/**  por l'employer */


public function table_employer(){
    if(Request::get('del')){
        if( Request::session()->has('auth')){
            $id=session('auth');
            $e=DB::table('employers')->where('id',$id)->first();
            if(!($e->fonction=="Directeur")  ){
                Session::flash('warning','que le Directeur peut ajouter un utilisateur ');
                return redirect('admin/add_employer');
            }
        }
        DB::table('employers')->where('id', Request::get('del'))->delete();
        Session::flash('warning','emloyer a été supprimer ');
        return redirect('admin/tables_employer');

    }
    $employer=DB::table('employers')->get();
    return view('gestion_membre/table_employer',compact('employer'));
}

public function cherche_employer(){
    if(Request::get('data_chercher') && !empty(Request::get('data_chercher'))){
        $employer = DB::table('employers')->where('nom',Request::get('data_chercher'))->orWhere('prenom',Request::get('data_chercher'))->get();
        return view('gestion_membre/cherche_employer',compact('employer'));
    }
    return redirect('admin/tables_employer');
}

public function add_employer(){
    return view('gestion_membre/add_employer');
}


public function create_employer(){
    if( Request::session()->has('auth')){
        $id=session('auth');
        $e=DB::table('employers')->where('id',$id)->first();
        if(!($e->fonction=="Directeur") || !($e->fonction=="Directeur") ){
            Session::flash('warning','que le Directeur ou chef de projet peut ajouter un utilisateur ');
            return redirect('admin/add_employer');
        }
    }

    $validator=Validator::make(Request::all(),[
        'nom' => 'required|alpha_dash',
        'prenom' => 'required|alpha_dash' ,
        'email'=> 'required|email',
        'téléphone'=> 'required' ,
        'motdepasse'=>'required' ,
        'fonction' => 'required',
        'description'=> 'required|alpha_dash',
        'équipe_id'=> 'required|numeric',
        'nbre_heures_travail'=> 'required|numeric',
        'sevices'=> 'required',
        'nomequipe' =>'required' ,
        'salaires'=> 'required|numeric',

    ]);
    //dd($validator->fails());

    if ($validator->fails()) {
        return redirect('admin/add_employer')->withErrors($validator->errors());             
    }
   else{
    $v1=DB::table('employers')->where('email', Request::get('email'))->exists();
    $v2=DB::table('employers')->where('téléphone', Request::get('téléphone'))->exists();
    $v3=DB::table('employers')->where('motdepasse', Hash::make(Request::get('motdepasse')))->exists();
      if($v1){
        Session::flash('danger','cette email est déja utiliser ');
        return redirect('admin/add_employer');
      }
      if($v2){
        Session::flash('danger','ce numéro de téléphone est deja utiliser ');
        return redirect('admin/add_employer');
    }
    if($v3){
        Session::flash('danger','ce mot de passe est déja utiliser');
        return redirect('admin/add_employer');
    }
    DB::table('employers')->insert(
        ['nom' => Request::get('nom'),
         'prenom' => Request::get('prenom'),
         'email'=> Request::get('email'),
         'téléphone'=>Request::get('téléphone'),
         'motdepasse'=>Hash::make(Request::get('motdepasse')),
         'fonction' =>Request::get('fonction'),
         'description'=>Request::get('description'),
         'équipe_id'=>Request::get('équipe_id'), 
         'nomequipe' =>  Request::get('nomequipe'),
         'nbre_heures_travail'=>  Request::get('nbre_heures_travail') ,
         'sevices'=>  Request::get('sevices')  ,
         'salaires'=>   Request::get('salaires') ,
         ]
    );
    $noti=null;
    $id=session('auth');
    $noti[]="employer d'id $id a bien été ajouté";
    Request::session()->put('notification',$noti);
    Session::flash('success','employer  a bien été ajouté');
    return redirect('admin/tables_employer');
}
}





public function employer_profile(){
    if(Request::get('maj')){
        if( Request::session()->has('auth')){
            $id=session('auth');
            $e=DB::table('employers')->where('id',$id)->first();
            if(!($e->fonction=="Directeur") || !($e->fonction=="Directeur") ){
                Session::flash('warning','que le Directeur ou chef de projet peut ajouter un utilisateur ');
                return redirect('admin/employer_profile');
            }
        }
        return view('gestion_membre/maj_employer');
    }
    $profile_emp=DB::table('employers')->where('id', Request::get('id'))->get();
    return view("gestion_membre/employer_profile",compact('profile_emp'));


}

// public function maj_employer(){
    
//     return redirect('admin/maj_employer');
// }
public function update_employer(){
    $validator=Validator::make(Request::all(),[
        'nom' => 'required|alpha_dash',
        'prenom' => 'required|alpha_dash' ,
        'email'=> 'required|email',
        'téléphone'=> 'required' ,
        'motdepasse'=>'required' ,
        'fonction' => 'required',
        'description'=> 'required|alpha_dash',
        'équipe_id'=> 'required|numeric',
        'nbre_heures_travail'=> 'required|numeric',
        'sevices'=> 'required',
        'nomequipe' =>'required' ,
        'salaires'=> 'required|numeric',

    ]);
    //dd($validator->fails());

    if ($validator->fails()) {
        return redirect('admin/add_employer')->withErrors($validator->errors());             
    }
   else{
    $v1=DB::table('employers')->where('email', Request::get('email'))->exists();
    $v2=DB::table('employers')->where('téléphone', Request::get('téléphone'))->exists();
    $v3=DB::table('employers')->where('motdepasse', Hash::make(Request::get('motdepasse')))->exists();
      if($v1){
        Session::flash('danger','cette email est déja utiliser ');
        return redirect('admin/employer_profile');
      }
      if($v2){
        Session::flash('danger','ce numéro de téléphone est deja utiliser ');
        return redirect('admin/employer_profile');
    }
    if($v3){
        Session::flash('danger','ce mot de passe est déja utiliser');
        return redirect('admin/employer_profile');
    }
    DB::table('employers')->where('nom', Request::get('nom'))->update(
        ['nom' => Request::get('nom'),
         'prenom' => Request::get('prenom'),
         'email'=> Request::get('email'),
         'téléphone'=>Request::get('téléphone'),
         'motdepasse'=>Hash::make(Request::get('motdepasse')),
         'fonction' =>Request::get('fonction'),
         'description'=>Request::get('description'),
         'équipe_id'=>Request::get('équipe_id'), 
         'nomequipe' =>  Request::get('nomequipe'),
         'nbre_heures_travail'=>  Request::get('nbre_heures_travail') ,
         'sevices'=>  Request::get('sevices')  ,
         'salaires'=>   Request::get('salaires') ,
         ]
    );
    Session::flash('success','mise a jour bien effectué');
    return redirect('admin/tables_employer');
}
}



public function  employer_statistique(){
    $data1=$data2=$data3=$data4="";
    $data1=["Dévlopement", "Design", "Marketing", "Comptabilté", "Management"];
               
    foreach($data1 as $data ){
      /**** 1er statistique */
    $emplo=DB::table('employers')->where('sevices', $data)->get();
    $nbre=count($emplo);
    $data2=$data2.'"'.$nbre.'",';
    }
    $data2=trim($data2,",");
   /****** */
   

    
         /**** */
         /*** 2eme statistique */
         $data3=["9000", "6000", "5000", "10000"];
               
         foreach($data3 as $data ){
           /**** 1er statistique */
         $emplo=DB::table('employers')->where('salaires', $data)->get();
         $nbre=count($emplo);
         $data4=$data4.'"'.$nbre.'",';
         }
         $data4=trim($data4,",");
      
         $x=[$data2,$data4];
    return view('gestion_membre/statistique_employer',compact('x'));
}


}
