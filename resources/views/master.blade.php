<!DOCTYPE html>
<html ng-app="DoorTrack" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DoorTracker</title>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <base href="/" />

        @section('styles')
		
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        

        @show        
    </head>
    <body>

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

                 <li><a href="/">Home</a></li>
              </ul>

              <form class="navbar-form navbar-left" role="search">
                 <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" ng-model="search">
                 </div>
                 <button type="submit" class="btn btn-default">Submit</button>
              </form>

              <ul class="nav navbar-nav navbar-right">
                 <li><a href="/compose" class="plus">+</a></li>
                 <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       <li><a href="/auth/login">Login</a></li>
                       <li><a href="/auth/register">Register</a></li>
                    </ul>
                 </li>
              </ul>
           </div><!-- /.navbar-collapse -->
        </nav>

        <div class="container">
            @yield('body')
        </div>

        @section('scripts')
        
           
			

        @show
    </body>
</html>


