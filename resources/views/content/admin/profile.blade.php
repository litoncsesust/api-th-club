@extends('layouts.app', ['body_class' => 'profile'])
@section('content')
<div class="row justify-content-center">
  <div class="py-5 col-sm-10 col-md-4">
    @if($user)
      <h4>{{$user->name}}</h4>
      <p>Email: {{$user->email}}</p>
      <p>Type: {{$user_type[$user->type]}}</p>
      @if($user->email_verified_at)
      <p>Verified: {{$user->email_verified_at}}</p>
      @endif
    @endif
  </div>
</div>
@stop