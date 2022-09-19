@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit Blog</h4>
          </div>
          <form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Heading <span style="color:red;">*</span></label>
                <input type="text" name="heading" value="{{$blog->name}}" class="form-control">
                {!!$errors->first("heading", "<span class='text-danger'>:message</span>")!!}
              </div>
              @if ($blog->image!=null)
              <div class="form-group">
                <img src="{{asset('img/'.$blog->image)}}" width="100" height="100" alt="">
              </div>
              <div class="form-group">
                <label>File</label>
                <input type="file" name="image" class="form-control">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
              </div>
              @else
              <div class="form-group">
                <label>Youtube Video Link</label>
                <input type="url" name="link" value="{{$blog->link}}" class="form-control">
                {!!$errors->first("link", "<span class='text-danger'>:message</span>")!!}
              </div>
              @endif
              <div class="form-group row mb-4">
                <label>Important Note</label>
                <div class="col-sm-12 col-md-12">
                  <textarea class="summernote" name="important">{{$blog->important}}</textarea>
                </div>
                {!!$errors->first("important", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group row mb-4">
                <label>Description <span style="color:red;">*</span></label>
                <div class="col-sm-12 col-md-12">
                  <textarea class="summernote" name="description">{{$blog->description}}</textarea>
                  {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
                </div>
              </div>
            </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Update</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection