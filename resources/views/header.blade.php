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
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-3336946006544881",
        enable_page_level_ads: true
      });
    </script>
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

    <link rel="stylesheet" href="{{ URL::asset('css/assets/icon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/assets/idangerous.swiper.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/assets/stylesheet.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-102106058-1', 'auto');
      ga('send', 'pageview');

    </script>
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
              <li><a href="{{ url('/handleProfile') }}"> <i class="fa fa-home" aria-hidden="true"></i> Home </a></li>
  						<li><a href="{{ url('/familyTree') }}"> <i class="fa fa-tree" aria-hidden="true"></i> create family tree </a></li>              
  						<li><a role="button" data-toggle="modal" data-target="#myModal_search"> <i class="fa fa-search" aria-hidden="true"></i> search </a></li>
              <li><a href="{{ url('/content') }}"> <i class="fa fa-users" aria-hidden="true"></i> Content </a></li>
              <li><a href="{{ url('/news') }}"> <i class="fa fa-home" aria-hidden="true"></i> News </a></li>
              <li><a href="{{ url('/upload') }}"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a></li>
  						<li><a href="{{ url('/logout') }}"> <i class="fa fa-sign-out" aria-hidden="true"></i> logout </a></li>
  					</ul>
  				</div>
  			</div>
  		</nav>
  	</aside>
    @else
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
              <li><a href="{{ url('/handleProfile') }}"> <i class="fa fa-home" aria-hidden="true"></i> Home </a></li>
              <li><a role="button" data-toggle="modal" data-target="#myModal_search"> <i class="fa fa-search" aria-hidden="true"></i> search </a></li>
              <li><a href="{{ url('/content') }}"> <i class="fa fa-users" aria-hidden="true"></i> Content </a></li>
              <li><a href="{{ url('/news') }}"> <i class="fa fa-home" aria-hidden="true"></i> News </a></li>
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
          
					<button data-offcanvas-open="my-navigation" class="btn open-btn"><i class="ion-navicon"></i></button>
          
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<div class="main-logo">
						<a href="{{ url('/') }}" class="site-logo-text"><!-- <img src="img/logo.png" class="img-responsive center-block" height="50"> -->PRAJAPATI SANGAM</a>
					</div>
				</div>
        @if(\Auth::user())
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right;">
					<div class="top-profile nav-options">
            <a href="{{ url('/') }}" class="nav-option-link">Home</a>
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
  <!-- THE FOOTER -->
  <footer>
    <!-- <div class="footer_slider">
      <div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="4" data-sm-slides="8" data-md-slides="14" data-lg-slides="19" data-add-slides="19">
              <div class="swiper-wrapper">
                <div class="swiper-slide active" data-val="0">
                   <img class="img-responsive img-full" src="img/f1.jpg" alt="">
                </div>
                <div class="swiper-slide" data-val="1">
                   <img class="img-responsive img-full" src="img/f2.jpg" alt="">               
                </div>
                <div class="swiper-slide" data-val="2">
                   <img class="img-responsive img-full" src="img/f3.jpg" alt="">                 
                </div>
                <div class="swiper-slide" data-val="3">
                   <img class="img-responsive img-full" src="img/f4.jpg" alt="">                   
                </div>
                <div class="swiper-slide" data-val="4">
                   <img class="img-responsive img-full" src="img/f5.jpg" alt="">                   
                </div>
                <div class="swiper-slide" data-val="5">
                   <img class="img-responsive img-full" src="img/f6.jpg" alt="">                 
                </div>
                <div class="swiper-slide" data-val="6">
                   <img class="img-responsive img-full" src="img/f7.jpg" alt="">                   
                </div>
                <div class="swiper-slide" data-val="7">
                   <img class="img-responsive img-full" src="img/f8.jpg" alt="">                   
                </div>
                <div class="swiper-slide" data-val="8">
                   <img class="img-responsive img-full" src="img/f9.jpg" alt="">                   
                </div>
                <div class="swiper-slide" data-val="9">
                   <img class="img-responsive img-full" src="img/f10.jpg" alt="">                  
                </div>
                <div class="swiper-slide" data-val="10">
                   <img class="img-responsive img-full" src="img/f11.jpg" alt="">                  
                </div>
                <div class="swiper-slide" data-val="11">
                   <img class="img-responsive img-full" src="img/f12.jpg" alt="">                  
                </div>
                <div class="swiper-slide" data-val="12">
                   <img class="img-responsive img-full" src="img/f13.jpg" alt="">                  
                </div>
                <div class="swiper-slide" data-val="13">
                   <img class="img-responsive img-full" src="img/f14.jpg" alt="">                  
                </div>
                <div class="swiper-slide" data-val="14">
                   <img class="img-responsive img-full" src="img/f15.jpg" alt="">                  
                </div>
                <div class="swiper-slide" data-val="15">
                   <img class="img-responsive img-full" src="img/f16.jpg" alt="">                  
                </div>
                <div class="swiper-slide" data-val="16">
                   <img class="img-responsive img-full" src="img/f17.jpg" alt="">                  
                </div>
                <div class="swiper-slide" data-val="17">
                   <img class="img-responsive img-full" src="img/f18.jpg" alt="">                  
                </div>
                <div class="swiper-slide" data-val="18">
                   <img class="img-responsive img-full" src="img/f19.jpg" alt="">                  
                </div>
                <div class="swiper-slide" data-val="19">
                   <img class="img-responsive img-full" src="img/f1.jpg" alt="">                   
                </div>
                <div class="swiper-slide" data-val="20">
                   <img class="img-responsive img-full" src="img/f2.jpg" alt="">                   
                </div>
                <div class="swiper-slide" data-val="21">
                   <img class="img-responsive img-full" src="img/f3.jpg" alt="">                   
                </div>
                <div class="swiper-slide" data-val="22">
                   <img class="img-responsive img-full" src="img/f4.jpg" alt="">                   
                </div>
                <div class="swiper-slide" data-val="23">
                   <img class="img-responsive img-full" src="img/f5.jpg" alt="">                   
                </div>                                                                                
              </div>
              <div class="pagination hidden"></div>
          </div>
        </div>  --> 
    <div class="footer-main">
      <div class="container-fluid custom-container">
        <div class="row"> 
          <div class="col-md-3 col-xl-4">
            <div class="footer-block">
              <h1 class="footer-title">About Us</h1>
              <p>Welcome home, Prajapati.<br>Prajapati Sangam is home to the world's largest community for prajapati. Here you can share your knowledge, experience, achievements, thoughts and memory.</p>
            </div>
          </div>
          <div class="col-md-3 col-xl-2">
            <div class="footer-block">
              <h1 class="footer-title">Some Links</h1>
              <div class="row footer-list-footer">
                <div class="col-md-6">
                <ul class="link-list">
                  <li><a href="{{ url('/about') }}">About Us</a></li>
                  <!-- <li><a href="blog-detail-2.html">Help</a></li> -->
                  <li><a href="{{ url('/contacts') }}">Contacts</a></li>
                  <!-- <li><a href="blog-detail-2.html">Job</a></li> -->
                  <!-- <li><a href="blog-detail-2.html">Projets</a></li> -->
                  <li><a href="{{ url('/faqs') }}">FAQs</a></li>
                  <li><a href="{{ url('/team') }}">Team</a></li>
                </ul></div>
                <div class="col-md-6">
                <ul class="link-list">
                  <!-- <li><a href="blog-detail-2.html">New Works</a></li> -->
                  <!-- <li><a href="blog-detail-2.html">Popular Authors</a></li> -->
                  <!-- <li><a href="blog-detail-2.html">New Authors</a></li> -->
                  <!-- <li><a href="blog-detail-2.html">Career</a></li> -->
                  <!-- <li><a href="blog-detail-2.html">FAQ</a></li> -->
                </ul></div>
              </div>
            </div>
          </div>        
          <!-- <div class="col-md-3 galerry">
            <div class="footer-block">          
              <h1 class="footer-title">Recent Works</h1>
              <a href="blog-detail-2.html"><img src="img/g1.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g2.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g3.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g4.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g5.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g6.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g7.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g8.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g9.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g10.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g11.jpg" alt=""></a>
              <a href="blog-detail-2.html"><img src="img/g12.jpg" alt=""></a>
            </div>
          </div> -->
          <div class="col-md-3">
            <div class="footer-block">
              <h1 class="footer-title">Subscribe On Our News</h1>
              <form action="./" class="subscribe-form">
                <input type="text" placeholder="Your Email" required>
                <div class="submit-block">
                  <i class="fa fa-envelope-o"></i>
                  <input type="submit" value="">
                </div>
              </form>
              <!-- <div class="soc-activity">
                <div class="soc_ico_triangle">
                  <i class="fa fa-twitter"></i>
                </div>
                <div class="message-soc">
                  <div class="date">16h ago</div>
                  <a href="blog-detail-2.html" class="account">@faq</a> vestibulum accumsan est <a href="blog-detail-2.html" class="heshtag">blog-detail-2.htmlmalesuada</a> sem auctor, eu aliquet nisi ornare leo sit amet varius egestas.
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container-fluid custom-container">
        <div class="col-md-12 footer-end clearfix">
          <div class="left">
            <span class="copy">© 2017. All rights reserved. <span class="white"><a href="{{ url('/') }}"> Prajapati Sangam</a></span></span>
            <span class="created">Pampered by <span class="white"><a href="{{ url('/') }}"> Prajapati Sangam</a></span></span>
          </div>
          <div class="right">
            <a class="btn color-7 size-2 hover-9" href="{{ url('/about') }}">About Us</a>
            <!-- <a class="btn color-7 size-2 hover-9">Help</a> -->
            <a class="btn color-7 size-2 hover-9" href="{{ url('/terms') }}">Terms of use</a>
          </div>
        </div>      
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
    <script src="{{ URL::asset('js/assets/idangerous.swiper.min.js') }}"></script>
    <script src="{{ URL::asset('js/assets/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('js/assets/jquery.viewportchecker.min.js') }}"></script>        
    <script src="{{ URL::asset('js/assets/global.js') }}"></script>    
  </body>
</html>