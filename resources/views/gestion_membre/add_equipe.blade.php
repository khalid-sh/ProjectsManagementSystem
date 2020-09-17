
@extends('redirection')
@extends('gestion_membre/dashbord')
@section('content')
@include('flash')
  
  <form  class='monform' action='' method='post' >
	    <h1>Ajouter un nouveau équipe :</h1>
	    
    <div class="contentform">
    	<div class="leftcontact">
		<input type="hidden" name="_token" value="{{csrf_token()}}" >

			      <div class="form-group">
			        <p>Nom <span>*</span></p>
			        <span class="icon-case"><i class="fa fa-user "></i></span>
				        <input type="text" name="nom" id="nom"  />
                <div class="validation"></div>
       </div> 

            <div class="form-group">
            <p>ID_chet_projet <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user "></i></span>
				<input type="text" name="idchefprojet" id="idchefprojet"  />
                <div class="validation"></div>
			</div>

			
			
      <div class="form-group">
			<p>Nbre_des_membres <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-user-friends"></i></span>
                <input type="text" name="nbre_membres" id="nbre_membres" />
                <div class="validation"></div>
			</div>
			<div class="form-group">
            <p>Project_id <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user "></i></span>
				<input type="text" name="project_id" id="project_id"  />
                <div class="validation"></div>
			</div>	

	</div>
	

	<div class="rightcontact">	
	
	        
			<div class="form-group">
			<p>Service <span>*</span></p>
			<!-- <span class="icon-case"><i class="fa fa-building-o"></i></span> -->
			<select id="sevices" name="sevices" class="form-control">
                             <option selected>Dévlopement</option>
							 <option>Design</option>
							 <option>Marketing</option>
							 
             </select>
            <!-- <div class="validation"></div> -->
			</div>	
			

			<div class="form-group">
			<p>DESCRIPTION <span>*</span></p>
			<span class="icon-case"><i class="fa fa-comments"></i></span>
                <textarea name="description" rows="18"  ></textarea>
                <div class="validation"></div>
			</div>	
	</div>
	</div>
<button type="submit" class="bouton-contact">add</button>
	
</form>	

@endsection






