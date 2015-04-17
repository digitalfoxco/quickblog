
  <nav class="teal" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="/" class="brand-logo white-text">Logo</a>
      @if(Auth::check())
		  <ul class="right hide-on-med-and-down">
			  @foreach($menu as $getmenu)
				<li><a class="white-text" href="{{$getmenu->path}}">@if(isset($getmenu->name)){{$getmenu->name}}@else @endif</a></li>
			  @endforeach
		  </ul>
		  
	  @else
	    <ul class="right hide-on-med-and-down">
			<li><a class="white-text" href="/">Home</a></li>
			<li><a class="white-text" href="/">About</a></li>
			<li><a class="white-text" href="/">Sample Posts</a></li>
			<li><a class="white-text" href="/">Contact</a></li>
        </ul>
      @endif
		
      <ul id="nav-mobile" class="side-nav blue">
		<li><a class="white-text" href="/home">Home</a></li>
        <li><a class="white-text" href="/about">About</a></li>
        <li><a class="white-text" href="/post">Sample Post</a></li>
        <li><a class="white-text" href="/contact">Contact</a></li>
      </ul>
     
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>
