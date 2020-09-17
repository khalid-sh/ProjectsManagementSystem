@extends('redirection')
@extends('gestion_membre/dashbord')
@section('content')

<!-- <p>coco //$profile[0]->nomequipe;  </p> -->

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
                                        <?= $equipe[0]->nom ?>
                                    </h5><br>
                                    <h6>
                                    <?= $equipe[0]->description?>
                                    </h6><br>
                                    
                            
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            
                            <p>Les Membres</p><br>
                            <?php foreach($employer as $eq) :?>
                            <a href=""><?= $eq->nom ?></a><br>
                            <?php endforeach ?>
                            
                        </div>
                    </div>
						
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Equipe Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?= $equipe[0]->id?></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label> Equipe Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?= $equipe[0]->nom?></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombre de membre</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?= $equipe[0]->nbre_membres?></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Servise</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?= $equipe[0]->sevices?></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Project id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  <?= $equipe[0]->project_id?></p>
                                            </div>
                                        </div><br>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Chef_equipe</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>chef d'id=<?= $equipe[0]->idchefprojet?></p>
                                            </div>
                                        </div><br>
                                        
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>





@endsection