@extends('header')
@section('content')

<div id="content-block">
	<div class="container be-detail-container">
		<div class="row">
			<div class="col-xs-12 col-md-9 _editor-content_">
				<div class="affix-block" id="basic-information">
					<div class="be-large-post">
						<div class="info-block style-2">
							<div class="be-large-post-align"><h3 class="info-block-label">Upload Content</h3></div>
						</div>
						{!! Form::open(array('route' => 'handleUpload', 'accept-charset' => 'utf-8')) !!}
							<div class="be-large-post-align">
								<div class="row">
									<div class="input-col col-xs-12">
										<div class="form-group focus-2">
											<div class="form-label">Title</div>
											{!! Form::text('title', '', array('class' => 'form-input',  'placeholder' => 'Write Title Here *', 'required' => 'required')) !!}
										</div>								
									</div>
									<div class="input-col col-xs-12">
										<div class="form-group focus-2">
											<div class="form-label">Description</div>
											{!! Form::textarea('description', '', array('class' => 'form-input textarea-resize-no',  'placeholder' => 'Write your description here *', 'required' => 'required')) !!}
										</div>								
									</div>
									<!-- <div class="input-col col-xs-12">
										<div class="form-label">Image</div>
										<input class="form-input" type="file" placeholder="Select Image">
									</div> -->
									<div class="input-col col-xs-12">
										<div class="form-group focus-2">
											<div class="form-label"></div>
											<input type="submit" class="btn color-1 size-2 hover-1" name="upload" value="UPLOAD" style="color: #fff;">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>				
		</div>
	</div>
</div>

@endsection