@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Edit User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                              <h3 class="card-title">Edit User Details</h3>
                          </div>

                          <div class="card-body p-0">
                              <form action="{{ route('updateCustomer', ['id' => $editCustomer->id]) }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('POST')
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="name">Name</label>
                                          <input type="text" class="form-control" id="name" name="name" value="{{ $editCustomer->name }}" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="dob">D.O.B</label>
                                          <input type="date" class="form-control" id="dob" name="dob" value="{{ $editCustomer->dob }}">
                                      </div>
                                      <div class="form-group">
                                          <label for="phone">Mobile</label>
                                          <input type="text" class="form-control" id="phone" name="phone" value="{{ $editCustomer->phone }}" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="email">Email address</label>
                                          <input type="email" class="form-control" id="email" name="email" value="{{ $editCustomer->email }}" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="address">Address</label>
                                          <input type="text" class="form-control" id="address" name="address" value="{{ $editCustomer->address }}">
                                      </div>
                                      <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                                      </div>
                                      <div class="form-group">
                                          <label for="password_confirmation">Confirm Password</label>
                                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Leave blank to keep current password">
                                      </div>
                                      <div class="form-group">
                                          <label for="image">Image</label>
                                          <input type="file" class="form-control" id="image" name="image">
                                      </div>
                                  </div>

                                  <div class="card-footer">
                                      <button type="submit" class="btn btn-primary">Update</button>
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
