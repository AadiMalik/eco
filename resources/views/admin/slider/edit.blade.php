@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit Slider Image</h4>
          </div>
          <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Big Title <span style="color:red;">*</span></label>
                <input type="text" name="big_title" value="{{$slider->big_title}}" class="form-control">
                {!!$errors->first("big_titl", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Title <span style="color:red;">*</span></label>
                <input type="text" name="title" value="{{$slider->title}}" class="form-control">
                {!!$errors->first("title", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <img src="{{asset('img/'.$slider->image)}}" width="100" height="100" alt="">
              </div>
              <div class="form-group">
                <label>Slider Image</label>
                <input type="file" name="image" class="form-control">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
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