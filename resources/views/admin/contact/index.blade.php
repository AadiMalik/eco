@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Contact Mails</h4>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Reply</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>User Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td style="text-align: center;">
                                            @if($item->reply==2)
                                            <span style="color:red; font-size:20px;">X</span>
                                            @else
                                            <span class="fa fa-check" style="color:green; font-size:20px;"></span>
                                            @endif
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>{{$item->message}}</td>
                                        <td>
                                            @if($item->user_id!=null)
                                            {{$item->user_name->fname}} {{$item->user_name->lname}}
                                            @else
                                            <b>With Out Login</b>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('contact.edit',$item['id'])}}" class="btn btn-info"><span class="fa fa-reply"></span> Reply</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@section('after-script')
<script>
    $(".alert").delay(5000).slideUp(300);
</script>
@endsection