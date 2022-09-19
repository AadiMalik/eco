@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Addresses</h4>
                        <ul class="header-dropdown m-r--5" style="margin-top: 10px;">
                            <a href="{{route('address.create')}}" class="btn btn-primary fa fa-plus"> Add Address</a>
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
                                        <th>User Email</th>
                                        <th>Zip Code</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Home Address</th>
                                        <th>Office Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($address as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->user_name->email}}</td>
                                        <td>{{$item->zipcode}}</td>
                                        <td>{{$item->country_name->name}}</td>
                                        <td>{{$item->state_name->name}}</td>
                                        <td>{{$item->city_name->name}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>
                                            @if ($item->shipping!=null)
                                            {{$item->shipping}}
                                            @else
                                            No Address
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('address.edit',$item['id'])}}" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
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