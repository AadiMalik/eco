@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Create Content</h4>
          </div>
          <form action="{{route('content.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label>Content Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Heading <span style="color:red;">*</span></label>
                <input type="text" name="heading" value="{{old('heading')}}" class="form-control">
                {!!$errors->first("heading", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Key <span style="color:red;">*</span></label>
                <input type="text" name="key" value="{{old('key')}}" class="form-control">
                {!!$errors->first("key", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Font Awesome Icon</label>
                <input type="text" name="icon" value="{{old('icon')}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group row mb-4">
                <label>Description</label>
                <div class="col-sm-12 col-md-12">
                  <textarea class="summernote" name="description">{{old('description')}}</textarea>
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary mr-1" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@section('after-script')
<script type="text/javascript">
  $(document).ready(function() {
    $('.summernote').summernote();
  });
</script>
@endsection