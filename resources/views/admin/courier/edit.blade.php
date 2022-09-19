@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit Courier Service</h4>
          </div>
          <form action="{{route('courier.update',$courier->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-row">
              <div class="form-group col-md-6">
                <label>Courier Service Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{$courier->name}}" class="form-control">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group col-md-6">
                <label>Courier Service Phone <span style="color:red;">*</span></label>
                <input type="text" name="phone" value="{{$courier->phone}}" class="form-control">
                {!!$errors->first("phone", "<span class='text-danger'>:message</span>")!!}
              </div>
              </div>
              <div class="form-group">
                <label>Courier Service Address <span style="color:red;">*</span></label>
                <input type="text" name="address" value="{{$courier->address}}" class="form-control">
                {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
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