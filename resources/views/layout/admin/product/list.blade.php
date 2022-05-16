@extends('layout.master')

@section('content')
<table class="table table-striped table-centered mb-0">
      <thead>
            <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>menu_id</th>
                  <th>Active</th>
                  <th>Update</th>
                  <th>content</th>
                  <th>description</th>
                  <th>price</th>
                  <th>price_sale</th>
                  <th>thumb</th>
                  <th>&nbsp;</th>
            </tr>
      </thead>
      <tbody>
            <tr>
                  {!! \App\Helpers\Helper::product($menus) !!}
            </tr>

      </tbody>
</table>

@endsection