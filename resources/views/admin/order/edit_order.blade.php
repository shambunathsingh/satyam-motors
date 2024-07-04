@extends('admin.layout.app')

@section('content')
{{-- {{$edit_order}}
@php
    echo '<pre>';
    print_r($edit_order);
    echo '</pre>';
@endphp --}}
<div class="ui-layout">
    <div class="flexbox-layout-sections">
         <div class="flexbox-layout-section-primary mt20">
              <div class="ui-layout__item">

                    <div class="wrapper-content">
                        <div class="pd-all-20">
                            <div class="flexbox-grid-default">
                                <div class="flexbox-auto-right mr5">
                                    <label class="title-product-main text-no-bold">Order information: #
                                    @foreach($edit_order->productOrders as $productOrder) 
                                            {{ $productOrder->product->sku }}
                                    @endforeach
                                </label>
                                </div>
                            </div>
                            <div class="mt20">
                                <svg class="svg-next-icon svg-next-icon-size-16 text-warning" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" enable-background="new 0 0 16 16">
                                    <g>
                                        <path d="M13.9130435,0 L2.08695652,0 C0.936347826,0 0,0.936347826 0,2.08695652 L0,14.2608696 C0,15.2194783 0.780521739,16 1.73913043,16 L14.2608696,16 C15.2194783,16 16,15.2194783 16,14.2608696 L16,2.08695652 C16,0.936347826 15.0636522,0 13.9130435,0 L13.9130435,0 Z M13.9130435,2.08695652 L13.9130435,10.4347826 L12.173913,10.4347826 C11.2153043,10.4347826 10.4347826,11.2153043 10.4347826,12.173913 L10.4347826,12.8695652 C10.4347826,13.0615652 10.2789565,13.2173913 10.0869565,13.2173913 L5.2173913,13.2173913 C5.0253913,13.2173913 4.86956522,13.0615652 4.86956522,12.8695652 L4.86956522,12.173913 C4.86956522,11.2153043 4.08904348,10.4347826 3.13043478,10.4347826 L2.08695652,10.4347826 L2.08695652,2.08695652 L13.9130435,2.08695652 L13.9130435,2.08695652 Z">
                                        </path>
                                    </g>
                                </svg>
                                <strong class="ml5 text-warning">{{ $edit_order->is_paid ? 'Completed' : 'Uncompleted' }}</strong>
                            </div>
                        </div>
                
                        <div class="pd-all-20 p-none-t border-top-title-main">
                            <div class="table-wrap">
                                <table class="table-order table-divided">
                                    <tbody>
                                        @foreach ($edit_order->productOrders as $productOrder)
                                        <tr>
                                            <td class="width-60-px min-width-60-px vertical-align-t">
                                                <div class="wrap-img">
                                                    <img class="thumb-image thumb-image-cartorderlist" src="{{ asset($productOrder->product->images) }}" alt="{{ $productOrder->product->name }}">
                                                </div>
                                            </td>
                                            <td class="pl5 p-r5 min-width-200-px">
                                                <a class="text-underline hover-underline pre-line" target="_blank" href="#" title="{{ $productOrder->product->name }}">
                                                    {{ $productOrder->product->name }}
                                                </a>
                                                <ul class="unstyled">
                                                    <li class="simple-note">
                                                        <a>
                                                            <span>{{ $productOrder->quantity }}</span>
                                                            <span class="text-lowercase"> Completed</span>
                                                        </a>
                                                        <ul class="dom-switch-target line-item-properties small">
                                                            <li class="ws-nm">
                                                                <span class="bull">↳</span>
                                                                <span class="black">Shipping </span>
                                                                <a class="text-underline bold-light" target="_blank" title="Free delivery" href="#">Free delivery</a>
                                                            </li>
                                                            <li class="ws-nm">
                                                                <span class="bull">↳</span>
                                                                <span class="black">Store</span>
                                                                <a href="#" class="bold-light" target="_blank">Robert’s Store</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="pl5 p-r5 text-end">
                                                <div class="inline_block">
                                                    <span>₹{{ number_format($productOrder->product->sale_price, 2) }}</span>
                                                </div>
                                            </td>
                                            <td class="pl5 p-r5 text-center">x</td>
                                            <td class="pl5 p-r5">
                                                <span>{{ $productOrder->quantity }}</span>
                                            </td>
                                            <td class="pl5 text-end">₹{{ number_format($productOrder->quantity * $productOrder->product->sale_price, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                
                        <div class="pd-all-20 p-none-t">
                            <div class="flexbox-grid-default block-rps-768">
                                <div class="flexbox-auto-right p-r5"></div>
                                <div class="flexbox-auto-right pl5">
                                    <div class="table-wrap">
                                        <table class="table-normal table-none-border table-color-gray-text">
                                            <tbody>
                                                <tr>
                                                    <td class="text-end color-subtext">Sub amount</td>
                                                    <td class="text-end pl10">
                                                        <span>₹{{ number_format($edit_order->productOrders->sum(fn($order) => $order->quantity * $order->product->sale_price), 2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-end color-subtext mt10">
                                                        <p class="mb0">Discount</p>
                                                    </td>
                                                    <td class="text-end p-none-b pl10">
                                                        <p class="mb0">₹0.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-end color-subtext mt10">
                                                        <p class="mb0">Shipping fee</p>
                                                        <p class="mb0 font-size-12px">Free delivery</p>
                                                        <p class="mb0 font-size-12px">2288 grams</p>
                                                    </td>
                                                    <td class="text-end p-none-t pl10">
                                                        <p class="mb0">₹0.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-end color-subtext mt10">
                                                        <p class="mb0">Tax</p>
                                                    </td>
                                                    <td class="text-end p-none-t pl10">
                                                        <p class="mb0">₹0.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-end mt10">
                                                        <p class="mb0 color-subtext">Total amount</p>
                                                        <p class="mb0  font-size-12px"><a href="#" target="_blank">Razorpay</a></p>
                                                    </td>
                                                    <td class="text-end text-no-bold p-none-t pl10">
                                                        <a href="#" target="_blank">
                                                            <span>₹{{ number_format($edit_order->productOrders->sum(fn($order) => $order->quantity * $order->product->sale_price), 2) }}</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border-bottom"></td>
                                                    <td class="border-bottom"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-end color-subtext">Paid amount</td>
                                                    <td class="text-end color-subtext pl10">
                                                        <a href="#" target="_blank">
                                                            <span>₹{{ number_format($edit_order->productOrders->sum(fn($order) => $order->quantity * $order->product->sale_price), 2) }}</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="hidden">
                                                    <td class="text-end color-subtext">The amount actually received</td>
                                                    <td class="text-end pl10">
                                                        <span>₹{{ number_format($edit_order->productOrders->sum(fn($order) => $order->quantity * $order->product->sale_price), 2) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="text-end">
                                        <a href="#" class="btn btn-primary me-2" target="_blank">
                                            <i class="fa fa-print"></i> Print invoice
                                        </a>
                                        <a href="#" class="btn btn-info">
                                            <i class="fa fa-download"></i> Download invoice
                                        </a>
                                    </div>
                                    <div class="py-3">
                                        <form action="#">
                                            <label class="text-title-field">Note</label>
                                            <textarea class="ui-text-area textarea-auto-height" name="description" rows="3" placeholder="Add note..." spellcheck="false"></textarea>
                                            <div class="mt10">
                                                <button type="button" class="btn btn-primary btn-update-order">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="pd-all-20 border-top-title-main">
                            <div class="flexbox-grid-default flexbox-align-items-center">
                                <div class="flexbox-auto-left">
                                    <svg class="svg-next-icon svg-next-icon-size-20  svg-next-icon-green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M7 18c-.265 0-.52-.105-.707-.293l-6-6c-.39-.39-.39-1.023 0-1.414s1.023-.39 1.414 0l5.236 5.236L18.24 2.35c.36-.42.992-.468 1.41-.11.42.36.47.99.11 1.41l-12 14c-.182.212-.444.338-.722.35H7z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flexbox-auto-right ml15 mr15 text-upper">
                                    <span>Order was confirmed</span>
                                </div>
                            </div>
                        </div>
                
                        <div class="pd-all-20 border-top-title-main">
                            <div class="flexbox-grid-default flexbox-flex-wrap flexbox-align-items-center">
                                <div class="flexbox-auto-left">
                                    <svg class="svg-next-icon svg-next-icon-size-20 svg-next-icon-green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M7 18c-.265 0-.52-.105-.707-.293l-6-6c-.39-.39-.39-1.023 0-1.414s1.023-.39 1.414 0l5.236 5.236L18.24 2.35c.36-.42.992-.468 1.41-.11.42.36.47.99.11 1.41l-12 14c-.182.212-.444.338-.722.35H7z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flexbox-auto-content ml15 mr15 text-upper">
                                    <span>Payment ₹{{ number_format($edit_order->productOrders->sum(fn($order) => $order->quantity * $order->product->sale_price), 2) }} was accepted</span>
                                </div>
                                <div class="flexbox-auto-left">
                                    <button class="btn btn-secondary ml10 btn-trigger-refund">Refund</button>
                                </div>
                            </div>
                        </div>
                
                        <div class="pd-all-20 border-top-title-main">
                            <div class="flexbox-grid-default flexbox-flex-wrap flexbox-align-items-center">
                                <div class="flexbox-auto-left">
                                    <svg class="svg-next-icon svg-next-icon-size-20 svg-next-icon-green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M7 18c-.265 0-.52-.105-.707-.293l-6-6c-.39-.39-.39-1.023 0-1.414s1.023-.39 1.414 0l5.236 5.236L18.24 2.35c.36-.42.992-.468 1.41-.11.42.36.47.99.11 1.41l-12 14c-.182.212-.444.338-.722.35H7z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flexbox-auto-content ml15 mr15 text-upper">
                                    <span>Delivery</span>
                                </div>
                            </div>
                        </div>
                
                        <div class="shipment-info-panel hide-print">
                            <div class="shipment-info-header">
                                <a target="_blank" href="#">
                                    <h4>#{{ $edit_order->order_id }}</h4>
                                </a>
                                <span class="label carrier-status carrier-status-approved">Approved</span>
                            </div>
                
                            <div class="pd-all-20 pt10">
                                <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding rps-form-767 pt10">
                                    <div class="flexbox-grid-form-item ws-nm">
                                        <span>Shipping method: <span><i>Free delivery</i></span></span>
                                    </div>
                                    <div class="flexbox-grid-form-item rps-no-pd-none-r ws-nm">
                                        <span>Weight (g):</span> <span><i>{{ $edit_order->weight }} g</i></span>
                                    </div>
                                </div>
                                <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding rps-form-767 pt10">
                                    <div class="flexbox-grid-form-item ws-nm">
                                        <span>Last Update:</span> <span><i>{{ $edit_order->updated_at }}</i></span>
                                    </div>
                                </div>
                            </div>
                
                            <div class="panel-heading order-bottom shipment-actions-wrapper">
                                <div class="flexbox-grid-default">
                                    <div class="flexbox-content">
                                        <button type="button" class="btn btn-secondary btn-destroy btn-cancel-shipment" data-action="#">Cancel shipping</button>
                                        <button class="btn btn-info ml10 btn-trigger-update-shipping-status"><i class="fas fa-shipping-fast"></i> Update shipping status</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             
                
                   <div class="mt20 mb20">
                    <div>
                        <div class="comment-log ws-nm">
                            <div class="comment-log-title">
                                <label class="bold-light m-xs-b hide-print">History</label>
                            </div>
                            <div class="comment-log-timeline">
                                <div class="column-left-history ps-relative" id="order-history-wrapper">
                                    <div class="item-card">
                                        <div class="item-card-body clearfix">
                                            <div class="item comment-log-item comment-log-item-date ui-feed__timeline">
                                                <div class="ui-feed__item ui-feed__item--message">
                                                    <span class="ui-feed__marker"></span>
                                                    <div class="ui-feed__message">
                                                        <div class="timeline__message-container">
                                                            <div class="timeline__inner-message">
                                                                <span>Created shipment for order</span>
                                                            </div>
                                                            <time class="timeline__time">
                                                                <span>2023-05-03 02:38:18</span>
                                                            </time>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-card">
                                        <div class="item-card-body clearfix">
                                            <div class="item comment-log-item comment-log-item-date ui-feed__timeline">
                                                <div class="ui-feed__item ui-feed__item--message">
                                                    <span class="ui-feed__marker"></span>
                                                    <div class="ui-feed__message">
                                                        <div class="timeline__message-container">
                                                            <div class="timeline__inner-message">
                                                                <a href="#" class="text-no-bold show-timeline-dropdown hover-underline" data-target="#history-line-158">
                                                                    <span>Payment was confirmed (amount $226.00) by System</span>
                                                                </a>
                                                            </div>
                                                            <time class="timeline__time">
                                                                <span>2023-05-03 02:38:18</span>
                                                            </time>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="timeline-dropdown" id="history-line-158">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <th>Order number</th>
                                                                <td>
                                                                    <a href="#" title="#10000037">#10000037</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Description</th>
                                                                <td>Mark <span>Razorpay</span> as confirmed</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Transaction amount</th>
                                                                <td>₹226.00</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Payment gateway</th>
                                                                <td>Razorpay</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Status</th>
                                                                <td>Successfully</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Transaction's type</th>
                                                                <td>Confirm</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Staff</th>
                                                                <td> </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Payment date</th>
                                                                <td>2023-05-03 02:38:18</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-card">
                                        <div class="item-card-body clearfix">
                                            <div class="item comment-log-item comment-log-item-date ui-feed__timeline">
                                                <div class="ui-feed__item ui-feed__item--message">
                                                    <span class="ui-feed__marker"></span>
                                                    <div class="ui-feed__message">
                                                        <div class="timeline__message-container">
                                                            <div class="timeline__inner-message">
                                                                <span>Order was verified by System</span>
                                                            </div>
                                                            <time class="timeline__time">
                                                                <span>2023-05-02 02:38:18</span>
                                                            </time>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-card">
                                        <div class="item-card-body clearfix">
                                            <div class="item comment-log-item comment-log-item-date ui-feed__timeline">
                                                <div class="ui-feed__item ui-feed__item--message">
                                                    <span class="ui-feed__marker"></span>
                                                    <div class="ui-feed__message">
                                                        <div class="timeline__message-container">
                                                            <div class="timeline__inner-message">
                                                                <span>Order is created from the checkout page</span>
                                                            </div>
                                                            <time class="timeline__time">
                                                                <span>2023-05-02 02:38:18</span>
                                                            </time>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
         </div>
         <div class="flexbox-layout-section-secondary mt20">
             <div class="ui-layout__item">
                 <div class="wrapper-content mb20">
                     <div class="next-card-section p-none-b">
                         <div class="flexbox-grid-default flexbox-align-items-center">
                             <div class="flexbox-auto-content-left">
                                 <label class="title-product-main text-no-bold">Customer</label>
                             </div>
                             <div class="flexbox-auto-left">
                                 <img class="width-30-px radius-cycle" width="40" src="{{ asset('storage/customers/' . $edit_order->id . '-150x150.jpg') }}" alt="{{ $edit_order->name }}">
                             </div>
                         </div>
                     </div>
                     <div class="next-card-section border-none-t">
                         <div class="mb5">
                             <strong class="text-capitalize">{{ $edit_order->name }}</strong>
                         </div>
                         <div>
                             <i class="fas fa-inbox mr5"></i><span>{{ $edit_order->orders_count }}</span> order(s)
                         </div>
                         <ul class="ws-nm text-infor-subdued">
                             <li class="overflow-ellipsis">
                                 <a class="hover-underline" href="mailto:{{ $edit_order->email }}">{{ $edit_order->email }}</a>
                             </li>
                             <li>
                                 <div>Have an account already</div>
                             </li>
                         </ul>
                     </div>
                     <div class="next-card-section">
                         <div class="flexbox-grid-default flexbox-align-items-center">
                             <div class="flexbox-auto-content-left">
                                 <label class="title-text-second"><strong>Shipping Address</strong></label>
                             </div>
                             <div class="flexbox-auto-content-right text-end">
                                 <a href="#" class="btn-trigger-update-shipping-address">
                                     <span data-placement="top" data-bs-toggle="tooltip" data-bs-original-title="Update address">
                                         <svg class="svg-next-icon svg-next-icon-size-12">
                                             <!-- SVG Path -->
                                         </svg>
                                     </span>
                                 </a>
                             </div>
                         </div>
                         <div>
                             <ul class="ws-nm text-infor-subdued shipping-address-info">
                                 <li>{{ $edit_order->name }}</li>
                                 <li>
                                     <a href="tel:+{{ $edit_order->phone }}">
                                         <span><i class="fa fa-phone-square cursor-pointer mr5"></i></span>
                                         <span dir="ltr">+{{ $edit_order->phone }}</span>
                                     </a>
                                 </li>
                                 <li>
                                     <div><a href="mailto:{{ $edit_order->email }}">{{ $edit_order->email }}</a></div>
                                     <div>{{ $edit_order->address }}</div>
                                     <div>{{ $edit_order->city }}</div>
                                     <div>{{ $edit_order->state }}</div>
                                     <div>{{ $edit_order->postal_code }}</div>
                                     <div>
                                         <a target="_blank" class="hover-underline" href="https://maps.google.com/?q={{ urlencode($edit_order->address . ', ' . $edit_order->city . ', ' . $edit_order->state . ', ' . $edit_order->postal_code) }}">See on maps</a>
                                     </div>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="wrapper-content bg-gray-white mb20">
                     <div class="pd-all-20">
                         <div class="p-b10">
                             <strong>Store</strong>
                             <ul class="p-sm-r mb-0">
                                 <li class="ws-nm">
                                     <a href="" class="ww-bw text-no-bold" target="_blank"></a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
         
                 <div class="wrapper-content bg-gray-white mb20">
                     <div class="pd-all-20">
                         <a href="{{ url('/admin/orders/reorder?order_id=' . $edit_order->id) }}" class="btn btn-info">Reorder</a>&nbsp;
                         <a href="#" class="btn btn-secondary btn-trigger-cancel-order" data-target="{{ url('/admin/orders/cancel-order/' . $edit_order->id) }}">Cancel</a>
                     </div>
                 </div>
             </div>
         </div>
    </div>
</div>
<style>
    
    @charset "UTF-8"; /*!
 * Bootstrap  v5.2.3 (https://getbootstrap.com/)
 * Copyright 2011-2022 The Bootstrap Authors
 * Copyright 2011-2022 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 */
:root {
    --bs-blue: #0d6efd;
    --bs-indigo: #6610f2;
    --bs-purple: #6f42c1;
    --bs-pink: #d63384;
    --bs-red: #dc3545;
    --bs-orange: #fd7e14;
    --bs-yellow: #ffc107;
    --bs-green: #198754;
    --bs-teal: #20c997;
    --bs-cyan: #0dcaf0;
    --bs-black: #000;
    --bs-white: #fff;
    --bs-gray: #6c757d;
    --bs-gray-dark: #343a40;
    --bs-gray-100: #f8f9fa;
    --bs-gray-200: #e9ecef;
    --bs-gray-300: #dee2e6;
    --bs-gray-400: #ced4da;
    --bs-gray-500: #adb5bd;
    --bs-gray-600: #6c757d;
    --bs-gray-700: #495057;
    --bs-gray-800: #343a40;
    --bs-gray-900: #212529;
    --bs-primary: #0d6efd;
    --bs-secondary: #6c757d;
    --bs-success: #198754;
    --bs-info: #0dcaf0;
    --bs-warning: #ffc107;
    --bs-danger: #dc3545;
    --bs-light: #f8f9fa;
    --bs-dark: #212529;
    --bs-primary-rgb: 13,110,253;
    --bs-secondary-rgb: 108,117,125;
    --bs-success-rgb: 25,135,84;
    --bs-info-rgb: 13,202,240;
    --bs-warning-rgb: 255,193,7;
    --bs-danger-rgb: 220,53,69;
    --bs-light-rgb: 248,249,250;
    --bs-dark-rgb: 33,37,41;
    --bs-white-rgb: 255,255,255;
    --bs-black-rgb: 0,0,0;
    --bs-body-color-rgb: 33,37,41;
    --bs-body-bg-rgb: 255,255,255;
    --bs-font-sans-serif: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    --bs-font-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
    --bs-gradient: linear-gradient(180deg,hsla(0,0%,100%,.15),hsla(0,0%,100%,0));
    --bs-body-font-family: var(--bs-font-sans-serif);
    --bs-body-font-size: 1rem;
    --bs-body-font-weight: 400;
    --bs-body-line-height: 1.5;
    --bs-body-color: #212529;
    --bs-body-bg: #fff;
    --bs-border-width: 1px;
    --bs-border-style: solid;
    --bs-border-color: #dee2e6;
    --bs-border-color-translucent: rgba(0,0,0,.175);
    --bs-border-radius: 0.375rem;
    --bs-border-radius-sm: 0.25rem;
    --bs-border-radius-lg: 0.5rem;
    --bs-border-radius-xl: 1rem;
    --bs-border-radius-2xl: 2rem;
    --bs-border-radius-pill: 50rem;
    --bs-link-color: #0d6efd;
    --bs-link-hover-color: #0a58ca;
    --bs-code-color: #d63384;
    --bs-highlight-bg: #fff3cd
}

*,:after,:before {
    box-sizing: border-box
}

.flexbox-annotated-section+.flexbox-annotated-section {
    border-top: 1px solid #d3dbe2;
    margin-top: 0;
    padding-top: 2rem
}

.ui-layout {
    margin: 2rem auto;
    max-width: 103.6rem
}

.flexbox-layout-sections {
    display: flex;
    flex-wrap: wrap;
    justify-content: center
}

.flexbox-layout-section-primary {
    flex: 2 1 48rem;
    max-width: 100%;
    min-width: 0
}

.flexbox-layout-section-secondary {
    flex: 1 0 24rem;
    max-width: 100%;
    min-width: 0
}

.next-card-section:first-child {
    border-radius: 3px 3px 0 0
}

.p-none-b {
    padding-bottom: 0!important
}

.next-card-section {
    padding: 20px
}

.next-card-section~.next-card-section {
    border-top: 1px solid #ebeef0
}

.border-none-t {
    border-top: none!important
}

.flexbox-auto-content-left {
    flex: 1 1 auto;
    min-width: 0;
    padding-right: 10px
}

.flexbox-auto-right {
    flex: 1 1 0
}

.pl5 {
    padding-left: 5px!important
}
/* 
.table-normal tr:first-child td,.table-normal.table-none-border td {
    border: 0
}

.table-color-gray-text .color-subtext {
    color: #707070
}

.table-normal td {
    border-top: 1px solid #ececec;
    padding-bottom: 5px;
    padding-top: 5px
} */

.pl10 {
    padding-left: 10px!important
}

.ml10 {
    margin-left: 10px!important
}

.radius-cycle {
    border-radius: 50%!important
}

.width-30-px {
    width: 30px
}

.hover-underline:hover,.text-underline,.text-underline:hover {
    text-decoration: underline
}

.table .thumb-image,img.thumb-image {
    border-radius: 0;
    margin: 0 auto;
    max-height: 50px;
    max-width: 50px
}

.thumb-image-cartorderlist {
    display: inline-block;
    vertical-align: top
}

.table-order td,.table-order th {
    padding-bottom: 10px;
    padding-top: 10px
}

.vertical-align-t {
    vertical-align: top
}

.min-width-60-px {
    min-width: 60px
}

.width-60-px {
    width: 60px
}

.table-wrap {
    -webkit-overflow-scrolling: touch;
    max-width: 100%
}

.table-order {
    border-spacing: 0;
    width: 100%
}

.min-width-200-px {
    min-width: 200px!important
}

.m-xs-b {
    margin-bottom: 10px
}

.mt20 {
    margin-top: 20px
}

.ps-relative {
    position: relative
}

.hover-tooltip {
    color: #888;
    font-weight: 400;
    text-transform: none
}

.color-blue {
    color: #0078bd
}

.p-b5 {
    padding-bottom: 5px!important
}

.mb10 {
    margin-bottom: 10px!important
}

.ui-text-area {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border: 1px solid #c4cdd5;
    border-color: #c4cdd5;
    border-radius: 3px;
    box-shadow: inset 0 1px 0 0 rgba(63,63,68,.05);
    box-sizing: border-box;
    color: #000;
    color: #212b35;
    display: block;
    font-weight: 400;
    letter-spacing: normal;
    line-height: 24px;
    margin: 0;
    max-width: unset;
    max-width: 100%;
    min-height: 0;
    outline: none;
    padding: 5px 12px;
    text-transform: none;
    vertical-align: baseline;
    width: 100%
}

textarea.textarea-auto-height {
    height: 36px;
    line-height: 1.4rem!important;
    overflow: hidden;
    position: relative;
    resize: none;
    transition: min-height .15s;
    z-index: 2
}

.p-none-important {
    padding: 0!important
}

.color--green {
    color: #42a142
}

.bg-white {
    background-color: #fff!important
}

/* .table-fix-header2 {
    border-collapse: collapse;
    margin-bottom: 0!important;
    table-layout: fixed;
    width: 100%!important
}

.table-fix-header2 thead tr {
    display: block;
    position: relative
}

.table-fix-header2 tr th {
    color: #333!important
}

.table-fix-header2 tr td,.table-fix-header2 tr th {
    min-width: 150px
} */

/* .user-control-combox-v3 {
    position: relative
} */

/* .user-control-combox-v3 .dropdown-menu {
    border: 0;
    margin: 15px 0;
    transform: scale(0);
    transform-origin: 50% -20px;
    transition: transform .2s ease,opacity .2s ease;
    width: 100%
} */

/* .dropdown-menu.animate-scale-dropdown,.user-control-combox-v3 .dropdown-menu {
    box-shadow: 0 0 0 1px rgba(39,44,48,.05),0 2px 7px 1px rgba(39,44,48,.16);
    opacity: 0;
    padding: 0
} */

/* .dropdown-menu.animate-scale-dropdown {
    animation: none;
    background-color: hsla(0,0%,100%,.98);
    border: 0;
    border-radius: 3px;
    display: block;
    left: 0;
    margin: 10px 0;
    position: absolute;
    top: 100%;
    transform: translateY(0) scale(0);
    transform-origin: 50% -20px;
    transition: all .3s ease,opacity .3s ease;
    z-index: -1
} */

/* .show>.dropdown-menu.animate-scale-dropdown {
    opacity: 1;
    transform: translateY(0) scale(1);
    z-index: 1000
} */

/* .user-control-combox-v3 .dropdown-menu .arrow-top-dropdown {
    height: 20px;
    left: 50%;
    margin-left: -10px;
    overflow: hidden;
    pointer-events: none;
    position: absolute;
    top: -20px;
    width: 20px
} */

/* .user-control-combox-v3 .dropdown-menu .arrow-top-dropdown:after {
    background-color: hsla(0,0%,100%,.98);
    box-shadow: 0 0 0 1px rgba(39,44,48,.05),0 2px 7px 1px rgba(39,44,48,.16);
    content: "";
    display: block;
    height: 10px;
    left: 50%;
    margin-left: -5px;
    position: absolute;
    top: 15px;
    transform: rotate(45deg);
    width: 10px
} */

input[type=radio] {
    box-sizing: border-box;
    cursor: pointer;
    margin: 0 .5rem 0 0;
    padding: 0;
    position: relative
}

input[type=radio]:before {
    background: #58b3f0;
    border-radius: 50%;
    bottom: 0;
    content: "";
    height: 8px;
    left: 1px;
    margin: auto;
    position: absolute;
    right: 0;
    top: 0;
    transform: scale(0);
    transition: transform .4s cubic-bezier(.45,1.8,.5,.75);
    width: 8px;
    z-index: 1
}

input[type=radio]:checked:before {
    left: 2px;
    transform: scale(1)
}

input[type=radio]:after {
    background: #fff;
    border: 1px solid #cedadd;
    border-radius: 50%;
    bottom: 0;
    content: "";
    height: 16px;
    left: -2px;
    margin: auto;
    position: absolute;
    right: 0;
    top: 0;
    width: 16px
}

input[type=radio]:checked:after {
    border: 1px solid #58b3f0;
    left: -1px
}
/* 
.modal-body .next-form-section .next-form-grid {
    box-sizing: border-box;
    display: flex;
    margin: 10px auto;
    padding: 0;
    width: 100%
}

.modal-body .next-form-section .next-form-grid .next-form-grid-cell {
    box-sizing: border-box;
    flex: 1 1 0;
    max-width: 100%;
    min-width: 0;
    padding: 0 10px
}

.modal-body .next-form-section .next-form-grid .next-form-grid-cell:first-of-type {
    padding-left: 0
} */

.mt10 {
    margin-top: 10px
}

.panel-default {
    border: 1px solid #dee5eb
}

.panel-default>.panel-heading {
    background-color: #f5f6f7;
    border-bottom: 1px solid #ebeef0;
    color: #748b9b
}

.panel-footer {
    background-color: #fff;
    border-top: 1px solid #e6e6e6
}

@media (max-width: 1599px) {
    .app-card-item {
        max-width:33.3333333333%;
        width: 33.3333333333%
    }
}

@media (max-width: 1280px) {
    .app-card-item {
        max-width:50%;
        width: 50%
    }
}

@media (max-width: 670px) {
    .app-card-item {
        max-width:100%;
        width: 100%
    }
}

@media (min-width: 768px) {
    .flexbox-annotated-section-annotation,.flexbox-annotated-section-content {
        padding:0 20px
    }

    .flexbox-layout-section-primary>.ui-layout__item {
        padding-right: 10px
    }

    .ui-layout__item {
        padding: 0 20px
    }
}

@media (min-width: 992px) {
    .table-fix-header2 tr td:first-child,.table-fix-header2 tr th:first-child {
        min-width:160px
    }
}

.flexbox-grid {
    display: flex;
    margin: 0 auto;
    padding-bottom: 15px;
    width: calc(100% - 20px)
}

.flexbox-content {
    box-sizing: border-box;
    flex: 1 1 0;
    max-width: 100%;
    min-width: 0;
    padding: 0 10px 10px
}

.flexbox-content.flexbox-right {
    flex: 0 0 33.333%;
    max-width: 33.333%
}

.wrapper-content.box-right-bg {
    background: #f5f6f7
}

.wrapper-content .border-top-title-main {
    border-top: 1px solid #ebeef0
}

.flexbox-grid-form {
    box-sizing: border-box;
    display: flex;
    padding-top: 10px;
    width: calc(100% - 20px)
}

.flexbox-grid-form-no-outside-padding {
    padding: 0;
    width: 100%
}

.flexbox-grid-form-item {
    box-sizing: border-box;
    flex: 1 1 0;
    max-width: 100%;
    min-width: 0;
    padding: 10px
}

.flexbox-grid-form-no-outside-padding>.flexbox-grid-form-item {
    padding-bottom: 0;
    padding-top: 0
}

.flexbox-grid-form-no-outside-padding>.flexbox-grid-form-item:first-of-type {
    padding-left: 0
}

.font-size-11px {
    font-size: 11px
}

.max-width-1200 {
    margin: 0 auto;
    max-width: 1200px
}

.border-bottom {
    border-bottom: 1px solid #ebeef0!important
}

.flexbox-auto-50 {
    flex: 0 0 50px
}

.wordwrap {
    -ms-word-wrap: break-word;
    word-wrap: break-word;
    white-space: pre-line;
    white-space: -o-pre-wrap;
    white-space: -moz-pre-wrap
}

.color-blue-line-through {
    color: #3a9ef0
}

.mr5 {
    margin-right: 5px!important
}

.item-multiplier {
    color: #999;
    padding: 0 5px
}

.item-quantity {
    color: #8b8b8b
}

.height-light {
    background: #e9eff3
}

.flexbox-content-no-padding {
    box-sizing: border-box;
    flex: 1 1 0;
    max-width: 100%;
    min-width: 0
}

.border-none {
    border: none!important;
    box-shadow: none
}

.p-sm-r {
    padding-right: 15px!important
}

table {
    border-spacing: 0;
    width: 100%
}

.dropdown-menu.applist-style .applist-menu {
    margin: 5px 0;
    padding: 0
}

.dropdown-menu.applist-style .applist-menu li a {
    word-wrap: break-word;
    background: transparent;
    border: 0;
    border-radius: 0;
    color: #31373d;
    display: block;
    line-height: 24px;
    padding: 5px 20px;
    text-align: left;
    text-decoration: none;
    white-space: normal
}

.dropdown-menu.applist-style .applist-menu li a:hover {
    background: #0078bd;
    color: #fff;
    outline: none;
    text-decoration: none
}

.btn {
    border-radius: 3px;
    font-size: 14px;
    outline: none;
    padding: 7px 12px
}

.ui-layout__item {
    flex: 1 1 100%;
    margin-top: 20px;
    max-width: 100%;
    min-width: 0
}

.ui-layout__item:first-child {
    margin-top: 0
}

.ui-banner {
    background-color: #f4f6f8;
    border-radius: 0 0 3px 3px;
    box-shadow: inset 0 3px 0 0 #637381,inset 0 0 0 0 transparent,0 0 0 1px rgba(63,63,68,.05),0 1px 3px 0 rgba(63,63,68,.15);
    color: #212b35;
    display: flex;
    font-weight: 400;
    letter-spacing: normal;
    position: relative;
    text-transform: none;
    transition: box-shadow .2s cubic-bezier(.64,0,.35,1)
}

/* .ui-banner--status-warning {
    background-color: #fcf1cd;
    box-shadow: inset 0 3px 0 0 #eec200,inset 0 0 0 0 transparent,0 0 0 1px rgba(63,63,68,.05),0 1px 3px 0 rgba(63,63,68,.15);
    color: #212b35;
    position: relative
} */

.ui-banner--status-info {
    background-color: #e0f5f5;
    box-shadow: inset 0 3px 0 0 #47c1bf,inset 0 0 0 0 transparent,0 0 0 1px rgba(63,63,68,.05),0 1px 3px 0 rgba(63,63,68,.15);
    color: #212b35;
    position: relative
}

.ui-banner__ribbon {
    align-items: flex-start;
    display: flex;
    flex: 0 0 auto;
    min-height: 32px;
    padding: 15px;
    position: relative;
    text-align: center
}

.ui-banner--status-warning .ui-banner__ribbon:before {
    background-color: #ffea8a
}

.ui-banner--status-info .ui-banner__ribbon:before {
    background-color: #b7ecec
}

.ui-banner__ribbon:before {
    background-color: #dfe4e8;
    border-radius: 100%;
    content: "";
    display: inline-block;
    height: 32px;
    left: 50%;
    position: absolute;
    top: 16px;
    transform: translateX(-50%);
    width: 32px
}

.ui-banner__content {
    align-self: center;
    flex: 1 1 0;
    padding: 15px 15px 15px 0
}

.ui-banner__title {
    font-size: 15px;
    margin: 0 0 10px;
    white-space: normal
}

.footer-form {
    float: left;
    margin-bottom: 40px;
    margin-top: 20px;
    padding-left: 15px;
    padding-right: 15px;
    text-align: right;
    width: 100%
}

.text-no-bold {
    font-weight: 500
}

.block-display {
    display: block!important
}

.next-field__connected-wrapper {
    display: flex
}

.z-index-9 {
    z-index: 9!important
}

.next-field__connected-wrapper .next-field--connected {
    border-radius: 0;
    flex: 1 1 0;
    left: -1px;
    margin: 0 -1px 0 0;
    max-width: 100%;
    position: relative;
    z-index: 10
}

.next-field__connected-wrapper .next-field--connected:first-child {
    border-bottom-left-radius: 3px;
    border-top-left-radius: 3px;
    left: 0;
    margin-right: 0
}

.next-field__connected-wrapper .next-field--connected:last-child {
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px
}

.pd-all-10-20 {
    padding: 10px 20px
}

.ui-select[disabled],.ui-text-area[disabled],:not(.next-input--stylized)>.next-input[disabled] {
    background: #f4f6f8!important;
    color: #919eab
}

.limit-input-group {
    width: 200px
}

.input-group input[disabled],input[disabled] {
    background: #fff url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFAQMAAAC3obSmAAAABlBMVEUAAADw8PC5otm+AAAAAXRSTlMAQObYZgAAABJJREFUCNdj4GAQYFBgcGBoAAACogD5g5VHSAAAAABJRU5ErkJggg==);
    border-color: #ddd;
    color: #999;
    cursor: default;
    opacity: 1!important
}

.cursor-pointer {
    cursor: pointer
}

.border-color-input-group {
    border-color: #e3e3e3
}

.svg-next-icon-size-16 {
    height: 16px;
    width: 16px
}

.svg-next-icon-rotate-180 {
    transform: rotate(180deg)
}

.ui-select-wrapper .next-icon-text,.ui-select-wrapper .svg-next-icon {
    fill: #798c9c;
    cursor: pointer;
    display: block;
    pointer-events: none;
    position: absolute;
    right: 7px;
    top: 9px
}

.ui-select-wrapper {
    background: linear-gradient(180deg,#fff,#f9fafb);
    border: 1px solid #c4cdd5;
    border-radius: 3px!important;
    box-shadow: 0 1px 0 0 rgba(22,29,37,.05);
    box-sizing: border-box;
    position: relative;
    transition: all .2s ease-out;
    vertical-align: bottom
}

.ui-select-wrapper .ui-select {
    width: 100%
}

.ui-select-wrapper .invalid-feedback {
    bottom: -22px;
    position: absolute;
    z-index: 999999999
}

.mt15 {
    margin-top: 15px
}

.ui-select:not(.select-search-full) {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: transparent!important;
    border: 0;
    box-sizing: border-box;
    display: block;
    font-weight: 400;
    height: 34px!important;
    letter-spacing: normal;
    line-height: 24px;
    max-width: none;
    outline: none!important;
    padding: 4px 8px;
    text-transform: none;
    width: 100%
}

select option {
    padding: 4px
}

.inline {
    display: inline-block;
    vertical-align: middle
}

.mb5 {
    margin-bottom: 5px!important
}

.min-width-150-px {
    min-width: 150px
}

.svg-next-icon {
    fill: currentColor;
    background-position: 50%;
    background-repeat: no-repeat;
    background-size: contain;
    display: inline-block;
    position: relative;
    top: -.15em;
    vertical-align: middle
}

.svg-next-icon-size-20 {
    height: 20px;
    width: 20px
}

svg:not(:root) {
    overflow: hidden
}

.ui-banner__ribbon svg {
    fill: #798c9c
}

.ui-banner__ribbon .svg-next-icon {
    fill: #637381;
    color: #fff;
    padding: 0;
    top: 7px
}

/* .ui-banner--status-warning .ui-banner__ribbon .svg-next-icon {
    fill: #eec200
} */

.btn-primary {
    --bs-btn-color: #fff;
    --bs-btn-bg: #4d97c1;
    --bs-btn-border-color: #4d97c1;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #35769a;
    --bs-btn-hover-border-color: #35769a;
    --bs-btn-focus-shadow-rgb: 49,132,253;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #35769a;
    --bs-btn-active-border-color: #35769a;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0,0,0,.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #4d97c1;
    --bs-btn-disabled-border-color: #4d97c1
}

.box-wrap-emptyTmpl {
    padding: 30px 0
}

.font-size-emptyDisplayTmpl.h1,h1.font-size-emptyDisplayTmpl {
    font-size: 32px;
    margin: 0
}

.mb20 {
    margin-bottom: 20px!important
}

.text-info-displayTmpl {
    color: #798c9c;
    font-size: 18px;
    line-height: 22px;
    margin: auto;
    max-width: 800px;
    padding: 0 10px
}

.empty-displayTmpl-pdtop {
    padding-top: 30px
}

.empty-displayTmpl-image {
    margin-top: 15px;
    padding: 0 20px
}

.empty-displayTmpl-image svg {
    height: 270px;
    max-width: 100%
}

.empty-displayTmpl-btn {
    padding-bottom: 20px;
    padding-top: 60px
}

.ui-footer-help {
    box-sizing: border-box;
    margin: 20px 10px;
    text-align: center;
    width: auto
}

.ui-footer-help__content {
    align-items: center;
    border: 1px solid #dfe4e8;
    border-radius: 999px;
    color: #212b35;
    display: inline-flex;
    justify-content: center;
    margin: 0 auto;
    padding: 15px;
    text-align: left
}

.ui-footer-help__icon {
    border-radius: 50%;
    color: #95a7b7;
    margin-right: 10px;
    padding: 10px
}

.ui-footer-help__content p {
    margin: 0;
    white-space: normal
}

.ui-footer-help__icon svg {
    fill: #47c1bf;
    color: #fff;
    top: 0
}

.svg-next-icon-size-24 {
    height: 24px;
    width: 24px
}

.next-input__add-on--after {
    padding-left: 10px
}

.next-input--is-focused {
    border-color: #3993d4;
    box-shadow: 0 0 0 1px #2b80bd
}

.svg-next-icon-size-12 {
    height: 12px;
    width: 12px
}

.svg-next-icon-gray {
    fill: #798c9c
}

.flexbox-auto-left {
    flex: 0 0 auto
}

.mr15 {
    margin-right: 15px!important
}

.ml15 {
    margin-left: 15px!important
}

.text-upper {
    text-transform: uppercase
}

.svg-next-icon-green {
    fill: #96bf48
}

.ui-layout__section {
    align-content: flex-start;
    display: flex;
    flex: 1 1 100%;
    flex-wrap: wrap;
    max-width: 100%;
    min-width: 0
}

.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6 {
    color: inherit;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1
}

.bg-gray-white {
    background: #f2f4f5
}

.pl25 {
    padding-left: 25px!important
}

.ww-bw {
    word-wrap: break-word
}

.wrapper-content .simple-note {
    color: #9fafba;
    font-weight: 400;
    text-transform: none
}

.black {
    color: #000
}

.bold-light {
    font-weight: 700!important
}

.widget-footer {
    border-top: 1px solid #eee;
    padding: 5px
}

.form-control {
    font-size: .9rem
}

span.lb-dis {
    display: inline-block;
    padding: 0 10px
}

.input-has-error {
    color: #dc3545!important
}

.color_green {
    color: #75a630!important
}

.inline_block {
    display: inline-block
}

.has-loading {
    font-size: 30px;
    height: 120px;
    line-height: 120px;
    text-align: center
}

.v-a-t {
    vertical-align: top!important
}

.ml5 {
    margin-left: 5px
}

.p-xs {
    padding: 10px
}

.width-150-px {
    width: 150px!important
}

.p-none-r {
    padding-right: 0!important
}

.m-auto {
    margin: auto
}

.width-50-px {
    width: 50px
}

.width-300-px {
    width: 300px!important
}

@media (min-width: 768px) {
    .ui-layout__item {
        padding:0 20px
    }

    .width-200-px-rsp-768 {
        width: 250px
    }

    .width20-rsp-768 {
        width: 20%
    }
}

.editable-input .form-control-sm {
    line-height: 15px
}

.input-group .input-group-text {
    line-height: 35px;
    padding: 0 5px
}

.empty-displayTmpl-image img {
    max-height: 220px
}

.border-top-color {
    border-top: 1px solid #e6e6e6
}

.p-r10 {
    padding-right: 10px!important
}

.fa-1-5 {
    font-size: 1.5em
}

.flexbox-auto-content-right {
    flex: 1 1 auto;
    min-width: 0;
    padding-left: 10px
}

.btn-default.active,.btn-default:active {
    background: linear-gradient(180deg,#f4f6f8,#f4f6f8);
    border-color: #c4cdd5;
    box-shadow: inset 0 1px 1px 0 rgba(99,115,129,.1),inset 0 1px 4px 0 rgba(99,115,129,.2)
}

.form-content-area .max-width-1200 {
    margin: 0 auto;
    max-width: 1200px
}

.form-content-area .max-width-1200 .flexbox-grid {
    display: flex;
    margin: 0 auto;
    padding-bottom: 15px;
    width: calc(100% - 20px)
}

.form-content-area .max-width-1200 .flexbox-content {
    box-sizing: border-box;
    flex: 1 1 0;
    max-width: 100%;
    min-width: 0;
    padding: 0 10px 10px
}

.form-content-area .max-width-1200 .flexbox-right {
    flex: 0 0 33.333%;
    max-width: 33.333%
}

@media (max-width: 1366px) {
    .form-content-area .max-width-1200 {
        max-width:1000px
    }
}

.max-width-1036 {
    margin: 0 auto;
    max-width: 1036px
}

.form-inline .inline_block {
    display: inline-block
}

.modal-open .select2-container--open {
    z-index: 10090
}

.table-header-color th {
    background-color: #36c6d3!important;
    color: #fff!important
}

#admin-notification .close-notification {
    position: absolute;
    right: 10px;
    top: 0
}

#admin-notification .sidebar {
    background-color: #f1f1f1;
    height: 100%;
    overflow-x: hidden;
    padding-top: 25px;
    position: fixed;
    right: 0;
    top: 0;
    transform: translate3d(350px,0,0);
    transition: all .5s cubic-bezier(.7,0,.3,1) 0s;
    width: 350px;
    z-index: 9995
}

#admin-notification .sidebar.active {
    transform: none
}

#admin-notification .sidebar .title-notification-heading {
    color: rgba(0,0,0,.9);
    font-size: 20px;
    font-weight: 700;
    letter-spacing: -.025em;
    line-height: 1.75rem;
    padding-left: 32px
}

#admin-notification .sidebar .list-item-notification {
    margin-top: 20px;
    position: relative
}

#admin-notification .sidebar .list-item-notification .list-group-item {
    padding-bottom: 0!important
}

#admin-notification .sidebar .action-notification {
    color: #818181;
    font-size: 13px;
    margin-left: 35px
}

#admin-notification .sidebar .close-btn {
    color: #818181;
    display: block;
    font-size: 24px;
    margin-left: 50px;
    padding: 8px 8px 8px 32px;
    position: absolute;
    right: 25px;
    text-decoration: none;
    top: 20px;
    transition: .3s
}

#admin-notification .sidebar ul li.read {
    background-color: #fff
}

#admin-notification .sidebar ul li {
    background-color: #fffbec;
    border-left: none
}

