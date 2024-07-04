@extends('admin.layout.app')

@section('content')
    <div class="page-content " style="min-height: 758px;">

        <div id="main">


            <div class="breadcambarea">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><span style="color: black; margin-right: 3px;"><i
                                class="fa fa-home"></i></span>Dashboard</li>

                    <li class="breadcrumb-item ">Simple sliders</li>


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
                                                <a href="{{ route('admin.banner_upload') }}"
                                                    class="create d-flex align-items-center">
                                                    <i class="fa-solid fa-plus btn-icon"></i>
                                                    <p>Create</p>
                                                </a>
                                                <!-- <a href="#" class="export d-flex align-items-center">
                                                                                                    <i class="fa-solid fa-download btn-icon"></i>
                                                                                                    <p>Export</p>
                                                                                                    <i class="fa-solid fa-angle-down"></i>
                                                                                                </a> -->
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


                                <table
                                    class="table table-striped table-hover vertical-middle dataTable no-footer dtr-inline"
                                    id="botble-page-tables-page-table" role="grid"
                                    aria-describedby="botble-page-tables-page-table_info">
                                    <thead>
                                        <tr role="row">
                                            <th width="10px" class="text-start no-sort sorting_disabled" rowspan="1"
                                                colspan="1" style="width: 10px;" aria-label=""><input
                                                    class="table-check-all" data-set=".dataTable .checkboxes" name=""
                                                    type="checkbox"></th>
                                            <th title="ID" width="20px" class="column-key-id sorting_desc"
                                                tabindex="0" aria-controls="botble-page-tables-page-table" rowspan="1"
                                                colspan="1" style="width: 20px;" aria-sort="descending"
                                                aria-label="IDorderby asc">ID
                                            </th>
                                            <th title="Name" class="text-start column-key-name sorting" tabindex="0"
                                                aria-controls="botble-page-tables-page-table" rowspan="1" colspan="1"
                                                aria-label="Nameorderby asc">
                                                Name</th>
                                            <th title="Name" class="text-start column-key-name sorting" tabindex="0"
                                                aria-controls="botble-page-tables-page-table" rowspan="1"
                                                colspan="1" aria-label="Nameorderby asc">
                                                Banner</th>
                                            <th title="Created At" width="100px"
                                                class="text-center column-key-created_at sorting" tabindex="0"
                                                aria-controls="botble-page-tables-page-table" rowspan="1"
                                                colspan="1" style="width: 100px;" aria-label="Created Atorderby asc">
                                                Created At</th>
                                            <th title="Status" width="100px"
                                                class="text-center column-key-status sorting" tabindex="0"
                                                aria-controls="botble-page-tables-page-table" rowspan="1"
                                                colspan="1" style="width: 100px;" aria-label="Statusorderby asc">
                                                Status</th>
                                            <th title="<img src=&quot;{{ asset('storage/posts/us.png') }}&quot; title=&quot;English&quot; width=&quot;16&quot; alt=&quot;English&quot;>"
                                                class="text-center language-header no-sort sorting_disabled"
                                                width="40px" rowspan="1" colspan="1" style="width: 40px;"
                                                aria-label=""><img
                                                    src="{{ asset('storage/posts/us.png') }}"
                                                    title="English" width="16" alt="English"></th>
                                            <th title="Operations" width="134px" class="text-center sorting_disabled"
                                                rowspan="1" colspan="1" style="width: 134px;"
                                                aria-label="Operations">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($homepage as $item)
                                            <tr role="row" class="odd">
                                                <td class="text-start no-sort dtr-control">
                                                    <div class="text-start">
                                                        <div class="checkbox checkbox-primary table-checkbox">
                                                            <input type="checkbox" class="checkboxes" name="id[]"
                                                                value="{{ $item->id }}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="column-key-id sorting_1">{{ $item->id }}</td>
                                                <td class=" text-start column-key-name"><a

                                                        href="{{ route('admin.banner_edit', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                                </td>
                                                <td class=" text-start column-key-template" style="">
                                                    <img src="{{ asset('storage/'. $item->banner) }}"
                                                        width="50" height="50" alt="Banner Image">
                                                </td>
                                                <td class=" text-center column-key-created_at" style="">
                                                    {{ $item->created_at->format('d-m-Y') }}</td>
                                                <td class=" text-center column-key-status" style="">
                                                    <span class="label-success status-label">{{ $item->status }}</span>
                                                </td>
                                                <td class=" text-center language-header no-sort" style="">
                                                    <div class="text-center language-column">
                                                        <a href="pages-edit.html">
                                                            <i class="fa fa-check text-success"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class=" text-center">
                                                    <div class="table-actions">

                                                        <a href="{{ route('admin.banner_edit', ['id' => $item->id]) }}"
                                                            class="btn btn-icon btn-sm btn-primary"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Edit"><i
                                                                class="fa fa-edit"></i></a>

                                                        <a onclick="return confirmDelete('{{ route('admin.banner_delete', $item->id) }}');"
                                                            class="btn btn-icon btn-sm btn-danger deleteDialog"
                                                            data-bs-toggle="tooltip" data-section="" role="button"
                                                            data-bs-original-title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- todo table body  start-->



                                <!-- todo table pagination area start -->
                                <div class="tablbtnprt">
                                    <div class="lftprt">
                                        <div class="dataTables_length" id="botble-page-tables-page-table_length">
                                            <label><span class="dt-length-style"><select
                                                        name="botble-page-tables-page-table_length"
                                                        aria-controls="botble-page-tables-page-table"
                                                        class="form-control input-sm">
                                                        <option value="10">10</option>
                                                        <option value="30">30</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                        <option value="500">500</option>
                                                        <option value="-1">All</option>
                                                    </select></span></label>
                                        </div>
                                        <div class="dataTables_info" id="botble-page-tables-page-table_info"
                                            role="status" aria-live="polite"><span class="dt-length-records">
                                                <i class="fa fa-globe"></i> <span class="d-none d-sm-inline">Show
                                                    from</span> 1 to 10
                                                in <span class="badge bg-secondary bold badge-dt">13</span>
                                                <span class="hidden-xs">records</span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="rghtprt">
                                        <!--Bordered Pagination-->
                                        <div class="b-pagination-outer">

                                            <ul id="border-pagination">
                                                <li><a class="" href="#">«Previous</a></li>
                                                <li><a href="#">1</a></li>
                                                <li><a href="#" class="active">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">Next»</a></li>
                                            </ul>
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






    </div>
@endsection


<script>
    function confirmDelete(deleteUrl) {
        if (confirm('Are you sure you want to delete this banner?')) {
            // If user confirms deletion, redirect to the delete URL
            window.location.href = deleteUrl;
            return true;
        }
        // If user cancels deletion, do nothing
        return false;
    }
</script>
