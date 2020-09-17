<?php if( Request::session()->has('auth')==false){
	
    Session::flash('danger','il faut s\'authentifier ');
	         header("location:login");
	         die();
          }
?>