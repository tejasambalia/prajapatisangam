<?php
use Illuminate\Routing\Route;
$actionName = app('request')->route()->getAction();
?>
<!DOCTYPE html>
@if($actionName['as']=='openProfile')
<html lang="en" itemscope itemtype="http://schema.org/Person">
@else
<html lang="en">
@endif
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Board</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Proza+Libre:400,400i,500,500i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/font-awesome-4.7.0/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/iptools-jquery-offcanvas.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @if(\Auth::user())
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
  						<li><a href="{{ url('/handleProfile') }}"> <i class="fa fa-user" aria-hidden="true"></i> profile </a></li>
              <li><a href="{{ url('/') }}"> <i class="fa fa-home" aria-hidden="true"></i> Home </a></li>
  						<li><a href="{{ url('/familyTree') }}"> <i class="fa fa-tree" aria-hidden="true"></i> create family tree </a></li>
  						<li><a role="button" data-toggle="modal" data-target="#myModal_search"> <i class="fa fa-search" aria-hidden="true"></i> search </a></li>
  						<li><a href="{{ url('/logout') }}"> <i class="fa fa-sign-out" aria-hidden="true"></i> logout </a></li>
  					</ul>
  				</div>
  			</div>
  		</nav>
  	</aside>
    @endif

	

	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          @if(\Auth::user())
					<button data-offcanvas-open="my-navigation" class="btn open-btn"><i class="ion-navicon"></i></button>
          @endif
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<div class="main-logo">
						<a href="#" class="site-logo-text">PRAJAPATI SANGAM<!-- <img src="img/Logo-1-white.png" class="img-responsive center-block" height="50"> --></a>
					</div>
				</div>
        @if(\Auth::user())
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right;">
					<div class="top-profile nav-options">
            <a href="#" class="nav-option-link">Home</a>
            <a href="{{ url('/logout') }}" class="nav-option-link">Logout</a>
					</div>
				</div>
        @endif
			</div>
		</div>
	</header>
	<!-- Header part end -->

    <!-- Body part start -->
	@yield('content')
	<!-- Body part end -->

  <!-- Search Modal -->
  <div class="modal search_modal fade" id="myModal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-body">
                  <h3 class="search_title"> What are you looking for?  </h3>
                  <form class="main-search" method="get" action="{{ url('/search') }}">
                      <div class="form-group">
                          <input type="search" name="search" class="form-control" placeholder="Write search text here...">
                          <button type="submit" class="btn"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                      </div>

                      <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                  </form>
                  <h2 class="search_tag_line"> We are here to <span class="blue_clr">help you</span></h2>
              </div>
          </div>
      </div>
  </div>

	<!-- Footer part start -->
  <footer>
    <div class="small-print">
        <div class="container">
            <p><a href="{{ url('/terms') }}">Terms of use</a></p>
            <p>Copyright &copy; prajapatisangam.com 2017 </p>
        </div>
    </div>
  </footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/iptools-jquery-offcanvas.js') }}"></script>
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