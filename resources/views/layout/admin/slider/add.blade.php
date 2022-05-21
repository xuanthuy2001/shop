@extends('layout.master')

@section('content')
<div id="summernote-basic"></div>
<form action="{{route('sliders.add')}}" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
      <div class="form-group mb-3">
            <label for="validationCustom01"> tiêu đề</label>
            <input value="{{old('name')}}" name="name" type="text" class="form-control" id="validationCustom01"   >
      </div>
  
    <div class="form-group mb-3">
            <label for="validationCustom01"> đường dẫn</label>
            <input value="{{old('url')}}" name="url" type="text" class="form-control" id="validationCustom01"   >
      </div>


      <div class="form-group">
            <label for="upload">Ảnh</label>
            <input type="file" class="form-control" id="upload">
            <div id="image_show">

            </div>
            <input type="hidden" name="thumb" id="thumb" value="{{old('thumb')}}">
      </div>

       <div class="form-group">
            <label for="sort_by">Sắp xếp</label>
            <input type="number" name="sort_by" value="{{old('sort_by')}}" class="form-control" id="sort_by">
      </div>

      <div class="custom-control custom-radio" action="">
            <input type="radio" value="1" name="active" id="active" class="custom-control-input" checked="">
            <label for="active" class="custom-control-label"> có </label>
      </div>
      <div class="custom-control custom-radio" action="">
            <input type="radio" value="0" name="active" id="no_active" class="custom-control-input">
            <label for="no_active" class="custom-control-label"> không </label>
      </div>
      </div>

      <button class="btn btn-primary" type="submit">thêm slider</button>
      @csrf

</form>
@endsection