@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10 col-md-10 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Create Product Color</h4>
          </div>
          <form action="{{route('productcolor.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label>Select Product <span style="color:red;">*</span></label>
                <select name="product" class="form-control select2">
                  @foreach ($product as $item)
                  <option value="{{$item->id}}">{{$item->id}}:{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Pick Color</label>
                <div class="row">
                  @foreach ($color as $loop => $item)
                  <div class="col-lg-1 col-md-2 col-sm-4">
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="color" value="{{$item->id}}" class="selectgroup-input-radio" @if($loop->first) checked @endif>
                        <span class="selectgroup-button"> <i style="color: {{$item->name}}; font-size:20px;" class="fa fa-circle"></i></span>
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
                {!!$errors->first("color", "<span class='text-danger'>:message</span>")!!}
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