<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fullscreen-preview {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            text-align: center;
        }

        .fullscreen-preview img {
            max-width: 90%;
            max-height: 90%;
            margin: auto;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-5">

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

                <div class="card">
                    <div class="card-header">
                        <h4>Login Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ 'login' }}" class="btn btn-primary">Login</a>
                        <a href="{{ 'register' }}" class="btn btn-dark">Register</a>
                        {{-- <form action="{{ url('customer-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="excel_file" class="form-control">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <table class="table table-striped table-hover vertical-middle dataTable no-footer dtr-inline">
                    <thead>
                        <tr role="row">
                            <th class="table-check-all">Name</th>
                            <th class="table-check-all">Picture</th>
                            <th class="table-check-all">Age</th>
                            <th class="table-check-all">Contact</th>
                            <th class="table-check-all">Uploaded At</th>
                            <th class="table-check-all">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $item)
                            <tr role="row">
                                <td class="text-start">{{ $item->name }}</td>
                                <td class="text-start">
                                    <img src="{{ $item->image }}" alt="" class="profile" width="150"
                                        onclick="showFullScreenImage('{{ $item->image }}')">
                                </td>
                                <td class="text-start">{{ $item->age }}</td>
                                <td class="text-start">{{ $item->phone }}</td>
                                <td class="text-start">
                                    {{ $item->created_at->format('d-m-Y h:i A') }}
                                </td>
                                <td class="text-start">
                                    {{ $item->updated_at->format('d-m-Y h:i A') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    <!-- Fullscreen preview modal -->
    <div class="fullscreen-preview" id="fullscreen-preview">
        <img src="" alt="Full-Screen Preview">
    </div>

    <script>
        function showFullScreenImage(imageSrc) {
            var fullscreenPreview = document.getElementById('fullscreen-preview');
            var fullscreenImage = fullscreenPreview.querySelector('img');
            fullscreenImage.src = imageSrc;
            fullscreenPreview.style.display = 'block';
        }

        document.getElementById('fullscreen-preview').addEventListener('click', function() {
            this.style.display = 'none';
        });
    </script>

</body>

</html>
