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
use App\Relation;

$userData = array();
$userAddress = array();
$userData = new userData();
$userAddress = new UserAddress();

$profileAdded = \Auth::user()->profile_created;
$userId = \Auth::user()->id;
if($profileAdded){
    $userData = UserData::getTreeDetails($userId);
    $userAddress = UserAddress::findById($userData[0]->addressId);
    $userSurname = Surname::getSingleColumn($userData[0]->surnameId, 'name');    
    $userCity = City::getSingleColumn($userAddress->cityId, 'name');
    $userState = State::getSingleColumn($userAddress->stateId, 'name');
    echo "<section class=\"profile_details\">";
    foreach ($userData as $data) {
        $userRelation = Relation::getSingleColumn($data->relationSelect, 'name');
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_title_box">
                    <h1 class="profile_name">Prajapati {!! $data->firstName !!} {!! $data->middleName; !!} {!! $userSurname->name !!}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 profile_left_box">
                <h3 class="profile_title"><span> Personal Details </span></h3>
                <h4 class="profile_sub_title">Relation</h4>
                <p>{!! $userRelation->name !!}</p>
                <h4 class="profile_sub_title">D.O.B.</h4>
                <p>{!! $data->birthDate !!}</p>
                <h4 class="profile_sub_title">Gender</h4>
                <p><?php
                    if($data->gender){
                        echo "Male";
                    }
                    else{
                        echo "Female";
                    }
                ?></p>
                <h4 class="profile_sub_title">Married</h4>
                <p><?php
                    if($data->married){
                        echo "Yes";
                    }
                    else{
                        echo "No";
                    }
                ?></p>
                <h4 class="profile_sub_title">Website</h4>
                <p>{!! $data->website !!}</p>
                <h4 class="profile_sub_title">Phone</h4>
                <p class="editable-field" id="textId">{!! $data->phone !!}</p>
                <h4 class="profile_sub_title">Email</h4>
                <p>{!! $data->email !!}</p>
                <h4 class="profile_sub_title">Address</h4>
                <ul class="list-unstyled">
                    <li>{!! nl2br($userAddress->address) !!}</li>
                    <li>{!! $userCity->name !!},</li><li>{!! $userState->name !!} - {!! $userAddress->pincode !!}</li>
                </ul>
            </div>
            <div class="col-md-9 profile_right_box">
                <h3 class="profile_title"><span> ABOUT YOU </span></h3>
                <p>
                    {!! nl2br($data->about) !!}
                </p>
                <h3 class="profile_title"><span> YOUR THOUGHTS </span></h3>
                <p>
                    {!! nl2br($data->thoughts) !!}
                </p>
            </div>
        </div>
    </div>
<?php     
    }
}

?>
<!-- Edit button -->
<div class="row">
    <div class="col-md-12">
        <div class="col-md-offset-3 col-md-9">
            <input type="button" value="edit" id="mc-embedded-subscribe" class="button btn save_btn" onclick="location.href = '{{ url('/editFamilyTree') }}';">
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