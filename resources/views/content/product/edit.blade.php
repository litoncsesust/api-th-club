@extends('layouts.app', ['body_class' => 'product'])
@section('content')
{!! Form::model($product, ['method' => 'PUT', 'route' => ['product.update', $product->id],'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
<div class="row justify-content-center color-bg-light n-margin">
	<div class="pt-5 pb-3 col-sm-10 col-md-10">
		<h4>{{ __('REDIGERE PRODUKT') }}</h4>
		<a class="btn btn-secondary btn-sm" href="{{ route('product.index') }}">Tilbage til produkt List</a>
		<hr>
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		
		<div id="cc" class="row py-3">
			<div class="col">
				<!-- Category Field -->
				{!! Form::label('category_id', 'PRODUKTKATEGORI', ['class' => 'condensed control-label']) !!}
				<div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
					{!! Form::select('category_id', $categories, ['class' => 'form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('category_id') }}
					</span>
				</div>
				<!-- Category Field -->
			</div>
			<div class="col">
				<!-- Club Field -->
				{!! Form::label('club_id', 'AFSENDER', ['class' => 'condensed control-label']) !!}
				<div class="form-group {{ $errors->has('club_id') ? ' has-error' : '' }}">
					{!! Form::select('club_id', $clubs, ['class' => 'form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('club_id') }}
					</span>
				</div>
				<!-- Club Field -->
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<div class="py-5 col-sm-10 col-md-10">
		<div class="row">
			<div class="col">
				<h2 class="condensed mb-3">GENEREL INFO</h2>
				<label class="form-check-label switch mb-3" for="is-featured">
					<input type="checkbox" name="isFeatured" <?= $product->isFeatured ? "checked = 'checked'" : '' ?> value="<?= $product->isFeatured ? 1 : 0 ?>" id="is-featured">
					<span class="slider round"></span>Featured produkt
				</label>
				<div class="p-3 mb-3 color-bg-light relative">
					<h4 class="condensed">UPLOAD BILLEDE</h4>
					<ul class="p-thumb">
						<?php if($product){ foreach ($product->files as $key => $val) {	?>
							<li class="relative cover center-center" style="background-image: url({{asset($val->file_path)}})">
							<img src="{{asset($val->file_path)}}" class="hide">
							<a class="trash editproduct absolute top btn btn-sm btn-dange"><i class="far fa-trash-alt"></i></a>
						</li>
						<!-- <input type="hidden" name="existence_img[]" value="<?= $val->file_path ?>"> -->
						<?php } } ?>
					</ul>
					<!-- Image Field -->
					<div>

						<div id=filesContainer class="form-label-group"></div>
						<button id="addFile" class="button hollow secondary expanded bold"> Tilføj ekstra billede </button>
					</div>
				</div>
				<!-- Image Field -->
				<!-- offer_date Field -->
				<span>Dato / periode*</span>
				<div class="cp-form-label-group {{ $errors->has('offer_date') ? ' has-error' : '' }}">
					{!! Form::text('offer_date', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('offer_date') }}
					</span>
				</div>
				<!-- offer_date Field -->
				<!-- book_by_date Field -->
				<span>Bestil inden</span>
				<div class="cp-form-label-group {{ $errors->has('book_by_date') ? ' has-error' : '' }}">
					{!! Form::text('book_by_date', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('book_by_date') }}
					</span>
				</div>
				<!-- book_by_date Field -->
				<!-- expire_date Field -->
				<span>Angiv point*</span>
				<div class="cp-form-label-group {{ $errors->has('total_number') ? ' has-error' : '' }}">
					@php ($points = [100=>100, 200=>200, 300=>300, 400=>400, 500=>500, 600=>600, 700=>700, 800=>800, 900=>900, 1000=>1000, 2000=>2000, 3000=>3000, 4000=>4000, 5000=>5000, 6000=>6000, 7000=>7000, 8000=>8000, 9000=>9000, 10000=>10000])
					{!! Form::select('initial_point', $points, ['class' => 'form-control', 'options' => $product->initial_point]) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('initial_point') }}
					</span>
				</div>
				<!-- initial_point Field -->
				<!-- expire_date Field -->
				<span>Antal*</span>
				<div class="form-label-group {{ $errors->has('total_number') ? ' has-error' : '' }}">
					{!! Form::number('total_number', null, ['class' => 'cp-form-control']) !!}
					{!! Form::label('total_number', 'STK.', ['class' => 'control-label']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('total_number') }}
					</span>
				</div>
				<!-- total_number Field -->
			</div>
			<div class="col">
				<h2 class="condensed mb-3">VISNING PÅ FORSIDE</h2>
				<!-- title Field -->
				<span>Produktnavn*</span>
				<div class="cp-form-label-group {{ $errors->has('title') ? ' has-error' : '' }}">
					{!! Form::text('title', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('title') }}
					</span>
				</div>
				<!-- title Field -->
				<!-- short_description Field -->
				<span>Kort beskrivende tekst*</span>
				<div class="cp-form-label-group {{ $errors->has('short_description') ? ' has-error' : 'no-error' }}">
					{!! Form::textarea('short_description', null, ['class' => 'cp-form-control', 'rows' => '3']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('short_description') }}
					</span>
				</div>
				<!-- short_description Field -->
				<h2 class="condensed mt-4 mb-4">VISNING PÅ UNDERSIDE</h2>
				<!-- headline Field -->
				<span>Overskrift*</span>
				<div class="cp-form-label-group {{ $errors->has('headline') ? ' has-error' : '' }}">
					{!! Form::text('headline', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('headline') }}
					</span>
				</div>
				<span>Beskrivende tekst*</span>
				<!-- description Field -->
				<div class="cp-form-label-group {{ $errors->has('description') ? ' has-error' : '' }}">
					{!! Form::textarea('description', null, ['class' => 'cp-form-control', 'rows' => '10']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('description') }}
					</span>
				</div>
				<!-- description Field -->
			</div>
			<div class="col">
				<h2 class="condensed mb-3">SÆLGER</h2>
				<!-- seller_club Field -->
				<span>Firmanavn*</span>
				<div class="cp-form-label-group {{ $errors->has('seller_club') ? ' has-error' : '' }}">
					{!! Form::text('seller_club', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('seller_club') }}
					</span>
				</div>
				<!-- seller_club Field -->
				<!-- seller_address Field -->
				<span>Adresse*</span>
				<div class="cp-form-label-group {{ $errors->has('seller_address') ? ' has-error' : '' }}">
					{!! Form::text('seller_address', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('seller_address') }}
					</span>
				</div>
				<!-- seller_address Field -->
				<!-- seller_postcode Field -->
				<span>Postnummer*</span>
				<div class="cp-form-label-group {{ $errors->has('seller_postcode') ? ' has-error' : '' }}">
					{!! Form::text('seller_postcode', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('seller_postcode') }}
					</span>
				</div>
				<!-- seller_postcode Field -->
				<!-- seller_city Field -->
				<span>By*</span>
				<div class="cp-form-label-group {{ $errors->has('seller_city') ? ' has-error' : '' }}">
					{!! Form::text('seller_city', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('seller_city') }}
					</span>
				</div>
				<!-- seller_city Field -->
				<!-- contact_person Field -->
				<span>Kontaktperson*</span>
				<div class="cp-form-label-group {{ $errors->has('contact_person') ? ' has-error' : '' }}">
					{!! Form::text('contact_person', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('contact_person') }}
					</span>
				</div>
				<!-- contact_person Field -->
				<!-- seller_email Field -->
				<span>Email*</span>
				<div class="cp-form-label-group {{ $errors->has('seller_email') ? ' has-error' : '' }}">
					{!! Form::email('seller_email', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('seller_email') }}
					</span>
				</div>
				<!-- seller_email Field -->
				<!-- seller_telephone Field -->
				<span>Telefon*</span>
				<div class="cp-form-label-group {{ $errors->has('seller_telephone') ? ' has-error' : '' }}">
					{!! Form::text('seller_telephone', null, ['class' => 'cp-form-control']) !!}
					<span class="help-block text-danger">
						{{ $errors -> first('seller_telephone') }}
					</span>
				</div>
				<!-- seller_telephone Field -->
				{!! Form::submit('Opret', ['class' => 'btn btn-primary btn-block']) !!}
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop