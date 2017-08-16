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
use App\Relation;
use App\Classes\GetRelatives;

$userData = array();
$userData = new userData();
$userData = UserData::findById($userId);

$userSurname = Surname::getSingleColumn($userData->surnameId, 'name');

//get relatives info
$RelativesObj = new GetRelatives;
$RelativesData = $RelativesObj->get($userId);

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
                    <h1 class="profile_name"><span itemprop="honorificPrefix">Prajapati</span> <span itemprop="givenName">{!! $userData->firstName !!}</span> <span itemprop="additionalName">{!! $userData->middleName; !!}</span> <span itemprop="familyName">{!! $userSurname->name !!}</span></h1>
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
                <p itemprop="gender"><?php
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
                <p><a href="http://{!! $userData->website !!}" target="_blank" itemprop="url">{!! $userData->website !!}</a></p>
                <h4 class="profile_sub_title">Email</h4>
                <p itemprop="email">{!! $userData->email !!}</p>
                <h4 class="profile_sub_title">Home Town</h4>
                <p itemprop="birthPlace">{!! $userData->homeTown !!}</p>
                <h4 class="profile_sub_title">Education</h4>
                <p>{!! $userData->education !!}</p>
                <h4 class="profile_sub_title" itemprop="jobTitle">Occupation</h4>
                <p>{!! $userData->occupation !!}</p>
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
                @if(count($RelativesData)>0)
                <h3 class="profile_title"><span> relatives </span></h3>
                <div class="portfolio_box">
                    <ul class="list-inline">
                        @foreach ($RelativesData as $user)
                        <?php
                            if($user->child_userData_id==$userId){
                                $tempUserId = $user->parent_userData_id; 
                                $tempRelationId = $user->child_to_parent_relation;
                            }
                            else{
                                $tempUserId = $user->child_userData_id; 
                                $tempRelationId = $user->parent_to_child_relation;
                            }
                            $firstName = Userdata::getSingleColumn($tempUserId, 'firstName');
                            $middleName = Userdata::getSingleColumn($tempUserId, 'middleName');
                            $usrnameId = Userdata::getSingleColumn($tempUserId, 'surnameId');
                            $surname = Surname::getSingleColumn($usrnameId->surnameId, 'name');
                            $relation = Relation::getSingleColumn($tempRelationId, 'name');
                            $profileURL = URL::asset('/profile/'.$firstName->firstName.'/'.$tempUserId);
                        ?>
                            <li class="relativesBlock" onclick="location.href='{{ $profileURL }}'" itemprop="url">
                                <span class="relationName">{!! $relation->name !!}</span><br>
                                {!! $firstName->firstName !!}<br>
                                {!! $middleName->middleName !!}<br>
                                {!! $surname->name !!}<br>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
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