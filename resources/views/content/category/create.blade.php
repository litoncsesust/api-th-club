@extends('layouts.app', ['body_class' => 'categories'])
@section('content')
<div class="row justify-content-center">
  <div class="pt-5 col-sm-10 col-md-6">
    <h4>{{ __('Tilføj ny kategori') }}</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <hr/>
    {!! Form::open(['method' => 'POST', 'route' => ['category.store'],'class' => '']) !!}
    <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Kategori']) !!}
      <span class="help-block text-danger">
        {{ $errors -> first('name') }}
      </span>
      <div class="input-group-append">
        {!! Form::submit('Tilføj', ['class' => 'btn btn-primary']) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@stop