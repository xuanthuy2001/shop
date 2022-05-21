@extends('layout.master')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<div id="summernote-basic"></div>
<form action="" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
      <div class="form-group mb-3">
            <label for="validationCustom01"> </label>
            <input value="{{$product->name}}" name="name" type="text" class="form-control" id="validationCustom01"
                  placeholder="tên sản phẩm">
            <div class="valid-feedback">
                  Looks good!
            </div>
      </div>
      <div class="form-group">
            <label>Danh Mục</label>
            <select class="form-control" name="menu_id">
                  @foreach($menus as $menu)
                  <option value="{{ $menu->id }}" {{ $product->menu_id == $menu->id ? 'selected' : '' }}>
                        {{ $menu->name }}</option>
                  @endforeach
            </select>
      </div>


      <div class="form-group">
            <label>mô tả</label>
            <input value="{{$product->content }}" name="content" type="text" class="form-control" maxlength="25"
                  data-toggle="maxlength">
      </div>
      <div class="row">
            <div class="col-md-6">
                  <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{$product->price }}" class="form-control">
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input type="number" name="price_sale" value="{{ $product->price_sale }}" class="form-control">
                  </div>
            </div>
      </div>

      <div class="form-group">
            <label>mô tả chi tiết</label>

            <textarea value="" name="description" id="editor1" rows="10" cols="80">
            {{$product->description}}
            </textarea>

      </div>
      <div class="form-group">
            <label for="menu">Ảnh Sản Phẩm</label>
            <input type="file" class="form-control" id="upload">
            <div id="image_show">
                  <a href="    {{$product->thumb}}">
                        <img src="    {{$product->thumb}}" width="100px" alt="">
                  </a>
            </div>
            <input type="hidden" name="thumb" id="thumb" value="{{$product->thumb}}">
      </div>
      <div class="form-group">
            <label for="">kích hoạt</label class="custom-control custom-radio" action="">

      </div>

      <div class="custom-control custom-radio" action="">
            <input type="radio" value="1" name="active" id="active" class="custom-control-input"
                  {{ $product->active == 1 ? 'checked' : '' }}>
            <label for="active" class="custom-control-label"> có </label>
      </div>
      <div class="custom-control custom-radio" action="">
            <input type="radio" value="0" name="active" id="no_active" class="custom-control-input"
                  {{ $product->active == 0 ? 'checked' : '' }}>
            <label for="no_active" class="custom-control-label"> không </label>
      </div>
      </div>

      <button class="btn btn-primary" type="submit">sửa sản phẩm</button>
      @csrf

</form>
@endsection

@section('js')
<script>
CKEDITOR.replace('editor1');
</script>
@endsection