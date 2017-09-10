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
?>

<section class="profile_details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="main-search" method="get" action="{{ url('/search') }}">
                    <div class="form-group">
                        <input type="search" name="search" class="form-control" placeholder="Write search text here...">
                        <button type="submit" class="btn"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                    </div>
                </form>
                <h3 class="">YOU HAVE SEARCHED FOR: {!! $data['search'] !!}</h3>
                @if(count($result)>0)
                <h3 class="">Results</h3>
                @else
                <h3 class="">No results found</h3>
                @endif
                <?php foreach ($result as $res) {
                    $searchRes = UserData::findById($res->id);
                    $userAddress = UserAddress::findById($searchRes->addressId);

                    $userSurname = Surname::getSingleColumn($searchRes->surnameId, 'name');
                    $userCity = City::getSingleColumn($userAddress->cityId, 'name');
                    $userState = State::getSingleColumn($userAddress->stateId, 'name');

                    $profileURL = URL::asset('/profile/'.$searchRes->firstName.'/'.$res->id);
                ?>
                <div class="searchResult" style="border: 1px solid; margin: 2px; padding: 2px;" onclick="location.href='{{ $profileURL }}'">
                <p>
                    Prajapati {!! $searchRes->firstName !!} {!! $searchRes->middleName !!}
                    <?php if($searchRes->surnameId!=0){ ?> 
                        {!! $userSurname->name !!} 
                    <?php } ?>
                </p>
                <p>
                    <? if($userAddress->cityId!=0){ ?>
                        {!! $userCity->name !!},
                    <? } ?>
                    <? if($userAddress->stateId){ ?>
                        {!! $userState->name !!}
                    <? } ?>
                </p>
                </div>
                <?php
                }
                ?>
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