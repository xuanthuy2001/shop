@extends('layout.master')

@section('content')
<table class="table table-striped table-centered mb-0">
      <thead>
            <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>sp thuộc menu</th>
                  <th>Active</th>
                  <th>Update</th>
                  <th>content</th>
                  <th>price</th>
                  <th>price_sale</th>
                  <th>thumb</th>
                  <th>&nbsp;</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($products as $key => $product )
            <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->menu->name}}</td>
                  <td>{!! \App\Helpers\helper::active($product->active) !!}</td>
                  <td>{{$product->updated_at}}</td>
                  <td>{{$product->content}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->price_sale}}</td>
                  <td>
                        '<img src=" {{$product->thumb}}" width="150px">'
                  </td>
                  <td class="table-action">
                        <a href="/admin/products/edit/{{$product->id}}"> <i class="mdi mdi-pencil"></i> </a>
                        <a href="#" onclick="removeRow({{$product->id}},'/admin/products/destroy/')"> <i
                                    class="mdi mdi-delete"></i></i> </a>
                  </td>
            </tr>
            @endforeach
      </tbody>
</table>
<div class="card-footer clearfix">
      {!! $products->links() !!}
</div>

@endsection