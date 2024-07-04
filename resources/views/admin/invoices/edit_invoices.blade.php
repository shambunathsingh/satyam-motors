@extends('admin.layout.app')

@section('content')
<style>
    tr th {
    color: #696969;
    font-size: 14px;
    font-weight: 100;
}
</style>
<div id="main">
    <div class="card">
        <div class="card-body">
            <div class="invoice-info py-3 px-5">
                <div class="mb-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <!-- Empty div for potential future content -->
                        </div>
                        <div class="col-md-6 text-end">
                            <h2 class="mb-0 uppercase">Invoice</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Empty div for potential future content -->
                        </div>
                        <div class="col-md-6 text-end">
                            <ul class="mb-0">
                                <li>{{ $edit_invoices->first_name }} {{ $edit_invoices->last_name }}</li>
                                <li>{{ $edit_invoices->email }}</li>
                                <li>{{ $edit_invoices->phone }}</li>
                                <li>{{ $edit_invoices->street_address }}, {{ $edit_invoices->town_city }}, {{ $edit_invoices->state }}, {{ $edit_invoices->pin_code }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-lg-4">
                        <strong class="text-brand">Invoice Code:</strong> INV{{ $edit_invoices->id }}
                    </div>
                    <div class="col-lg-4">
                        <strong class="text-brand">Issue At:</strong> {{ $edit_invoices->created_at->format('d M, Y') }}
                    </div>
                    <div class="col-lg-4">
                        <strong class="text-brand">Payment Method:</strong> COD
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <table class="table table-striped mb-3">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Qty</th>
                            <th class="text-center">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($edit_invoices->productOrders as $productOrder)
                            <tr>
                                <td style="width: 70%">
                                    <p class="mb-0">{{ $productOrder->description }}</p>
                                </td>
                                <td style="width: 5%">{{ $productOrder->quantity }}</td>
                                <td style="width: 25%" class="text-center">₹{{ number_format($productOrder->subtotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" class="text-end">Sub Total:</th>
                            <th class="text-center">₹{{ number_format($edit_invoices->productOrders->sum('subtotal'), 2) }}</th>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-end">Grand Total:</th>
                            <th class="text-center">₹{{ number_format($edit_invoices->productOrders->sum('subtotal'), 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Invoice For</h5>
                        <p class="font-sm">
                            <strong>Issue At:</strong> {{ $edit_invoices->created_at->format('d M, Y') }}<br>
                        </p>
                    </div>
                    <div class="col-md-6 text-end">
                        <h5>Total Amount</h5>
                        <h3 class="mt-0 mb-0 text-danger">₹{{ number_format($edit_invoices->productOrders->sum('subtotal'), 2) }}</h3>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{route('admin.ecommerce.show_invoices', ['id' => $edit_invoices->id])}}" target="_blank" class="btn btn-icon btn-sm btn-danger bg-danger deleteDialog">
                <i class="fas fa-print"></i> Print Invoice
            </a>
            <a href="{{route('admin.ecommerce.download_invoices', ['id' => $edit_invoices->id])}}" target="_blank" class="btn bg-primary btn-success">
                <i class="fas fa-download"></i> Download Invoice
            </a>
        </div>
    </div>
</div>
@endsection
