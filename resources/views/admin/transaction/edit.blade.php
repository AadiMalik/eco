@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-12 col-md-12 col-lg-10">
        <div class="card">
          <div class="card-header">
            <h4>Cancel Transaction</h4>
          </div>
          <form action="{{route('transaction.update',$transaction->id)}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              @method('PUT')
                <div class="form-group">
                  <table style="width:100%;">
                      <tr>
                          <td><b>Invoice No:</b></td>
                          <td>{{$transaction->invoice}}</td>
                          <td><b>Transaction ID:</b></td>
                          <td>{{$transaction->transaction}}</td>
                      </tr>
                      <tr>
                          <td><b>Amount:</b></td>
                          <td>{{$transaction->amount}}</td>
                          <td><b>User Name:</b></td>
                          <td>{{$transaction->user_name->fname}} {{$transaction->user_name->lname}}</td>
                      </tr>
                  </table>
                </div>
              <div class="form-group">
                <label>Cancel Reason <span style="color:red;">*</span></label>
                <input type="text" name="reason" value="{{old('reason')}}" class="form-control" />
                {!!$errors->first("reason", "<span class='text-danger'>:message</span>")!!}
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