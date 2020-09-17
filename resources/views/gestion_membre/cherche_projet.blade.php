@include('redirection')
@extends("gestion_membre/dashbord")
@section('content')
@include('flash')
<div class="mycontainer">

                   <h1>Table des Projets :</h1><br>
                   <form class="header-search-form" action="cherche_projet" method="get">
                            <input name="data_chercher" type="search" placeholder="Search on  ....">
                            <button   type="submit" name='' ><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form><br>
	
    <div class="row col-md-12 col-md-offset-2 custyle">
    <table class="table table-striped custab table-hover">
    <thead style=" background: #30323c;color: white;" >
	<!-- <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a> -->
	
        <tr>
            <th>#</th>
            <th>Nom Projet</th>
			<th>Date_début</th>
			<th>Date_fin</th>
			<th>Etat_de_projet</th>
			<th style=" width: 14%;">Progress</th>
			<th>Priorité</th>
			<th>Chef_projet</th>
			<th class="text-center">Action</th>
		</tr>
   
	</thead>
	<?php foreach($projet as $project) : ?>
            <tr>
                <td><?=$project->id?></td>
                <td><?=$project->nomprojet?></td>
				<td><?=$project->date_debut?></td>
				<td><?=$project->date_fin?></td>
				<td><?=$project->etat_de_projet?></td>
			     <td>
				<div class="progress">
				<?php 
				if($project->etat_de_projet=="Démarrage"){
					$x=25;
				}
				if($project->etat_de_projet=="Planning"){
					$x=50;
				}
				if($project->etat_de_projet=="Exécution"){
					$x=75;
				}
				if($project->etat_de_projet=="Cloture"){
					$x=100;
				}
				?>
				  <div class="progress-bar" role="progressbar" style="width: <?=$x?>%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<?=$x?>%
				</td>
				<td><?=$project->priorité?></td>
				<td><?=$project->chef_projet?></td>
				<td class="text-center"><a class='btn btn-info btn-xs' href="project_profile?id=<?=$project->id?>"><span class="glyphicon glyphicon-edit"></span> <i class="fa fa-user-edit"></i></a> <a href="tables_employer?del=<?=$project->id?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> <i class="fa fa-trash-alt"></i></a></td>
			</tr>
			<?php endforeach ?>
           
    </table>
    </div>
</div>
@endsection