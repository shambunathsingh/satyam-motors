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
                <div class="col">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 text-white"
                        style="background-color: rgb(50, 197, 210);">
                        <div class="visual"><i class="fas fa-users" style="opacity: 0.1;"></i></div>
                        <div class="details">
                            <div class="number"><span data-counter="counterup" data-value="46">46</span>
                            </div>
                            <div class="desc">Orders</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 text-white"
                        style="background-color: rgb(18, 128, 245);">
                        <div class="visual"><i class="far fa-file-alt" style="opacity: 0.1;"></i></div>
                        <div class="details">
                            <div class="number"><span data-counter="counterup" data-value="1">1</span>
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
                            <div class="number"><span data-counter="counterup" data-value="13">13</span>
                            </div>
                            <div class="desc">Customers</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 text-white"
                        style="background-color: rgb(7, 79, 157);">
                        <div class="visual"><i class="far fa-file-alt" style="opacity: 0.1;"></i></div>
                        <div class="details">
                            <div class="number"><span data-counter="counterup" data-value="0">0</span>
                            </div>
                            <div class="desc">Reviews</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div id="list_widgets" class="row">

            <div id="widget_analytics_general" data-url="#" class=" col-12 widget_item">
                <div class="portlet light bordered portlet-no-padding">
                    <div class="portlet-title">
                        <div class="caption"><i data-bs-toggle="tooltip" title=""
                                class="fas fa-chart-line font-dark fw-bold" data-bs-original-title="Site Analytics"
                                aria-label="Site Analytics"></i>
                            <span class="caption-subject font-dark d-none d-xl-inline">Site
                                Analytics</span>
                        </div>
                        <div class="tools">
                            <div class="predefined-ranges d-inline-block ">
                                <div class="ui-select-wrapper form-group "><select name="predefined_range"
                                        class="py-0 ui-select">
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="this_week">This Week</option>
                                        <option value="last_7_days">Last 7 Days</option>
                                        <option value="this_month">This Month</option>
                                        <option value="last_30_days">Last 30 Days</option>
                                        <option value="this_year">This Year</option>
                                    </select> <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                        </svg></svg>
                                </div>
                            </div>
                            <a href="#" data-bs-toggle="tooltip" title="" data-state="collapse"
                                class="collapse-expand expand" data-bs-original-title="Collapse/Expand"
                                aria-label="Collapse/Expand"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="reload "
                                data-bs-original-title="Reload" aria-label="Reload"></a>
                            <a href="#" data-bs-toggle="tooltip" data-bs-original-title="Full screen" title=""
                                class="fullscreen" aria-label="Full screen"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="remove"
                                data-bs-original-title="Hide" aria-label="Hide"></a>
                        </div>
                    </div>
                    <div class="portlet-body widget-content row expand" style="height: auto;"></div>
                </div>
            </div>


            <div id="widget_analytics_page" data-url="#" class="col-md-6 col-sm-6 col-12 widget_item">
                <div class="portlet light bordered portlet-no-padding ">
                    <div class="portlet-title">
                        <div class="caption"><i data-bs-toggle="tooltip" title=""
                                class="far fa-newspaper font-dark fw-bold" data-bs-original-title="Top Most Visit Pages"
                                aria-label="Top Most Visit Pages"></i> <span
                                class="caption-subject font-dark d-none d-xl-inline">Top Most Visit
                                Pages</span></div>
                        <div class="tools">
                            <div class="predefined-ranges d-inline-block ">
                                <div class="ui-select-wrapper form-group "><select name="predefined_range"
                                        class="py-0 ui-select">
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="this_week">This Week</option>
                                        <option value="last_7_days">Last 7 Days</option>
                                        <option value="this_month">This Month</option>
                                        <option value="last_30_days">Last 30 Days</option>
                                        <option value="this_year">This Year</option>
                                    </select> <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                        </svg></svg>
                                </div>
                            </div>
                            <a href="#" data-bs-toggle="tooltip" title="" data-state="collapse"
                                class="expand collapse-expand" data-bs-original-title="Collapse/Expand"
                                aria-label="Collapse/Expand"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="reload "
                                data-bs-original-title="Reload" aria-label="Reload"></a>
                            <a href="#" data-bs-toggle="tooltip" data-bs-original-title="Full screen"
                                title="" class="fullscreen " aria-label="Full screen"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="remove"
                                data-bs-original-title="Hide" aria-label="Hide"></a>
                        </div>
                    </div>
                    <div class="portlet-body  widget-content scroll-table expand" style=""></div>
                </div>
            </div>

            <div id="widget_analytics_browser" data-url="" class="col-md-6 col-sm-6 col-12 widget_item">
                <div class="portlet light bordered portlet-no-padding ">
                    <div class="portlet-title">
                        <div class="caption"><i data-bs-toggle="tooltip" title=""
                                class="fab fa-safari font-dark fw-bold" data-bs-original-title="Top Browsers"
                                aria-label="Top Browsers"></i>
                            <span class="caption-subject font-dark d-none d-xl-inline">Top
                                Browsers</span>
                        </div>
                        <div class="tools">
                            <div class="predefined-ranges d-inline-block ">
                                <div class="ui-select-wrapper form-group "><select name="predefined_range"
                                        class="py-0 ui-select">
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="this_week">This Week</option>
                                        <option value="last_7_days">Last 7 Days</option>
                                        <option value="this_month">This Month</option>
                                        <option value="last_30_days">Last 30 Days</option>
                                        <option value="this_year">This Year</option>
                                    </select> <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                        </svg></svg>
                                </div>
                            </div>
                            <a href="#" data-bs-toggle="tooltip" title="" data-state="collapse"
                                class="expand collapse-expand" data-bs-original-title="Collapse/Expand"
                                aria-label="Collapse/Expand"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="reload "
                                data-bs-original-title="Reload" aria-label="Reload"></a>
                            <a href="#" data-bs-toggle="tooltip" data-bs-original-title="Full screen"
                                title="" class="fullscreen " aria-label="Full screen"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="remove"
                                data-bs-original-title="Hide" aria-label="Hide"></a>
                        </div>
                    </div>
                    <div class="portlet-body  widget-content scroll-table " style=""></div>
                </div>
            </div>

            <div id="widget_analytics_referrer" data-url="#" class="col-md-6 col-sm-6 col-12 widget_item">
                <div class="portlet light bordered portlet-no-padding ">
                    <div class="portlet-title">
                        <div class="caption"><i data-bs-toggle="tooltip" title=""
                                class="fas fa-user-friends font-dark fw-bold" data-bs-original-title="Top Referrers"
                                aria-label="Top Referrers"></i>
                            <span class="caption-subject font-dark d-none d-xl-inline">Top
                                Referrers</span>
                        </div>
                        <div class="tools">
                            <div class="predefined-ranges d-inline-block ">
                                <div class="ui-select-wrapper form-group "><select name="predefined_range"
                                        class="py-0 ui-select">
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="this_week">This Week</option>
                                        <option value="last_7_days">Last 7 Days</option>
                                        <option value="this_month">This Month</option>
                                        <option value="last_30_days">Last 30 Days</option>
                                        <option value="this_year">This Year</option>
                                    </select> <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                        </svg></svg>
                                </div>
                            </div>
                            <a href="#" data-bs-toggle="tooltip" title="" data-state="collapse"
                                class="expand collapse-expand" data-bs-original-title="Collapse/Expand"
                                aria-label="Collapse/Expand"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="reload "
                                data-bs-original-title="Reload" aria-label="Reload"></a>
                            <a href="#" data-bs-toggle="tooltip" data-bs-original-title="Full screen"
                                title="" class="fullscreen " aria-label="Full screen"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="remove"
                                data-bs-original-title="Hide" aria-label="Hide"></a>
                        </div>
                    </div>
                    <div class="portlet-body  widget-content scroll-table " style=""></div>
                </div>
            </div>


            <div id="widget_posts_recent" data-url="#" class="col-md-6 col-sm-6 col-12 widget_item">
                <div class="portlet light bordered portlet-no-padding ">
                    <div class="portlet-title">
                        <div class="caption"><i data-bs-toggle="tooltip" title=""
                                class="fas fa-edit font-dark fw-bold" data-bs-original-title="Recent Posts"
                                aria-label="Recent Posts"></i>
                            <span class="caption-subject font-dark d-none d-xl-inline">Recent
                                Posts</span>
                        </div>
                        <div class="tools">
                            <a href="#" data-bs-toggle="tooltip" title="" data-state="collapse"
                                class="expand collapse-expand" data-bs-original-title="Collapse/Expand"
                                aria-label="Collapse/Expand"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="reload "
                                data-bs-original-title="Reload" aria-label="Reload"></a>
                            <a href="#" data-bs-toggle="tooltip" data-bs-original-title="Full screen"
                                title="" class="fullscreen " aria-label="Full screen"></a>
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
                                                <td>2</td>
                                                <td> <a href="" target="_blank">LED Headlight Bulb (Max 5 Cree)</a>
                                                </td>
                                                <td>26-12-2023</td>
                                            </tr>

                                            <tr>
                                                <td>8</td>
                                                <td> <a href="" target="_blank">Car Jump Starter</a> </td>
                                                <td>26-12-2023</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td> <a href="" target="_blank">Car Android Screen</a> </td>
                                                <td>26-12-2023</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td> <a href="" target="_blank">Car Rear View Screens</a> </td>
                                                <td>26-12-2023</td>
                                            </tr>
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

            <div id="widget_ecommerce_report_general" data-url="#" class="col-md-6 col-sm-6 col-12 widget_item">
                <div class="portlet light bordered portlet-no-padding ">
                    <div class="portlet-title">
                        <div class="caption"><i data-bs-toggle="tooltip" title=""
                                class="fas fa-shopping-basket font-dark fw-bold" data-bs-original-title="Ecommerce"
                                aria-label="Ecommerce"></i> <span
                                class="caption-subject font-dark d-none d-xl-inline">Ecommerce</span>
                        </div>
                        <div class="tools">
                            <a href="#" data-bs-toggle="tooltip" title="" data-state="collapse"
                                class="expand collapse-expand" data-bs-original-title="Collapse/Expand"
                                aria-label="Collapse/Expand"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="reload "
                                data-bs-original-title="Reload" aria-label="Reload"></a>
                            <a href="#" data-bs-toggle="tooltip" data-bs-original-title="Full screen"
                                title="" class="fullscreen " aria-label="Full screen"></a>
                            <a href="#" data-bs-toggle="tooltip" title="" class="remove"
                                data-bs-original-title="Hide" aria-label="Hide"></a>
                        </div>
                    </div>
                    <div class="portlet-body  widget-content scroll-table " style="">
                        <style>
                            .wc_status_list li {
                                width: 50%;
                                float: left;
                                padding: 0;
                                -webkit-box-sizing: border-box;
                                box-sizing: border-box;
                                margin: 0;
                                border-top: 1px solid #ececec;
                                color: #aaa
                            }

                            .wc_status_list li a {
                                display: block;
                                color: #aaa;
                                padding: 9px 12px;
                                -webkit-transition: all ease .5s;
                                transition: all ease .5s;
                                position: relative;
                                font-size: 12px
                            }

                            .wc_status_list li a strong {
                                font-size: 18px;
                                line-height: 1.2em;
                                font-weight: 400;
                                display: block;
                                color: #21759b
                            }

                            .wc_status_list li a:hover {
                                color: #2ea2cc
                            }

                            .wc_status_list li a:hover strong,
                            .wc_status_list li a:hover::before {
                                color: #2ea2cc !important
                            }

                            .wc_status_list li a::before {
                                font-family: Font Awesome\ 5 Free;
                                speak: none;
                                font-weight: 900;
                                font-variant: normal;
                                text-transform: none;
                                margin: 0;
                                text-indent: 0;
                                top: 0;
                                left: 0;
                                height: 100%;
                                text-align: center;
                                content: "";
                                font-size: 2em;
                                position: relative;
                                width: auto;
                                line-height: 1.2em;
                                color: #464646;
                                float: left;
                                margin-right: 12px;
                                margin-bottom: 12px
                            }

                            .wc_status_list li:first-child {
                                border-top: 0
                            }

                            .wc_status_list li.sales-this-month {
                                width: 100%
                            }

                            .wc_status_list li.sales-this-month a::before {
                                content: '\f201'
                            }

                            .wc_status_list li.best-seller-this-month a::before {
                                content: '\e006'
                            }

                            .wc_status_list li.processing-orders {
                                border-right: 1px solid #ececec
                            }

                            .wc_status_list li.processing-orders a::before {
                                content: '\f48b';
                                color: #7ad03a
                            }

                            .wc_status_list li.completed-orders a::before {
                                content: '\f48b';
                                color: #999
                            }

                            .wc_status_list li.low-in-stock {
                                border-right: 1px solid #ececec
                            }

                            .wc_status_list li.low-in-stock a::before {
                                content: '\f06a';
                                color: #ffba00
                            }

                            .wc_status_list li.out-of-stock a::before {
                                content: '\f057';
                                color: #a00;
                                font-weight: 400;
                            }
                        </style>

                        <ul class="wc_status_list">
                            <li class="sales-this-month">
                                <a href="https://carzex.in/admin/ecommerce/reports">
                                    <strong>
                                        ₹0.00
                                    </strong> Revenue this month
                                </a>
                            </li>
                            <li class="processing-orders">
                                <a href="https://carzex.in/admin/orders">
                                    <strong>0</strong> order(s) processing in this month
                                </a>
                            </li>
                            <li class="completed-orders">
                                <a href="https://carzex.in/admin/orders">
                                    <strong>0</strong> order(s) completed in this month
                                </a>
                            </li>
                            <li class="low-in-stock">
                                <a href="https://carzex.in/admin/ecommerce/products">
                                    <strong>0</strong> product(s) will be out of stock soon
                                </a>
                            </li>
                            <li class="out-of-stock">
                                <a
                                    href="https://carzex.in/admin/ecommerce/products?filter_table_id=botble-ecommerce-tables-product-table&amp;class=Botble%5CEcommerce%5CTables%5CProductTable&amp;filter_columns%5B%5D=stock_status&amp;filter_operators%5B%5D=%3D&amp;filter_values%5B%5D=out_of_stock">
                                    <strong>0</strong> product(s) out of stock
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
