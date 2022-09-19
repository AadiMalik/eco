@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Create Slider Image</h4>
          </div>
          <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label>Big Title <span style="color:red;">*</span></label>
                <input type="text" name="big_title" value="{{old('big_title')}}" class="form-control">
                {!!$errors->first("big_title", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Title <span style="color:red;">*</span></label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control">
                {!!$errors->first("title", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Slider Image <span style="color:red;">*</span></label>
                <input type="file" name="image" class="form-control">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
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