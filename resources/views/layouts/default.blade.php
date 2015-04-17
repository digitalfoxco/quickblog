
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Clean Blog</title>
  
   <!-- Generate Token-->
	<meta name="_token" id="csrf_token" content="{{ csrf_token() }}" />

  <!-- CSS  -->
  <link href="/assets/front_end/material/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/assets/front_end/material/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
			
			@include('includes.nav')
		
				@yield('content')
		
			@include('includes.footer')
		
	
  <!--  Scripts-->
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
  <script src="/assets/front_end/material/js/jquery-2.1.1.min.js"></script>
  <script src="/assets/front_end/material/js/materialize.js"></script>
  <script src="/assets/front_end/material/js/init.js"></script>

  </body>
</html>
