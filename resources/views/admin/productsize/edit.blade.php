@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-10 offset-1">
        <div class="card">
          <div class="card-header">
            <h4>Edit Product Size</h4>
          </div>
          <form action="{{route('productsize.update',$productsize->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Select Product <span style="color:red;">*</span></label>
                <select name="product" class="form-control select2">
                  @foreach ($product as $item)
                  <option value="{{$item->id}}" @if($item->id == $productsize->product_id) selected @endif>{{$item->id}}:{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Pick Size</label>
                <div class="row">
                  @foreach ($size as $item)
                  <div class="col-lg-1 col-md-2 col-sm-4">
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="color" value="{{$item->id}}" class="selectgroup-input-radio" @if($productsize->size_id==$item->id) checked @endif>
                        <span class="selectgroup-button">{{$item->name}}</span>
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