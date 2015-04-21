@foreach($about as $getabout)
  <div id="index-banner" class="parallax-container">
		<div class="section no-pad-bot">
			  <div class="container">
				<br><br>
				<h1 class="header center teal-text text-lighten-2">@if(isset($getabout->title)){{$getabout->title}}@else About Me @endif</h1>
				<div class="row center">
				  <h5 class="header col s12 light">@if(isset($getabout->sub_title)){{$getabout->sub_title}}@else This is what I do.@endif</h5>
				</div>
				<br><br>
			  </div>
		</div>
		<div class="parallax">
			@if(isset($getabout->image))
				<img src="images/{{$getabout->image}}" alt="...">
			@else
				<img src="/assets/front_end/material/img/about-bg.jpg" alt="Unsplashed background img 2">
			@endif 
			
		</div>
  </div>


  <div class="container">
    <div class="section">
		
		<div class="row">
        <div class="col s12 center">
           <a href="post">
				<p class="black-text">@if(isset($getabout->content)){{$getabout->content}}@else Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum molestiae debitis nobis, quod sapiente qui voluptatum, placeat magni repudiandae accusantium fugit quas labore non rerum possimus, corrupti enim modi! Et. @endif</p>
            </a>
        </div>
      </div>
      
     
    </div>
  </div>
  @endforeach