#admin-notification .sidebar ul li .notification-info {
    color: #333;
    display: block;
    font-size: 15px;
    line-height: 8px;
    padding: 8px 8px 8px 40px;
    position: relative;
    text-decoration: none;
    transition: .3s
}

#admin-notification .sidebar ul li .notification-info strong {
    line-height: 20px
}

#admin-notification .sidebar ul li .notification-info .icon {
    color: #d97708;
    left: 0;
    position: absolute
}

#admin-notification .sidebar ul li .notification-info .txt-info {
    font-size: 13px;
    opacity: 80%;
    top: 32px
}

#admin-notification .open-btn {
    background-color: #111;
    border: none;
    color: #fff;
    cursor: pointer;
    font-size: 20px;
    padding: 10px 15px
}

#admin-notification .action-view {
    color: #d97708;
    line-height: 35px;
    text-decoration: none
}

#admin-notification .open-btn:hover {
    background-color: #444
}

#admin-notification #main {
    padding: 16px;
    transition: margin-left .5s
}

@media screen and (max-height: 450px) {
    #admin-notification .sidebar {
        padding-top:15px
    }
}

#admin-notification .no-data-notification .title {
    color: #101827
}

#admin-notification .no-data-notification .description {
    color: #6b7280
}

#admin-notification .no-data-notification .fa-bell:before {
    background-color: #fffbec;
    border-radius: 9999px;
    content: "\f0f3";
    padding: 8px 10px
}

