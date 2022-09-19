@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit FAQ</h4>
          </div>
          <form action="{{route('faq.update',$faq->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Question <span style="color:red;">*</span></label>
                <input type="text" name="heading" value="{{$faq->heading}}" class="form-control">
                {!!$errors->first("heading", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group row mb-4">
                <label>Description <span style="color:red;">*</span></label>
                <div class="col-sm-12 col-md-12">
                  <textarea class="summernote" name="description">{{$faq->description}}</textarea>
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