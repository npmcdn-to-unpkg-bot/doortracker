<!DOCTYPE html>
<html ng-app="DoorTrack" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        @section('styles')
		
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

        @show        
    </head>
    <body>
        <div class="content">
            <div class="container">
                @yield('body')
            </div>
        </div>
    
        @section('scripts')
        
            <!-- jQuery -->
            <script src="//code.jquery.com/jquery.js"></script>

            <!-- Bootstrap JavaScript -->
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
			
			<script src="http://demos.creative-tim.com/js/login-register.js" type="text/javascript"></script>

        @show
    </body>
</html>


