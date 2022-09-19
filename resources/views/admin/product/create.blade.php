@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Create Product</h4>
          </div>
          <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Product Name <span style="color:red;">*</span></label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control">
                  {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Select Company <span style="color:red;">*</span></label>
                  <select name="company" class="form-control select2">
                    @foreach ($company as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Product Price <span style="color:red;">*</span></label>
                  <input type="number" name="price" value="{{old('price')}}" class="form-control">
                  {!!$errors->first("price", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group col-md-6">
                  <label>Discount</label>
                  <input type="number" name="discount" value="{{old('discount')}}" class="form-control">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Select Brand <span style="color:red;">*</span></label>
                  <select name="brand" class="form-control select2">
                    @foreach ($brand as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Product Type <span style="color:red;">*</span></label>
                  <select name="food" class="form-control select2">
                    <option value="1">Food</option>
                    <option value="0">Non Food</option>
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
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Package <span style="color:red;">*</span></label>
                  <select name="package" class="form-control select2">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                  {!!$errors->first("package", "<span class='text-danger'>:message</span>")!!}
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Select Stock <span style="color:red;">*</span></label>
                  <select name="stock" class="form-control">
                    <option value="2">In Stock</option>
                    <option value="1">Out of Stock</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Select Status <span style="color:red;">*</span></label>
                  <select name="status" class="form-control">
                    <option value="2">ON</option>
                    <option value="1">OFF</option>
                  </select>
                </div>
              </div>
              <div class="form-group mb-4">
                <label>Description <span style="color:red;">*</span></label>
                <div class="col-sm-12 col-md-12">
                  <textarea class="summernote" name="description">{{old('description')}}</textarea>
                  {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
                </div>
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