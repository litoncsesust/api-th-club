@extends('layouts.app', ['body_class' => 'users'])
@section('content')
<div class="row justify-content-center">
  <div class="pt-5 col-sm-10 col-md-10">
    <h4>{{ __('Brugere') }} <a class="btn btn-success btn-sm" href="{{ route('admin.create') }}"><i class="fas fa-plus"></i> Tilføj ny</a></h4>
    <table id="sortTable" class="mt-4 table table-striped table-hover">
      <thead class="case-upper top-border bottom-border">
        <th>Navn</th>
        <th>Email</th>
        <th>Point</th>
        <th>Type</th>
        <th class="text-right">HANDLING</th>
      </thead>
      <tbody>
        @if($users)
        @foreach($users as  $key => $user)
        <tr>
          <td><a href="{{route('admin.edit',[$user->id])}}">{{$user->name}}</a></td>
          <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
          <td>{{$user->profile->point}}</td>
          <td>{{$user_type[$user->type]}}</td>
          <td class="text-right">
            <a class="btn btn-sm btn-primary" href="{{route('admin.edit',[$user->id])}}"><i class="far fa-edit"></i></a>
            <a class="btn btn-sm btn-danger" href="{{route('admin.destroy', $user->id)}}" onclick="event.preventDefault(); document.getElementById('table_delete_{{ $key+1 }}').submit();"><i class="far fa-trash-alt"></i></a>
            <form id="table_delete_{{ $key+1 }}" action="{{route('admin.destroy', $user->id)}}" method="POST" style="display: none;">
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
    {{ $users->links() }}
  </div>
</div>
@stop