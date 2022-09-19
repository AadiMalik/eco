@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Contents</h4>
                        <ul class="header-dropdown m-r--5" style="margin-top: 10px;">
                            <a href="{{route('content.create')}}" class="btn btn-primary fa fa-plus"> Add Content</a>
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
                                        <th>Content Name</th>
                                        <th>Heading</th>
                                        <th>Key</th>
                                        <th>Icon</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>User Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($content as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->heading}}</td>
                                        <td>{{$item->key}}</td>
                                        <td>
                                            @if($item->icon!=null)
                                            <span style="font-size: 18px;" class="{{$item->icon}}"></span> {{$item->icon}}
                                            @else
                                            <b>No Icon</b>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->image!=null)
                                            <img src="{{asset('img/'.$item->image)}}" width="100" height="100" alt="">
                                            @else
                                            <b>No Image</b>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->description!=null)
                                            {{$item->description}}
                                            @else
                                            <b>No Description</b>
                                            @endif
                                        </td>
                                        <td>{{$item->user_name->fname}} {{$item->user_name->lname}}</td>
                                        <td>
                                            <a href="{{route('content.edit',$item['id'])}}" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
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