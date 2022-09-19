@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit Company</h4>
          </div>
          <form action="{{route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Company Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{$company->name}}" class="form-control">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
              </div>
              @if ($company->image!=null)
              <div class="form-group">
                <img src="{{asset($company->image)}}" width="100" height="100" alt="">
              </div>
              <div class="form-group">
                <label>Company Logo</label>
                <input type="file" name="image" class="form-control">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
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