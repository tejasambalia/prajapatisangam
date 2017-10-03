@extends('header')
@section('content')
<?php
use App\content_user;
use App\UserData;
$content_user = array();
$content_user = new content_user();
$content_user = content_user::get();
$UserData = new UserData();
?>
<div id="content-block">
	<div class="container be-detail-container">
		<h2 class="content-title">Top Content By Users</h2>
		<div class="blog-wrapper blog-grid">
			<div class="row">
				@foreach($content_user AS $data)
				<?php
				$userName = UserData::getUserName($data->audit_created_by);
				?>
				<div class="grid-item col-xs-12 col-sm-6 col-md-4">
					<div class="blog-post">
						<div class="post-header clearfix">
							<div class="post-date">
								<i class="fa fa-clock-o"></i>{!! $data->audit_created_date !!}
							</div>
							<div class="author-post">
								<img src="img/a1.png" alt="" class="ava-author">
								<span>by <a href="">{!! $userName !!}</a></span>
							</div>
						</div>
						@if($data->image_link!='')
						<a class="post-preview post-image" href=""><img class="img-responsive img-full" src="$data->image_link" alt="" style="width: 320px; height: auto;"></a>
						@endif
						<div class="post-desc">
							<!-- <div class="post-category">{!! $data->title !!}</div> -->
							<a class="post-label" href="">{!! $data->title !!}</a>
							<div class="post-text">{!! nl2br($data->description) !!}</div>
							<!-- <a class="btn color-1 size-2 hover-1" href="blog-detail.html">Read more</a> -->
							<!-- <div class="info-block">
								<span><i class="fa fa-thumbs-o-up"></i> 360</span>
								<span><i class="fa fa-eye"></i> 789</span>
								<span><i class="fa fa-comment-o"></i> 20</span>
							</div> -->																
						</div>
					</div>					
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection