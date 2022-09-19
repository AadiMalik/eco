@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Edit Sub Category</h4>
          </div>
          <form action="{{route('micromenu.update',$micromenu->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Select Category </label>
                <select name="macromenu" class="form-control select2">
                  @foreach ($macromenu as $item)
                  <option value="{{$item->id}}" @if ($item->id==$micromenu->menu_id) selected @endif>{{$item->name}} ({{$item->menu_name->name}})</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Sub Category Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{$micromenu->name}}" class="form-control" />
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
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