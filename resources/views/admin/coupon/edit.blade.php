@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit Coupon</h4>
          </div>
          <form action="{{route('coupon.update',$coupon->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-row">
                <div class="form-group  col-md-6">
                  <label>Coupon Name <span style="color:red;">*</span></label>
                  <input type="text" name="name" value="{{$coupon->name}}" class="form-control">
                  {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Discount</label>
                  <input type="number" name="discount" value="{{$coupon->discount}}" class="form-control">
                  {!!$errors->first("discount", "<span class='text-danger'>:message</span>")!!}
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Expire Date <span style="color:red;">*</span></label>
                  <input type="datetime-local" name="expire" value="{{$coupon->expire}}" class="form-control">
                  {!!$errors->first("expire", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Status</label>
                  <select name="macromenu" class="form-control select2">
                    <option value="2">Active</option>
                    <option value="1">Deactive</option>
                  </select>
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