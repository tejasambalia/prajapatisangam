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
                                        <h1 class="login-title">Welcome to VirtuL</h1>
                                        <p> first we feel then we fall </p>
                                        <div class="space20"></div>
                                        {!! Form::open(array('route' => 'handleSignin', 'class' => 'middle_form', 'id' => 'form-validation', 'accept-charset' => 'utf-8')) !!}
                                            {!! Form::hidden('api', '0') !!}
                                            {!! Form::token() !!}
                                            <div class="form-group">
                                                {!! Form::email('email', null, array('class' => 'form-control',  'placeholder' => 'Email Address', 'required' => 'required')) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::password('password', array('class' => 'form-control',  'placeholder' => 'Password', 'required' => 'required')) !!}
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-signin">Continue</button>
                                                <p class="text-center side-lines">Or</p>
                                                <button type="submit" class="btn btn-google space10">
                                                    <span class="btn-google-icon">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 48 48" class="abcRioButtonSvg"><g><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path><path fill="none" d="M0 0h48v48H0z"></path></g></svg>
                                                    </span>
                                                    <span class="btn-text"> Sign in with Google </span>
                                                </button>
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