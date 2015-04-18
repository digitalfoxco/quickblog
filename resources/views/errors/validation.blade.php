@if($errors->count() >0)
	@if($errors->count() > 1)<p style="color:red" class="err">The Following Errors have been Occurred:</p> @endif
		<ul>
	@foreach($errors->all() as $message)
		<li style="color:red;" class="err">{{$message}}</li>
	@endforeach
		</ul>
	@endif
