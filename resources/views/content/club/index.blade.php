@extends('layouts.app', ['body_class' => 'clubs'])
@section('content')
<div class="row justify-content-center">
	<div class="pt-5 col-sm-10 col-md-10">
		<h4>{{ __('Klub') }}</h4>
		<a class="btn btn-success btn-sm" href="{{ route('clubs.create') }}"><i class="fas fa-plus"></i> Tilføj ny klub</a>
		<table class="mt-4 table table-striped table-hover">
			<thead class="case-upper top-border bottom-border">
				<th>KLUBNavn</th>
				<th>KONTAKTPERSON</th>
				<th>Postnummer</th>
				<th>By</th>
 				<th>Telefon</th>
				<th class="text-right">HANDLING</th>
			</thead>
			<tbody>
				@if($clubs)
				@foreach($clubs as  $key => $club)
				<tr>
					<td><a href="{{route('clubs.show',[$club->id])}}">{{$club->name}}</a></td>
					<td><a href="mailto:{{$club->email}}">{{$club->contact_person}}</a></td>
					<td>{{$club->post_code}}</td>
					<td>{{$club->city}}</td>
 					<td>{{$club->telephone}}</td>
					<td class="text-right">
						<a class="btn btn-sm btn-secondary" href="{{route('clubs.show',[$club->id])}}"><i class="far fa-eye"></i></a>
						<a class="btn btn-sm btn-primary" href="{{route('clubs.edit',[$club->id])}}"><i class="far fa-edit"></i></a>
						<a class="btn btn-sm btn-danger" href="{{route('clubs.destroy', $club->id)}}" onclick="event.preventDefault(); document.getElementById('table_delete_{{ $key+1 }}').submit();"><i class="far fa-trash-alt"></i></a>
						<form id="table_delete_{{ $key+1 }}" action="{{ route('clubs.destroy', $club->id) }}" method="POST" style="display: none;">
							<input name="_method" type="hidden" value="DELETE">
							{{ csrf_field() }}
							<input class="btn btn-sm btn-danger" type="submit" value="Delete">
						</form>
					</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
		{{ $clubs->links() }}
	</div>
</div>
@stop