@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Team Members</h4>
                        <ul class="header-dropdown m-r--5" style="margin-top: 10px;">
                            <a href="{{route('team.create')}}" class="btn btn-primary fa fa-plus"> Add Team Member</a>
                        </ul>
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
                                        <th>Full Name</th>
                                        <th>Profession</th>
                                        <th>Image</th>
                                        <th>G-Mail</th>
                                        <th>Facebook</th>
                                        <th>Twitter</th>
                                        <th>Instagram</th>
                                        <th>User Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($team as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->profession}}</td>
                                        <td>
                                            <img src="{{asset('img/'.$item->image)}}" width="100" height="100" alt="">
                                        </td>
                                        <td>{{$item->gmail}}</td>
                                        <td>{{$item->facebook}}</td>
                                        <td>{{$item->twitter}}</td>
                                        <td>{{$item->instagram}}</td>
                                        <td>{{$item->user_name->fname}} {{$item->user_name->lname}}</td>
                                        <td>
                                            <a href="{{route('team.edit',$item['id'])}}" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
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