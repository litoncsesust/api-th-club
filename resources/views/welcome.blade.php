@php 
	$body_class = @guest ? 'login' : 'dashboard'  
@endphp

@extends('layouts.app', ['body_class' => $body_class])
@section('content')
	@guest
		@include('layouts.partials.login-form')
	@endif
	@if (Auth::check())
		@include('layouts.partials.dashboard')
	@endif
@stop