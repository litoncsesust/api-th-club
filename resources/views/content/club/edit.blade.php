@extends('layouts.app', ['body_class' => 'club'])
@section('content')
<div class="row justify-content-center">
  <div class="py-5 col-sm-10 col-md-6">
    <h4>{{ __('Klub') }}</h4>
    <a class="btn btn-secondary btn-sm" href="{{ route('clubs.index') }}">Tilbage til klub List</a>
    <hr>
    {!! Form::model($club, ['method' => 'PUT', 'route' => ['clubs.update', $club->id],'class' => 'form-horizontal']) !!}
    <div class="row">
      <div class="col">
        <!-- Name Field -->
        <div class="form-label-group {{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Navn']) !!}
          {!! Form::label('name', 'Navn', ['class' => 'control-label']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('name') }}
          </span>
        </div>
        <!-- Name Field -->
        <!-- post_code Field -->
        <div class="form-label-group {{ $errors->has('post_code') ? ' has-error' : '' }}">
          {!! Form::text('post_code', null, ['class' => 'form-control', 'placeholder' => 'Postcode' ]) !!}
          {!! Form::label('post_code', 'Postcode', ['class' => 'control-label']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('post_code') }}
          </span>
        </div>
        <!-- post_code Field -->
        <!-- City Field -->
        <div class="form-label-group {{ $errors->has('city') ? ' has-error' : '' }}">
          {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City' ]) !!}
          {!! Form::label('city', 'City', ['class' => 'control-label']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('city') }}
          </span>
        </div>
        <!-- City Field -->
        <!-- Email Field -->
        <div class="form-label-group {{ $errors->has('email') ? ' has-error' : '' }}">
          {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email' ]) !!}
          {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('email') }}
          </span>
        </div>
        <!-- Email Field -->
        <!-- Telephone Field -->
        <div class="form-label-group {{ $errors->has('telephone') ? ' has-error' : '' }}">
          {!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => 'Telefon' ]) !!}
          {!! Form::label('telephone', 'Telefon', ['class' => 'control-label']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('telephone') }}
          </span>
        </div>
        <!-- Telephone Field -->
        <!-- Mobile Field -->
        <div class="form-label-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
          {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'Mobil' ]) !!}
          {!! Form::label('mobile', 'Mobil', ['class' => 'control-label']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('mobile') }}
          </span>
        </div>
        <!-- Mobile Field -->
        
        <!-- KONTAKTPERSON Field -->
        <div class="form-group form-label-group {{ $errors->has('contact_person') ? ' has-error' : '' }}">
          {!! Form::text('contact_person', null, ['class' => 'form-control', 'placeholder' => 'KONTAKTPERSON', 'autofocus' => true  ]) !!}
          {!! Form::label('contact_person', 'KONTAKTPERSON', ['class' => 'col-form-label text-md-right']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('contact_person') }}
          </span>
        </div>
        <!-- KONTAKTPERSON Field -->
        <!-- Address Field -->
        <div class="form-label-group {{ $errors->has('address') ? ' has-error' : '' }}">
          {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Adresse' ]) !!}
          {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('address') }}
          </span>
        </div>
        <!-- Address Field -->
      </div>
      <div class="col">
        <div class="form-label-group {{ $errors->has('short_description') ? ' has-error' : '' }}">
          {!! Form::textarea('short_description', null, ['class' => 'form-control', 'placeholder' => 'Beskrivelse' , 'rows' => '23']) !!}
          {!! Form::label('short_description', 'Beskrivelse', ['class' => 'control-label']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('short_description') }}
          </span>
        </div>
        <div class="btn-area">
          {!! Form::submit('Update', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>
@stop