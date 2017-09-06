@extends('header')
@section('content')
<?php
use App\content_video;
$videoData = new content_video();
$videoData = content_video::findById($id);
?>
@if(count($videoData)>0)
<!-- MAIN CONTENT -->
<div id="content-block">
	<div class="container be-detail-container">
		<div class="row">
			<div class="col-xs-12 col-lg-10 col-lg-offset-1">
				<div class="be-large-post">
					<div class="info-block style-2">
						<div class="be-large-post-align"><h3 class="info-block-label">{!! $videoData->title !!}</h3></div>
					</div>
					<div class="be-large-post-align">
	                    <div class="tab-wrapper style-2 color-2">
	                        <div class="tabs-content clearfix">
	                            <div class="tab-info active"> 
	                            	<img class="img-responsive" src="img/graph.jpg" alt="">
	                            	<iframe width="320" height="190" src="{!! $videoData->link !!}?showinfo=0" frameborder="0" allowfullscreen></iframe>
	                            </div>
	                        </div>
	                        <div class="row no-padding">
	                        	<div class="tab-info active">
	                        		<h4 style="margin-bottom: 10px;">{!! $videoData->title !!}</h4>
	                            </div>
	                        </div>
	                        <div class="row no-padding">
	                        	<div class="tab-info active"> 
	                            	{!! $videoData->description !!}
	                            </div>
	                        </div>
	                        <div class="row no-padding">
                    			<div class="col-xs-12 col-sm-3">
                    				<div class="stat-entry">
                    					<div class="stat-number">{!! $videoData->view_count !!}</div>
                    					<div class="stat-text">views</div>
                    				</div>
                    			</div>
                    		</div>
	                    </div>
					</div>
				</div>

				<!-- <div class="statistic-block">
		            <div class="tab-wrapper style-3 color-2">
		                <div class="tabs-content clearfix">
		                    <div class="tab-info active"> 
		                    	<div class="stat-wrapper">
		                    		<div class="row no-padding">
		                    			<div class="stat-item col-xs-12 col-sm-3">
		                    				<div class="stat-entry">
		                    					<img src="img/stat_1.png" alt="">
		                    					<div class="stat-number">{!! $videoData->view_count !!}</div>
		                    					<div class="stat-text">views</div>
		                    				</div>
		                    			</div>
		                    			<div class="stat-item col-xs-12 col-sm-3">
		                    				<div class="stat-entry">
		                    					<img src="img/stat_2.png" alt="">
		                    					<div class="stat-number">1023</div>
		                    					<div class="stat-text">project appreciations</div>
		                    				</div>
		                    			</div>
		                    			<div class="stat-item col-xs-12 col-sm-3">
		                    				<div class="stat-entry">
		                    					<img src="img/stat_3.png" alt="">
		                    					<div class="stat-number">79</div>
		                    					<div class="stat-text">project comments</div>
		                    				</div>
		                    			</div>
		                    			<div class="stat-item col-xs-12 col-sm-3">
		                    				<div class="stat-entry">
		                    					<img src="img/stat_4.png" alt="">
		                    					<div class="stat-number">278</div>
		                    					<div class="stat-text">profile views</div>
		                    				</div>
		                    			</div>		                    					                    					                    			
		                    		</div>
		                    	</div>
		                    </div>
		                </div>
		            </div>
	            </div> -->
			</div>
		</div>

		
	</div>
</div>

@else
<div id="content-block">
	<div class="container be-detail-container">
		<div class="row">
			<div class="col-xs-12 col-lg-10 col-lg-offset-1">
				Sorry, video not available
			</div>
		</div>
	</div>
</div>
@endif

@endsection