@extends('layouts.app', ['body_class' => 'categories'])
@section('content')
<!-- Begin Page Content -->
<div class="row justify-content-center">
  <div class="pt-5 col-sm-10 col-md-10">
    <h4>{{ __('Kategorier') }}</h4>
    <a class="btn btn-success btn-sm" href="{{ route('category.create') }}"><i class="fas fa-plus"></i> Tilføj ny</a>
    <table class="mt-4 table table-striped table-hover">
      <thead class="case-upper top-border bottom-border">
        <th>Kategori Navn</th>
        <th class="text-right">HANDLING</th>
      </thead>
      <tbody>
        @if($categories)
        @foreach($categories as $key => $category)
        <tr>
          <td>{{$category->name}} </td>
          <td class="text-right">
            <a class="btn btn-sm btn-primary" href="{{ route('category.edit',[$category->id]) }}" ><i class="far fa-edit"></i></a>
            <a class="btn btn-sm btn-danger" href="{{ route('category.destroy', $category->id) }}" onclick="event.preventDefault(); document.getElementById('table_delete_{{ $key+1 }}').submit();"><i class="far fa-trash-alt"></i></a>
            <form id="table_delete_{{ $key+1 }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
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
  </div>
</div>
@stop