<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Clean Blog</title>
  
   <!-- Generate Token-->
	<meta name="_token" id="csrf_token" content="{{ csrf_token() }}" />

  <!-- CSS  -->
  <link href="/assets/admin/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/assets/admin/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body  style="background-image: url('/assets/admin/img/office.jpg')">
	
<nav class="teal" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="/" class="brand-logo white-text""></a>
      <ul class="right hide-on-med-and-down">
      </ul>

      <ul id="nav-mobile" class="side-nav blue">
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>

<div class="row">
	<div class="col s12 m6" style="margin-top:25px; margin-left:500px;">
		 <div class="card blue-grey darken-1 col  s12 m6 l6">
			  <div class="card-content white-text  center">
				  <span class="card-title">Login</span>
					  <form action="{{ url('/password/reset') }}" role="form" method="post">
						<div class="row">
							@include('errors.validation')
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">
						<div class="row">
						<div class="input-field col s12">
							<i class="mdi-communication-email prefix"></i>
						  <input id="email" type="email" name="email" value="{{ old('email') }}" class="validate">
						  <label for="email">Email Address</label>
						</div>
					  </div>
					  <div class="row">
						<div class="input-field col s12">
						  <i class="mdi-action-lock-outline prefix"></i>
						  <input id="email" type="password" name="password"  class="validate">
						  <label for="password">Password</label>
						</div>
					  </div>
					  <div class="row">
						<div class="input-field col s12">
						  <i class="mdi-action-lock-outline prefix"></i>
						  <input id="email" type="password" name="password_confirmation"  class="validate">
						  <label for="password">Confirm Password</label>
						</div>
					  </div>
					   <div class="row">
							<div class="col s4">
							  <button class="btn waves-effect waves-light" type="submit" name="action">Reset Password
									<i class="mdi-content-send right"></i>
							  </button>
						   </div>
					  </div>
					</form>
				</div>
          </div>
    </div>
</div>

 <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text"></h5>
          <p class="grey-text text-lighten-4"></p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text"></h5>
          <ul>
            
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text"></h5>
          <ul>
            
          </ul>
        </div>
      </div>
    </div>
	<div class="footer-copyright">
      <div class="container">
      <a class="brown-text text-lighten-3" href="http://materializecss.com"></a>
      </div>
    </div>
  </footer>
  <!--  Scripts-->
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
  <script src="/assets/admin/js/jquery-2.1.1.min.js"></script>
  <script src="/assets/admin/js/materialize.js"></script>
  <script src="/assets/admin/js/init.js"></script>

  </body>
</html>
