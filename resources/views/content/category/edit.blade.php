@extends('layouts.app', ['body_class' => 'categories'])
@section('content')
<div class="row justify-content-center">
  <div class="pt-5 col-sm-10 col-md-4">
    {!! Form::model($category, ['method' => 'PUT', 'route' => ['category.update', $category->id],'class' => 'form-horizontal']) !!}
    <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Kategori']) !!}
      <span class="help-block text-danger">
        {{ $errors -> first('name') }}
      </span>
      <div class="input-group-append">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>
@stop