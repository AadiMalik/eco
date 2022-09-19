@extends('admin/layouts.main')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
        <div class="card">
          <div class="boxs mail_listing">
            <div class="inbox-body no-pad">
              <section class="mail-list">
                <div class="mail-sender">
                  <div class="mail-heading">
                    <h4 class="vew-mail-header">
                      <b>Message from {{$contact->name}}</b>
                    </h4>
                  </div>
                  <hr>
                  <div class="media">
                    <a href="#" class="table-img m-r-15">
                      <img alt="image" src="{{asset('images/blog/demo.jpg')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Sachin Pandit">
                    </a>
                    <div class="media-body">
                      <span class="date pull-right">{{$contact->created_at}}</span>
                      <h5>{{$contact->name}}</h5>
                      <small class="text-muted">Phone: {{$contact->phone}}</small><br />
                      <small class="text-muted">From: {{$contact->email}}</small>
                    </div>
                  </div>
                </div>
                <div class="view-mail p-t-20">
                  <p>
                    {{$contact->message}}
                  </p>
                </div>
                <form action="{{route('contact.update',$contact->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="replyBox" style="padding: 0px;">
                    <textarea name="reply" style="min-height: 150px;" placeholder="Write here to Reply" class="form-control">{{old('reply')}}</textarea>
                  </div>
                  <button class="btn btn-primary mr-1" style="margin-top: 10px;">SEND</button>
                </form>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
@endsection