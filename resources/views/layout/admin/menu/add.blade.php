@extends('layout.master')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<div id="summernote-basic"></div>
<form action="{{route('add')}}" method="post" class="needs-validation" novalidate>
      <div class="form-group mb-3">
            <label for="validationCustom01"> tên danh mục</label>
            <input value="{{old('name')}}" name="name" type="text" class="form-control" id="validationCustom01"
                  placeholder="tên danh mục">
            <div class="valid-feedback">
                  Looks good!
            </div>
      </div>
      <div class="form-group mb-3">
            <label for="validationCustom01">danh mục cha</label>
            <select name="parent_id" class="custom-select mb-3">
                  <option value="0" selected>danh mục cha</option>
                  @foreach ($menus as $menu )
                  <option value="{{$menu->id}}">{{$menu->name}}</option>
                  @endforeach
            </select>
      </div>
      <div class="form-group">
            <label>mô tả</label>
            <input value="{{old('content')}}" name="content" type="text" class="form-control" maxlength="25"
                  data-toggle="maxlength">
      </div>

      <div class="form-group">
            <label>mô tả chi tiết</label>

            <textarea value="{{old('description')}}" name="description" id="editor1" rows="10" cols="80">

            </textarea>

      </div>
      <div class="form-group">
            <label for="">kích hoạt</label>

            <div class="custom-control custom-radio" action="">
                  <input type="radio" value="1" name="active" id="active" class="custom-control-input" checked="">
                  <label for="active" class="custom-control-label"> có </label>
            </div>
            <div class="custom-control custom-radio" action="">
                  <input type="radio" value="0" name="active" id="no_active" class="custom-control-input">
                  <label for="no_active" class="custom-control-label"> không </label>
            </div>
      </div>

      <button class="btn btn-primary" type="submit">Submit form</button>
      @csrf

</form>
@endsection

@section('footer')
<script>
// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
CKEDITOR.replace('editor1');
</script>
@endsection