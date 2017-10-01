@extends('header')
@section('content')
<?php
use App\content_news;
$newsData = new content_news();
$newsData = content_news::get();
?>
<!-- MAIN CONTENT -->
<div id="content-block">
	<div class="container be-detail-container">
		<div class="blog-wrapper blog-list">
			@foreach($newsData AS $data)
			<div class="blog-post">
				<div class="row">
					<div class="col-xs-12 col-sm-7">
						<a class="post-preview post-image" href="{!! $data->url !!}"><img class="img-responsive img-full" src="{!! $data->image_link !!}" alt=""></a>
					</div>
					<div class="col-xs-12 col-sm-5">
						<div class="post-desc">
							<div class="post-category"></div>
							<a class="post-label" href="{!! $data->url !!}">{!! $data->title !!}</a>
							<div class="post-text">{!! $data->description !!}</div>
							<div class="author-post">
								<img src="img/a1.png" alt="" class="ava-author">
								<span>by <a href="blog-detail-2.html">{!! $data->author !!}</a>, {!! $data->audit_created_date !!}</span>
							</div>
							<!-- <div class="info-block">
								<span><i class="fa fa-thumbs-o-up"></i> 360</span>
								<span><i class="fa fa-eye"></i> 789</span>
								<span><i class="fa fa-comment-o"></i> 20</span>
							</div> -->																
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection