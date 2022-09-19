@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visitors</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ip Address</th>
                                        <th>Browser</th>
                                        <th>Device</th>
                                        <th>OS</th>
                                        <th>Country</th>
                                        <th>Region</th>
                                        <th>City</th>
                                        <th>Zipcode</th>
                                        <th>Hits</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visitor as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->ip}}</td>
                                        <td>{{$item->browser}}</td>
                                        <td>{{$item->device}}</td>
                                        <td>{{$item->os}}</td>
                                        <td>{{$item->country}}</td>
                                        <td>{{$item->region}}</td>
                                        <td>{{$item->city}}</td>
                                        <td>{{$item->zipcode}}</td>
                                        <td>{{$item->hits}}</td>
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