#admin-notification #loading-notification {
    position: fixed;
    right: 150px;
    top: 180px;
    z-index: 100000
}

#admin-notification .btn-toggle-description {
    line-height: 20px
}

.sidebar-backdrop {
    --bs-backdrop-zindex: 1050;
    --bs-backdrop-bg: #0000005e;
    --bs-backdrop-opacity: 0.5;
    -webkit-backdrop-filter: blur(2px);
    backdrop-filter: blur(2px);
    background-color: var(--bs-backdrop-bg);
    height: 100vh;
    left: 0;
    position: fixed;
    top: 0;
    width: 100vw;
    z-index: var(--bs-backdrop-zindex)
}
@charset "UTF-8";.product-images-wrapper {
    position: relative
}

.add-new-product-image {
    position: absolute;
    right: 20px;
    top: -42px
}

.modal .add-new-product-image {
    top: 0
}

#product-variations-wrapper {
    position: relative
}

#product-variations-wrapper .variation-actions {
    position: absolute;
    right: 10px;
    top: -42px
}

#product-variations-wrapper .variation-actions>a {
    display: inline-block;
    padding-left: 20px
}

#product-variations-wrapper .table-hover-variants tr th {
    padding: 8px 12px
}

#product-variations-wrapper .table-hover-variants tr:hover td {
    background: #eff9fd!important
}

