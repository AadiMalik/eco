@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Orders</h4>
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
                                        <th>Payment</th>
                                        <th>Product QTY</th>
                                        <th>Sub Total</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Process</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($master as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->invoice}}</td>
                                        <td>{{$item->user_name->fname}} {{$item->user_name->lname}}</td>
                                        <td>
                                            @if($item->method_id!=null)
                                            {{$item->method_name->name}}
                                            @else
                                            Cash on Delivery
                                            @endif
                                        </td>
                                        <td style="text-align: right;">{{$item->qty}}</td>
                                        <td style="text-align: right;">{{$item->sub_total}}</td>
                                        <td style="text-align: right;">{{$item->discount}}</td>
                                        <td style="text-align: right; font-weight:bold;">{{$item->total}}</td>
                                        <td>
                                            @if($item->address==3)
                                            Other
                                            @elseif ($item->address==2)
                                            Office
                                            @else
                                            Home
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->status==2)
                                            <span class="badge badge-success">ON</span>
                                            @elseif ($item->status==1)
                                            <span class="badge badge-danger">OFF</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->process==0)
                                            <span class="badge badge-info">Processing</span>
                                            @elseif ($item->process==1)
                                            <span class="badge badge-primary">On the Way</span>
                                            @elseif ($item->process==3)
                                            <span class="badge badge-danger">Stop</span>
                                            @else
                                            <span class="badge badge-success">Delivered</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('master.edit',$item['id'])}}" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
                                            <a href="{{route('master.create')}}" class="btn btn-primary"><span class="fa fa-eye"></span> Detail</a>
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
@foreach ($master as $item)
<!-- Modal -->
<div class="modal fade" style="color:#000; font-size:16px;" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Selected Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table border="1" style="width:100%;">
                    <tbody>
                        @foreach ($address->where('user_id',$item->user_id) as $item1)
                        @if($item->address == '1')
                        <tr>
                            <td><b>Country:</b></td>
                            <td>{{$item1->country_name->name}}</td>
                        </tr>
                        <tr>
                            <td><b>State:</b></td>
                            <td>{{$item1->state_name->name}}</td>
                        </tr>
                        <tr>
                            <td><b>City:</b></td>
                            <td>{{$item1->city_name->name}}</td>
                        </tr>
                        <tr>
                            <td><b>Zipcode:</b></td>
                            <td>{{$item1->zipcode}}</td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td>{{$item1->address}}</td>
                        </tr>
                        @elseif($item->address == '2')
                        <tr>
                            <td><b>Country:</b></td>
                            <td>{{$item1->country_name->name}}</td>
                        </tr>
                        <tr>
                            <td><b>State:</b></td>
                            <td>{{$item1->state_name->name}}</td>
                        </tr>
                        <tr>
                            <td><b>City:</b></td>
                            <td>{{$item1->city_name->name}}</td>
                        </tr>
                        <tr>
                            <td><b>Zipcode:</b></td>
                            <td>{{$item1->zipcode}}</td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td>{{$item1->shipping}}</td>
                        </tr>
                        @endif
                        @endforeach
                        @foreach ($other->where('user_id',$item->user_id) as $item2)
                        @if($item->address=='3')
                        <tr>
                            <td><b>Full Name:</b></td>
                            <td><span>{{$item2->fname}} {{$item2->lname}}</span></td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td><span>{{$item2->email}}</span></td>
                        </tr>
                        <tr>
                            <td><b>Phone:</b></td>
                            <td><span>{{$item2->phone}}</span></td>
                        </tr>
                        <tr>
                            <td><b>Country:</b></td>
                            <td><span>{{$item2->country_name->name}}</span></td>
                        </tr>
                        <tr>
                            <td><b>State:</b></td>
                            <td><span>{{$item2->state_name->name}}</span></td>
                        </tr>
                        <tr>
                            <td><b>City:</b></td>
                            <td><span>{{$item2->city_name->name}}</span></td>
                        </tr>
                        <tr>
                            <td><b>Zipcode:</b></td>
                            <td><span>{{$item2->zipcode}}</span></td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td><span>{{$item2->address}}</span></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button onclick="window.print()">Print this page</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
@section('after-script')
<script>
    $(".alert").delay(5000).slideUp(300);
</script>
@endsection