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
               <li><a href="/login">Login</a></li>
               <li><a href="/register">Register</a></li>
            </ul>
         </li>
      </ul>
   </div><!-- /.navbar-collapse -->
</nav>


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