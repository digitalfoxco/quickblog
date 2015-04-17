@foreach($contact as $getcontact)
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">@if(isset($getcontact->title)){{$getcontact->title}}@else Contact Me @endif</h1>
        <div class="row center">
          <h5 class="header col s12 light">@if(isset($getcontact->sub_title)){{$getcontact->sub_title}}@else Have questions? I have answers (maybe). @endif</h5>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="/assets/front_end/material/img/contact-bg.jpg" alt="Unsplashed background img 2"></div>
  </div>


  <div class="container">
    <div class="section">
		
		<div class="row">
        <div class="col s12 center">
           <a href="post">
				<p class="black-text">@if(isset($getcontact->content)){{$getcontact->content}}@else Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours! @endif</p>
            </a>
        </div>
      </div>
      
      <div class="row">
    <form class="col s12" action="/contactus" method="post">
		<div class="row">
			@include('errors.validation')
		</div>
		<input id="csrf_token" type="hidden" name="_token" value="{{ csrf_token() }}">
		<!--<div class="row">
        <div class="input-field col s12">
		  <i class="mdi-action-account-circle prefix"></i>
          <input id="csrf_token" type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>-->
		
      <div class="row">
        <div class="input-field col s12">
		  <i class="mdi-action-account-circle prefix"></i>
          <input id="email" type="text" name="name" value="{{Input::old('name')}}" class="validate">
          <label for="name">Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
			<i class="mdi-communication-email prefix"></i>
          <input id="email" type="email" name="email" value="{{Input::old('email')}}" class="validate">
          <label for="email">Email Address</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
		  <i class="mdi-communication-phone prefix"></i>
          <input id="email" type="text" name="phone" value="{{Input::old('phone')}}" class="validate">
          <label for="phone">Phone Number</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
		  <i class="mdi-editor-mode-edit prefix"></i>
          <textarea id="textarea1" name="message" value="{{Input::old('message')}}" class="materialize-textarea"></textarea>
          <label for="textarea1">Message</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
			<i class="mdi-content-send right"></i>
	  </button>
    </form>
  </div>
      
      
    </div>
  </div>
@endforeach
