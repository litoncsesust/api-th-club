<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .card-body .table{
            	width: 100%;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>
                <div class="card-body">
					<a class="btn btn-secondary pull-right float-right" href="{{ route('product.create') }}">Add</a>
					<table class="table table-hover">
					    <thead>
					        <th>user_id</th>
					        <th>club_id</th>
					        <th>sku</th>
					        <th>quantity</th>
                            <th>point</th>
                            <th>product_name</th>
                            <th>product_id</th>
					    </thead>
					    <tbody>                
					    @if($order)
					        @foreach($order->sales_items as $sales_item)
					            <tr>
					                <td>{{$sales_item->user_id}} </td>
					                <td>{{$sales_item->club_id}} </td>
					                <td>{{$sales_item->sku}} </td>
					                <td>{{$sales_item->quantity}} </td>
                                    <td>{{$sales_item->point}} </td>
                                    <td>{{$sales_item->product_name}} </td>
                                    <td>{{$sales_item->product_id}} </td>
					            </tr>                    
					        @endforeach
					    @endif
					    </tbody>
					</table>                    
				</div>
            </div>
        </div>
    </div>
</div>
@endsection

    </body>
</html>
