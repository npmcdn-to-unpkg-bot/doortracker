@extends('master')

@section('body')

   <div ng-view></div>

@endsection

@section('scripts')
@parent

<script>
   var path = {};
   //path.public = "{{PATH}}";
   path.api = {};
   path.api.issues = path.public+"/api/v1/issues";

   var debug = 'true';

</script>

<script src="app/lib/jquery/dist/jquery.min.js"></script>

<script src="app/lib/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="app/lib/angular/angular.js" type="text/javascript"></script>
<script src="app/lib/angular/angular-route.js" type="text/javascript"></script>
<script src="app/lib/angular/angular-resource.js" type="text/javascript"></script>

<!-- Services -->
<script src="app/services/issueService.js"></script>
<script src="app/services/userService.js"></script>


<!-- DoorTrack API -->
<!-- <script src="app/api/API.js"></script> -->

<!-- Controllers -->
<script src="app/controllers/issues/mainController.js"></script>
<script src="app/controllers/issues/newIssueController.js"></script>
<script src="app/controllers/issues/detailIssueController.js"></script>

<!-- App -->
<script src="app/DoorTrack.js"></script>





@endsection

@section('styles')
@parent

<link href="app/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

@endsection