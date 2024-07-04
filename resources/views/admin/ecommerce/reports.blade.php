@extends('admin.layout.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
     .card {
          margin-bottom: 20px;
     }

     .card .card-body {
          display: flex;
          align-items: center;
          justify-content: center;
     }

     .card .card-body .icon {
          font-size: 2rem;
          margin-right: 15px;
     }

     .card .card-body .info {
          text-align: center;
     }

     .card .card-body .info h5 {
          margin: 0;
          font-size: 1.25rem;
     }

     .card .card-body .info p {
          margin: 0;
          font-size: 1.5rem;
     }

     .navbar {
          margin-bottom: 20px;
     }

     .datepicker-dropdown {
          z-index: 1050 !important;
     }

     .sales-report {
          margin-top: 20px;
     }

     .earnings {
          padding: 10px;
     }

     .earnings .status {
          margin-top: 10px;
     }

     .legend {
          display: flex;
          align-items: center;
     }

     .legend span {
          display: inline-block;
          width: 15px;
          height: 15px;
          border-radius: 50%;
          margin-right: 5px;
     }

     .legend .completed {
          background-color: green;
     }

     .legend .pending {
          background-color: red;
     }

     .table-container {
          margin-top: 20px;
     }

     .table-container h5 {
          margin-bottom: 15px;
     }

     .table {
          margin-bottom: 0;
     }

     .no-data {
          text-align: center;
          padding: 20px;
     }
</style>


<form action="" method="post" enctype="multipart/form-data">
     @csrf

     <div class="main-panel">
          <div class="pagesbodyarea">
               <div class="pageinfo">
                    <ul class="d-flex">
                         <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i
                                        class="fa-solid fa-house"> </i> Dashboard /</a></li>
                         <li><a class="breadcrumb-item">Ecommerce /</a></li>
                         <li><a href="{{ route('admin.ecommerce.reports') }}" class="breadcrumb-item">repots /</a>
                         </li>
                         <li><a class="breadcrumb-item">report</a></li>
                    </ul>
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

               <div class="container">
<input class="form-control w-25 mb-5" type="datetime-local" id="dateTimeInput" value="" style="float: right;">
<br>
<br>
                    <div class="row mt-5">
                         <div class="col-md-3">
                              <div class="card text-center">
                                   <div class="card-body">
                                        <div class="icon">
                                             <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="info">
                                             <h5 class="card-title">Revenue</h5>
                                             <p class="card-text">₹0.00</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-md-3">
                              <div class="card text-center">
                                   <div class="card-body">
                                        <div class="icon">
                                             <i class="fas fa-database"></i>
                                        </div>
                                        <div class="info">
                                             <h5 class="card-title">Products</h5>
                                             <p class="card-text">0</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-md-3">
                              <div class="card text-center">
                                   <div class="card-body">
                                        <div class="icon">
                                             <i class="fas fa-users"></i>
                                        </div>
                                        <div class="info">
                                             <h5 class="card-title">Customers</h5>
                                             <p class="card-text">0</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-md-3">
                              <div class="card text-center">
                                   <div class="card-body">
                                        <div class="icon">
                                             <i class="fas fa-shopping-bag"></i>
                                        </div>
                                        <div class="info">
                                             <h5 class="card-title">Orders</h5>
                                             <p class="card-text">0</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                  

                    <div class="row">
                         <div class="col-md-6">
                              <div class="card">
                                   <div class="card-body">
                                        {{-- <h5 class="card-title">Customers</h5> --}}
                                        <canvas id="customersChart"></canvas>
                                   </div>
                              </div>
                         </div>
                         <div class="col-md-6">
                              <div class="card">
                                   <div class="card-body">
                                        {{-- <h5 class="card-title">Orders</h5> --}}
                                        <canvas id="ordersChart"></canvas>
                                   </div>
                              </div>
                         </div>
                    </div>
                  
                    <div class="wrapper-content pd-all-20">

                         <div class="row">
                              <div class="col-md-8">

                                   <h5>Sales Reports</h5>
                                   <canvas id="salesChart"></canvas>
                                   <p>Items Earning Sales: ₹0.00</p>
                              </div>
                              <div class="col-md-4">
                                   <h5>Earnings</h5>
                                   <div class="earnings">
                                        <div class="info">
                                             <i class="fas fa-wallet icon"></i>
                                             <p>₹0.00</p>
                                             <p>Total Earnings</p>
                                        </div>
                                        <div class="status">
                                             <div class="legend">
                                                  <span class="completed"></span>
                                                  <p>₹0.00 Completed</p>
                                             </div>
                                             <div class="legend">
                                                  <span class="pending"></span>
                                                  <p>₹0.00 Pending</p>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                  
                         <div class="row">
                              <div class="col-md-12 table-container">
                                <div class="wrapper-content pd-all-20">
                                   <h5>Recent Orders</h5>
                                   <table class="table ">
                                        <thead>
                                             <tr>
                                                  <th>ID</th>
                                                  <th>Customer</th>
                                                  <th>Amount</th>
                                                  <th>Payment Method</th>
                                                  <th>Payment Status</th>
                                                  <th>Status</th>
                                                  <th>Created At</th>
                                                  <th>Store</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                                  <td colspan="8" class="no-data">No data to display</td>
                                             </tr>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
                  

                    <div class="row">
                              <div class="col-md-6 table-container">
                         <div class="wrapper-content pd-all-20">
                                   <h5>Top Selling Products</h5>
                                   <table class="table ">
                                        <thead>
                                             <tr>
                                                  <th>Product ID</th>
                                                  <th>Product Name</th>
                                                  <th>Quantity</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                                  <td colspan="3" class="no-data">No data to display</td>
                                             </tr>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <div class="col-md-6 table-container">
                              <div class="wrapper-content pd-all-20">

                                   <h5>Trending Products</h5>
                                   <table class="table ">
                                        <thead>
                                             <tr>
                                                  <th>ID</th>
                                                  <th>Product Name</th>
                                                  <th>Views</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                                  <td>1</td>
                                                  <td>Carzex 720p AHD Car Rear View Camera for 9 inch Android Screens
                                                       for Car (8 LED/Drill Type/AHD-25 FPS)</td>
                                                  <td><i class="fas fa-eye"></i> 0</td>
                                             </tr>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
</form>

<script>
     window.onload = function () {
          const customersChartCtx = document.getElementById('customersChart').getContext('2d');
          const customersChart = new Chart(customersChartCtx, {
               type: 'line',
               data: {
                    labels: [1, 2, 3, 4, 5],
                    datasets: [{
                         label: 'Customers',
                         data: [0, 0, 0, 0, 0],
                         borderColor: 'rgba(75, 192, 192, 1)',
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

          const ordersChartCtx = document.getElementById('ordersChart').getContext('2d');
          const ordersChart = new Chart(ordersChartCtx, {
               type: 'line',
               data: {
                    labels: [1, 2, 3, 4, 5],
                    datasets: [{
                         label: 'Orders',
                         data: [0, 0, 0, 0, 0],
                         borderColor: 'rgba(153, 102, 255, 1)',
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

          const salesChartCtx = document.getElementById('salesChart').getContext('2d');
          const salesChart = new Chart(salesChartCtx, {
               type: 'line',
               data: {
                    labels: ["01 May", "02 May", "03 May", "04 May", "05 May", "06 May", "07 May", "08 May", "09 May", "10 May", "11 May", "12 May", "13 May", "14 May", "15 May", "16 May", "17 May", "18 May", "19 May", "20 May", "21 May", "22 May", "23 May", "24 May", "25 May", "26 May", "27 May", "28 May", "29 May", "30 May"],
                    datasets: [{
                         label: 'Items Earning Sales',
                         data: Array(30).fill(0),
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
</script>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    // Get current date and time
    const now = new Date();

    // Format the date and time as required by datetime-local input
    const formattedDate = now.getFullYear() + "-" + String(now.getMonth() + 1).padStart(2, '0') + "-" + String(now.getDate()).padStart(2, '0');
    const formattedTime = String(now.getHours()).padStart(2, '0') + ":" + String(now.getMinutes()).padStart(2, '0');

    // Combine date and time
    const dateTime = formattedDate + "T" + formattedTime;

    // Set the value of the input field
    document.getElementById("dateTimeInput").value = dateTime;
  });
</script>
@endsection