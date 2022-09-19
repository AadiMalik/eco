@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-10 offset-1">
        <div class="card">
          <div class="card-header">
            <h4>Edit Product Color</h4>
          </div>
          <form action="{{route('productcolor.update',$productcolor->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Select Product <span style="color:red;">*</span></label>
                <select name="product" class="form-control select2">
                  @foreach ($product as $item)
                  <option value="{{$item->id}}" @if($item->id == $productcolor->product_id) selected @endif>{{$item->id}}:{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Pick Color</label>
                <div class="row">
                  @foreach ($color as $item)
                  <div class="col-lg-1 col-md-2 col-sm-4">
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="color" value="{{$item->id}}" class="selectgroup-input-radio" @if($productcolor->color_id==$item->id) checked @endif>
                        <span class="selectgroup-button"> <i style="color: {{$item->name}}; font-size:20px;" class="fa fa-circle"></i></span>
                      </label>
                    </div>
                  </div>
                  @endforeach
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