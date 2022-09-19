@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Update Category</h4>
          </div>
          <form action="{{route('menu.update',$menu->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Category Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{$menu->name}}" class="form-control">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Old Image</label>
                <img src="{{asset($menu->image)}}" style="width:200px; height:200px;" alt="">
              </div>
              <div class="form-group">
                <label>New Image</label>
                <input type="file" name="image" class="form-control">
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