#product-variations-wrapper .wrap-img-product {
    background: #fafbfc;
    border: 1px solid rgba(195,207,216,.3);
    display: table-cell;
    height: 40px;
    max-height: 40px;
    max-width: 40px;
    min-height: 40px;
    min-width: 40px;
    text-align: center;
    vertical-align: middle;
    width: 40px
}

#product-variations-wrapper .wrap-img-product img {
    height: 39px;
    max-width: 100%
}

#product-variations-wrapper .dataTables_wrapper .dataTables_filter,#product-variations-wrapper .dataTables_wrapper .dt-buttons {
    display: none
}

.add-new-product-attribute-wrap {
    position: relative
}

.add-new-product-attribute-wrap .btn-trigger-add-attribute {
    position: absolute;
    right: 10px;
    top: -42px
}

.list-product-attribute-wrap {
    background-color: #f9fafb;
    padding: 15px
}

.product-type-digital-management .digital_attachments_input {
    display: none
}

.product-type-digital-management table tbody tr.detach {
    opacity: .5;
    text-decoration: line-through
}

table.dataTable thead tr.dataTable-custom-filter th {
    padding-right: 8px;
    padding-top: 0;
    text-transform: unset
}

table.dataTable thead tr.dataTable-custom-filter th .select2-selection__rendered {
    padding-bottom: .35rem!important;
    padding-right: 1.5rem!important;
    padding-top: .35rem!important
}

