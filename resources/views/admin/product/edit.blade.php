@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Update Product</h4>
          </div>
          <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Product Name <span style="color:red;">*</span></label>
                  <input type="text" name="name" value="{{$product->name??''}}" class="form-control">
                  {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Select Company <span style="color:red;">*</span></label>
                  <select name="company" class="form-control select2">
                    <option disabled>--Select company--</option>
                    @foreach ($company as $item)
                    <option value="{{$item->id}}" @if($product->company_id==$item->id) selected @endif>{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Product Price <span style="color:red;">*</span></label>
                  <input type="number" name="price" value="{{$product->pre_price??$product->price}}" class="form-control">
                  {!!$errors->first("price", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Discount</label>
                  <input type="number" name="discount" value="{{$product->discount??''}}" class="form-control">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Select Brand <span style="color:red;">*</span></label>
                  <select name="brand" class="form-control select2">
                    <option disabled>--Select Brand--</option>
                    @foreach ($brand as $item)
                    <option value="{{$item->id}}" @if($product->brand_id==$item->id) selected @endif>{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Product Type <span style="color:red;">*</span></label>
                  <select name="food" class="form-control select2">
                    <option value="0" @if($product->food==0) selected @endif>Food</option>
                    <option value="1" @if($product->food==1) selected @endif>Non Food</option>
                  </select>
                  {!!$errors->first("food", "<span class='text-danger'>:message</span>")!!}
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Category</label>
                  <select name="category" class="form-control select2">
                    <option disabled>--Select Category--</option>
                    @foreach ($category as $item)
                    <option value="{{$item->id}}" @if($product->category_id==$item->id) selected @endif>{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Package <span style="color:red;">*</span></label>
                  <select name="package" class="form-control select2">
                    <option value="0" @if($product->package==0) selected @endif>Yes</option>
                    <option value="1" @if($product->package==1) selected @endif>No</option>
                  </select>
                  {!!$errors->first("package", "<span class='text-danger'>:message</span>")!!}
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Select Stock <span style="color:red;">*</span></label>
                  <select name="stock" class="form-control">
                    <option value="0" @if($product->stock==0) selected @endif>In Stock</option>
                    <option value="1"@if($product->stock==1) selected @endif>Out of Stock</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Select Status <span style="color:red;">*</span></label>
                  <select name="status" class="form-control">
                    <option value="0"@if($product->status==0) selected @endif>Active</option>
                    <option value="1"@if($product->status==1) selected @endif>Dactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group mb-4">
                <label>Description <span style="color:red;">*</span></label>
                <div class="col-sm-12 col-md-12">
                  <textarea class="summernote" name="description">{{$product->description??''}}</textarea>
                  {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
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