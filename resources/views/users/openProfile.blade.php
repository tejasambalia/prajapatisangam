@extends('header')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/select2.css') }}"></link>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datepicker3.css') }}"></link>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap-tagsinput.css') }}"></link>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/typeahead.css') }}"></link>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/editable.css') }}">
<?php
use App\UserData;
use App\Surname;

$userData = array();
$userData = new userData();
$userData = UserData::findById($userId);

$userSurname = Surname::getSingleColumn($userData->surnameId, 'name');

//calculate age
$from = new DateTime($userData->birthDate);
$to   = new DateTime('today');
$age  = $from->diff($to)->y;

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
                <h4 class="profile_sub_title">Age</h4>
                <p>{!! $age !!} Years</p>
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
                <p><a href="http://{!! $userData->website !!}" target="_blank">{!! $userData->website !!}</a></p>
                <h4 class="profile_sub_title">Email</h4>
                <p>{!! $userData->email !!}</p>
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
            </div>
        </div>
    </div>
</section>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="js/vendors.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Syntaxhighlighter -->
<script type="text/javascript" src="{{ URL::asset('js/select2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-tagsinput.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/typeahead.bundle.js') }}"></script>
<script src="{{ URL::asset('js/editstrap.min.js') }}"></script>

<script type="text/javascript">
        $("#textId").editstrap();
</script>


@endsection