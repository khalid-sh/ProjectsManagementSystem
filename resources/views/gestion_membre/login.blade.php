@extends("gestion_membre/default")
@section('logincontent')

<div class="modal-dialog  ">
@include('flash')

    		      <div class="modal-content">
    		         <div class="modal-header">
                        
                        <h4 class="modal-title"><img src="../img/logopfe.png" alt="" style="height: 41px; width: 81px" >ProHelp Login </h4>
                    </div>
                    <div class="modal-body">
                       
                                
                                <div class="form ">
                                    <form action="" method="post" accept-charset="UTF-8" class="form-container">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope"></i></span>
                                    <input name="email" class="form-control" id="email" type="text" placeholder="Email"><br>
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-lock "></i>
                                    <input name="password" class="form-control" id="password" type="password" placeholder="Password"><br>
                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" >
                                           <label class="form-check-label" >Remember me
                                            </label>
                                 </div><br> -->

      
                                     <button type="submit" class="btn btn-warning btn-block"  >login</button>
                                    </form>
                                    
                               
                        </div>
                        
                        <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>forgot your 
                                 <a href="create_count.php">password</a>
                            ?</span>
                        </div>
                        
                    </div>
                    
    		      </div>
		      </div>
@endsection