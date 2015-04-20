
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Clean Blog</title>
  
  
 <script src="/assets/admin/js/jquery-2.1.1.min.js"></script>
  
   <!-- Generate Token-->
	<meta name="_token" id="csrf_token" content="{{ csrf_token() }}" />

  <!-- CSS  -->
  <link href="/assets/admin/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/assets/admin/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--custom css-->
  <link href="/assets/admin/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	

			@yield('content')
			
		
		
  <!--  Scripts-->
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
  
  <script src="/assets/admin/js/materialize.js"></script>
  <script src="/assets/admin/js/init.js"></script>

  </body>
</html>
