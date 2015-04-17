@extends('layouts.admin')

@section('content')

	@if($page=='login')
		@include('pages.admin.auth.login')
		
	@elseif($page=='dashboard')
		@include('pages.admin.dashboard')
		
	@elseif($page=='home')
		@include('pages.admin.hom.home')
	
	@elseif($page=='about')
		@include('pages.admin.abot.about')
		
	@elseif($page=='contact')
		@include('pages.admin.cont.contact')
		
	@elseif($page=='post')
		@include('pages.admin.pos.post')
		
	@elseif($page=='menu')
		@include('pages.admin.men.menu')
		
	@endif

@stop
