@extends('layouts.app', ['body_class' => 'orders'])
@section('content')
<!-- Begin Page Content -->
<div class="row justify-content-center">
  <div class="pt-5 col-sm-10 col-md-10">
    <h4>{{ __('BESTIL') }}</h4>
    <table class="mt-4 table table-striped table-hover">
      <thead class="case-upper top-border bottom-border">
        <th class="case-upper">id</th>
        <th class="case-upper">NAVN</th>
        <th class="case-upper">Samlet mængde</th>
        <th class="case-upper">SAMLEDE POINT</th>
        <th class="case-upper">Status</th>
        <th class="case-upper">BESTILLINGSDATO</th>
        <th class="text-right case-upper">HANDLING</th>
      </thead>
      <tbody>
        @if($orders)
        @foreach($orders as $order)
        <tr>
          <td>{{$order->id}}</td>
          <td><a href="{{route('order.show', [$order->id])}}">{{$order->user_name}}</a></td>
          <td>{{$order->total_quantity}}</td>
          <td>{{$order->total_point}}</td>
          @switch($order->status)
            @case(0)
              <td class="text-info">
              @break
            @case(1)
              <td class="text-muted">
              @break
            @case(2)
              <td class="text-primary">
              @break
            @case(3)
              <td class="text-danger">
              @break
            @case(4)
              <td class="text-success">
              @break
            @case(5)
              <td class="text-warning">
              @break
            @default
              <td>
          @endswitch
            {{$order_status[$order->status]}}
          </td>
          <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
          <td class="text-right">
            <!-- <a class="btn btn-sm btn-primary" href="{{ route('order.edit',[$order->id]) }}" ><i class="far fa-edit"></i></a> -->
            <a class="btn btn-sm btn-secondary" href="{{route('order.show', [$order->id])}}"><i class="far fa-eye"></i></a>
          </td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
    {{ $orders->links() }}
  </div>
</div>
@stop