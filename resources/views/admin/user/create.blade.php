@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Create User</h4>
          </div>
          <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>First Name <span style="color:red;">*</span></label>
                  <input type="text" name="fname" value="{{old('fname')}}" class="form-control">
                  {!!$errors->first("fname", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Last Name <span style="color:red;">*</span></label>
                  <input type="text" name="lname" value="{{old('lname')}}" class="form-control">
                  {!!$errors->first("lname", "<span class='text-danger'>:message</span>")!!}
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Email <span style="color:red;">*</span></label>
                  <input type="email" name="email" value="{{old('email')}}" class="form-control">
                  {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Phone No <span style="color:red;">*</span></label>
                  <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
                  {!!$errors->first("phone", "<span class='text-danger'>:message</span>")!!}
                </div>
              </div>
              <div class="form-group">
                <label>Image <span style="color:red;">*</span></label>
                <input type="file" name="image" class="form-control">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-row">
              <div class="form-group col-md-6">
                <label>Select User Type <span style="color:red;">*</span></label>
                <select name="role" class="form-control">
                  <option value="2">User</option>
                  <option value="1">Admin</option>
                </select>
              </div>
                <div class="form-group col-md-6">
                  <label>Password <span style="color:red;">*</span></label>
                  <input type="password" name="password" class="form-control">
                  {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
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