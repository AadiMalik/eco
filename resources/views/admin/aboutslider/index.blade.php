@extends('admin/layouts.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class=" col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Create About image</h4>
                    </div>
                    
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{route('aboutslider.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Select Image <span style="color:red;">*</span></label>
                                <input type="file" name="file" class="form-control">
                                {!!$errors->first("file", "<span class='text-danger'>:message</span>")!!}
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
                        <h4>About Images</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>User Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            <img alt="image" src="{{asset('img/'.$item->image)}}" width="80" height="80">
                                        </td>
                                        <td>{{$item->user_name->fname}} {{$item->user_name->lname}}</td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a> -->
                                            <a onclick="aboutsliderDelete({{$item->id}})" style="color: #fff; cursor:pointer;" class="btn btn-danger"><span class="fa fa-trash-alt"></span> Delete</a>
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
</section>
@endsection
@section('after-script')
<script>
    $(".alert").delay(5000).slideUp(300);
</script>
<script>
    function aboutsliderDelete(id) 
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
                var url = '{{ route("aboutslider.destroy", ":id") }}';
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