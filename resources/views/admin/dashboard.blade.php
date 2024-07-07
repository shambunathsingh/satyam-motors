@extends('admin.layout.app')

@section('content')
    <div class="main-panel">



        <!-- todo main dashboard -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><span style="color: black; margin-right: 3px;"><i
                        class="fa fa-home"></i></span>Dashboard</li>
        </ol>



        <div class="toprowpartarea">
            <div class="row">
                {{-- <div class="col">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 text-white"
                        style="background-color: rgb(50, 197, 210);">
                        <div class="visual"><i class="fas fa-users" style="opacity: 0.1;"></i></div>
                        <div class="details">
                            <div class="number"><span data-counter="counterup" data-value="46">46</span>
                            </div>
                            <div class="desc">Orders</div>
                        </div>
                    </a>
                </div> --}}
                <div class="col">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 text-white"
                        style="background-color: rgb(18, 128, 245);">
                        <div class="visual"><i class="far fa-file-alt" style="opacity: 0.1;"></i></div>
                        <div class="details">
                            <div class="number"><span data-counter="counterup"
                                    data-value="{{ $productCount }}">{{ $productCount }}</span>
                            </div>
                            <div class="desc">Products</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 text-white"
                        style="background-color: rgb(117, 182, 249);">
                        <div class="visual"><i class="fas fa-users" style="opacity: 0.1;"></i></div>
                        <div class="details">
                            <div class="number"><span data-counter="counterup"
                                    data-value="{{ $brandCount }}">{{ $brandCount }}</span>
                            </div>
                            <div class="desc">Brands</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 text-white"
                        style="background-color: rgb(7, 79, 157);">
                        <div class="visual"><i class="far fa-file-alt" style="opacity: 0.1;"></i></div>
                        <div class="details">
                            <div class="number"><span data-counter="counterup"
                                    data-value="{{ $categoryCount }}">{{ $categoryCount }}</span>
                            </div>
                            <div class="desc">Categories</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div id="list_widgets" class="row">

            <div id="widget_posts_recent" data-url="#" class="col-md-6 col-sm-6 col-12 widget_item">
                <div class="portlet light bordered portlet-no-padding ">
                    <div class="portlet-title">
                        <div class="caption"><i data-bs-toggle="tooltip" title=""
                                class="fas fa-edit font-dark fw-bold" data-bs-original-title="Recent Posts"
                                aria-label="Recent Posts"></i>
                            <span class="caption-subject font-dark d-none d-xl-inline">Categories</span>
                        </div>
                        <div class="tools">
                            <a href="#" data-bs-toggle="tooltip" title="" data-state="collapse"
                                class="expand collapse-expand" data-bs-original-title="Collapse/Expand"
                                aria-label="Collapse/Expand"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="reload "
                                data-bs-original-title="Reload" aria-label="Reload"></a>
                            <a href="#" data-bs-toggle="tooltip" data-bs-original-title="Full screen" title=""
                                class="fullscreen " aria-label="Full screen"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="remove"
                                data-bs-original-title="Hide" aria-label="Hide"></a>
                        </div>
                    </div>
                    <div class="portlet-body  widget-content scroll-table " style="">
                        <div class="scroller mCustomScrollbar _mCS_1" style="padding: 0px;">
                            <div id="mCSB_1" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside"
                                style="max-height: 320px;" tabindex="0">
                                <div id="mCSB_1_container" class="mCSB_container"
                                    style="position: relative; top: -24px; left: 0px;" dir="ltr">
                                    <table class="table table-striped">
                                        <thead class="tableFloatingHeaderOriginal"
                                            style="position: absolute; margin-top: 0px; z-index: 1; width: 493px; top: 24px;">
                                            <tr>
                                                <th style="min-width: 54.2969px; max-width: 54.2969px;">#</th>
                                                <th style="min-width: 309.375px; max-width: 309.375px;">Name</th>
                                                <th style="min-width: 129.328px; max-width: 129.328px;">Created At</th>
                                            </tr>
                                        </thead>
                                        <hr>
                                        <tbody>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @foreach ($categories as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>
                                                        <a>{{ $item->name }}</a>
                                                    </td>
                                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div id="mCSB_1_scrollbar_vertical"
                                    class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical"
                                    style="display: block;">
                                    <div class="mCSB_draggerContainer">
                                        <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                            style="position: absolute; min-height: 30px; display: block; height: 298px; max-height: 310px; top: 22px;">
                                            <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                        </div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="widget_audit_logs" data-url="#" class="col-md-6 col-sm-6 col-12 widget_item">
                <div class="portlet light bordered portlet-no-padding ">
                    <div class="portlet-title">
                        <div class="caption"><i data-bs-toggle="tooltip" title=""
                                class="fas fa-history font-dark fw-bold" data-bs-original-title="Activities Logs"
                                aria-label="Activities Logs"></i> <span
                                class="caption-subject font-dark d-none d-xl-inline">Activities
                                Logs</span></div>
                        <div class="tools">
                            <a href="#" data-bs-toggle="tooltip" title="" data-state="expand"
                                class="collapse collapse-expand" data-bs-original-title="Collapse/Expand"
                                aria-label="Collapse/Expand"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="reload d-none"
                                data-bs-original-title="Reload" aria-label="Reload"></a>
                            <a href="#" data-bs-toggle="tooltip" data-bs-original-title="Full screen"
                                title="" class="fullscreen d-none" aria-label="Full screen"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="remove"
                                data-bs-original-title="Hide" aria-label="Hide"></a>
                        </div>
                    </div>
                    <div class="portlet-body  widget-content scroll-table expand" style="">
                        <div class="scroller mCustomScrollbar _mCS_2" style="padding: 0px;">
                            <div id="mCSB_2" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside"
                                style="max-height: 320px;" tabindex="0">
                                <div id="mCSB_2_container" class="mCSB_container"
                                    style="position: relative; top: 0px; left: 0px;" dir="ltr">
                                    <ul class="item-list padding">
                                        <li>
                                            <span class="log-icon log-icon-info"></span>
                                            <span>
                                                <a href="https://carzex.in/admin/system/users/profile/1"
                                                    class="d-inline-block">Super Admin</a>
                                                <span class="d-inline-block">
                                                    logged in </span>
                                                <span class="d-inline-block">
                                                    to the system </span> .
                                            </span>
                                            <span class="small italic d-inline-block">8 minutes ago </span>
                                            <span class="d-inline-block">(<a
                                                    href="https://whatismyipaddress.com/ip/42.108.146.84" target="_blank"
                                                    title="42.108.146.84" rel="nofollow">42.108.146.84</a>)</span>
                                        </li>
                                        <li>
                                            <span class="log-icon log-icon-info"></span>
                                            <span>
                                                <a href="https://carzex.in/admin/system/users/profile/1"
                                                    class="d-inline-block">Super Admin</a>
                                                <span class="d-inline-block">
                                                    logged in </span>
                                                <span class="d-inline-block">
                                                    to the system </span> .
                                            </span>
                                            <span class="small italic d-inline-block">5 hours ago </span>
                                            <span class="d-inline-block">(<a
                                                    href="https://whatismyipaddress.com/ip/42.108.146.84" target="_blank"
                                                    title="42.108.146.84" rel="nofollow">42.108.146.84</a>)</span>
                                        </li>
                                        <li>
                                            <span class="log-icon log-icon-info"></span>
                                            <span>
                                                <a href="https://carzex.in/admin/system/users/profile/1"
                                                    class="d-inline-block">Super Admin</a>
                                                <span class="d-inline-block">
                                                    logged in </span>
                                                <span class="d-inline-block">
                                                    to the system </span> .
                                            </span>
                                            <span class="small italic d-inline-block">6 hours ago </span>
                                            <span class="d-inline-block">(<a
                                                    href="https://whatismyipaddress.com/ip/152.58.141.91" target="_blank"
                                                    title="152.58.141.91" rel="nofollow">152.58.141.91</a>)</span>
                                        </li>
                                        <li>
                                            <span class="log-icon log-icon-info"></span>
                                            <span>
                                                <a href="https://carzex.in/admin/system/users/profile/1"
                                                    class="d-inline-block">Super Admin</a>
                                                <span class="d-inline-block">
                                                    logged in </span>
                                                <span class="d-inline-block">
                                                    to the system </span> .
                                            </span>
                                            <span class="small italic d-inline-block">8 hours ago </span>
                                            <span class="d-inline-block">(<a
                                                    href="https://whatismyipaddress.com/ip/42.108.146.84" target="_blank"
                                                    title="42.108.146.84" rel="nofollow">42.108.146.84</a>)</span>
                                        </li>
                                        <li>
                                            <span class="log-icon log-icon-info"></span>
                                            <span>
                                                <a href="https://carzex.in/admin/system/users/profile/1"
                                                    class="d-inline-block">Super Admin</a>
                                                <span class="d-inline-block">
                                                    logged in </span>
                                                <span class="d-inline-block">
                                                    to the system </span> .
                                            </span>
                                            <span class="small italic d-inline-block">9 hours ago </span>
                                            <span class="d-inline-block">(<a
                                                    href="https://whatismyipaddress.com/ip/49.37.9.82" target="_blank"
                                                    title="49.37.9.82" rel="nofollow">49.37.9.82</a>)</span>
                                        </li>
                                        <li>
                                            <span class="log-icon log-icon-info"></span>
                                            <span>
                                                <a href="https://carzex.in/admin/system/users/profile/1"
                                                    class="d-inline-block">Super Admin</a>
                                                <span class="d-inline-block">
                                                    logged in </span>
                                                <span class="d-inline-block">
                                                    to the system </span> .
                                            </span>
                                            <span class="small italic d-inline-block">9 hours ago </span>
                                            <span class="d-inline-block">(<a
                                                    href="https://whatismyipaddress.com/ip/49.37.36.99" target="_blank"
                                                    title="49.37.36.99" rel="nofollow">49.37.36.99</a>)</span>
                                        </li>
                                        <li>
                                            <span class="log-icon log-icon-info"></span>
                                            <span>
                                                <a href="https://carzex.in/admin/system/users/profile/1"
                                                    class="d-inline-block">Super Admin</a>
                                                <span class="d-inline-block">
                                                    logged in </span>
                                                <span class="d-inline-block">
                                                    to the system </span> .
                                            </span>
                                            <span class="small italic d-inline-block">10 hours ago </span>
                                            <span class="d-inline-block">(<a
                                                    href="https://whatismyipaddress.com/ip/152.58.176.251" target="_blank"
                                                    title="152.58.176.251" rel="nofollow">152.58.176.251</a>)</span>
                                        </li>
                                        <li>
                                            <span class="log-icon log-icon-info"></span>
                                            <span>
                                                <a href="https://carzex.in/admin/system/users/profile/1"
                                                    class="d-inline-block">Super Admin</a>
                                                <span class="d-inline-block">
                                                    logged in </span>
                                                <span class="d-inline-block">
                                                    to the system </span> .
                                            </span>
                                            <span class="small italic d-inline-block">10 hours ago </span>
                                            <span class="d-inline-block">(<a
                                                    href="https://whatismyipaddress.com/ip/42.108.146.84" target="_blank"
                                                    title="42.108.146.84" rel="nofollow">42.108.146.84</a>)</span>
                                        </li>
                                        <li>
                                            <span class="log-icon log-icon-info"></span>
                                            <span>
                                                <a href="https://carzex.in/admin/system/users/profile/1"
                                                    class="d-inline-block">Super Admin</a>
                                                <span class="d-inline-block">
                                                    logged in </span>
                                                <span class="d-inline-block">
                                                    to the system </span> .
                                            </span>
                                            <span class="small italic d-inline-block">23 hours ago </span>
                                            <span class="d-inline-block">(<a
                                                    href="https://whatismyipaddress.com/ip/42.108.146.19" target="_blank"
                                                    title="42.108.146.19" rel="nofollow">42.108.146.19</a>)</span>
                                        </li>
                                        <li>
                                            <span class="log-icon log-icon-info"></span>
                                            <span>
                                                <a href="https://carzex.in/admin/system/users/profile/1"
                                                    class="d-inline-block">Super Admin</a>
                                                <span class="d-inline-block">
                                                    logged in </span>
                                                <span class="d-inline-block">
                                                    to the system </span> .
                                            </span>
                                            <span class="small italic d-inline-block">23 hours ago </span>
                                            <span class="d-inline-block">(<a
                                                    href="https://whatismyipaddress.com/ip/152.58.163.31" target="_blank"
                                                    title="152.58.163.31" rel="nofollow">152.58.163.31</a>)</span>
                                        </li>
                                    </ul>
                                </div>
                                <div id="mCSB_2_scrollbar_vertical"
                                    class="mCSB_scrollTools mCSB_2_scrollbar mCS-dark mCSB_scrollTools_vertical"
                                    style="display: block;">
                                    <div class="mCSB_draggerContainer">
                                        <div id="mCSB_2_dragger_vertical" class="mCSB_dragger"
                                            style="position: absolute; min-height: 30px; display: block; height: 310px; max-height: 310px; top: 0px;">
                                            <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                        </div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget_footer">
                            <div class="row g-0">
                                <div class="col-3 number_record">
                                    <div class="f_com">
                                        <input type="number" class="numb" value="10" step="5"
                                            min="5" max="156">
                                        <div class="btn_grey btn_change_paginate btn_up"></div>
                                        <div class="btn_grey btn_change_paginate btn_down"></div>
                                    </div>
                                </div>
                                <div class="col-9 widget_pagination">
                                    <div class="d-flex justify-content-end ">
                                        <span class="d-flex align-items-center">1- 10 in 156 records</span>
                                        <a class="btn btn_grey page_previous  disabled " href=""></a>
                                        <a class="btn btn_grey page_next "
                                            href="https://carzex.in/admin/audit-logs/widgets/activities?_=1707838833336&amp;page=2"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
