<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Sign In </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Proza+Libre:400,400i,500,500i" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login_bg">
    <div class="bg_shadow">        
        <section class="sign-in">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="sign-main-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sign-side-block">
                                        <h1 class="login-title">Welcome to Prajapati Sangam</h1>
                                        <p> FEEL PROUD TO BE PRAJAPATI </p>
                                        <div class="space20"></div>
                                        {!! Form::open(array('route' => 'handleSignin', 'class' => 'middle_form', 'id' => 'form-validation', 'accept-charset' => 'utf-8')) !!}
                                            {!! Form::hidden('api', '0') !!}
                                            {!! Form::token() !!}
                                            <div class="form-group">
                                                {!! Form::text('contact', null, array('class' => 'form-control',  'placeholder' => 'Contact Number', 'required' => 'required')) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::password('password', array('class' => 'form-control',  'placeholder' => 'Password', 'required' => 'required')) !!}
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-signin">Signin</button>
                                            </div>
                                            <div>
                                                <p> Do not have an account yet, <a href="{{ url('/signup') }}" class="register-link"> Register Here. </a> </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript">
        $( "#form-validation" ).validate({
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true
                }
            }
        });
    </script>
  </body>
</html>