@include('redirection')
@extends('gestion_membre/dashbord')
@section('content')
@include('flash')
            <div id="inside" >
                <div class='data'>
                 <div class="limiter">
				<h1>Table des éQUIPES :</h1><br>
				<!-- <div class="search-form"> -->
                    <!-- <form action="#">
                        <input type="text" name="search" class="search-input">
                        <button type="submit" class="btn">
                            <i class="fas fa-search"></i>
                        </button>
					</form> -->
					<form class="header-search-form" action="" method="post">
                            <input name="data_chercher" type="search" placeholder="Search on  ....">
                            <button   type="submit" ><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form><br>
                <!-- </div>  -->
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110 table-responsive ">
					
						<table class="table table-hover">
						   <div class="table100-head">
							   <thead>
								    <tr class="row100 head" >
									   <th class="cell100 column1">#</th>
									   <th class="cell100 column2">Nom</th>
									   <th class="cell100 column3">ID_chet_projet</th>
									   <th class="cell100 column4">Nbre_des_membres</th>
									   <!-- <th class="cell100 column5">Mot De Passe</th> -->
									   <th class="cell100 column6"> Services</th>
									   <th class="cell100 column7"> Action</th>
								    </tr>
							   </thead>
						
					        </div>

					       <div class="table100-body ">
						
							    <tbody>
									 <?php foreach($equipe as $equi) :?>
                                        	
								    <tr class="row100 body">
                                    
									    <td class="cell100 column1"><?=$equi->id ?></td>
									    <td class="cell100 column2"><?=$equi->nom ?></td>
									    <td class="cell100 column3"><?=$equi->idchefprojet ?></td>
									    <td class="cell100 column4"><?=$equi->nbre_membres ?></td>
									    <!-- <td class="cell100 column5">//$emp->motdepasse </td> -->
									    <td class="cell100 column6"><?=$equi->sevices ?></td>
									    <td class="cell100 column7">
										<a href="tables_equipe?del=<?=$equi->id ?>" class="monbtn"> <span  class='btn btn-danger '><i class="fa fa-trash-alt"></i></span></a>
										<a href="equipe_profile?id=<?=$equi->id?>" class="monbtn"> <span   class='btn btn-primary'><i class="fa fa-user-edit"></i></span></a>

										</td>
                                        	
									</tr>
									
                                      <?php endforeach ?>
								<!-- <tr class="row100 body">
									<td class="cell100 column1">M</td>
									<td class="cell100 column2">Yoga</td>
									<td class="cell100 column3">8:00 AM - 9:00 AM</td>
									<td class="cell100 column4">Adam Stewart</td>
									<td class="cell100 column5">15</td>
									<td class="cell100 column6">15</td>

								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">C</td>
									<td class="cell100 column2">Gym</td>
									<td class="cell100 column3">9:00 AM - 10:00 AM</td>
									<td class="cell100 column4">Aaron Chapman</td>
									<td class="cell100 column5">10</td>
									<td class="cell100 column6">10</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">W</td>
									<td class="cell100 column2">Yoga</td>
									<td class="cell100 column3">7:00 AM - 8:30 AM</td>
									<td class="cell100 column4">Donna Wilson</td>
									<td class="cell100 column5">15</td>
									<td class="cell100 column6">15</td>

								</tr> -->

								
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

                </div>     
            </div>
@endsection
