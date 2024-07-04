@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        {{-- <h1 class="m-0">HomePage</h1> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        {{-- <a href="">
                            <button class="btn btn-primary"><i class="fas fa-plus"></i> Add Product</button>
                        </a> --}}
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">VideoPage</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Videos</h3>
                                {{-- <div class="card-tools">
                                    <ul class="pagination pagination-sm float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div> --}}
                                <div class="col-md-4">
                                    <form action="{{ route('admin.video_upload') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Youtube URL Embed </label>
                                            <p style="color: red; font-size: 12px;">* Only youtube ID needed</p>
                                            <p style="color: red; font-size: 12px;">* Eg.
                                                https://www.youtube.com/watch?v=VIDEO_ID_HERE</p>
                                            <input type="text" class="form-control" name="embed_url">
                                        </div>
                                        {{-- <div class="card-footer"> --}}
                                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                        {{-- </div> --}}
                                    </form>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Videos</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($videopage as $page)
                                            <tr>
                                                <td>{{ $page->id }}</td>
                                                <td>
                                                    @if ($page->embed_url)
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            {{-- <iframe class="embed-responsive-item" src="{{ getYoutubeEmbedUrl($page->embed_url) }}" allowfullscreen></iframe> --}}
                                                            <iframe width="560" height="315"
                                                                src="https://www.youtube.com/embed/{{ $page->embed_url }}"
                                                                frameborder="0" allowfullscreen></iframe>
                                                        </div>
                                                    @else
                                                        <p>No video uploaded yet.</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.video_edit', ['id' => $page->id]) }}"><button
                                                            class="btn btn-warning"><i class="fas fa-pen"></i>
                                                            Edit</button></a>
                                                    <a onclick="return confirmDelete('{{ route('admin.video_delete', $page->id) }}');">
                                                        <button class="btn btn-danger"><i class="fas fa-bin"></i>
                                                            Delete</button></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


<script>
    function confirmDelete(deleteUrl) {
        if (confirm('Are you sure you want to delete this video?')) {
            // If user confirms deletion, redirect to the delete URL
            window.location.href = deleteUrl;
            return true;
        }
        // If user cancels deletion, do nothing
        return false;
    }
</script>
