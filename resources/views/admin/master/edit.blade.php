@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit Order</h4>
          </div>
          <form action="{{route('master.update',$master->id)}}" method="POST">
            <div class="card-body">
              @csrf
              @method('PUT')
                <div class="form-group">
                  <label>Invoice # <span style="color:red;">*</span></label>
                  <input type="text" disabled value="{{$master->invoice}}" class="form-control">
                </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Process <span style="color:red;">*</span></label>
                  <select name="process" class="form-control">
                    <option value="3" @if ($master->process==3) selected @endif>Stop</option>
                    <option value="0" @if ($master->process==0) selected @endif>Processing</option>
                    <option value="1" @if ($master->process==1) selected @endif>On the Way</option>
                    <option value="2" @if ($master->process==2) selected @endif>Delivered</option>
                  </select>
                {!!$errors->first("process", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Select Status <span style="color:red;">*</span></label>
                  <select name="status" class="form-control">
                    <option value="0" @if ($master->status==0) selected @endif>On</option>
                    <option value="1" @if ($master->status==1) selected @endif>Off</option>
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