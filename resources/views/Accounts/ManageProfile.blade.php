    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Proza+Libre:400,400i,500,500i" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <div class="col-xs-6 col-xs-offset-3">
    <h3>User Profile</h3>

{!! Form::model($userprofile, ['action' => ['UsersController@manageProfile', $userprofile->Id, 'files' => true , 'enctype' => 'multipart/formdata']]) !!}
 <div class="form-group">

       {!! Form::label('Contact', 'Contact') !!}
       {{ Form::text('Contact', null, ['class' => 'form-control']) }}
     </div>

     <div class="form-group">
       {!! Form::label('DOB', 'Date of Birth') !!}
       {!! Form::text('DOB', null, ['class' => 'form-control']) !!}
     </div>

     <div class="form-group">
       {!! Form::label('fbLink', 'FaceBook Link') !!}
       {!! Form::text('fbLink', null, ['class' => 'form-control']) !!}
     </div>

      <div class="form-group">
       {!! Form::label('instaLink', 'Instagram Link') !!}
       {!! Form::text('instaLink', null, ['class' => 'form-control']) !!}
     </div>

      <div class="form-group">    
         {!! Form::label('pinterestLink', 'Pinterest Link') !!}
       {!! Form::text('pinterestLink', null, ['class' => 'form-control']) !!}
     </div>

      <div class="form-group">
       {!! Form::label('twitterLink', 'Twitter Link') !!}
       {!! Form::text('twitterLink', null, ['class' => 'form-control']) !!}
     </div>

     <div class="form-group">
       {!! Form::label('website', 'Website') !!}
       {!! Form::text('website', null, ['class' => 'form-control']) !!}
     </div>

     <div class="form-group">
       {!! Form::label('profilePicture', 'Profile Picture') !!}
       {!! Form::file('profilePicture', ['class' => 'form-control']) !!}
     </div>

     <button class="btn btn-success" type="submit">Update profile</button>

{!! Form::close() !!}
</div>
