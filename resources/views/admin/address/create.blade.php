@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Create Address</h4>
          </div>
          <form action="{{route('address.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label>Select User <span style="color:red;">*</span></label>
                <select name="user" class="form-control select2">
                  @foreach ($user as $item)
                  <option value="{{$item->id}}">{{$item->email}}</option>
                  @endforeach
                </select>
                  {!!$errors->first("user", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Select Country <span style="color:red;">*</span></label>
                  <select name="country" class="form-control select2">
                    @foreach ($country as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Select State <span style="color:red;">*</span></label>
                  <select name="state" class="form-control select2">
                    @foreach ($state as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Select City <span style="color:red;">*</span></label>
                  <select name="city" class="form-control select2">
                    @foreach ($city as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Zip Code <span style="color:red;">*</span></label>
                  <input type="number" name="zip" value="{{old('zip')}}" class="form-control">
                  {!!$errors->first("zip", "<span class='text-danger'>:message</span>")!!}
                </div>
              </div>
              <div class="form-group">
                  <label>Home Address <span style="color:red;">*</span></label>
                  <input type="text" name="address" value="{{old('address')}}" class="form-control">
                  {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group">
                  <label>Office Address</label>
                  <input type="text" name="shipping" value="{{old('shipping')}}" class="form-control">
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