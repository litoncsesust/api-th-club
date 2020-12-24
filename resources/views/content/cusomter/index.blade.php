@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-11">
		<div class="card">
			<div class="card-header">
				{{ __('Users') }}
				<!-- <a class="btn btn-secondary pull-right float-right" href="{{ route('customer.create') }}">Add</a> -->
			</div>
			<div class="card-body">
				<table class="table table-hover">
					<thead>
						<th>Name</th>
						<th>Email</th>
						<th>Type</th>
						<th >Api Token</th>
					</thead>
					<tbody>
						@if($customers)
						@foreach($customers as  $key => $customer)
						<tr>
							<td>{{$customer->name}} </td>
							<td>{{$customer->email}} </td>
							<td>{{$customer->type}} </td>
							<td>{{$customer->api_token}} </td>
							<td><a href="{{ route('customer.edit',[$customer->id]) }}" class="btn btn-xs btn-primary">Edit</a></td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
@stop