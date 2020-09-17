@extends('redirection')
@extends('gestion_membre/dashbord')
@section('content')

<!-- <p>coco //$profile[0]->nomprojet;  </p> -->

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <!-- <div class="profile-img">
                            <img src="http://placehold.it/150x150" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div> -->
                               <div class="image-container">
                                    <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                    </div>
                                </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                       
                                    <h5>
                                        <?= $projet[0]->nomprojet ?>
                                    </h5><br>
                                    <h6>
                                    <?= $projet[0]->description?>
                                    </h6><br>
                                    <p class="proile-rating">Priorité = <span><?= $projet[0]->priorité?></span></p>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                       <a href="project_profile?maj=1"> <button  class="profile-edit-btn" name="maj" >update</btton></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Les tache</p><br>
                            <?php foreach($data[1] as $ta) :?>
                            <a href=""><?= $ta->nomtache ?></a><br>
                           <?php endforeach ?>
                            <p>Les équipes</p><br>
                            <?php foreach($data[0] as $eq) :?>
                            <a href=""><?= $eq->nom ?></a><br>
                            <?php endforeach ?>
                            
                        </div>
                    </div>
						
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Project Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?= $projet[0]->id?></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label> Project Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?= $projet[0]->nomprojet?></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date_debut</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?= $projet[0]->date_debut?></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date_fin</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?= $projet[0]->date_fin?></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Etat_de_projet</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?= $projet[0]->etat_de_projet?></p>
                                            </div>
                                        </div><br>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Chef_projet</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>chef d'id=<?= $projet[0]->chef_projet?></p>
                                            </div>
                                        </div><br>
                                        
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>





@endsection