<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\projet;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class projetController extends Controller
{
    
    public function add_projet(){
        return view('gestion_membre/add_projet');
    }

    public function cherche_projet(){
        if(Request::get('data_chercher') && !empty(Request::get('data_chercher'))){
            $projet = DB::table('projets')->where('nomprojet',Request::get('data_chercher'))->get();
            return view('gestion_membre/cherche_projet',compact('projet'));
        }
        return redirect('admin/tables_projet');
    }


    public function table_projet(){
       
        if(Request::get('del')){
            if( Request::session()->has('auth')){
                $id=session('auth');
                $e=DB::table('employers')->where('id',$id)->first();
                if(!($e->fonction=="Directeur")){
                    Session::flash('warning','que le Directeur peut ajouter un projet ');
                    return redirect('admin/table_projet');
                }
            }
            DB::table('projets')->where('id', Request::get('del'))->delete();
            Session::flash('warning','projet a été supprimer ');
            return redirect('admin/tables_projet');
    
        }
        $projet=DB::table('projets')->get();
        
        return view('gestion_membre/table_projet',compact('projet'),);
    }


  
public function create_projet(){
    if( Request::session()->has('auth')){
        $id=session('auth');
        $e=DB::table('employers')->where('id',$id)->first();
        if(!($e->fonction=="Directeur")){
            Session::flash('warning','que le Directeur peut ajouter un projet ');
            return redirect('admin/add_projet');
        }
    }
    $validator=Validator::make(Request::all(),[
        'nomprojet' =>'required|alpha_dash',
        'date_debut' =>'required|date' ,
        'date_fin'=> 'required|date',
        'description'=>'required|alpha_dash' ,
        'etat_de_projet'=>'required' ,
        'priorité'=> 'required',
        'chef_projet'=> 'required',
    ]);
    //dd($validator->fails());

    if ($validator->fails()) {
        return redirect('admin/add_projet')->withErrors($validator);
                   
    } 
    else{
        $v1=DB::table('projets')->where('nomprojet', Request::get('nomprojet'))->exists();
        
          if($v1){
            Session::flash('danger','ce nom de projet est déja utiliser ');
            return redirect('admin/add_projet');
          }
    }  

    DB::table('projets')->insert(
        ['nomprojet' => Request::get('nomprojet'),
         'date_debut' => Request::get('date_debut'),
         'date_fin'=> Request::get('date_fin'),
         'description'=> Request::get('description'),
         'etat_de_projet'=> Request::get('etat_de_projet'),
         'priorité'=> Request::get('priorité'),
         'chef_projet'=> Request::get('chef_projet')
         ]
    );
    Session::flash('success','le projet a bien été ajouté');
    return redirect('admin/tables_projet');
}
public function project_profile(){
    if(Request::get('maj')){
        if( Request::session()->has('auth')){
            $id=session('auth');
            $e=DB::table('employers')->where('id',$id)->first();
            if(!($e->fonction=="Directeur")){
                Session::flash('warning','que le Directeur peut ajouter un projet ');
                return redirect('admin/project_profile');
            }
        }
        return view('gestion_membre/maj_projet');
    }
    $data="";
    $equipe=DB::table('equipes')->where('project_id', Request::get('id'))->get();
    $tache=DB::table('taches')->where('project_id', Request::get('id'))->get();
    $projet=DB::table('projets')->where('id', Request::get('id'))->get();
    $data=[$equipe,$tache];
    return view("gestion_membre/projet_profile",compact('projet'),compact('data'));
}



// public function maj_projet(){
//     return redirect('admin/maj_projet');
// }
public function update_projet(){
    $validator=Validator::make(Request::all(),[
        'nomprojet' =>'required|alpha_dash',
        'date_fin'=> 'required|date',
        'description'=>'required|alpha_dash' ,
        'etat_de_projet'=>'required' ,
        'priorité'=> 'required',
        'chef_projet'=> 'required',
    ]);
    if ($validator->fails()) {
        return redirect('admin/project_profile')->withErrors($validator);
                   
    } 
    else{
        $v1=DB::table('projets')->where('nomprojet', Request::get('nomprojet'))->exists();
        
          if($v1){
            Session::flash('danger','ce nom de projet est déja utiliser ');
            return redirect('admin/project_profile');
          }
    }  
    DB::table('projets')->where('nomprojet', Request::get('nomprojet'))->update([
        'nomprojet' => Request::get('nomprojet'),
         'date_fin'=> Request::get('date_fin'),
         'description'=> Request::get('description'),
         'etat_de_projet'=> Request::get('etat_de_projet'),
         'priorité'=> Request::get('priorité'),
         'chef_projet'=> Request::get('chef_projet')
        ]);
        Session::flash('success','le mise a jour a bien été effectué');
    return redirect('admin/tables_projet');
}


public function project_statistique1(){
    $roles = DB::table('projets')->pluck('nomprojet', 'id');
    
    foreach($roles as $id => $nomprojet ){
        $data1=$data1.'"'.$nomprojet.'",';
    $tache=DB::table('taches')->where('id', $id)->where('etat_de_tache','Cloture')->get();
    $nbre=count($tache);
    $data2=$data2.'"'.$nbre.'",';
    }
    $data1=trim($data1,",");
    $data2=trim($data2,",");

    return view("gestion_membre/projet_profile",compact('data1'),compact('data2'));
}
public function  statistique(){
    $data1=$data2=$data3=$data5=$data6=$data7=$data8="";
          $projet = DB::table('projets')->pluck('nomprojet', 'id');
          
          foreach($projet as $id => $nomprojet ){
              $data1=$data1.'"'.$nomprojet.'",';
          $tache=DB::table('taches')->where('project_id', $id)->where('etat_de_tache','Cloture')->get();
          $nbre=count($tache);
          $data2=$data2.'"'.$nbre.'",';
          }
          $data1=trim($data1,",");
          $data2=trim($data2,",");
          /*atre statistique*/
          
          $data4=["Dévlopement", "Design", "Marketing", "Comptabilté", "Management"];
         
          
          foreach($data4 as $data ){
            
          $emplo=DB::table('employers')->where('sevices', $data)->get();
          $nbre=count($emplo);
          $data3=$data3.'"'.$nbre.'",';
          }
          $data3=trim($data3,",");
          /*****/
  
          /*** autre statistique*****/
          
          $projet = DB::table('projets')->pluck('priorité', 'nomprojet');
  
          foreach($projet as  $nomprojet=>$priorité ){
              $data5=$data5.'"'.$nomprojet.'",';
              $data6=$data6.'"'.$priorité.'",';
              
          }
          $data5=trim($data5,",");
           $data6=trim($data6,",");
         /****/
  
     /******* autre statistique ****/
      
       $projet = DB::table('projets')->pluck('etat_de_projet', 'nomprojet');
  
          foreach($projet as  $nomprojet=>$etat_de_projet ){
              $data7=$data7.'"'.$nomprojet.'",';
              if($etat_de_projet==="Démarrage"){
              $data8=$data8."1,";
              }
              if($etat_de_projet==="Planning"){
                  $data8=$data8."2,";
                  }
             if($etat_de_projet==="Exécution"){
                      $data8=$data8."3,";
              }
              if($etat_de_projet==="Cloture"){
                          $data8=$data8."4,";
              }
              
          }
          $data7=trim($data7,",");
           $data8=trim($data8,",");
  /********* */
  $employers=count(DB::table('employers')->get());
  $projets=count(DB::table('projets')->get());
  $taches=count(DB::table('taches')->get());
  $equipes=count(DB::table('equipes')->get());
  
      $x=[$data1,$data2,$data3,$data5,$data6,$data7,$data8,$projets,$equipes,$taches,$employers];
         
      
      return view('gestion_membre/statistique',compact('x'));
  }






  public function  statistique1(){
    $data1=$data2=$data3=$data5=$data6=$data7=$data8="";
          $projet = DB::table('projets')->pluck('nomprojet', 'id');
          
          foreach($projet as $id => $nomprojet ){
              $data1=$data1.'"'.$nomprojet.'",';
          $tache=DB::table('taches')->where('project_id', $id)->where('etat_de_tache','Cloture')->get();
          $nbre=count($tache);
          $data2=$data2.'"'.$nbre.'",';
          }
          $data1=trim($data1,",");
          $data2=trim($data2,",");
          /*atre statistique*/
          
          $data4=["Dévlopement", "Design", "Marketing", "Comptabilté", "Management"];
         
          
          foreach($data4 as $data ){
            
          $emplo=DB::table('employers')->where('sevices', $data)->get();
          $nbre=count($emplo);
          $data3=$data3.'"'.$nbre.'",';
          }
          $data3=trim($data3,",");
          /*****/
  
          /*** autre statistique*****/
          
          $projet = DB::table('projets')->pluck('priorité', 'nomprojet');
  
          foreach($projet as  $nomprojet=>$priorité ){
              $data5=$data5.'"'.$nomprojet.'",';
              $data6=$data6.'"'.$priorité.'",';
              
          }
          $data5=trim($data5,",");
           $data6=trim($data6,",");
         /****/
  
     /******* autre statistique ****/
      
       $projet = DB::table('projets')->pluck('etat_de_projet', 'nomprojet');
  
          foreach($projet as  $nomprojet=>$etat_de_projet ){
              $data7=$data7.'"'.$nomprojet.'",';
              if($etat_de_projet==="Démarrage"){
              $data8=$data8."1,";
              }
              if($etat_de_projet==="Planning"){
                  $data8=$data8."2,";
                  }
             if($etat_de_projet==="Exécution"){
                      $data8=$data8."3,";
              }
              if($etat_de_projet==="Cloture"){
                          $data8=$data8."4,";
              }
              
          }
          $data7=trim($data7,",");
           $data8=trim($data8,",");
  /********* */
  $employers=count(DB::table('employers')->get());
  $projets=count(DB::table('projets')->get());
  $taches=count(DB::table('taches')->get());
  $equipes=count(DB::table('equipes')->get());
  
      $x=[$data1,$data2,$data3,$data5,$data6,$data7,$data8,$projets,$equipes,$taches,$employers];
         
      
      return view('gestion_membre/statistique1',compact('x'));
  }






public function  statistique2(){
    $data1=$data2=$data3=$data5=$data6=$data7=$data8="";
          $projet = DB::table('projets')->pluck('nomprojet', 'id');
          
          foreach($projet as $id => $nomprojet ){
              $data1=$data1.'"'.$nomprojet.'",';
          $tache=DB::table('taches')->where('project_id', $id)->where('etat_de_tache','Cloture')->get();
          $nbre=count($tache);
          $data2=$data2.'"'.$nbre.'",';
          }
          $data1=trim($data1,",");
          $data2=trim($data2,",");
          /*atre statistique*/
          
          $data4=["Dévlopement", "Design", "Marketing", "Comptabilté", "Management"];
         
          
          foreach($data4 as $data ){
            
          $emplo=DB::table('employers')->where('sevices', $data)->get();
          $nbre=count($emplo);
          $data3=$data3.'"'.$nbre.'",';
          }
          $data3=trim($data3,",");
          /*****/
  
          /*** autre statistique*****/
          
          $projet = DB::table('projets')->pluck('priorité', 'nomprojet');
  
          foreach($projet as  $nomprojet=>$priorité ){
              $data5=$data5.'"'.$nomprojet.'",';
              $data6=$data6.'"'.$priorité.'",';
              
          }
          $data5=trim($data5,",");
           $data6=trim($data6,",");
         /****/
  
     /******* autre statistique ****/
      
       $projet = DB::table('projets')->pluck('etat_de_projet', 'nomprojet');
  
          foreach($projet as  $nomprojet=>$etat_de_projet ){
              $data7=$data7.'"'.$nomprojet.'",';
              if($etat_de_projet==="Démarrage"){
              $data8=$data8."1,";
              }
              if($etat_de_projet==="Planning"){
                  $data8=$data8."2,";
                  }
             if($etat_de_projet==="Exécution"){
                      $data8=$data8."3,";
              }
              if($etat_de_projet==="Cloture"){
                          $data8=$data8."4,";
              }
              
          }
          $data7=trim($data7,",");
           $data8=trim($data8,",");
  /********* */
  $employers=count(DB::table('employers')->get());
  $projets=count(DB::table('projets')->get());
  $taches=count(DB::table('taches')->get());
  $equipes=count(DB::table('equipes')->get());
  
      $x=[$data1,$data2,$data3,$data5,$data6,$data7,$data8,$projets,$equipes,$taches,$employers];
         
      
      return view('gestion_membre/statistique2',compact('x'));
  }
}

