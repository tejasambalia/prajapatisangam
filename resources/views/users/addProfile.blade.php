@extends('header')
@section('content')

<link rel="stylesheet" type="text/css" href="css/jquery.rateyo.css">
<?php
use App\Classes\SurnameDropDown;
use App\Classes\GenderDropDown;
use App\Classes\MarriedStatusDropDown;
use App\Classes\StateDropDown;
use App\Classes\CityDropDown;

$SurnameObj = new SurnameDropDown;
$SurnameDropDown = $SurnameObj->SurnameDropDown();

$GenderObj = new GenderDropDown;
$GenderDropDown = $GenderObj->GenderDropDown();

$MarriedStatusObj = new MarriedStatusDropDown;
$MarriedStatusDropDown = $MarriedStatusObj->MarriedStatusDropDown();

$StateObj = new StateDropDown;
$StateDropDown = $StateObj->StateDropDown();

$CityObj = new CityDropDown;
$CityDropDown = $CityObj->CityDropDown();
?>
{!! Form::open(array('route' => 'handleAddProfile', 'id' => 'form-validation', 'accept-charset' => 'utf-8')) !!}
{!! Form::token() !!}
<section class="profile_header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="profile_img">
                    <img src="img/PicsArt_11-14-12.30.45.jpg" class="img-responsive">
                    <input type="file" id="file1" name="image" accept="image/*" capture style="display:none"/>
                    <div class="img_uploader">
                        <div class="view_table">
                            <div class="view_cell">                            
                                <i class="fa fa-upload" aria-hidden="true" id="upfile1"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="profile_title_box">
                    <div class="col-md-4">
                        {!! Form::text('firstName', null, array('class' => 'form-control',  'placeholder' => 'First Name', 'required' => 'required')) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::text('middleName', null, array('class' => 'form-control',  'placeholder' => 'Middle Name', 'required' => 'required')) !!}
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="surnameId">
                            {!! $SurnameDropDown !!}
                        </select>
                    </div>
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
                {!! Form::date('birthDate', null, array('class' => 'form-control',  'placeholder' => '07/10/1994', 'required' => 'required')) !!}
                <h4 class="profile_sub_title">Gender</h4>
                <select class="form-control" name="gender">
                    {!! $GenderDropDown !!}
                </select>
                <h4 class="profile_sub_title">Married</h4>
                <select class="form-control" name="married">
                    {!! $MarriedStatusDropDown !!}
                </select>
                <h4 class="profile_sub_title">Phone</h4>
                {!! Form::tel('phone', null, array('class' => 'form-control',  'placeholder' => '9409388600', 'required' => 'required')) !!}
                <h4 class="profile_sub_title">Email</h4>
                {!! Form::email('email', null, array('class' => 'form-control',  'placeholder' => 'mail@yourdomain.com')) !!}
                <h4 class="profile_sub_title">Website</h4>
                {!! Form::text('website', null, array('class' => 'form-control',  'placeholder' => 'www.yourdomain.com')) !!}
                <h4 class="profile_sub_title">Home Town</h4>
                {!! Form::text('homeTown', null, array('class' => 'form-control',  'placeholder' => 'Home Town')) !!}
                <h4 class="profile_sub_title">Education</h4>
                {!! Form::text('education', null, array('class' => 'form-control',  'placeholder' => 'Education')) !!}
                <h4 class="profile_sub_title">Occupation</h4>
                {!! Form::text('occupation', null, array('class' => 'form-control',  'placeholder' => 'Occupation')) !!}
            </div>
            <div class="col-md-9 profile_right_box">
                <h3 class="profile_title"><span> about you </span></h3>
                {!! Form::textarea('about', null, array('class' => 'form-control textarea-resize-no',  'placeholder' => 'Write something about your self.
What is your goals? What you have achieve?
Something like that', 'rows' => '3')) !!}
                <h3 class="profile_title"><span> your thoughts </span></h3>
                {!! Form::textarea('thoughts', null, array('class' => 'form-control textarea-resize-no',  'placeholder' => 'What you are believe in?', 'rows' => '3')) !!}
                <h3 class="profile_title"><span> Address </span></h3>
                <div class="skills_box">
                    <div class="row">
                        <div class="col-md-8">
                            {!! Form::textarea('address', null, array('class' => 'form-control textarea-resize-no',  'placeholder' => 'Address', 'rows' => '3')) !!}
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="state">
                                        {!! $StateDropDown !!}
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="city">
                                        {!! $CityDropDown !!}
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    {!! Form::text('pincode', null, array('class' => 'form-control',  'placeholder' => 'Pincode')) !!}                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-offset-3 col-md-9">
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
@endsection