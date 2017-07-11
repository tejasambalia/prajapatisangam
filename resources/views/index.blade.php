@extends('header')
@section('content')

<!-- <section>
    <style type="text/css">
        .profile-left-box {
            padding-right: 35px;
        }

        .profile-box {
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #ccc;
        }

        .profile-image {
            width: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid #000;
            margin: 0 auto;
            margin-top: 30px;
        }

        .profile-name {
            text-align: center;
            text-transform: uppercase;
            font-family: 'Proza Libre', sans-serif;
            margin: 30px 0 20px;
            font-size: 34px;
            font-weight: 600;
        }

        .bottom-space {
            margin-bottom: 15px;
        }

        .follwers a {
            color: #474648;
            text-transform: capitalize;
        }

        .follwers li {
            padding: 0 10px;
        }

        .follwers li span {
            display: block;
            font-weight: 700;
        }

        .h4-title {
            font-size: 14px;
            font-weight: 900;
        }

        .profile-left-box p {
            text-indent: 15px;
            font-size: 14px;
            font-weight: 400;
        }

        .profile-right-box {
            border-left: 2px solid #474648;
            padding-left: 35px;
        }

        .social-connections li .fa {
            display: inline-block;
            border: 1px solid #000;
            height: 35px;
            width: 35px;
            color: #fff;
            background: #000;
            border-radius: 50%;
            text-align: center;
            padding: 9px 0;
        }

        .social-connections li a {
            color: #474648;
            font-size: 15px;
            display: block;
            margin: 6px 0;
        }

        .social-connections li a:hover {
            opacity: 1;
        }

        .social-connections li span {
            display: block;
            padding-left: 15px;
            margin-top: 6px;
        }

        .h3-title {
            font-size: 40px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: normal;
            position: relative;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            margin-top: 35px;
            margin-bottom: 20px;
        }

        .h3-title:after {
            position: absolute;
            content: '';
            top: 15px;
            left: -43px;
            height: 15px;
            width: 15px;
            border-radius: 50%;
            background: #ccc;
        }

        .work-box h5>span {
            border-bottom: 1px solid #ccc;
            font-weight: 600;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-profile">
                    <div class="row">
                        <div class="col-md-3 col-sm-5 profile-left-box">
                            <div class="profile-box">
                                <div class="profile-image">
                                    <img src="img/PicsArt_11-14-12.30.45.jpg" class="img-responsive center-block">
                                </div>
                                <h1 class="profile-name">Sanket Patel</h1>
                                <div class="bottom-space">
                                    <ul class="list-inline follwers text-center">
                                        <li><a href="#"> <span> 10 </span> follwers </a></li>
                                        <li><a href="#"> <span> 15 </span> followings </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="bottom-space">
                                    <h4 class="h4-title">DOB:</h4>
                                    <p>21-08-1994</p>
                                </div>
                                <div class="bottom-space">
                                    <h4 class="h4-title">Phone:</h4>
                                    <p>7405094570</p>
                                </div>
                                <div class="bottom-space">
                                    <h4 class="h4-title">Email:</h4>
                                    <p>sanketpatel2108@gmail.com</p>
                                </div>
                                <div class="bottom-space">
                                    <h4 class="h4-title">Website:</h4>
                                    <p>www.knowamp.com</p>
                                </div>
                                <div class="bottom-space">
                                <h4 class="h4-title">Social Connections:</h4>
                                    <ul class="list-unstyled social-connections">
                                        <li>
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span>facebook.com/sanketpatel</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span>plus.google.com/sanketpatel</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>twitter.com/sanketpatel</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span>pinterest.com/sanketpatel</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-7 profile-right-box">
                            <div class="bottom-space">
                                <h3 class="h3-title">About Me</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse lacinia placerat diam quis molestie. Donec in consequat eros. Nullam quis diam augue. Sed ac tincidunt ante. Sed quis tellus in libero malesuada tincidunt. Sed quis porta augue. Nam odio dolor, lobortis eget elit eget, rutrum fringilla dui. Maecenas tempus sapien ut dui scelerisque, nec congue nisl molestie.
                                </p>
                            </div>
                            <div class="bottom-space">
                                <h3 class="h3-title">Work & Education</h3>
                                <div class="row">                                        
                                    <div class="col-xs-12 col-sm-4 col-md-2">
                                        <h4 class="h4-title">Workspaces: </h4>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-10">
                                        <div class="work-box space10">
                                            <div class="current-work">
                                            	<h5><span> Current: </span></h5>
                                                <p> Web Designer at WEBMAVENS PVT. LTD., India. </p>
                                            </div>
                                            <div class="past-work">
                                            	<h5><span> Past: </span></h5>
                                                <ul class="list-unstyled">
                                                    <li>Web designer at dhrup tech.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-4 col-md-2">
                                		<h4 class="h4-title"> Education: </h4>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<link rel="stylesheet" type="text/css" href="css/select2.css"></link>
<link rel="stylesheet" type="text/css" href="css/datepicker3.css"></link>
<link rel="stylesheet" type="text/css" href="css/bootstrap-tagsinput.css"></link>
<link rel="stylesheet" type="text/css" href="css/typeahead.css"></link>
<link rel="stylesheet" type="text/css" href="css/editable.css">


<section class="profile_header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="profile_img">
                    <img src="img/PicsArt_11-14-12.30.45.jpg" class="img-responsive">
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile_title_box">
                    <!-- <h1 class="profile_name">Sanket Patel</h1> -->
                    <img src="img/0.png" class="img-responsive center-block">
                    <p class="profile_desg profile_sub_title text-center">Website Designer/Developer</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="profile_details">
    <div class="container">
        <div class="row">
            <div class="col-md-3 profile_left_box">
                <h3 class="profile_title"><span> Personal Details </span></h3>
                <h4 class="profile_sub_title">D.O.B.</h4>
                <p>21.08.1994</p>
                <h4 class="profile_sub_title">Website</h4>
                <p>www.knowamp.com</p>
                <h4 class="profile_sub_title">Phone</h4>
                <p class="editable-field" id="textId">7405094570</p>
                <h4 class="profile_sub_title">Email</h4>
                <p>sanketpatel2108@gmail.com</p>
                <h4 class="profile_sub_title">Address</h4>
                <ul class="list-unstyled">
                    <li>2, Sarvoday Society</li>
                    <li>Behind New Bus-Station,</li>
                    <li>Balasinor - 388255</li>
                </ul>
                <h4 class="profile_sub_title"><span> Social Connections </span></h4>
                <ul class="list-inline profile_social space10">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="col-md-9 profile_right_box">
                <h3 class="profile_title"><span> proffesional statement </span></h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tortor magna, semper quis consequat id, aliquam at lorem. Nunc blandit arcu eget elit volutpat fermentum.
                </p>
                <h3 class="profile_title"><span> awards </span></h3>
                <p>
                    Suspendisse potenti. Proin et accumsan dolor. Quisque pulvinar ut nisi non venenatis. Proin consequat fringilla tristique. Nulla quis neque vel est dapibus facilisis sed at dui.
                </p>
                <h3 class="profile_title"><span> Expertise </span></h3>
                <p>
                    Donec vehicula quam sed nibh porttitor ullamcorper. Fusce at arcu eu orci euismod interdum quis sit amet elit. Aliquam ultrices vitae lorem in consectetur. Aliquam sollicitudin neque id quam dignissim, ut eleifend augue aliquet. In eu risus quis ante posuere efficitur. 
                </p>
                <h3 class="profile_title"><span> Skills </span></h3>
                <div class="skills_box">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="profile_sub_title">Donec vehicula quam</h4>
                            <ul class="list-inline">
                                <li class="full"></li>
                                <li class="full"></li>
                                <li class="full"></li>
                                <li class="full"></li>
                                <li></li>
                            </ul>
                            <h4 class="profile_sub_title">Donec vehicula quam</h4>
                            <ul class="list-inline">
                                <li class="full"></li>
                                <li class="full"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <h4 class="profile_sub_title">Donec vehicula quam</h4>
                            <ul class="list-inline">
                                <li class="full"></li>
                                <li class="full"></li>
                                <li class="full"></li>
                                <li class="full"></li>
                                <li class="full"></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 class="profile_sub_title">Donec vehicula quam</h4>
                            <ul class="list-inline">
                                <li class="full"></li>
                                <li class="full"></li>
                                <li class="full"></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <h4 class="profile_sub_title">Donec vehicula quam</h4>
                            <ul class="list-inline skills_bar">
                                <li class="full"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <h4 class="profile_sub_title">Donec vehicula quam</h4>
                            <ul class="list-inline">
                                <li class="full"></li>
                                <li class="full"></li>
                                <li class="full"></li>
                                <li class="half"></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h3 class="profile_title"><span> top from portfolio </span></h3>
                <div class="portfolio_box">
                    <ul class="list-inline">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="js/vendors.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Syntaxhighlighter -->
<script type="text/javascript" src="js/select2.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.js"></script> -->
<script src="js/editstrap.min.js"></script>

<script type="text/javascript">
        $("#textId").editstrap();
</script>


@endsection