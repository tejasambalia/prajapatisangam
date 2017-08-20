@extends('header')
@section('content')
        
    <!-- MAIN CONTENT -->
    <div id="content-block">
        <div class="head-bg">
            <div class="head-bg-img"></div>
            <div class="head-bg-content">
                <img src="img/logo.png" class="img-responsive center-block" height="50">
                <h1>Welcome to the network of Prajapati</h1>
                <p>PROUD FOR BEING PRAJAPATI</p>
                <a class="btn color-1 size-1 hover-1" href="{{ url('/signin') }}"><i class="fa fa-sign-in"></i>sign in now</a>
                <a class="btn color-3 size-1 hover-6" href="{{ url('/signup') }}"><i class="fa fa-lock"></i>sign up now</a>
                <a class="btn color-3 size-1 hover-6" href="{{ url('/verify') }}"><i class="fa fa-check"></i>verify account</a>
            </div>  
        </div>
@endsection