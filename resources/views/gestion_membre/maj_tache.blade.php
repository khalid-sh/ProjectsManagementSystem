@extends('redirection')
@extends('gestion_membre/dashbord')
@section('content')
@include('flash')
<form class='monform' action='' method='post'>
	    <h1> mise à jour d'une tache :</h1>
	    
    <div class="contentform">
    


    	<div class="leftcontact">
			      <!-- <div class="form-group">
			                <p>ID_tache <span>*</span></p>
			                <span class="icon-case"><i class="fa fa-id-card"></i></span>
				        <input type="text" name="nom" id="nom" data-rule="required" />
                           <div class="validation"></div>
                  </div>  -->
				 
			         <input type="hidden" name="_token" value="{{csrf_token()}}" >

                  
            <div class="form-group">
            <p>Nom_tache <span>*</span></p>
            <span class="icon-case"><i class="fa fa-id-card"></i></span>
				<input type="text" name="nomtache" id="nomtache" data-rule="required" />
                <div class="validation"></div>
			</div>
			<div class="form-group">
            <p>Project_id <span>*</span></p>
            <span class="icon-case"><i class="fa fa-id-card"></i></span>
				<input type="text" name="project_id" id="project_id" data-rule="required" />
                <div class="validation"></div>
			</div>
			
			<div class="form-group">
			<p> Date_début <span>*</span></p>
			<span class="icon-case"><i class="fa fa-calendar"></i></span>
				<input type="date" name="date_debut" id="society" data-rule="required" />
                <div class="validation"></div>
			</div>

			<div class="form-group">
			<p>Date_fin <span>*</span></p>
			<span class="icon-case"><i class="fa fa-calendar"></i></span>
				<input type="date" name="date_fin" id="adresse" data-rule="required" />
                <div class="validation"></div>
			</div>
      <!-- <div class="form-group">
			<p>E-mail_Client <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                <input type="email" name="email" id="email" data-rule="email" />
                <div class="validation"></div>
			</div>	 -->

			<!-- <div class="form-group">
			<p>ID_cheftache <span>*</span></p>
			<span class="icon-case"><i class="fa fa-id-card"></i></span>
				<input type="text" name="postal" id="postal" data-rule="required" />
                <div class="validation"></div>
			</div>	 -->

			<div class="form-group">
			<p>Etat de tache <span>*</span></p>
			<!-- <span class="icon-case"><i class="fa fa-building-o"></i></span> -->
			<select id="inputState" name="etat_de_tache" class="form-control">
                             <option selected>Démarrage</option>
							 <option>Planning</option>
							 <option>Exécution</option>
							 <option>Cloture</option>
             </select>
            <!-- <div class="validation"></div> -->
			</div>	

	</div>

	<div class="rightcontact">	
	<div class="form-group">
			<p>Priorité <span>*</span></p>
			<!-- <span class="icon-case"><i class="fa fa-building-o"></i></span> -->
			<select id="inputState" name="priorité" class="form-control">
                             <option selected>1</option>
							 <option>2</option>
							 <option>3</option>
							 <option>4</option>
							 <option>5</option>
             </select>
            <!-- <div class="validation"></div> -->
			</div>	
			
			<div class="form-group">
            <p>id_chef_tache <span>*</span></p>
            <span class="icon-case"><i class="fa fa-id-card"></i></span>
				<input type="text" name="chef_tache" id="chef_tache" data-rule="required" />
                <div class="validation"></div>
			</div>

			
		
			<div class="form-group">
			<p>DESCRIPTION <span>*</span></p>
			<span class="icon-case"><i class="fa fa-comments"></i></span>
                <textarea name="description" rows="18" data-rule="required" ></textarea>
                <div class="validation"></div>
			</div>	
	</div>
	</div>
<button type="submit" class="bouton-contact">update</button>
	
</form>	

@endsection
