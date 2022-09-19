@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Term & Condition</h4>
                        <ul class="header-dropdown m-r--5" style="margin-top: 10px;">
                            <a href="{{route('term.create')}}" class="btn btn-primary fa fa-plus"> Add Term & Condition</a>
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
                                        <th>Heading</th>
                                        <th>Description</th>
                                        <th>User Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($term as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->heading}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->user_name->fname}} {{$item->user_name->lname}}</td>
                                        <td>
                                            <a href="{{route('faq.edit',$item['id'])}}" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
                                            <a onclick="termDelete({{$item->id}})" style="color: #fff; cursor:pointer;" class="btn btn-danger"><span class="fa fa-trash-alt"></span> Delete</a>

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
<script>
    function termDelete(id) 
    {
        swal({
            title: "Are You Sure Want To Delete ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => 
        {
            if (willDelete) 
            {
                var url = '{{ route("term.destroy", ":id") }}';
                url = url.replace(':id', id);
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: url,
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);
                        //var data = JSON.parse(response);
                        iziToast.success({
                            message: data.message,
                            position: 'topRight'
                        });
                        //Reload page
                        window.location.reload();

                    }
                });
            }
        });

    }
</script>
@endsection