table.dataTable thead tr.dataTable-custom-filter th .select2-container--default .select2-selection--single .select2-selection__arrow {
    width: 1rem
}

table.dataTable thead tr.dataTable-custom-filter th .select2-container--default .select2-selection--single .select2-selection__clear {
    background-color: hsla(0,0%,45%,.51);
    font-size: .8rem;
    height: 100%;
    margin-right: 0;
    padding: 5px;
    position: absolute;
    right: 0;
    z-index: 1
}

.product-variations-accordion-wrapper .panel-title {
    position: relative
}

.product-variations-accordion-wrapper .panel-title .delete-version {
    cursor: pointer;
    display: inline-block;
    height: 30px;
    line-height: 30px;
    position: absolute;
    right: 0;
    text-align: center;
    top: 20px;
    transform: translateY(-50%);
    width: 30px
}

.product-variations-accordion-wrapper .panel-title .delete-version:hover {
    opacity: .5
}

.product-variations-accordion-wrapper .accordion-toggle {
    background-color: #d9edf7;
    border: 1px solid #bce8f1
}

.product-variations-accordion-wrapper .default-variation-product {
    line-height: 22px;
    padding: 15px 15px 0
}

.variations-selector {
    align-items: center;
    display: flex;
    flex-direction: row;
    margin: 0 -15px 30px
}

