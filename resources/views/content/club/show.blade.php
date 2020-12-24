@extends('layouts.app', ['body_class' => 'club-view'])
@section('content')
<div class="row justify-content-center">
  <div class="py-5 col-sm-10 col-md-4">
    <h4><?= $club ? $club->name : '' ?> <a href="{{ route('clubs.edit',[$club->id]) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a></h4>
    <hr>
      <div class="club-info">
        <div class="clearfix">
          <span class="float-left">FIRMA</span>
          <span class="case-upper float-right"><?= $club ? $club->name : '' ?></span>
        </div>
        <div class="clearfix">
          <span class="float-left">KONTAKTPERSON</span>
          <span class="case-upper float-right"><?=  $club ? $club->contact_person : ''  ?></span>
        </div>
        <div class="clearfix">
          <span class="float-left">EMAIL</span>
          <span class="case-upper float-right"><?=  $club ? $club->email : ''  ?></span>
        </div>
        <div class="clearfix">
          <span class="float-left">TELEFON</span>
          <span class="case-upper float-right"><?=  $club ? $club->telephone : ''  ?></span>
        </div>
        <div class="clearfix">
          <span class="float-left">MOBIL</span>
          <span class="case-upper float-right"><?=  $club ? $club->mobile : ''  ?></span>
        </div>
        <div class="clearfix">
          <span class="float-left">POST NR.</span>
          <span class="case-upper float-right"><?=  $club ? $club->post_code : ''  ?></span>
        </div>
        <div class="clearfix">
          <span class="float-left">BY</span>
          <span class="case-upper float-right"><?=  $club ? $club->city : ''  ?></span>
        </div>
        <div class="clearfix">
          <span class="float-left">ADRESSE</span>
          <span class="case-upper float-right"><?=  $club ? $club->address : ''  ?></span>
        </div>
        <div class="">
          <span class="condensed">BESKRIVELSE</span>
          <div class="case-upper"><?=  $club ? $club->short_description : ''  ?></div>
        </div>
      </div>
    <hr>
  </div>
</div>
@stop