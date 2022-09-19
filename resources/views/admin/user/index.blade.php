@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users</h4>
                        <ul class="header-dropdown m-r--5" style="margin-top: 10px;">
                            <a href="{{route('user.create')}}" class="btn btn-primary fa fa-plus"> Add User</a>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->fname}}</td>
                                        <td>{{$item->lname}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>
                                            <img src="{{asset('img/'.$item->image)}}" width="100" height="100" alt="">
                                        </td>
                                        <td>
                                            @if ($item->role==1)
                                            <button class="btn btn-success">Admin</button>
                                            @else
                                            <button class="btn btn-warning">User</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status==2)
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <button class="badge badge-danger">Block</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('user.edit',$item['id'])}}" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
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