@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Product Order</h4>
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
                                        <th>Invoice #</th>
                                        <th>User Name</th>
                                        <th>Product Name</th>
                                        <th>Product QTY</th>
                                        <th>Sub Total</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slave as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->invoice}}</td>
                                        <td>{{$item->user_name->fname}} {{$item->user_name->lname}}</td>
                                        <td>{{$item->product_name->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->sub_total}}</td>
                                        <td>({{$item->discount}}%) {{($item->sub_total / 100) * ($item->discount)}}</td>
                                        <td>{{$item->sub_total-($item->sub_total / 100) * ($item->discount)}}</td>
                                        
                                        <td>
                                            @if($item->status==0)
                                            <span class="badge badge-success">ON</span>
                                            @elseif ($item->status==1)
                                            <span class="badge badge-danger">OFF</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('slave.edit',$item['id'])}}" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
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