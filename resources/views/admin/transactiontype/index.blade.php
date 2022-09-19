@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class=" col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Transaction Type</h4>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{route('transactiontype.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Transaction Type <span style="color:red;">*</span></label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Transaction Types</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type Name</th>
                                        <th>User Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactiontype as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->user_name->fname}} {{$item->user_name->lname}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection