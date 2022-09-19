@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit User</h4>
          </div>
          <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>First Name <span style="color:red;">*</span></label>
                  <input type="text" name="fname" value="{{$user->fname}}" class="form-control">
                  {!!$errors->first("fname", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Last Name <span style="color:red;">*</span></label>
                  <input type="text" name="lname" value="{{$user->lname}}" class="form-control">
                  {!!$errors->first("lname", "<span class='text-danger'>:message</span>")!!}
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Email <span style="color:red;">*</span></label>
                  <input type="email" name="email" disabled value="{{$user->email}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label>Phone No <span style="color:red;">*</span></label>
                  <input type="text" name="phone" disabled value="{{$user->phone}}" class="form-control">
                </div>
              </div>
              @if ($user->image!=null)
              <div class="form-group">
                <img src="{{asset('img/'.$user->image)}}" width="100" height="100" alt="">
              </div>
              @endif
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Select User Type <span style="color:red;">*</span></label>
                  <select name="role" class="form-control">
                    <option value="2" @if ($user->role==2) selected @endif>User</option>
                    <option value="1" @if ($user->role==1) selected @endif>Admin</option>
                  </select>
                {!!$errors->first("role", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Select Status <span style="color:red;">*</span></label>
                  <select name="status" class="form-control">
                    <option value="2" @if ($user->status==2) selected @endif>Active</option>
                    <option value="1" @if ($user->status==1) selected @endif>Block</option>
                  </select>
                {!!$errors->first("status", "<span class='text-danger'>:message</span>")!!}
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