@extends('layout.master')

@section('content')
<table class="table table-striped table-centered mb-0">
      <thead>
            <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>url</th>
                  <th>thumb</th>
                  <th>active</th>
                  <th>sort_by</th>
                  <th>&nbsp;</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($sliders as $key => $slider )
            <tr>
                  <td>{{$slider->id}}</td>
                  <td>{{$slider->name}}</td>
                  <td><a href="{{$slider->url}}">{{$slider->url}}</a></td>
                  <td>
                        <img src="{{$slider->thumb}}" width="50px">
                  </td>
                  <td>{!! \App\Helpers\helper::active($slider->active) !!}</td>
                  <td>{{$slider->sort_by}}</td>


                  <td class="table-action">
                        <a style="width :50px" class="action-icon" href="/admin/sliders/edit/{{$slider->id}}"> <i
                                    class="mdi mdi-pencil"></i> </a>
                        <a href="#" class="action-icon" onclick="removeRow({{$slider->id}},'/admin/sliders/destroy/')">
                              <i class="mdi mdi-delete"></i></i> </a>
                  </td>
            </tr>
            @endforeach
      </tbody>
</table>
<div class="card-footer clearfix">
      {!! $sliders->links() !!}
</div>
@endsection