@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Create Courier Service</h4>
          </div>
          <form action="{{route('courier.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-row">
              <div class="form-group col-md-6">
                <label>Courier Service Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
              </div>
              <div class="form-group col-md-6">
                <label>Courier Service Phone <span style="color:red;">*</span></label>
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
                {!!$errors->first("phone", "<span class='text-danger'>:message</span>")!!}
              </div>
              </div>
              <div class="form-group">
                <label>Courier Service Address <span style="color:red;">*</span></label>
                <input type="text" name="address" value="{{old('address')}}" class="form-control">
                {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
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
@section('after-script')

<script>
$(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$("#state-dropdown").html('');
$.ajax({
url:"{{url('get-states-by-country')}}",
type: "POST",
data: {
country_id: country_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#state-dropdown').html('<option value="">Select State</option>'); 
$.each(result.states,function(key,value){
$("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
});
$('#city-dropdown').html('<option value="">Select State First</option>'); 
}
});
});    
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$("#city-dropdown").html('');
$.ajax({
url:"{{url('get-cities-by-state')}}",
type: "POST",
data: {
state_id: state_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#city-dropdown').html('<option value="">Select City</option>'); 
$.each(result.cities,function(key,value){
$("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
});
}
});
});
});
</script>
@endsection