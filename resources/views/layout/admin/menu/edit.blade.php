@extends('layout.master')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<div id="summernote-basic"></div>
<form action="" method="post" class="needs-validation" novalidate>
      <div class="form-group mb-3">
            <label for="validationCustom01"> tên danh mục</label>
            <input value="{{$menu->name}}" name="name" type="text" class="form-control" id="validationCustom01"
                  placeholder="tên danh mục">
            <div class="valid-feedback">
                  Looks good!
            </div>
      </div>
      <div class="form-group">
            <label for="menu">Danh mục</label>
            <select name="parent_id" class="form-control">
                  <option value="0" {{ $menu-> parent_id== 0? 'selected' : ''  }}>
                        Danh mục cha
                  </option>
                  @foreach ($menus as $menuParent)
                  <option value="{{ $menuParent ->  id  }}"
                        {{ $menu-> parent_id== $menuParent -> id? 'selected' : '' }}>
                        {{ $menuParent-> name }}
                  </option>
                  @endforeach
      </div>
      <div class="form-group">
            <label>mô tả</label>
            <input value="{{$menu->content}}" name="content" type="text" class="form-control" maxlength="25"
                  data-toggle="maxlength">
      </div>

      <div class="form-group">
            <label>mô tả chi tiết</label>

            <textarea value="" name="description" id="editor1" rows="10" cols="80">
            {{$menu->description}}
            </textarea>

      </div>
      <div class="form-group">
            <label for="">kích hoạt</label>

            <div class="custom-control custom-radio" action="">
                  <input type="radio" value="1" name="active" id="active" class="custom-control-input"
                        {{ $menu->active ==1 ? 'checked' : '' }}>
                  <label for="active" class="custom-control-label"> có </label>
            </div>
            <div class="custom-control custom-radio" action="">
                  <input type="radio" value="0" name="active" id="no_active" class="custom-control-input"
                        {{ $menu->active ==0 ? 'checked' : '' }}>
                  <label for="no_active" class="custom-control-label"> không </label>
            </div>
      </div>

      <button class="btn btn-primary" type="submit">Cập nhật danh mục</button>
      @csrf

</form>
@endsection

@section('js')
<script>
// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
CKEDITOR.replace('editor1');
</script>
@endsection