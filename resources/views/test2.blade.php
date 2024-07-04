<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image upload test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">

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

        <form class="form-control" action="{{ route('admin.ecommerce.test') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <label for="single">Single Image</label><br>
            <input type="file" name="single" id="single">
            <br><br><br>
            <label for="multiple">Multiple Images</label><br>
            <input type="file" name="multiple[]" id="multiple" multiple>
            <br><br><br>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>


    </div>


    <div class="container">
        <h1>Images</h1>
        <div class="mt-5">
            <table class="table table-bordered">
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Single
                    </th>
                    <th>
                        Multiple
                    </th>
                </tr>
                <tbody>
                    @foreach ($singles as $item)
                        <tr>
                            <td class="col-2">
                                {{ $item->id }}
                            </td>
                            <td class="col-5">
                                @if ($item->single)
                                    <img src="{{ asset('uploads/' . $item->single) }}" alt="" width="250"
                                        height="250">
                                @endif
                            </td>
                            <td class="col-5">
                                <div class="d-flex">
                                    @if ($item->multiple)
                                        @foreach (explode(',', $item->multiple) as $url)
                                            <div class="m-2">
                                                <img src="{{ asset('uploads/' . trim($url)) }}" alt=""
                                                    width="100" height="100">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
