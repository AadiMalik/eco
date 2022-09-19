@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-10 offset-1">
        <div class="card">
          <div class="card-header">
            <h4>Edit Social Media</h4>
          </div>
          <form action="{{route('link.update',$link->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Social Media Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{$link->name}}" class="form-control">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Social Media Icon <span style="color:red;">*</span></label>
                <input type="text" name="icon" value="{{$link->icon}}" class="form-control">
                {!!$errors->first("icon", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Social Media Link <span style="color:red;">*</span></label>
                <input type="text" name="link" value="{{$link->link}}" class="form-control">
                {!!$errors->first("link", "<span class='text-danger'>:message</span>")!!}
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