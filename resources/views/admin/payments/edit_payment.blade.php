@extends('admin.layout.app')

@section('content')
{{ $payments }}

    <style>
        .info-box {
            border-radius: 5px;
            padding: 20px;
        }
        .info-box .row div {
            margin-bottom: 10px;
        }
        .btn-group {
            float: right;
            margin-top: -10px;
        }
        .badge-pending {
            background-color: #ffc107;
            color: #000;
        }
      .datatitel{ 
        color: #6c7a91;
        font-size: .725rem;
        font-weight:600;
        letter-spacing: .04em;
        text-transform: uppercase;
       }
       .datacont{
        font-size: 1rem;
        font-weight:400;
        letter-spacing: .04em;
        margin-top: -10px;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
       }
    </style>
    <div class="row mt-5">
         <div class="col-md-9">
<div class="tabbable-custom">
                            <div class="tab-content">
        <div class="info-box">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Information #  {{ $payments->payment_id }}</h4>
                <div class="mb-3">
                    <button class="btn btn-outline-secondary border-dark text-dark me-2">Print Invoice</button>
                    <button class="btn btn-outline-primary border-dark text-dark">Download Invoice</button>
                </div>
            </div>
            <hr>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="datatitel">Charge ID</div>
                    <div class="datacont">
                        {{ $payments->order_token }}
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Payer Name</div>
                    <div class="datacont">
                        {{ $order->first_name }} {{ $order->last_name }}
                  
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Email</div>
                    <div class="datacont">{{ $order->email }}</div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Phone</div>
                    <div class="datacont">{{ $order->phone }}</div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">payments Channel</div>
                    <div class="datacont">{{ $payments->payments_channel }}</div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Total</div>
                    <div class="datacont">{{ $payments->subtotal }}</div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Created At</div>
                    <div class="datacont">{{ $payments->created_at }}</div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Status</div>
                    <div>
                        <span class="badge badge-pending">{{ $order->status }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Refunded Amount</div>
                    <div>₹ {{ $payments->refunded_amount ?? '00.00' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Refund Note</div>
                    <div>{{ $payments->refund_note }}</div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Updated At</div>
                    <div>{{ $payments->updated_at }}</div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Customer Type</div>
                    <div>{{ $payments->customer_type }}</div>
                </div>
                <div class="col-md-4">
                    <div class="datatitel">Metadata</div>
                    <div>{{ $payments->metadata }}</div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
 <div class="col-md-3 right-sidebar d-flex flex-column-reverse flex-md-column">
                        <div class="form-actions-wrapper">
                            <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
                                <div class="widget-title">
                                    <h4>
                                        <span>Publish</span>
                                    </h4>
                                </div>
                                <div class="widget-body">
                                    <div class="btn-set">
                                        <button type="submit" name="submit" value="save" class="btn btn-info">
                                            <i class="fa fa-save"></i> Save &amp; Exit
                                        </button> &nbsp;
                                        <button type="submit" name="submit" value="apply" class="btn btn-success">
                                            <i class="fa fa-check-circle"></i> Save
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-side-meta-boxes">
                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="status" class="control-label required"
                                            aria-required="true">Status</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="ui-select-wrapper form-group ">
                                        <select class="form-control ui-select" v-pre="" id="status" name="status">
                                            <option value="published"
                                                {{ $payments->status == 'published' ? 'selected' : '' }}>
                                                Published</option>
                                            <option value="draft" {{ $payments->status == 'draft' ? 'selected' : '' }}>
                                                Draft
                                            </option>
                                            <option value="pending"
                                                {{ $payments->status == 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                        </select>
                                        <svg class="svg-next-icon svg-next-icon-size-16">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                            </svg>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        </div>
    </div>
                    </div>
@endsection
