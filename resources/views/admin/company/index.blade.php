@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Companies</h4>
                        <ul class="header-dropdown m-r--5" style="margin-top: 10px;">
                            <a href="{{route('company.create')}}" class="btn btn-primary fa fa-plus"> Add Company</a>
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
                                        <th>Company Name</th>
                                        <th>Logo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($company as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            @if($item->image!=null)
                                            <img src="{{asset($item->image)}}" width="100" height="100" alt="">
                                            @else
                                            <b>No Image</b>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('company.edit',$item['id'])}}" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
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