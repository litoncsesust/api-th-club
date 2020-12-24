@extends('layouts.app', ['body_class' => 'items'])
@section('content')
<div class="row justify-content-center">
  <div class="pt-5 col-sm-10 col-md-10">
    <h4>{{ __('Ordre detaljer') }}</h4>
    {!! Form::model($order, ['method' => 'PUT', 'route' => ['order.update', $order->id],'class' => 'form-horizontal']) !!}
    <div class="row">
      <div class="col status-wrapper">
        <div class="input-group">
          <div class="input-group-prepend">
            {!! Form::label('status', 'Ordre status', ['class' => 'input-group-text']) !!}
          </div>
          {!! Form::select('status', $order_status, ['class' => 'form-control', 'options' => $order->status]) !!}
          <div class="input-group-append">
            {!! Form::submit('Opdater status', ['class' => 'btn btn-primary']) !!}
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
    <hr>
    <div class="row">
      <div class="col text-right">
        <?php  $mytime = Carbon\Carbon::now(); ?>
        Date: {{date('d-m-Y', strtotime($mytime->toDateTimeString()))}}
      </div>
    </div>
    <hr>
    <div class="row pt-5 ">
      <div class="col">
        <span class="condensed">From</span></br>
        @if($order->profile)
        {{$order->user_name}}</br>
        {{$order->profile['address']}}</br>
        {{$order->profile['city']}}</br>
        <b>Phone: </b>{{$order->profile['telephone']}}</br>
        <b>Email: </b>{{$order->user['email']}}</br>
        @endif
      </div>
      <div class="col">
        <span class="condensed">To</span></br>
        @if($order->profile)
        {{$order->user_name}}</br>
        {{$order->profile['address']}}</br>
        {{$order->profile['city']}}</br>
        <b>Phone: </b>{{$order->profile['telephone']}}</br>
        <b>Email: </b>{{$order->user['email']}}</br>
        @endif
      </div>
      <div class="col text-right">
        @if($order->profile)
        <b>Invoice # </b>{{$order->profile['telephone']}}</br></br>
        <b>Order ID: </b>{{$order->profile['telephone']}}</br>
        <b>Payment Due: </b>{{$order->profile['telephone']}}</br>
        <b>Account: </b>{{$order->user['email']}}</br>
        @endif
      </div>
    </div>
    <!-- <table class="mt-4 table table-striped table-hover">
      <tbody>
        @if($order->profile)
        <tr>
          <td>{{$order->user_name}} </td>
          <td>{{$order->user['email']}} </td>
          <td>{{$order->total_quantity}} </td>
          <td>{{$order->total_point}} </td>
          <td>{{$order->profile['telephone']}} </td>
          <td>{{$order->profile['cvr_number']}} </td>
          <td>{{$order->profile['address']}} </td>
          <td>{{$order->profile['city']}} </td>
          <td>{{$order->profile['point']}} </td>
          <td>{{$order->profile['short_description']}} </td>
        </tr>
        @endif
      </tbody>
    </table> -->
    <table class="mt-4 table table-striped table-hover">
      <thead class="case-upper top-border bottom-border">
        <th>PRODUKT NAVN</th>
        <th>CLUB</th>
        <th>SKU</th>
        <th>QUANTITY</th>
        <th class="text-right">POINT</th>
      </thead>
      <tbody>
        @if($order)
        @foreach($order->sales_items as $sales_item)
        <tr>
          <td>{{$sales_item->product_name}}</td>
          <td>{{$clubs[$sales_item->club_id]['name']}}</td>
          <td>{{$sales_item->sku}}</td>
          <td>{{$sales_item->quantity}}</td>
          <td class="text-right">{{$sales_item->point}}</td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
    <div class="cart-total text-right">
      <table class="table" width="400">
        <tbody><tr>
          <th class="condensed">SUBTOTAL:</th>
          <td>{{$order->total_point}}</td>
        </tr>
        <tr>
          <th class="condensed">SAMLEDE POINT:</th>
          <td>{{$order->total_point}}</td>
        </tr>
      </tbody></table>
    </div>
  </div>
</div>
@stop