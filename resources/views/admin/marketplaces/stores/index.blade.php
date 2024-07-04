@extends('admin.layout.app')

@section('content')

    <div class="page-content " style="min-height: 758px;">

        <div id="main">


            <div class="breadcambarea">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><span style="color: black; margin-right: 3px;"><i
                                class="fa fa-home"></i></span>Dashboard</li>

                          <li class="breadcrumb-item ">Marketplaces</li>
                <li class="breadcrumb-item ">Stores</li>
                <li class="breadcrumb-item ">Stores</li>


                </ol>
                <div class="table-wrapper">
                </div>

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


                <div class="portlet light bordered portlet-no-padding">




                    <div class="portlet-body">
                        <div class="table-responsive  table-has-actions   table-has-filter ">
                            <div id="botble-page-tables-page-table_wrapper"
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer">


                                <div class="portlet-title">
                                    <div class="caption">
                                        <div class="wrapper-action d-flex justify-content-between py-3 px-3">
                                            <div class="btn-group">

                                                <li class="nav-item dropdown"
                                                    style="list-style: none!important; margin-right: 6px;">
                                                    <button class="btn  btn-outline-light border text-dark dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Bulk Action
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-dark">
                                                        <li><a class="dropdown-item" href="#">Name</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Changes</a></li>
                                                        <li><a class="dropdown-item" href="#">Status</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Created
                                                                At</a></li>
                                                        <li><a class="dropdown-item" href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </li>



                                                <button class="btn btn-sm btn-primary" type="submit">Filters</button>


                                                <div id="botble-blog" class="dataTables_filter">
                                                    <label><input type="search" class="form-control input-sm"
                                                            placeholder="Search..."></label>
                                                </div>
                                            </div>
                                            <div class="button-grp d-flex">
                                                <a href="{{ route('admin.marketplaces.create') }}"
                                                    class="create d-flex align-items-center">
                                                    <i class="fa-solid fa-plus btn-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                              
                                                <a class="relode d-flex align-items-center" style="cursor: pointer;"
                                                    onclick="location.reload();">
                                                    <i class="fa-solid fa-rotate-right btn-icon"></i>
                                                    <p>Reload</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>LOGO</th>
                            <th>NAME</th>
                            <th>EARNINGS</th>
                            <th>PRODUCTS COUNT</th>
                            <th>CREATED AT</th>
                            <th>STATUS</th>
                            <th><img src="{{ asset('storage/posts/us.png') }}" title="English" width="16" alt="English"></th>
                            <th>OPERATIONS</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($stores as $store)
                        <tr>
                            <td>{{ $store->id }}</td>
                            <td><img src="{{ $store->logo }}" alt="Store Logo" style="width: 50px; height: 50px;"></td>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->earnings }} ₹00.00</td>
                            <td>{{ $store->products_count }} 0 </td>
                            <td>{{ $store->created_at->format('Y-m-d') }}</td>
                            <td class="  column-key-status"><span class="label-success status-label">{{ $store->status }}</span></td>
                         <td class=" text-center language-header no-sort"><div class="text-center language-column">
                                                <a href="">
                        <i class="fa fa-check text-success"></i></a>
                            </div>
</td>
                            <td>
                                <a href="{{ route('admin.marketplaces.editstores', ['id' => $store->id]) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.marketplaces.destroy', ['id' => $store->id]) }}" class="btn btn-sm bg-danger btn-danger" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <!-- Add more operations as needed -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
