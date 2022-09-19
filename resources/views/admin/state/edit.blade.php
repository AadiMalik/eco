@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-10 offset-1">
        <div class="card">
          <div class="card-header">
            <h4>Edit State</h4>
          </div>
          <form action="{{route('state.update',$state->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Select Country </label>
                <select name="state" class="form-control select2">
                  @foreach ($country as $item)
                  <option value="{{$item->id}}" @if ($item->id==$state->state_id) selected @endif>{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>State Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{$state->name}}" class="form-control">
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