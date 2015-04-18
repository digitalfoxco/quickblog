
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
		
        <br><br>
        <h1 class="header center teal-text text-lighten-2">@if(isset($home->title)){{$home->title}}@else Clean Blog @endif</h1>
        <div class="row center">
          <h5 class="header col s12 light">@if(isset($home->sub_title)){{$home->sub_title}}@else A Clean Blog Theme by Start Bootstrap @endif</h5>
        </div>
        
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="/assets/front_end/material/img/background1.jpg" alt="Unsplashed background img 2"></div>
  </div>


  <div class="container">
    <div class="section">
		@foreach($post as $getpost)
		  <div class="row">
			<div class="col s12 center">
				<!-- set slug character limit-->
				{{--*/
						$slug = str_limit($getpost->slug, 30);
						$slug = preg_replace('/[^A-Za-z0-9\. -]/', '', $slug);
					/*--}}
				<a href="/post/{{$getpost->id}}-{{$slug}}">
					<h4 class="left-align light black-text">
						<strong>@if(isset($getpost->title)){{$getpost->title}}@else Man must explore, and this is exploration at its greatest @endif</strong>
					</h4>
					<h5 class="left-align light black-text">
						@if(isset($getpost->sub_title)){{$getpost->sub_title}}@else Problems look mighty small from 150 miles up @endif
					</h5>
				</a>
				 {{--*/
					$timestamp = $getpost->created_at;
					$splitTimeStamp = explode(" ",$timestamp);
					$date = $splitTimeStamp[0];
					$postdate = date('F j, Y',strtotime($date));
					$time = $splitTimeStamp[1];
				/*--}}
				   <p class="left-align light">Posted by <a href="#">Clean Blog </a>@if(isset($postdate)){{$postdate}} @else on August 24, 2014 @endif</p>
			</div>
		  </div>
      @endforeach
     <!-- <div class="row">
        <div class="col s12 center">
          <a href="post">
				<h4 class="left-align light black-text">
					<strong>I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</strong>
				</h4>
				<h5 class="left-align light black-text">
					Problems look mighty small from 150 miles up
				</h5>
            </a>
               <p class="left-align light">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</p>
       </div>
      </div>
      
      <div class="row">
        <div class="col s12 center">
          <a href="post">
				<h4 class="left-align light black-text">
					<strong>Science has not yet mastered prophecy</strong>
				</h4>
				<h5 class="left-align light black-text">
					We predict too much for the next year and yet far too little for the next ten.
				</h5>
            </a>
               <p class="left-align light">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</p>
        </div>
      </div>-->
      
</div>
  </div>