.variations-selector .item {
    flex: 1;
    padding: 0 15px
}

.border-pay-row {
    background-color: #fff;
    border: 1px solid #d3dbe2;
    margin: 0!important;
    padding: 10px;
    position: relative
}

.border-pay-col {
    background: #fff;
    border-left: 1px solid #fff;
    border-right: 1px solid #eaeaea;
    height: 100%;
    left: 0;
    top: 0;
    width: 50px
}

.payment-note {
    border-left: none;
    color: #888;
    font-weight: 400;
    text-transform: none
}

.payment-note ul {
    margin-left: 25px
}

.payment-content-item {
    background: #fff
}

.payment-content-item label {
    font-weight: 500
}

.payment-content-item .well {
    background: #fafbfc;
    border: 1px solid #ebeef0;
    border-radius: 4px;
    box-shadow: none;
    margin-bottom: 15px
}

.carrier-card .carrier-icon div.carrier-icon-container {
    border: 2px solid #eee;
    border-radius: 999px!important;
    color: #4a9fd6;
    display: block;
    height: 80px;
    overflow: hidden;
    text-align: center;
    width: 80px
}

.carrier-card .carrier-icon div.carrier-icon-container img {
    max-height: 78px;
    max-width: 78px
}

.carrier-card .carrier-icon {
    display: inline-block;
    margin-right: 10px;
    vertical-align: top
}

