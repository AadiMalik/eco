@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Comments</h4>
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
                                        <th>Rating</th>
                                        <th>Product Name (ID)</th>
                                        {{-- <th>Blog Name (ID)</th> --}}
                                        <th>Description</th>
                                        <th>User Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comment as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->rating}}</td>
                                        <td>
                                            @if($item->product_id!=null)
                                            {{$item->product_name->id}}:{{$item->product_name->name}}</td>
                                            @else
                                            <b>Not Product</b>
                                            @endif
                                        {{-- <td>
                                        @if($item->blog_id!=null)
                                            {{$item->blog_name->id}}:{{$item->blog_name->name}}\
                                            @else
                                            <b>Not Blog</b>
                                            @endif
                                        </td> --}}
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->user_name->fname}} {{$item->user_name->lname}}</td>
                                        <td>
                                            <a href="{{route('comment.destroy',$item['id'])}}" class="btn btn-danger"><span class="fa fa-trash-alt"></span> Delete</a>
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