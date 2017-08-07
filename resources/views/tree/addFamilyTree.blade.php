@extends('header')
@section('content')

<link rel="stylesheet" type="text/css" href="css/jquery.rateyo.css">
<?php
use App\Classes\SurnameDropDown;
use App\Classes\GenderDropDown;
use App\Classes\MarriedStatusDropDown;
use App\Classes\StateDropDown;
use App\Classes\CityDropDown;
use App\Classes\RelationDropDown;
use App\UserData;
use App\UserAddress;

$userData = array();
$userAddress = array();
$userData = new userData();
$userAddress = new UserAddress();

$familyTreeAdded = \Auth::user()->familytree_created;
$userId = \Auth::user()->id;
if($familyTreeAdded){
    $userData = UserData::findByUserid($userId);
    $userAddress = UserAddress::findById($userData->addressId);
}

$RelationObj = new RelationDropDown;
$RelationDropDown = $RelationObj->RelationDropDown($userData->relationSelect);

$SurnameObj = new SurnameDropDown;
$SurnameDropDown = $SurnameObj->SurnameDropDown($userData->surnameId);

$GenderObj = new GenderDropDown;
$GenderDropDown = $GenderObj->GenderDropDown($userData->gender);

$MarriedStatusObj = new MarriedStatusDropDown;
$MarriedStatusDropDown = $MarriedStatusObj->MarriedStatusDropDown($userData->married);

$StateObj = new StateDropDown;
$StateDropDown = $StateObj->StateDropDown($userAddress->stateId);

$CityObj = new CityDropDown;
$CityDropDown = $CityObj->CityDropDown($userAddress->cityId);
?>
<?php
if($familyTreeAdded){
?>
{!! Form::open(array('route' => 'handleEditFamilyTree', 'id' => 'form-validation', 'accept-charset' => 'utf-8')) !!}
<?php
}
else{
?>
{!! Form::open(array('route' => 'handleAddFamilyTree', 'id' => 'form-validation', 'accept-charset' => 'utf-8')) !!}
<?php
}
?>
{!! Form::token() !!}
<section class="profile_details">
    <div class="container">
    	<div id="treeContainer">
    		<div id="firstTreeChild">
		    	<div class="row">
		    		<div class="col-md-offset-3 col-md-9">
		                <div class="profile_title_box">
		                    <div class="col-md-3">
		                       <select class="form-control" name="relationSelect[]" required="required">
		                            {!! $RelationDropDown !!}
		                        </select> 
		                    </div>
		                    <div class="col-md-3">
		                        {!! Form::text('firstName[]', $userData->firstName, array('class' => 'form-control',  'placeholder' => 'First Name *', 'required' => 'required')) !!}
		                    </div>
		                    <div class="col-md-3">
		                        {!! Form::text('middleName[]', $userData->middleName, array('class' => 'form-control',  'placeholder' => 'Middle Name *', 'required' => 'required')) !!}
		                    </div>
		                    <div class="col-md-3">
		                        <select class="form-control" name="surnameId[]" required="required">
		                            {!! $SurnameDropDown !!}
		                        </select>
		                    </div>
		                </div>
		            </div>
		    	</div>
		        <div class="row">
		            <div class="col-md-3 profile_left_box">
		                <h3 class="profile_title"><span> Personal Details </span></h3>
		                <h4 class="profile_sub_title">D.O.B. *</h4>
		                {!! Form::date('birthDate[]', $userData->birthDate, array('class' => 'form-control',  'placeholder' => '07/10/1994', 'required' => 'required')) !!}
		                <h4 class="profile_sub_title">Gender *</h4>
		                <select class="form-control" name="gender[]">
		                    {!! $GenderDropDown !!}
		                </select>
		                <h4 class="profile_sub_title">Married *</h4>
		                <select class="form-control" name="married[]">
		                    {!! $MarriedStatusDropDown !!}
		                </select>
		                <h4 class="profile_sub_title">Phone</h4>
		                {!! Form::tel('phone[]', $userData->phone, array('class' => 'form-control',  'placeholder' => '9409388600', 'required' => 'required')) !!}
		                <h4 class="profile_sub_title">Email</h4>
		                {!! Form::email('email[]', $userData->email, array('class' => 'form-control',  'placeholder' => 'mail@yourdomain.com')) !!}
		                <h4 class="profile_sub_title">Website</h4>
		                {!! Form::text('website[]', $userData->website, array('class' => 'form-control',  'placeholder' => 'www.yourdomain.com')) !!}
		                <h4 class="profile_sub_title">Home Town</h4>
		                {!! Form::text('homeTown[]', $userData->homeTown, array('class' => 'form-control',  'placeholder' => 'Home Town')) !!}
		                <h4 class="profile_sub_title">Education</h4>
		                {!! Form::text('education[]', $userData->education, array('class' => 'form-control',  'placeholder' => 'Education')) !!}
		                <h4 class="profile_sub_title">Occupation</h4>
		                {!! Form::text('occupation[]', $userData->occupation, array('class' => 'form-control',  'placeholder' => 'Occupation')) !!}
		            </div>
		            <div class="col-md-9 profile_right_box">
		                @if (count($errors) > 0)
		                    <div class="alert alert-danger">
		                        @foreach ($errors->all() as $error)
		                            {{ $error }}
		                        @endforeach
		                    </div>
		                @endif
		                <h3 class="profile_title"><span> about you </span></h3>
		                {!! Form::textarea('about[]', $userData->about, array('class' => 'form-control textarea-resize-no',  'placeholder' => 'Write something about your self.
What is your goals? What you have achieve?
Something like that', 'rows' => '3')) !!}
		                <h3 class="profile_title"><span> your thoughts </span></h3>
		                {!! Form::textarea('thoughts[]', $userData->thoughts, array('class' => 'form-control textarea-resize-no',  'placeholder' => 'What you are believe in?', 'rows' => '3')) !!}
		                <h3 class="profile_title"><span> Address </span></h3>
		            </div>
		        </div>
	        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-offset-3 col-md-2">
                    <input type="button" value="more" id="addMore" class="button btn save_btn">
                </div>
                <div class="col-md-1">
                    <input type="submit" value="save" id="mc-embedded-subscribe" class="button btn save_btn">
                </div>
            </div>
        </div>
    </div>
</section>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.rateyo.js"></script>
<script type="text/javascript">
    $(".rateyo").rateYo({
        fullStar: true,
        normalFill: "#dddddd",
        ratedFill: "#474648",
        starWidth: "22px",
        spacing   : "4px"
    });
</script>
<script type="text/javascript">
    $("#upfile1").click(function () {
        $("#file1").trigger('click');
    });
</script>
<script type="text/javascript">
	$("#addMore").click(function (){
		var content = $('#firstTreeChild').html();
		$('#treeContainer').append(content);
	});
</script>
@endsection