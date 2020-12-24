@extends('layouts.app', ['body_class' => 'files'])
@section('content')
<div class="row justify-content-center">
  <div class="py-5 col-sm-11 col-md-10">
    <h4><?= $product ? $product->title : '' ?> <a class="btn btn-sm btn-primary" href="{{route('product.edit', [$product->id])}}" ><i class="far fa-edit"></i></a></h4><a class="btn btn-secondary btn-sm" href="{{ route('product.index') }}">Tilbage til produkt List</a>
    <hr>
    <div class="row">
      <div class="col">
        <h4>{{ __('FIL') }}</h4>
        @if($product)
        <ul class="product-thumb">
          @foreach($product->files as $file)
          <li class="view-product-img" style="background-image: url({{asset($file->file_path)}})"></li>
          @endforeach
        </ul>  
        @endif
      </div>
    </div> 
    <div class="row">
      <div class="col">
        <hr>
        <h4 class="condensed">PRODUKT KATEGORI: <a href="{{ route('category.index',[$product->club_id]) }}" ><?= $product ? $categories[$product->category_id] : '' ?></a></h4>
        <h4 class="condensed">AFSENDER: <a href="{{ route('clubs.show',[$product->club_id]) }}" ><?= $product ? $clubs[$product->club_id] : '' ?></a></h4>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h4 class="condensed">{{ __('GENEREL INFO') }}</h4>
        <hr>
        <div class="product-info">
          <div class="clearfix">
            <span class="float-left">Dato / periode</span>
            <span class="float-right"><?= $product ? $product->offer_date : '' ?></span>
          </div>
          <div class="clearfix">
            <span class="float-left">Bestil inden</span>
            <span class="float-right"><?= $product ? $product->book_by_date : '' ?></span>
          </div>
          <div class="clearfix">
            <span class="float-left">ANTAL</span>
            <span class="float-right"><?= $product ? $product->total_number : '' ?></span>
          </div>
          <div class="clearfix">
            <span class="float-left">ANGIV PRIS</span>
            <span class="float-right"><?= $product ? $product->initial_point : '' ?></span>
          </div>
        </div>
      </div>
      <div class="col">
        <h4 class="condensed">{{ __('PRODUKT INFO') }}</h4>
        <hr>
        <div class="product-info">
          <p class="condensed">{{ __('VISNING PÅ FORSIDE') }}</p>
          <div class="clearfix">
            <span class="float-left">Produktnavn</span>
            <span class="float-right"><?= $product ? $product->title : '' ?></span>
          </div>
          <div class="clearfix">
            <span class="float-left">Kort beskrivende tekst</span>
            <span class="float-right"><?= $product ? $product->short_description : '' ?></span>
          </div>
          <p class="condensed">{{ __('VISNING PÅ UNDERSIDE') }}</p>
          <div class="clearfix">
            <span class="float-left">Overskrift</span>
            <span class="float-right"><?= $product ? $product->headline : '' ?></span>
          </div>
          
          <div class="">
            <span class="float-left">Beskrivende tekst</span>
            <span class="float-right"><?= $product ? $product->description : '' ?></span>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="seller_info">
          <h4 class="condensed">{{ __('SÆLGER INFO') }}</h4>
          <hr>
          <div class="clearfix">
            <span class="float-left">Firmanavn</span>
            <span class="float-right"><?= $product ? $product->seller_club : '' ?></span>
          </div>
          <div class="clearfix">
            <span class="float-left">Adresse</span>
            <span class="float-right"><?= $product ? $product->seller_address : '' ?></span>
          </div>
          <div class="clearfix">
            <span class="float-left">Postnummer</span>
            <span class="float-right"><?= $product ? $product->seller_postcode : '' ?></span>
          </div>
          <div class="clearfix">
            <span class="float-left">By</span>
            <span class="float-right"><?= $product ? $product->seller_city : '' ?></span>
          </div>
          <div class="clearfix">
            <span class="float-left">Kontaktperson</span>
            <span class="float-right"><?= $product ? $product->contact_person : '' ?></span>
          </div>
          <div class="clearfix">
            <span class="float-left">Email</span>
            <span class="float-right"><?= $product ? $product->seller_email : '' ?></span>
          </div>
          <div class="clearfix">
            <span class="float-left">Telefon</span>
            <span class="float-right"><?= $product ? $product->seller_telephone : '' ?></span>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </div>
</div>
@stop