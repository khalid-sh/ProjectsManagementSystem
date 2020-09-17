@extends('redirection')
@extends("gestion_membre/dashbord")
@section('content')
@include('flash')

<div class="mycontainer">
<h1>Table des Tàche:</h1><br>
                   <form class="header-search-form" action="" method="post">
                            <input name="data_chercher" type="search" placeholder="Search on par nom tache">
                            <button   type="submit" ><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form><br>
	
    <div class="row col-md-12 col-md-offset-2 custyle">
    <table class="table table-striped custab table-hover">
    <thead style=" background: #30323c;color: white;" >
    <!-- <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a> -->
        <tr>
            <th>#</th>
            <th>Nom tache</th>
			<th>Date_début</th>
			<th>Date_fin</th>
			<th>Project_id</th>
			<th>Etat_de_tache</th>
			<th style=" width: 14%;">Progress</th>
			<th>Priorité</th>
			<th>Chef_tache</th>
			<th class="text-center">Action</th>
			
        </tr>
	</thead>
	<?php foreach($tache as $task) : ?>
            <tr>
                <td><?=$task->id?></td>
                <td><?=$task->nomtache?></td>
				<td><?=$task->date_debut?></td>
				<td><?=$task->date_fin?></td>
				<td><?= $task->project_id?></td>
				<td><?=$task->etat_de_tache?></td>
			     <td>
				<div class="progress">
				<?php 
				if($task->etat_de_tache=="Démarrage"){
					$x=25;
				}
				if($task->etat_de_tache=="Planning"){
					$x=50;
				}
				if($task->etat_de_tache=="Exécution"){
					$x=75;
				}
				if($task->etat_de_tache=="Cloture"){
					$x=100;
				}
				?>
				  <div class="progress-bar" role="progressbar" style="width: <?=$x?>%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<?=$x?>%
				</td>
				<td><?=$task->priorité?></td>
				<td><?=$task->chef_tache?></td>
				<td class="text-center"><a class='btn btn-info btn-xs' href="tache_profile?id=<?=$task->id?>"><span class="glyphicon glyphicon-edit"></span> <i class="fa fa-user-edit"></i></a> <a href="tables_tache?del=<?=$task->id?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> <i class="fa fa-trash-alt"></i></a></td>
			</tr>
			<?php endforeach ?>
           
    </table>
    </div>
</div>
@endsection