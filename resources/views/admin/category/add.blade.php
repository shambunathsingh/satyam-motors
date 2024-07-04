@extends('admin.layout.app')

<style>
    .toggle-container {
        display: inline-block;
        margin-right: 10px;
        /* Add some space between buttons */
    }

    .toggle-input {
        display: none;
    }

    .toggle-label {
        display: block;
        width: 60px;
        height: 30px;
        background-color: #ccc;
        border-radius: 15px;
        position: relative;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .toggle-input:checked+.toggle-label {
        background-color: #4CAF50;
    }

    .toggle-label:before {
        content: '';
        position: absolute;
        width: 25px;
        height: 25px;
        background-color: white;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        transition: transform 0.3s;
    }

    .toggle-input:checked+.toggle-label:before {
        transform: translateX(30px) translateY(-50%);
    }
</style>

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        {{-- <h3 class="m-0">Add Category</h3> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.category') }}">Categories</a></li>
                            <li class="breadcrumb-item active">Add Categories</li>
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
                                {{-- <h3 class="card-title">Add User Details</h3> --}}
                            </div>

                            <div class="card-body p-0">
                                <form action="{{ route('admin.create_category') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="cat_name" placeholder="Name">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Parent</label>
                                            <input type="text" class="form-control" name="cat_parent" placeholder="None">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Description</label><br>
                                            <textarea name="cat_desc" id="" cols="30" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Is default?</label><br>
                                            <div class="toggle-container mb-4">
                                                <input type="hidden" name="cat_default" value="0">
                                                <!-- Hidden field for false value -->
                                                <input type="checkbox" id="toggle1" class="toggle-input"
                                                    name="cat_default" value="1"> <!-- Checkbox for true value -->
                                                <label for="toggle1" class="toggle-label"></label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Icon</label>
                                            <input type="text" class="form-control" name="cat_icon"
                                                placeholder="Ex: fa fa-home">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Order</label>
                                            <input type="text" class="form-control" name="cat_order" value="0">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Is featured?</label><br>
                                            <div class="toggle-container mb-4">
                                                <input type="hidden" name="cat_isfeatured" value="0">
                                                <!-- Hidden field for false value -->
                                                <input type="checkbox" id="toggle2" class="toggle-input"
                                                    name="cat_isfeatured" value="1"> <!-- Checkbox for true value -->
                                                <label for="toggle2" class="toggle-label"></label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="statusDropdown">Status</label>
                                            <select class="form-control" id="statusDropdown" name="cat_status">
                                                <option value="published">Published</option>
                                                <option value="draft">Draft</option>
                                                <option value="pending">Pending</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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
