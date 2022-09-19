@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Payment Transactions</h4>

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
                                        <th>Method</th>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
                                        <th>Slip</th>
                                        <th>Status</th>
                                        <th>Process</th>
                                        <th>Reason</th>
                                        <th>User Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->invoice}}</td>
                                        <td>{{$item->method_name->name}}</td>
                                        <td>{{$item->transaction}}</td>
                                        <td>{{$item->amount}}</td>
                                        <td>
                                            @if($item->slip!=null)
                                            <a href="{{asset('img/'.$item->slip)}}"> <img src="{{asset('img/'.$item->slip)}}" width="100" height="100" alt=""></a>
                                            @else
                                            No Slip
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status==2)
                                            <span class="badge badge-primary">ON</span>
                                            @else
                                            <span class="badge badge-danger">OFF</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->process==3)
                                            <span class="badge badge-primary">Pending</span>
                                            @elseif($item->process==2)
                                            <span class="badge badge-success">Paid</span>
                                            @else
                                            <span class="badge badge-danger">Cancel</span>
                                            @endif
                                        </td>
                                        <td>{{$item->reason}}</td>
                                        <td>{{$item->user_name->fname}} {{$item->user_name->lname}}</td>
                                        <td>
                                            @if($item->status==1 || ($item->process==2 || $item->process==1))
                                            No Actions
                                            @else
                                            <form action="{{url('admin/paid')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Paid</button>
                                            </form>
                                            <a href="{{route('transaction.edit',$item['id'])}}" style="margin-top:5px; color:#fff; text-decoration:none;" class="btn btn-danger"><span class="fa fa-trash-alt"></span> Cancel</a>
                                            @endif
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