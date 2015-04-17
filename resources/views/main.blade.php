@extends('layouts.default')

@section('content')

	@if($page=='dashboard')
		@include('pages.front_end.dashboard')
		
	@elseif($page=='index')
		@include('pages.front_end.index')
		
	@elseif($page=='about')
		@include('pages.front_end.about')
		
	@elseif($page=='contact')
		@include('pages.front_end.contact')
	
	@elseif($page=='post')
		@include('pages.front_end.post')
	
	@endif

@stop
