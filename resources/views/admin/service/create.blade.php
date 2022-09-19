@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Create Service</h4>
          </div>
          <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label>Service Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Service Image <span style="color:red;">*</span></label>
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