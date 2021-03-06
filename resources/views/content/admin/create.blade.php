@extends('layouts.app', ['body_class' => 'user'])
@section('content')
<div class="row justify-content-center">
  <div class="py-5 col-sm-10 col-md-6">
    <h4>{{ __('Opret ny Bruger') }}</h4>
    <a class="btn btn-secondary btn-sm" href="{{ route('admin.index') }}">Tilbage til Bruger List</a>
    <hr/>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.store'],'class' => '', 'enctype'=>'multipart/form-data']) !!}
    <div class="row">
      <div class="col">
        <h4 class="condensed">SÆLGER</h4>
        <div class="form-group form-label-group {{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'FIRMANAVN', 'autofocus' => true ]) !!}
          {!! Form::label('name', 'FIRMANAVN', ['class' => 'col-form-label text-md-right']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('name') }}
          </span>
        </div>
        <!-- Name Field -->
        <!-- CVR Field -->
        <div class="form-group form-label-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
          {!! Form::text('cvr_number', null, ['class' => 'form-control', 'placeholder' => 'CVR'  ]) !!}
          {!! Form::label('cvr_number', 'CVR', ['class' => 'col-form-label text-md-right']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('cvr_number') }}
          </span>
        </div>
        <!-- CVR Field -->
        <!-- Email Field -->
        <div class="form-group form-label-group {{ $errors->has('email') ? ' has-error' : '' }}">
          {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'EMAIL ADRESSE' ]) !!}
          {!! Form::label('email', 'Email', ['class' => 'col-form-label text-md-right']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('email') }}
          </span>
        </div>
        <!-- Email Field -->
        <!-- Telephone Field -->
        <div class="form-group form-label-group {{ $errors->has('telephone') ? ' has-error' : '' }}">
          {!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => 'Telefon'  ]) !!}
          {!! Form::label('telephone', 'Telefon', ['class' => 'col-form-label text-md-right']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('telephone') }}
          </span>
        </div>
        <!-- Telephone Field -->
        <!-- Address Field -->
        <div class="form-group form-label-group {{ $errors->has('address') ? ' has-error' : '' }}">
          {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Adresse'  ]) !!}
          {!! Form::label('address', 'Adresse', ['class' => 'col-form-label text-md-right']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('address') }}
          </span>
        </div>
        <!-- Address Field -->
        <div class="row">
          <div class="col">
            <!-- post_code Field -->
            <div class="form-group form-label-group {{ $errors->has('post_code') ? ' has-error' : '' }}">
              {!! Form::text('post_code', null, ['class' => 'form-control', 'placeholder' => 'Postcode' ]) !!}
              {!! Form::label('post_code', 'Postnummer', ['class' => 'col-form-label text-md-right']) !!}
              <span class="help-block text-danger">
                {{ $errors -> first('post_code') }}
              </span>
            </div>
          </div>
          <!-- post_code Field -->
          <!-- City Field -->
          <div class="col">
            <div class="form-group form-label-group {{ $errors->has('city') ? ' has-error' : '' }}">
              {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Bynavn'  ]) !!}
              {!! Form::label('city', 'By', ['class' => 'col-form-label text-md-right']) !!}
              <span class="help-block text-danger">
                {{ $errors -> first('city') }}
              </span>
            </div>
          </div>
        </div>
        <!-- City Field -->
        <!-- Email Field -->
        <div class="form-group form-label-group {{ $errors->has('password') ? ' has-error' : '' }}">
          {!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => 'NY ADGANGSKODE']) !!}
          {!! Form::label('password', 'NY ADGANGSKODE', ['class' => 'col-form-label text-md-right']) !!}
          <span class="help-block text-danger">
            {{ $errors -> first('password') }}
          </span>
        </div>
        <div class="pt-4 text-center">
          {!! Form::submit('OPRET', ['class' => 'btn btn-primary btn-create']) !!}
        </div>
      </div>
      <div class="col">
        <div class="hide">
          <!-- Email Field -->
          <h4 class="condensed">UPLOAD LOGO</h4>
          <!-- Image Field -->
          <div class="form-label-group {{ $errors->has('profile_picture[]') ? ' has-error' : '' }}">
            {!! Form::file('profile_picture', ['class' => 'form-control']) !!}
            <span class="help-block text-danger">
              {{ $errors -> first('profile_picture') }}
            </span>
          </div>
          <!-- short_description Field -->
          <div class="form-label-group {{ $errors->has('short_description') ? ' has-error' : '' }}">
            {!! Form::textarea('short_description', null, ['class' => 'form-control', 'placeholder' => 'OM OS...', 'rows' => '9']) !!}
            {!! Form::label('short_description', 'OM OS', ['class' => 'control-label']) !!}
            <span class="help-block text-danger">
              {{ $errors -> first('short_description') }}
            </span>
          </div>
          <!-- short_description Field -->
        </div>
        <div class="p-4 color-bg-secondary">
          <h4 class="condensed text-white">ANTAL POINT</h4>
          <div class="form-label-group u-point {{ $errors->has('point') ? ' has-error' : '' }}">
            @php ($points = [100=>100, 200=>200, 300=>300, 400=>400, 500=>500, 600=>600, 700=>700, 800=>800, 900=>900, 1000=>1000, 2000=>2000, 3000=>3000, 4000=>4000, 5000=>5000, 6000=>6000, 7000=>7000, 8000=>8000, 9000=>9000, 10000=>10000])
            {!! Form::select('point', $points, ['class' => 'form-control']) !!}
            <span class="help-block text-danger">
              {{ $errors -> first('point') }}
            </span>
          </div>
          <div class="form-label-group {{ $errors->has('point_expire_date') ? ' has-error' : '' }}">
            {{ Form::text('point_expire_date', null, ['class' => 'form-control', 'placeholder' => 'Udløbsdato for point', 'id'=>'point_expire_date']) }}
            {!! Form::label('point_expire_date', 'Udløbsdato for point', ['class' => 'control-label']) !!}
            <span class="help-block text-danger">
              {{ $errors -> first('point_expire_date') }}
            </span>
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@stop