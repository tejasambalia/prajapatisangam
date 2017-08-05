<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Board</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Proza+Libre:400,400i,500,500i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="css/iptools-jquery-offcanvas.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  	<aside id="my-navigation" class="offcanvas">
  		<nav>
  			<div class="navigation">
  				<button data-offcanvas-close="my-navigation" class="btn close-btn"><i class="ion-ios-arrow-thin-left"></i> Menu</button>
  				<div class="my-profile">
  					<div class="profile-icon">
  						
  					</div>
  					<div class="profile-details"></div>
  				</div>
  				<div class="nav-links">
  					<ul class="list-unstyled">
  						<li><a href="#"> <i class="fa fa-user" aria-hidden="true"></i> profile </a></li>
              <li><a href="#"> Home </a></li>
  						<li><a href="#"> create family tree </a></li>
  						<!-- <li><a href="#"> trending now </a></li>
  						<li><a href="#"> categories </a></li>
  						<li><a href="#"> history </a></li> -->
  						<li><a href="{{ url('/logout') }}"> logout </a></li>
  					</ul>
  				</div>
  			</div>
  		</nav>
  	</aside>

	

	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<button data-offcanvas-open="my-navigation" class="btn open-btn"><i class="ion-navicon"></i></button>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<div class="main-logo">
						<a href="#" class="site-logo-text">PRAJAPATI SANGAM<!-- <img src="img/Logo-1-white.png" class="img-responsive center-block" height="50"> --></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right;">
					<div class="top-profile nav-options">
            <a href="#" class="nav-option-link">Home</a>
            <a href="{{ url('/logout') }}" class="nav-option-link">Logout</a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header part end -->

    <!-- Body part start -->
	@yield('content')
	<!-- Body part end -->

	<!-- Footer part start -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/iptools-jquery-offcanvas.js"></script>
    <script type="text/javascript">
    	$(document).ready(function () {
	        $('#my-navigation').iptOffCanvas({
	            baseClass: 'offcanvas',
	            type: 'left', // top, right, bottom, left.,
	            closeOnClickOutside: true
	        });
	    });
    </script>
  </body>
</html>