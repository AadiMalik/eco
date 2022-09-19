@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit Team Member</h4>
          </div>
          <form action="{{route('team.update',$team->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Full Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{$team->name}}" class="form-control">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Profession <span style="color:red;">*</span></label>
                <input type="text" name="profession" value="{{$team->profession}}" class="form-control">
                {!!$errors->first("profession", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <img src="{{asset('img/'.$team->image)}}" width="100" height="100" alt="">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>G-Mail</label>
                <input type="email" name="gmail" value="{{$team->gmail}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Facebook</label>
                <input type="url" name="facebook" value="{{$team->facebook}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Twitter</label>
                <input type="url" name="twitter" value="{{$team->twitter}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Instagram</label>
                <input type="url" name="instagram" value="{{$team->instagram}}" class="form-control">
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