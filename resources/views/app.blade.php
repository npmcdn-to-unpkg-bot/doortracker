@extends('master')

@section('body')

<nav class="navbar navbar-default" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
   </div>

   <!-- Collect the nav links, forms, and other content for toggling -->
   <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">

         <li><a href="#/">Home</a></li>
      </ul>

      <form class="navbar-form navbar-left" role="search">
         <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" ng-model="search">
         </div>
         <button type="submit" class="btn btn-default">Submit</button>
      </form>

   
	  <ul class="nav navbar-nav navbar-right">
 				<li><a href="#/compose">New Item</a></li>
 		<li class="dropdown">
 				<a href="" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
 				<ul class="dropdown-menu">
 				<li>	<a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a> </li>
                <li> <a class="btn big-register" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Register</a> </li>
   </div><!-- /.navbar-collapse -->
</nav>


<!-- Login and register form -->
<div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login with</h4>
                    </div>
                    <div class="modal-body">  
                        <div class="box">
                             <div class="content">
                                <div class="social">
                                    <a class="circle github" href="#">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="#">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="#">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                      <span>or</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="" action="" accept-charset="UTF-8">
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                    <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                                <input class="btn btn-default btn-register" type="button" value="Create account" name="commit">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to 
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>        
    		      </div>
		      </div>
		  </div>
    </div>
	<script type="text/javascript">
    $(document).ready(function(){
        openLoginModal();   
    });
</script>

<h1 class="text-center"></h1>

<div class="container"> 
   <!-- Main App -->
   <div ng-view></div>
</div>

@endsection

@section('scripts')
@parent

<script>
   var path = {};
   path.public = "{{PATH}}";
   path.api = {};
   path.api.issues = path.public+"/api/v1/issues";

</script>

<script src="app/lib/jquery/dist/jquery.min.js"></script>

<script src="app/lib/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="app/lib/angular/angular.js" type="text/javascript"></script>
<script src="app/lib/angular/angular-route.js" type="text/javascript"></script>
<script src="app/lib//angular/angular-resource.js" type="text/javascript"></script>


<script src="app/services/issueService.js"></script>
<script src="app/controllers/mainController.js"></script>
<script src="app/controllers/newIssueController.js"></script>

<script src="app/DoorTrack.js"></script>


@endsection

@section('styles')
@parent

<link href="app/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

@endsection