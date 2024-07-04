@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <a href="">
                            <button class="btn btn-primary"><i class="fas fa-plus"></i> Add Product</button>
                        </a>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Product List</h3>
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>D.O.B</th>
                                            <th>Mobile</th>
                                            <th>Username</th>
                                            <th style="width: 40px">Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Shambu Nath Singh</td>
                                            <td>01-01-2024</td>
                                            <td>7684870945</td>
                                            <td>shambusingh096</td>
                                            <td><span class="badge bg-danger">Inactive</span></td>
                                            <td>
                                                <a href=""><button class="btn btn-warning"><i
                                                            class="fas fa-pen"></i> Edit</button></a>
                                                <a href=""><button class="btn btn-danger"><i class="fas fa-bin"></i>
                                                        Delete</button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Akash Talreja</td>
                                            <td>02-05-2020</td>
                                            <td>8456328978</td>
                                            <td>aktalreja</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td>
                                                <a href=""><button class="btn btn-warning"><i
                                                            class="fas fa-pen"></i> Edit</button></a>
                                                <a href=""><button class="btn btn-danger"><i class="fas fa-bin"></i>
                                                        Delete</button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Vikash Rehman</td>
                                            <td>12-06-2022</td>
                                            <td>7845123698</td>
                                            <td>vkreh234</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>
                                                <a href=""><button class="btn btn-warning"><i
                                                            class="fas fa-pen"></i> Edit</button></a>
                                                <a href=""><button class="btn btn-danger"><i class="fas fa-bin"></i>
                                                        Delete</button></a>
                                            </td>
                                        </tr>
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
