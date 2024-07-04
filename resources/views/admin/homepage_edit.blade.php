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
                            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">HomePage</a></li>
                            <li class="breadcrumb-item active">Edit HomePage</li>
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
                                <h3 class="card-title">Edit Banner</h3>
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
                                    <form action="{{ route('admin.banner_update', $banner->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-4">
                                            {{-- <label for="exampleInputEmail1">Upload</label> --}}
                                            <input type="file" class="form-control" name="banner"
                                                accept=".jpg, .jpeg, .png">
                                        </div>
                                        <div class="form-group mb-4">
                                            <img src="{{ asset('storage/banners/' . $banner->banner) }}" width="100"
                                                height="100" alt="Banner Image">
                                        </div>
                                        {{-- <div class="card-footer"> --}}
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        {{-- </div> --}}
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
