
@extends('redirection')
@extends('gestion_membre/dashbord')
@section('content')
@include('flash')
  <form  class='monform' action='' method='post' >
	    <h1>Ajouter un nouveau utilisateur :</h1>
	    
    <div class="contentform">
    


    	<div class="leftcontact">
		<input type="hidden" name="_token" value="{{csrf_token()}}" >

			      <div class="form-group">
			        <p>Nom <span>*</span></p>
			        <span class="icon-case"><i class="fa fa-user "></i></span>
				        <input type="text" name="nom" id="nom" data-rule="required" />
                <div class="validation"></div>
       </div> 

            <div class="form-group">
            <p>Prenom_User <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user "></i></span>
				<input type="text" name="prenom" id="prenom" data-rule="required" />
                <div class="validation"></div>
			</div>

			
			
      <div class="form-group">
			<p>E-mail_User <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" id="email" data-rule="email" />
                <div class="validation"></div>
			</div>	

			<div class="form-group">
			<p>Mot_De_Passe <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-lock "></i></span>
                <input type="password" name="motdepasse" id="motdepasse"  />
                <div class="validation"></div>
			</div>	
			<div class="form-group">
			<p>Phone number <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-phone"></i></span>
				<input type="phone" name="téléphone" id="téléphone" data-rule="maxlen:10" />
                <div class="validation"></div>
			</div>
			<div class="form-group">
			<p>équipe_id <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-id-badge"></i></span>
				<input type="text" name="équipe_id" id="phone" data-rule="maxlen:10" />
                <div class="validation"></div>
			</div>
			<div class="form-group">
			<p>Service <span>*</span></p>
			<!-- <span class="icon-case"><i class="fa fa-building-o"></i></span> -->
			<select id="sevices" name="sevices" class="form-control">
                             <option selected>Dévlopement</option>
							 <option>Design</option>
							 <option>Marketing</option>
							 <option>Comptabilté</option>
             </select>
            <!-- <div class="validation"></div> -->
			</div>	

	</div>

	<div class="rightcontact">	
	
	        
			<div class="form-group">
			<p>Fonction <span>*</span></p>
			<!-- <span class="icon-case"><i class="fa fa-building-o"></i></span> -->
			<select id="fonction" name="fonction" class="form-control">
                             <option selected>Directeur</option>
							 <option>Chef_projet</option>
							 <option>Employer</option>
							 
             </select>
            <!-- <div class="validation"></div> -->
			</div>	
			<div class="form-group">
			<p>Nombres d'heures du travaille <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-clock"></i></span>
				<input type="number" name="nbre_heures_travail"  data-rule="maxlen:10" />
                <div class="validation"></div>
			</div>
			<div class="form-group">
			<p>Salaire <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-money-check-alt"></i></span>
				<input type="text" name="salaires"  data-rule="maxlen:10" />
                <div class="validation"></div>
			</div>
			<div class="form-group">
			<p>Nom_equipe <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-money-check-alt"></i></span>
				<input type="text" name="nomequipe"  data-rule="maxlen:10" />
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
<button type="submit" class="bouton-contact">add</button>
	
</form>	

@endsection






