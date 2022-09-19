@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Create Team Member</h4>
          </div>
          <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label>Full Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Profession <span style="color:red;">*</span></label>
                <input type="text" name="profession" value="{{old('profession')}}" class="form-control">
                {!!$errors->first("profession", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>Image <span style="color:red;">*</span></label>
                <input type="file" name="image" class="form-control">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group">
                <label>G-Mail</label>
                <input type="email" name="gmail" value="{{old('gmail')}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Facebook</label>
                <input type="url" name="facebook" value="{{old('facebook')}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Twitter</label>
                <input type="url" name="twitter" value="{{old('twitter')}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Instagram</label>
                <input type="url" name="instagram" value="{{old('instagram')}}" class="form-control">
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