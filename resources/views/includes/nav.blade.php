
  <nav class="teal" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="/" class="brand-logo white-text">Logo</a>
		<ul class="right hide-on-med-and-down">
			      @foreach($menu as $getmenu)
					<li><a class="white-text" href="/{{$getmenu->path}}">@if(isset($getmenu->name)){{$getmenu->name}}@else @endif</a></li>
				  @endforeach
			</ul>
		<ul id="nav-mobile" class="side-nav blue">
		<li><a class="white-text" href="{{URL::to('')}}">Home</a></li>
        <li><a class="white-text" href="{{URL::to('/about')}}">About</a></li>
        <li><a class="white-text" href="{{URL::to('/post')}}">Sample Post</a></li>
        <li><a class="white-text" href="{{URL::to('/contact')}}">Contact</a></li>
      </ul>
     
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>
