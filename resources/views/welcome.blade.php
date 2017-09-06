@extends('header')
@section('content')
<?php
use App\Classes\GetLatestData;
$latestDataObj = new GetLatestData;
$latestData = $latestDataObj->GetLatestData();
?>
        
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
        
        <div class="s_keywords">
            <div class="container-fluid custom-container">
            <h3 style="text-align: center;">Recently Uploaded</h3>
            </div>
        </div>
        <div class="container-fluid custom-container">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="row _post-container_">
                        @foreach($latestData as $data)
                        <div class="custom-column-5">
                            <div class="be-post">
                                <?php $url = '/video/'.str_replace(' ', '-', $data->title).'/'.$data->id; ?>
                                <a href="{{ URL::asset($url) }}" class="be-img-block">
                                <img src="" style="height: 100px;" alt="{!! $data->title !!}">
                                <a href="{{ URL::asset($url) }}" class="be-post-title">{!! $data->title !!}</a>
                                </a>
                                
                                <span>
                                    <!-- <a href="blog-detail-2.html" class="be-post-tag">Interaction Design</a> -->
                                    {!! $data->description !!}
                                </span>
                                <!-- <div class="author-post">
                                    <img src="img/a1.png" alt="" class="ava-author">
                                    <span>by <a href="blog-detail-2.html">Hoang Nguyen</a></span>
                                </div> -->
                                <div class="info-block">
                                    <!-- <span><i class="fa fa-thumbs-o-up"></i> {!! $data->like_count !!}</span> -->
                                    <span><i class="fa fa-eye"></i> {!! $data->view_count !!}</span>
                                    <!-- <span><i class="fa fa-comment-o"></i> 20</span> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
               
            </div>
        </div>
@endsection