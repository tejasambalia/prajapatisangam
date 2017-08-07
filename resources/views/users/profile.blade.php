@extends('header')
@section('content')

<link rel="stylesheet" type="text/css" href="css/select2.css"></link>
<link rel="stylesheet" type="text/css" href="css/datepicker3.css"></link>
<link rel="stylesheet" type="text/css" href="css/bootstrap-tagsinput.css"></link>
<link rel="stylesheet" type="text/css" href="css/typeahead.css"></link>
<link rel="stylesheet" type="text/css" href="css/editable.css">
<?php
use App\UserData;
use App\UserAddress;
use App\Surname;
use App\State;
use App\City;

$userData = array();
$userAddress = array();
$userData = new userData();
$userAddress = new UserAddress();

$profileAdded = \Auth::user()->profile_created;
$userId = \Auth::user()->id;
if($profileAdded){
    $userData = UserData::findByUserid($userId);
    $userAddress = UserAddress::findById($userData->addressId);

    $userSurname = Surname::getSingleColumn($userData->surnameId, 'name');
    $userCity = City::getSingleColumn($userAddress->cityId, 'name');
    $userState = State::getSingleColumn($userAddress->stateId, 'name');
}

?>

<section class="profile_header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- <div class="profile_img">
                    <img src="img/PicsArt_11-14-12.30.45.jpg" class="img-responsive">
                </div> -->
            </div>
            <div class="col-md-8">
                <div class="profile_title_box">
                    <h1 class="profile_name">Prajapati {!! $userData->firstName !!} {!! $userData->middleName; !!} {!! $userSurname->name !!}</h1>
                    <!-- <p class="profile_desg profile_sub_title text-center">Website Designer/Developer</p> -->
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
                <p>{!! $userData->birthDate !!}</p>
                <h4 class="profile_sub_title">Gender</h4>
                <p><?php
                    if($userData->gender){
                        echo "Male";
                    }
                    else{
                        echo "Female";
                    }
                ?></p>
                <h4 class="profile_sub_title">Married</h4>
                <p><?php
                    if($userData->married){
                        echo "Yes";
                    }
                    else{
                        echo "No";
                    }
                ?></p>
                <h4 class="profile_sub_title">Website</h4>
                <p>{!! $userData->website !!}</p>
                <h4 class="profile_sub_title">Phone</h4>
                <p class="editable-field" id="textId">{!! $userData->phone !!}</p>
                <h4 class="profile_sub_title">Email</h4>
                <p>{!! $userData->email !!}</p>
                <h4 class="profile_sub_title">Address</h4>
                <ul class="list-unstyled">
                    <li>{!! nl2br($userAddress->address) !!}</li>
                    <li>{!! $userCity->name !!},</li><li>{!! $userState->name !!} - {!! $userAddress->pincode !!}</li>
                </ul>
                <!-- <h4 class="profile_sub_title"><span> Social Connections </span></h4>
                <ul class="list-inline profile_social space10">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul> -->
            </div>
            <div class="col-md-9 profile_right_box">
                <h3 class="profile_title"><span> ABOUT YOU </span></h3>
                <p>
                    {!! nl2br($userData->about) !!}
                </p>
                <h3 class="profile_title"><span> YOUR THOUGHTS </span></h3>
                <p>
                    {!! nl2br($userData->thoughts) !!}
                </p>
                <!-- <h3 class="profile_title"><span> Skills </span></h3>
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
                </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-offset-3 col-md-9">
                    <input type="button" value="edit" id="mc-embedded-subscribe" class="button btn save_btn" onclick="location.href = '{{ url('/editProfile') }}';">
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
<script type="text/javascript" src="js/typeahead.bundle.js"></script>
<script src="js/editstrap.min.js"></script>

<script type="text/javascript">
        $("#textId").editstrap();
</script>


@endsection