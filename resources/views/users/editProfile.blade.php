@extends('header')
@section('content')

<link rel="stylesheet" type="text/css" href="css/jquery.rateyo.css">

{!! Form::open(array('route' => 'handleEditProfile', 'id' => 'form-validation', 'accept-charset' => 'utf-8')) !!}

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
                        <input type="text" name="profile_name" class="form-control" placeholder="First Name">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="profile_name" class="form-control" placeholder="Middle Name">
                    </div>
                    <div class="col-md-4">
                        <select class="form-control">
                            <option>Select Surname</option>
                            <option>Ambaliya</option>
                            <option>Rudakiya</option>
                        </select>
                    </div>
                    <!-- <h1 class="profile_name">Sanket Patel</h1> -->
                    <!-- <input type="text" name="designation" class="form-control space10" placeholder="Web Developer"> -->
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
                <input type="date" name="birth_date" class="form-control" placeholder="21.08.1994">
                <h4 class="profile_sub_title">Gender</h4>
                <select class="form-control">
                    <option>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
                <h4 class="profile_sub_title">Married</h4>
                <select class="form-control">
                    <option>Select Status</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
                <h4 class="profile_sub_title">Phone</h4>
                <input type="tel" name="phone" class="form-control" placeholder="1234567890">
                <h4 class="profile_sub_title">Email</h4>
                <input type="email" name="email" class="form-control" placeholder="sanket@multitudetech.com">
                <h4 class="profile_sub_title">Website</h4>
                <input type="text" name="website" class="form-control" placeholder="www.knowamp.com">
                <h4 class="profile_sub_title">Home Town</h4>
                <input type="text" name="website" class="form-control" placeholder="Home Town">
                <h4 class="profile_sub_title">Education</h4>
                <input type="text" name="website" class="form-control" placeholder="Education">
                <h4 class="profile_sub_title">Occupation</h4>
                <input type="text" name="website" class="form-control" placeholder="Occupation">
                <!-- <h4 class="profile_sub_title"><span> Social Connections </span></h4>
                <ul class="list-inline profile_social space10">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul> -->
            </div>
            <div class="col-md-9 profile_right_box">
                <h3 class="profile_title"><span> about you </span></h3>
                <textarea class="form-control textarea-resize-no" name="proffesional_statement" placeholder="" rows="3"></textarea>
                <h3 class="profile_title"><span> your thoughts </span></h3>
                <textarea class="form-control textarea-resize-no" name="awards" placeholder="" rows="3"></textarea>
                <h3 class="profile_title"><span> Address </span></h3>
                <div class="skills_box">
                    <div class="row">
                        <div class="col-md-8">
                            <textarea class="form-control textarea-resize-no" name="proffesional_statement" placeholder="Address" rows="3"></textarea>
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control">
                                        <option>Select State</option>
                                        <option>Gujarat</option>
                                        <option>Maharastra</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control">
                                        <option>Select City</option>
                                        <option>Jamnagar</option>
                                        <option>rajkot</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="address_line_1" class="form-control" placeholder="pincode">
                                </div>
                            </div>
                        </div>
                    </div>
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