.carrier-card .carrier-info {
    width: calc(70% - 90px)
}

.carrier-card .carrier-action,.carrier-card .carrier-info {
    display: inline-block;
    vertical-align: top;
    white-space: normal
}

.carrier-card .carrier-action {
    float: right;
    margin-left: 10px;
    text-align: right;
    width: calc(30% - 15px)
}

.shipping-note {
    border-left: none;
    color: #888;
    font-weight: 400;
    text-transform: none
}

.shipping-detail-information .table-shiping {
    border-spacing: 0;
    width: 100%
}

.shipping-detail-information .table-shiping th {
    color: #333!important;
    font-size: 14px!important;
    font-weight: 400;
    padding-left: 0!important;
    text-transform: none!important
}

.shipping-detail-information .table-shiping th.text-end {
    text-align: right
}

.shipping-detail-information .table-shiping td {
    height: 50px
}

.shipping-detail-information .table-shiping .subdued {
    color: #798c9c
}

.comment-log .comment-log-title {
    border-bottom: 1px solid #d3dbe2;
    margin-bottom: 20px;
    padding: 0 20px
}

.comment-log .comment-log-timeline .comment-log-avatar.comment-log-avatar-comment {
    top: 9px;
    z-index: 1
}

.comment-log .comment-log-timeline .comment-log-avatar {
    left: 14px;
    position: absolute
}

