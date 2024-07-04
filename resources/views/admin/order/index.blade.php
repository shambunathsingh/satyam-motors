@extends('admin.layout.app')

@section('content')

    <div class="page-content " style="min-height: 758px;">

        <div id="main">


            <div class="breadcambarea">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><span style="color: black; margin-right: 3px;"><i
                                class="fa fa-home"></i></span>Dashboard</li>

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
                            <div id="botble-page-tables-page-table_wrapper"
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer">


                                <div class="portlet-title">
                                    <div class="caption">
                                        <div class="wrapper-action d-flex justify-content-between py-3 px-3">
                                            <div class="btn-group">

                                                <li class="nav-item dropdown"
                                                    style="list-style: none!important; margin-right: 6px;">
                                                    <button class="btn  btn-outline-secondary dropdown-toggle"
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
                                                <a class="relode d-flex align-items-center" style="cursor: pointer;"
                                                    onclick="location.reload();">
                                                    <i class="fa-solid fa-rotate-right btn-icon"></i>
                                                    <p>Reload</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- todo table body  start-->


                            <table class="table table-striped table-hover vertical-middle dataTable no-footer dtr-inline" id="botble-page-tables-page-table" role="grid" aria-describedby="botble-page-tables-page-table_info">
        <thead>
            <tr role="row">
                <th width="10px" class="text-start no-sort sorting_disabled" rowspan="1" colspan="1" style="width: 10px;" aria-label="">
                    <input class="table-check-all" data-set=".dataTable .checkboxes" name="" type="checkbox">
                </th>
                <th title="ID" width="20px" class="column-key-id sorting_desc" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" style="width: 20px;" aria-sort="descending" aria-label="IDorderby asc">ID</th>
                <th title="Name" class="text-start column-key-name sorting" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" aria-label="Nameorderby asc">CUSTOMER</th>
                <th title="Template" class="text-start column-key-template sorting" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" aria-label="Templateorderby asc" style="">EMAIL</th>
                <th title="Template" class="text-start column-key-template sorting" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" aria-label="Templateorderby asc" style="">PHONE</th>
                <th title="Template" class="text-start column-key-template sorting" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" aria-label="Templateorderby asc" style="">AMOUNT</th>
                <th title="Template" class="text-start column-key-template sorting" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" aria-label="Templateorderby asc" style="">TAX AMOUNT</th>
                <th title="Template" class="text-start column-key-template sorting" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" aria-label="Templateorderby asc" style="">SHIPPING AMOUNT</th>
                <th title="Template" class="text-start column-key-template sorting" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" aria-label="Templateorderby asc" style="">PAYMENT METHOD</th>
                <th title="Template" class="text-start column-key-template sorting" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" aria-label="Templateorderby asc" style="">PAYMENT STATUS</th>
                <th title="Template" class="text-start column-key-template sorting" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" aria-label="Templateorderby asc" style="">OPERATIONS</th>
                <th title="Created At" width="100px" class="text-center column-key-created_at sorting" tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1" style="width: 100px;" aria-label="Created Atorderby asc">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr role="row" class="odd">
                    <td class="text-start no-sort dtr-control">
                        <a class="rowbtn toggle-btn" onclick="toggleRow({{ $order->id }})" data-id="{{ $order->id }}">+</a>
                    </td>
                    <td class="column-key-id sorting_1">{{ $order->id }}</td>
                    <td class="text-start column-key-template">{{ $order->first_name }} {{ $order->last_name }}</td>
                    <td class="text-start column-key-template">{{ $order->email }}</td>
                    <td class="text-start column-key-template">{{ $order->phone }}</td>
                    <td class="text-start column-key-template">₹ {{ $order->totalAmount }}</td>
                    <td class="text-start column-key-template">₹ 00.00</td>
                    <td class="text-start column-key-template">₹ 00.00</td>
                    <td class="text-start column-key-template">COD</td>
                    <td class="text-center column-key-payment_status">
                        @if ($order->is_paid == 1)
                            <span class="label-success status-label">Completed</span>
                        @else
                            <span class="label-warning bg-warning status-label">Pending</span>
                        @endif
                    </td>
                  
                    <td class="text-center column-key-created_at">{{ $order->created_at->format('d-m-Y') }}</td>
                    <td class="text-start column-key-template">
                        <div class="table-actions">
                            <a href="{{ route('admin.ecommerce.edit_order', ['id' => $order->id]) }}" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.ecommerce.delete_order', ['id' => $order->id]) }}" class="btn btn-icon btn-sm btn-danger bg-danger deleteDialog" data-bs-toggle="tooltip" data-section="" role="button" data-bs-original-title="Delete" onclick="return confirm('Are you sure you want to delete this order?');">
                                <i class="fa fa-trash btn-danger"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr id="details-{{ $order->id }}" class="hidden-row text-center">
                     <td colspan="15">
                    {{-- <div> <strong> STATUS</strong>Completed</div> --}}
                        <span><strong>STATUS: </strong><span class="label-success status-label"> Completed</span></span>

                        <div>Store: Global Office</div>
                        <div> <strong> Created At: </strong>{{ $order->created_at->format('d-m-Y') }}</div>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleRow(rowId) {
            var row = $('#details-' + rowId);
            row.toggle();
            var button = $('.toggle-btn[data-id="' + rowId + '"]');
            button.text(button.text() == '+' ? '-' : '+');
        }
    </script>

    <style>
        .hidden-row {
            display: none;
        }
        .rowbtn {
            align-items: center;
            padding: 0px 4px;
            cursor: pointer;
            border: none;
            color: white;
            background-color: #ae0707;
            border-radius: 25px;
            
        }
        .label-success {
            background-color: #4CAF50;
            padding: 5px;
            border-radius: 3px;
            color: white;
        }
        .label-warning {
            background-color: yellow;
            padding: 5px;
            border-radius: 3px;
            color: black;
        }
    </style>

                                <!-- todo table body  start-->


                                <div class="tablbtnprt">
                                    <div class="lftprt">
                                        <div class="dataTables_length" id="botble-page-tables-page-table_length">
                                            <label>
                                                <span class="dt-length-style">
                                                    <select name="botble-page-tables-page-table_length"
                                                            aria-controls="botble-page-tables-page-table"
                                                            class="form-control input-sm"
                                                            onchange="window.location.href=this.value;">
                                                        @foreach([10, 30, 50, 100, 500, -1] as $size)
                                                            <option value="{{ request()->fullUrlWithQuery(['perPage' => $size]) }}" {{ $perPage == $size ? 'selected' : '' }}>
                                                                {{ $size == -1 ? 'All' : $size }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="dataTables_info" id="botble-page-tables-page-table_info" role="status" aria-live="polite">
                                            <span class="dt-length-records">
                                                <i class="fa fa-globe"></i>
                                                <span class="d-none d-sm-inline">Show from</span>
                                                {{ $orders->firstItem() }} to {{ $orders->lastItem() }}
                                                in <span class="badge bg-secondary bold badge-dt">{{ $orders->total() }}</span>
                                                <span class="hidden-xs">records</span>
                                            </span>
                                        </div>
                                    </div>
                        
                                    <div class="rghtprt">
                                        <!--Bordered Pagination-->
                                        <div class="b-pagination-outer">
                                            {{ $orders->appends(['perPage' => $perPage])->links('admin.pagination.custom') }}
                                        </div>
                                    </div><!--wrapper-->
                                </div>




                            </div>
                            <!-- todo table pagination area end -->



                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Locationsheet</h5>
                        <button type="button" class="btn btn-info close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form action="{{ route('admin.importLocation.import_location') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <input type="file" name="excel_file" class="form-control">
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- You can add additional buttons here -->
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection

@section('scripts')
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
