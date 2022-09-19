@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Products</h4>
                        <ul class="header-dropdown m-r--5" style="margin-top: 10px;">
                            <a href="{{route('product.create')}}" class="btn btn-primary fa fa-plus"> Add Product</a>
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
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Old Price</th>
                                        <th>Discount</th>
                                        <th>Company</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Food</th>
                                        <th>Stock</th>
                                        <th>Status</th>
                                        <th>Package</th>
                                        <th>Description</th>
                                        <th>User Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name??''}}</td>
                                        <td>{{$item->price??''}}</td>
                                        <td>{{$item->pre_price??'No'}}</td>
                                        <td>
                                            {{$item->discount??''}}
                                        </td>
                                        <td>{{$item->company_name->name??''}}</td>
                                        <td>{{$item->brand_name->name??''}}</td>
                                        <td>{{$item->category_name->name??''}}</td>
                                        <td>
                                            @if ($item->food==0)
                                            <button class="btn btn-success">Yes</button>
                                            @else
                                            <button class="btn btn-danger">No</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->stock==0)
                                            <button class="btn btn-success">IN</button>
                                            @else
                                            <button class="btn btn-danger">OUT</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status==0)
                                            <button class="btn btn-success">ON</button>
                                            @else
                                            <button class="btn btn-danger">OFF</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->package==0)
                                            <button class="btn btn-success">Yes</button>
                                            @else
                                            <button class="btn btn-danger">No</button>
                                            @endif
                                        </td>
                                        <td>{{$item->description??''}}</td>
                                        <td>{{$item->user_name->fname??''}} {{$item->user_name->lname??''}}</td>
                                        <td>
                                            <a href="{{route('product.edit',$item['id'])}}" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
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