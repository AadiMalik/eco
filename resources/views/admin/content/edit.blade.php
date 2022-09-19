@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit Content</h4>
          </div>
          <form action="{{route('content.update',$content->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Content Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{$content->name}}" class="form-control">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Heading <span style="color:red;">*</span></label>
                <input type="text" name="heading" value="{{$content->heading}}" class="form-control">
                {!!$errors->first("heading", "<span class='text-danger'>:message</span>")!!}
              </div>
              @if ($content->icon!=null)
              <div class="form-group">
                <label>Font Awesome Icon</label>
                <input type="text" name="icon" value="{{$content->icon}}" class="form-control">
              </div>
              @endif
              @if ($content->image!=null)
              <div class="form-group">
                <img src="{{asset('img/'.$content->image)}}" width="100" height="100" alt="">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
              </div>
              @endif
              @if ($content->description!=null)
              <div class="form-group row mb-4">
                <label>Description</label>
                <div class="col-sm-12 col-md-12">
                  <textarea class="summernote" name="description">{{$content->description}}</textarea>
                </div>
              </div>
              @endif
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