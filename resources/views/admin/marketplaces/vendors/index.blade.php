@extends('admin.layout.app')

@section('content')

<div class="page-content " style="min-height: 758px;">

    <div id="main">

        <div class="breadcambarea">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><span style="color: black; margin-right: 3px;"><i class="fa fa-home"></i></span>Dashboard</li>
                <li class="breadcrumb-item ">Marketplaces</li>
                <li class="breadcrumb-item ">Vendor Info</li>
            </ol>
            <div class="table-wrapper"></div>

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
                    <div class="table-responsive table-has-actions table-has-filter">
                        <div id="botble-page-tables-page-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                            <div class="portlet-title">
                                <div class="caption">
                                    <div class="wrapper-action d-flex justify-content-between py-3 px-3">
                                        <div class="btn-group">

                                            <li class="nav-item dropdown" style="list-style: none!important; margin-right: 6px;">
                                                <button class="btn btn-outline-light border text-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Bulk Action
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-dark">
                                                    <li><a class="dropdown-item" href="#">Name</a></li>
                                                    <li><a class="dropdown-item" href="#">Changes</a></li>
                                                    <li><a class="dropdown-item" href="#">Status</a></li>
                                                    <li><a class="dropdown-item" href="#">Created At</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </li>

                                            <button class="btn btn-sm btn-primary" type="submit">Filters</button>

                                            <div id="botble-blog" class="dataTables_filter">
                                                <label><input type="search" class="form-control input-sm" placeholder="Search..."></label>
                                            </div>
                                        </div>
                                        <div class="button-grp d-flex">
                                            <a href="vendorInfo'vendor-info.create') }}" class="create d-flex align-items-center">
                                                <i class="fa-solid fa-plus btn-icon"></i>
                                                <p>Create</p>
                                            </a>
                                            <a class="relode d-flex align-items-center" style="cursor: pointer;" onclick="location.reload();">
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
                                          <th width="10px" class="text-start no-sort sorting_disabled" rowspan="1"
                                                colspan="1" style="width: 10px;" aria-label=""><input
                                                    class="table-check-all" data-set=".dataTable .checkboxes" name=""
                                                    type="checkbox"></th>
                                                    <th  class="text-start no-sort sorting_disabled">ID</th>
                                        <th>AVATAR</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>CREATED AT</th>
                                        <th>STATUS</th>
                                        <th>OPERATIONS</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($vendorInfos as $vendorInfo)
                                    <tr>
                                          <td class="text-start no-sort dtr-control">
                                                    <div class="text-start">
                                                        <div class="checkbox checkbox-primary table-checkbox">
                                                            <input type="checkbox" class="checkboxes"
                                                                name="{{ $vendorInfo->id }}[]" value="">
                                                             <td class="text-start">{{ $vendorInfo->id }}</td>
                                                        </div>
                                                    </div>
                                                </td>
                                        <td>
                                          @if(isset($vendorInfo->avatar))
                                                <img src="{{ $vendorInfo->avatar }}" alt="Vendor Avatar" style="width: 50px; height: 50px;">
                                            @else
                                                <img id="preview_image" src="/images/placeholder.png" alt="Preview image" class="preview_image" style="width: 50px; height: 50px;">
                                            @endif
                                         <td>{{ $vendorInfo->customer->name ?? 'N/A' }}</td>
                                         <td>{{ $vendorInfo->customer->email ?? 'N/A' }}</td>
                                        <td>{{ $vendorInfo->created_at->format('Y-m-d') }}</td>
                                        <td class="column-key-status"><span class="label-success status-label">{{ $vendorInfo->customer->status ?? 'N/A' }}</span></td>
                                        <td>
                                            <a href="vendorInfo'vendor-info.edit', ['vendor_info' => $vendorInfo->id]) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="vendorInfo'vendor-info.destroy', ['vendor_info' => $vendorInfo->id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm bg-danger btn-danger" data-bs-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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

        </div>

    </div>

</div>

@endsection
