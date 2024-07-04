@extends('admin.layout.app')

@section('content')

<div class="page-content " style="min-height: 758px;">

    <div id="main">


        <div class="breadcambarea">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><span style="color: black; margin-right: 3px;"><i class="fa fa-home"></i></span>Dashboard</li>

                <li class="breadcrumb-item ">Ecommerce</li>
                <li class="breadcrumb-item ">Orders</li>


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
                        <div id="botble-page-tables-page-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">


                            <div class="portlet-title">
                                <div class="caption">
                                    <div class="wrapper-action d-flex justify-content-between py-3 px-3">
                                        <div class="btn-group">

                                            <li class="nav-item dropdown" style="list-style: none!important; margin-right: 6px;">
                                                <button class="btn  btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                <label><input type="search" class="form-control input-sm" placeholder="Search..."></label>
                                            </div>
                                        </div>
                                        <div class="button-grp d-flex">
                                            {{-- <a href=""
                                                    class="create d-flex align-items-center">
                                                    <i class="fa-solid fa-plus btn-icon"></i>
                                                    <p>Create</p>
                                                </a> --}}
                                            {{-- <a class="export d-flex align-items-center" style="cursor: pointer;"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-cloud-upload btn-icon"></i>
                                                    <p>Import</p>
                                                </a> --}}
                                            <a class="relode d-flex align-items-center" style="cursor: pointer;" onclick="location.reload();">
                                                <i class="fa-solid fa-rotate-right btn-icon"></i>
                                                <p>Reload</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="container">

                                @if ($customers->isEmpty())
                                <p>No customers found.</p>
                                @else
                                <table  class="table table-striped table-hover vertical-middle dataTable no-footer dtr-inline"
                                    id="botble-page-tables-page-table" role="grid"
                                    aria-describedby="botble-page-tables-page-table_info">
                                    <thead>
                                        <tr>
                                             <th width="10px" class="text-start no-sort sorting_disabled" rowspan="1"
                                                colspan="1" style="width: 10px;" aria-label=""><input
                                                    class="table-check-all" data-set=".dataTable .checkboxes" name=""
                                                    type="checkbox"></th>
                                            <th title="Template" class="text-start column-key-template sorting"
                                                tabindex="0" aria-controls="botble-page-tables-page-table"
                                                rowspan="1" colspan="1" aria-label="Templateorderby asc">ID</th>
                                            <th title="Template" class="text-start column-key-user_id sorting"
                                                tabindex="0" aria-controls="botble-page-tables-page-table"
                                                rowspan="1" colspan="1" aria-label="Templateorderby asc">Customer</th>
                                            <th title="Template" class="text-start column-key-template sorting"
                                                tabindex="0" aria-controls="botble-page-tables-page-table"
                                                rowspan="1" colspan="1" aria-label="Templateorderby asc">Amount</th>
                                            <th title="Template" class="text-start column-key-template sorting"
                                                tabindex="0" aria-controls="botble-page-tables-page-table"
                                                rowspan="1" colspan="1" aria-label="Templateorderby asc">Created At</th>
                                            <th title="Template" class="text-start column-key-template sorting"
                                                tabindex="0" aria-controls="botble-page-tables-page-table"
                                                rowspan="1" colspan="1" aria-label="Templateorderby asc">Store</th>
                                            <th title="Template" class="text-start column-key-template sorting"
                                                tabindex="0" aria-controls="botble-page-tables-page-table"
                                                rowspan="1" colspan="1" aria-label="Templateorderby asc">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($customers as $customer)
                                        @php
                                            $amount = $customer->cartItems->sum(function($cartItem) {
                                                return $cartItem->product->price * 1;
                                            });
                                            $createdAt = $customer->created_at;
                                        @endphp

                                        <tr>
                                            <td class="text-start column-key-template"><input type="checkbox"></td>
                                            <td class="text-start column-key-template">{{ $customer->id }}</td>
                                            <td class="text-start column-key-template">{{ $customer->name }}</td>
                                            <td class="text-start column-key-template">₹{{ number_format($amount, 2) }}</td>
                                            <td class="text-start column-key-template">{{ $createdAt->format('Y-m-d') }}</td>
                                            <td class="text-start column-key-template">-</td>
                                            <td class="text-start column-key-template">
                                                <a href="{{ route('admin.ecommerce.incomplete_show', $customer->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.ecommerce.incomplete_show', $customer->id) }}" class="btn bg-danger btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection