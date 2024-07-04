@extends('admin.layout.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<form action="" method="post" enctype="multipart/form-data">
    @csrf

    <div class="container mt-4">
        <div class="pageinfo">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                    <li class="breadcrumb-item">Ecommerce</li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.ecommerce.reports') }}">Reports</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                </ol>
            </nav>
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
<div class="mb-3" style="
    display: flex;
    justify-content: flex-end;
    align-items: baseline;
    flex-wrap: nowrap;
">
            <input class="form-control w-25" type="datetime-local" id="dateTimeInput" value="">
        </div>

        <div class="row mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sales Reports</h5>
                        <canvas id="salesChart"></canvas>
                        <p class="mt-3">Items Earning Sales: ₹12,500.00</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 position-relative  ">
                    <div class="card-body text-center p-5 position-absolute top-50 start-50 translate-middle ">
                        <h5 class="card-title">Earnings</h5>
                        <i class="fas fa-wallet fa-2x mb-2"></i>
                        <p class="mb-0">₹12,500.00</p>
                        <p class="text-muted">Total Earnings</p>
                        <div class="d-flex justify-content-center mt-3">
                            <div class="me-3">
                                <span class="badge py-2 bg-success"> </span>
                                <p class="d-inline">₹8,000.00 Completed</p>
                            </div>
                            <div>
                                <span class="badge bg-danger py-2"> </span>
                                <p class="d-inline">₹4,500.00 Pending</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="card p-3">

        <div class="table-responsive mb-4">
            <h5>Sales Data</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Amount (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01 May</td>
                        <td>Product 1</td>
                        <td>10</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>02 May</td>
                        <td>Product 2</td>
                        <td>15</td>
                        <td>1500</td>
                    </tr>
                    <tr>
                        <td>03 May</td>
                        <td>Product 3</td>
                        <td>20</td>
                        <td>1800</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
    </div>
</form>

<script>
    window.onload = function () {
        const salesChartCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesChartCtx, {
            type: 'line',
            data: {
                labels: ["01 May", "02 May", "03 May", "04 May", "05 May", "06 May", "07 May", "08 May", "09 May", "10 May", "11 May", "12 May", "13 May", "14 May", "15 May", "16 May", "17 May", "18 May", "19 May", "20 May", "21 May", "22 May", "23 May", "24 May", "25 May", "26 May", "27 May", "28 May", "29 May", "30 May"],
                datasets: [{
                    label: 'Items Earning Sales',
                    data: [1200, 1500, 1800, 1700, 1600, 1900, 2000, 2100, 2200, 2300, 2400, 2500, 2600, 2700, 2800, 2900, 3000, 3100, 3200, 3300, 3400, 3500, 3600, 3700, 3800, 3900, 4000, 4100, 4200, 4300],
                    borderColor: 'rgba(255, 206, 86, 1)',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    };

    document.addEventListener('DOMContentLoaded', (event) => {
        const now = new Date();
        const formattedDate = now.getFullYear() + "-" + String(now.getMonth() + 1).padStart(2, '0') + "-" + String(now.getDate()).padStart(2, '0');
        const formattedTime = String(now.getHours()).padStart(2, '0') + ":" + String(now.getMinutes()).padStart(2, '0');
        const dateTime = formattedDate + "T" + formattedTime;
        document.getElementById("dateTimeInput").value = dateTime;
    });
</script>

@endsection
