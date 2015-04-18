<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>

    <!-- Core CSS - Include with every page -->
    <link href="{{URL::to('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="{{URL::to('/assets/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><center>Create your acount</center></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{URL::to('/authenticate')}}" method="POST">
                            <fieldset>
								 <div class="form-group">
                                    <input class="form-control" placeholder="First Name" name="fname" type="text" autofocus>
                                </div> <div class="form-group">
                                    <input class="form-control" placeholder="Last Name" name="lname" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" name="confpassword" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			@if (isset($errors))
			<ul>
			@foreach( $errors->all() as $error )
				<li>{{$error}}</li>
			@endforeach
			</ul>
			@endif
			</div>
		</div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="{{URL::to('/assets/js/jquery-1.10.2.js')}}"></script>
    <script src="{{URL::to('/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('/assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{URL::to('/assets/js/sb-admin.js')}}"></script>

</body>

</html>
