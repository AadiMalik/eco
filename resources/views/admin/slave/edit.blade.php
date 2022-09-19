@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Update Product Order</h4>
          </div>
          <form action="{{route('slave.update',$slave->id)}}" method="POST">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Invoice #</label>
                  <input type="hidden" name="invoice" value="{{$slave->invoice}}" class="form-control">
                  <input type="text" value="{{$slave->invoice}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label>(ID) Product Name</label>
                  <input type="text" disabled value="{{$slave->product_name->id}}: {{ $slave->product_name->name}}" class="form-control">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>QTY</label>
                  <input type="text" name="qty" disabled value="{{$slave->qty}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label>Total</label>
                  <input type="text" disabled value="{{$slave->sub_total}}" class="form-control">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Discount</label>
                  <input type="text" disabled value="{{$slave->discount}}" class="form-control">
                </div>
              <div class="form-group col-md-6">
                <label>Select Status <span style="color:red;">*</span></label>
                <select name="status" class="form-control">
                  <option value="2" @if ($slave->status==2) selected @endif>On</option>
                  <option value="1" @if ($slave->status==1) selected @endif>Off</option>
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