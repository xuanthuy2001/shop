@extends('layout.master')

@section('content')
<table class="table table-striped table-centered mb-0">
      <thead>
            <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Parent_id</th>
                  <th>Active</th>
                  <th>Update</th>
                  <th>&nbsp;</th>
            </tr>
      </thead>
      <tbody>
            <tr>
                  {!! \App\Helpers\Helper::menu($menus) !!}
            </tr>

      </tbody>
</table>

@endsection