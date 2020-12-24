@extends('layouts.app', ['body_class' => 'products'])
@section('content')

<div class="row justify-content-center color-bg-light n-margin">
  <div class="pt-5 pb-3 col-sm-10 col-md-10">
    <h4>{{ __('PRODUKT') }} <a class="btn btn-success btn-sm" href="{{ route('product.create') }}"><i class="fas fa-plus"></i> Tilføj ny</a></h4>
    {!! Form::open(['method' => 'GET', 'route' => ['product.index'],'class' => '']) !!}
   <div id="ccsort" class="row">
      <div class="col-sm-5 col-md-5">
        {!! Form::label('category_id', 'PRODUKTKATEGORI', ['class' => 'condensed control-label']) !!}
        <div class="form-group">
          {!! Form::select('category_id', $categories, ['class' => 'form-control', 'options' => $category_id]) !!}
        </div>
      </div>
      <div class="col-sm-5 col-md-5">
        {!! Form::label('club_id', 'AFSENDER', ['class' => 'condensed control-label']) !!}
        <div class="form-group">
          {!! Form::select('club_id', $clubs, ['class' => 'form-control', 'options' => $club_id]) !!}
        </div>
      </div>
      <div class="col-sm-2 col-md-2">
        <label class="condensed control-label">&nbsp;</label>
        <div class="form-group">
        {!! Form::submit('Søg', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>


<div class="row justify-content-center">
  <div class="pt-5 col-sm-10 col-md-10">
    <table id="sortTable" class="mt-4 table table-striped table-hover">
      <thead class="case-upper top-border bottom-border">
        <th>NAVN</th>
        <th>POINT</th>
        <th>ANTAL</th>
        <th class="text-right">HANDLING</th>
      </thead>
      <tbody>
        @if($products)
        @foreach($products as $key => $product)
        <tr>
          <td><a href="{{route('product.show',[$product->id])}}" >{{$product->title}}</a></td>
          <td>{{$product->initial_point}}</td>
          <td>{{$product->total_number}}</td>
          <td class="text-right">
            <a class="btn btn-sm btn-secondary" href="{{route('product.show', [$product->id])}}" ><i class="far fa-eye"></i></a>
            <a class="btn btn-sm btn-primary" href="{{route('product.edit', [$product->id])}}" ><i class="far fa-edit"></i></a>
            <a class="btn btn-sm btn-danger" href="{{route('product.destroy', $product->id)}}" onclick="event.preventDefault(); document.getElementById('table_delete_{{ $key+1 }}').submit();"><i class="far fa-trash-alt"></i></a>
            <form id="table_delete_{{ $key+1 }}" action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: none;">
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
    {{ $products->links() }}
  </div>
</div>
@stop