.ui-feed__timeline {
    background-color: hsla(0,0%,100%,0);
    border-radius: 3px;
    padding-top: 15px;
    position: relative;
    transition: background-color .2s ease-in-out
}

.ui-feed__item {
    align-items: center;
    display: flex;
    margin-bottom: 20px;
    margin-left: 16px;
    position: relative
}

.ui-feed__item>* {
    flex: 1 1 auto
}

.ui-feed__timeline .ui-feed__marker {
    transition: border-color .2s ease-in-out;
    z-index: 1
}

.ui-feed__marker {
    background-color: #c3cfd8;
    border: 3px solid #ebeef0;
    border-radius: 50%!important;
    flex: none;
    height: 19px;
    margin-right: 13px;
    vertical-align: middle;
    width: 19px
}

.ui-feed__marker--user-action {
    background-color: #0078bd
}

.ui-feed__timeline .ui-feed__message {
    max-width: 100%;
    min-width: 0
}

.timeline__message-container {
    align-items: baseline;
    display: flex;
    justify-content: space-between;
    padding-right: 20px
}

.timeline__inner-message {
    word-wrap: break-word;
    flex: 1 1 auto;
    padding-right: 20px;
    width: 0;
    word-break: break-word
}

.comment-log .comment-log-timeline .column-left-history:before {
    background: #e3e6e9;
    bottom: 0;
    content: " ";
    left: 26.5px;
    position: absolute;
    top: 15px;
    width: 3px;
    z-index: 1
}

.ui-feed__timeline>.ui-feed__item--message {
    margin-bottom: 20px
}

.ui-feed__item--date,.ui-feed__item--message {
    margin-left: 19px
}

.ui-feed__item--action {
    margin-left: 19px;
    margin-top: -10px
}

.ui-feed__timeline>.ui-feed__item--action {
    margin-top: 0
}

.ui-feed__spacer {
    align-self: baseline;
    flex: none;
    height: 13px;
    margin-right: 13px;
    width: 19px
}

.timeline__action-group {
    align-items: center;
    display: flex;
    flex-wrap: wrap
}

.timeline__action-button {
    background-color: transparent;
    border: 1px solid #d3dbe2;
    color: #0078bd;
    cursor: pointer;
    margin-right: 10px
}

.shipment-create-panel .shipment-address-box-1 {
    border-left: 3px solid #0078bd;
    padding: 0 10px;
    white-space: normal
}

.shipment-create-panel .address-header .right {
    float: right;
    text-align: right;
    width: 50%
}

.shipment-create-panel .address-header .left {
    float: left;
    width: 50%
}

.shipment-create-panel .address-header {
    float: left;
    width: 100%
}

.clickable-row {
    cursor: pointer;
    display: block;
    width: 100%
}

.clickable-row:hover {
    background: #f5fbff
}

.table-fix-header2 tbody {
    display: block;
    overflow-x: hidden;
    overflow-y: auto;
    width: 100%
}

.shipment-info-panel .shipment-info-header h4 {
    display: inline-block;
    margin: 0 10px 0 0;
    padding: 0
}

.shipment-info-panel .shipment-info-header a {
    display: inline-block;
    vertical-align: middle
}

.shipment-info-panel .shipment-info-header {
    padding: 0 20px
}

.label {
    border-radius: .25em;
    color: #fff;
    display: inline;
    font-size: 75%;
    font-weight: 500;
    line-height: 1;
    padding: .2em .6em .3em;
    text-align: center;
    vertical-align: baseline;
    white-space: nowrap
}

.label.carrier-status,.label.codstatus_2,.label.codstatus_3,.label.codstatus_5 {
    background-color: #f4c58f;
    border: 1px solid #e6b77f;
    color: #bd6a03
}

.label.carrier-status.carrier-status-canceled,.label.carrier-status.carrier-status-not_delivered {
    background: #f6f6f6;
    border: 1px solid #eee;
    color: #db7878
}

.timeline-dropdown {
    background: #f5f6f7;
    border: 0;
    box-shadow: none;
    display: none;
    padding-left: 30px;
    position: relative
}

.timeline-dropdown td,.timeline-dropdown th {
    border-top: 1px solid #ebeef3;
    font-weight: 400;
    min-width: 180px;
    padding: 15px
}

.timeline-dropdown tr:first-child td,.timeline-dropdown tr:first-child th {
    border-top: 0
}

.location-info {
    margin-bottom: 20px
}

.locations-highlight {
    background: #fcfcd1;
    padding: 1px
}




</style>
@endsection