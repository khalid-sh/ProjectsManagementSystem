
@extends('redirection')
@extends('gestion_membre/dashbord')
@section('content')
@include('flash')
  
  <form  class='monform' action='' method='post' >
	    <h1>Ajouter un nouveau ressource :</h1>
	    
    <div class="contentform">
    	<div class="leftcontact">
		<input type="hidden" name="_token" value="{{csrf_token()}}" >

           <div class="form-group">
			   <p>Catégorie <span>*</span></p>
			   <!-- <span class="icon-case"><i class="fa fa-building-o"></i></span> -->
			   <select id="catégorie" name="catégorie" class="form-control">
                             <option selected>Dévlopement</option>
							 <option>Design</option>
							 <option>Marketing</option>
							 
             </select>
            <!-- <div class="validation"></div> -->
			</div>	
			
            <div class="form-group">
            <p>Date <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user "></i></span>
				<input type="date" name="date" id="date" data-rule="required" />
                <div class="validation"></div>
			</div>
			<div class="form-group">
            <p>Project_id <span>*</span></p>
            <span class="icon-case"><i class="fa fa-id-card"></i></span>
				<input type="text" name="project_id" id="project_id" data-rule="required" />
                <div class="validation"></div>
			</div>

			
			
      <div class="form-group">
			<p>Montant<span>*</span></p>	
			<span class="icon-case"><i class="fa fa-envelope"></i></span>
                <input type="text" name="montant" id="montant" data-rule="email" />
                <div class="validation"></div>
			</div>	

	</div>

	<div class="rightcontact">	

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






