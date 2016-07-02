@extends('master')

@section('body')

   <!-- <div ng-view></div> -->
   <div ui-view></div>

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
<!--
<script src="app/lib/bootstrap-material-design/dist/js/material.min.js"></script> -->

<script src="app/lib/angular/angular.js" type="text/javascript"></script>
<script src="app/lib/angular/angular-route.js" type="text/javascript"></script>
<script src="app/lib/angular/angular-resource.js" type="text/javascript"></script>

<script src="app/lib/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="app/lib/satellizer/satellizer.js"></script>

<!-- Services -->
<script src="app/services/issueService.js"></script>
<script src="app/services/userService.js"></script>


<!-- DoorTrack API -->
<!-- <script src="app/api/API.js"></script> -->

<!-- Controllers -->
<script src="app/controllers/issues/mainController.js"></script>
<script src="app/controllers/issues/newIssueController.js"></script>
<script src="app/controllers/issues/detailIssueController.js"></script>
<script src="app/controllers/auth/authController.js"></script>

<!-- App -->
<script src="app/DoorTrack.js"></script>

<script src="app/utils/edit-delete-modal.js"></script>


@endsection

@section('styles')
@parent


<link href="app/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!--
<link rel="stylesheet" href="app/lib/bootstrap-material-design/dist/css/bootstrap-material-design.min.css">
-->

@endsection