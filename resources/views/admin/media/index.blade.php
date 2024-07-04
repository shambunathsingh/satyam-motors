@extends('admin.layout.app')

@section('content')
    <div>
        <div class="main-panel">

            <ol class="breadcrumb">
                <li class="breadcrumb-item "><span style="color: black; margin-right: 3px;"><i
                            class="fa fa-home"></i></span>Dashboard</li>
                <li class="breadcrumb-item active">Media
                </li>
            </ol>



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

            <div id="main">

                <div class="rv-media-container" data-breadcrumb-count="1" data-allow-upload="true" data-view-in="all_media">
                    <div class="rv-media-wrapper">

                        <div class="rv-media-main-wrapper">
                            <header class="rv-media-header">
                                <div class="rv-media-top-header">
                                    <div class="rv-media-actions">

                                        <form id="uploadForm" method="POST" action="{{ route('admin.save_media') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="media_gallery[]" id="media_gallery"
                                                style="display: none;" multiple onchange="submitForm()">
                                            <button class="btn btn-success js-download-action" type="button"
                                                onclick="document.getElementById('media_gallery').click();">
                                                <i class="fas fa-cloud-upload-alt"></i> Upload
                                            </button>
                                        </form>

                                        <button class="btn btn-success js-download-action" type="button"
                                            onclick="document.getElementById('dowloadImageButton').click();">
                                            <i class="fas fa-cloud-download-alt"></i> Download
                                        </button>
                                        <button class="btn btn-success js-create-folder-action" type="button">
                                            <i class="fa fa-folder"></i> Create folder
                                        </button>
                                        <button class="btn btn-success js-change-action" data-type="refresh">
                                            <i class="fas fa-sync"></i> Refresh
                                        </button>

                                        <div class="btn-group" role="group">
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-success dropdown-toggle js-rv-media-change-filter-group js-filter-by-type"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-filter"></i> Filter <span
                                                        class="js-rv-media-filter-current">(
                                                        <i class="fa fa-recycle"></i> Everything
                                                        )</span>
                                                </button>
                                                <ul class="dropdown-menu" style="">
                                                    <li class="active">
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="filter" data-value="everything">
                                                            <i class="fa fa-recycle"></i> Everything
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="filter" data-value="image">
                                                            <i class="fa fa-file-image"></i> Image
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="filter" data-value="video">
                                                            <i class="fa fa-file-video"></i> Video
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="filter" data-value="document">
                                                            <i class="fa fa-file"></i> Document
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-success dropdown-toggle js-rv-media-change-filter-group js-filter-by-view-in"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-eye"></i> View in <span
                                                        class="js-rv-media-filter-current">(
                                                        <i class="fa fa-globe"></i> All media
                                                        )</span>
                                                </button>
                                                <ul class="dropdown-menu" style="">
                                                    <li class="active">
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="view_in" data-value="all_media">
                                                            <i class="fa fa-globe"></i> All media
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="view_in" data-value="trash">
                                                            <i class="fa fa-trash"></i> Trash
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="view_in" data-value="recent">
                                                            <i class="fa fa-clock"></i> Recent
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="view_in" data-value="favorites">
                                                            <i class="fa fa-star"></i> Favorites
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="rv-media-search">
                                        <form class="input-search-wrapper" action="" method="GET">
                                            <input type="text" class="form-control"
                                                placeholder="Search in current folder">
                                            <button class="btn btn-link" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="rv-media-bottom-header">
                                    <div class="rv-media-breadcrumb">
                                        <ul class="breadcrumb">
                                            <li>
                                                <a href="#" data-folder="0" class="js-change-folder"><i
                                                        class="fa fa-user-secret"></i> All media</a> / <span>Icons</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rv-media-tools">
                                        <div class="btn-group" role="group">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Sort <i class="fa fa-sort-alpha-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" style="">
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="sort_by" data-value="name-asc">
                                                            <i class="fas fa-sort-alpha-up"></i> File
                                                            name - ASC
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="sort_by" data-value="name-desc">
                                                            <i class="fas fa-sort-alpha-down"></i> File
                                                            name - DESC
                                                        </a>
                                                    </li>
                                                    <!-- <li role="separator" class="divider"></li> -->
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="sort_by" data-value="created_at-asc">
                                                            <i class="fas fa-sort-numeric-up"></i>
                                                            Uploaded date - ASC
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="sort_by" data-value="created_at-desc">
                                                            <i class="fas fa-sort-numeric-down"></i>
                                                            Uploaded date - DESC
                                                        </a>
                                                    </li>
                                                    <!-- <li role="separator" class="divider"></li> -->
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="sort_by" data-value="size-asc">
                                                            <i class="fas fa-sort-numeric-up"></i> Size
                                                            - ASC
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="js-rv-media-change-filter"
                                                            data-type="sort_by" data-value="size-desc">
                                                            <i class="fas fa-sort-numeric-down"></i>
                                                            Size - DESC
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown rv-dropdown-actions mx-2">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown">
                                                    Actions &nbsp;<i class="fa fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="javascript:;" class="js-files-action"
                                                            data-action="preview">
                                                            <i class="fa fa-eye"></i> Preview
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:;" class="js-files-action"
                                                            data-action="crop">
                                                            <i class="fa fa-crop"></i> Crop
                                                        </a>
                                                    </li>
                                                    <!-- <li role="separator" class="divider"></li> -->
                                                    <li>
                                                        <a href="javascript:;" class="js-files-action"
                                                            data-action="copy_link">
                                                            <i class="fa fa-link"></i> Copy link
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:;" class="js-files-action"
                                                            data-action="rename">
                                                            <i class="far fa-edit"></i> Rename
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:;" class="js-files-action"
                                                            data-action="make_copy">
                                                            <i class="fa fa-copy"></i> Make a copy
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:;" class="js-files-action"
                                                            data-action="alt_text">
                                                            <i class="fas fa-file-signature"></i> Alt
                                                            text
                                                        </a>
                                                    </li>
                                                    <!-- <li role="separator" class="divider"></li> -->
                                                    <li>
                                                        <a href="javascript:;" class="js-files-action"
                                                            data-action="favorite">
                                                            <i class="fa fa-star"></i> Add to favorite
                                                        </a>
                                                    </li>
                                                    <!-- <li role="separator" class="divider"></li> -->
                                                    <li>
                                                        <a href="javascript:;" class="js-files-action"
                                                            data-action="download">
                                                            <i class="fa fa-download"></i> Download
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:;" class="js-files-action"
                                                            data-action="trash">
                                                            <i class="fa fa-trash"></i> Move to trash
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="btn-group js-rv-media-change-view-type mx-0" role="group">
                                            <button class="btn btn-secondary active" type="button" data-type="tiles">
                                                <i class="fa fa-th-large"></i>
                                            </button>
                                            <button class="btn btn-secondary" type="button" data-type="list">
                                                <i class="fa fa-th-list"></i>
                                            </button>
                                        </div>
                                        <label for="media_details_collapse" class="btn btn-link collapse-panel">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </label>
                                    </div>
                                </div>
                            </header>

                            <main class="rv-media-main">
                                <div class="rv-media-items has-items">
                                    <div class="rv-media-grid">
                                        <form id="downloadForm" action="{{ route('admin.download_images') }}"
                                            method="POST">
                                            @csrf
                                            <div class="row flex flex-wrap">
                                                @foreach ($medias as $item)
                                                    <div class="col-md-2">
                                                        <input type="checkbox" name="selectedImages[]"
                                                            value="{{ $item->images }}">
                                                        <a href="{{ url('uploads/' . $item->images) }}" target="_blank">
                                                            <div class="fileboxes">
                                                                <div class="bximg">
                                                                    <img src="{{ url('uploads/' .$item->images) }}" height="100"
                                                                        alt="">
                                                                </div>
                                                                <div class="bxttk" style="overflow: hidden;">
                                                                    <p>{{ $item->name }}</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                                <button type="submit" id="dowloadImageButton"
                                                    style="display: none;">Download Selected Images</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>











                            </main>


                        </div>


                    </div>
                </div>
                </form>
            @endsection


            @section('scripts')
                <script>
                    function submitForm() {
                        document.getElementById('uploadForm').submit();
                    }
                </script>

                <script>
                    document.getElementById('downloadForm').addEventListener('submit', function(e) {
                        e.preventDefault(); // prevent the default form submission

                        let form = this;
                        let selectedImages = form.querySelectorAll('input[name="selectedImages[]"]:checked');

                        if (selectedImages.length === 0) {
                            alert("Please select at least one image to download.");
                            return;
                        }

                        let imageUrls = [];
                        selectedImages.forEach(function(image) {
                            imageUrls.push(image.value);
                        });

                        // Send the selected image URLs to the server for download
                        fetch(form.action, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                                },
                                body: JSON.stringify({
                                    images: imageUrls
                                })
                            })
                            .then(response => response.blob())
                            .then(blob => {
                                // Create a temporary link element to trigger the download
                                let url = window.URL.createObjectURL(blob);
                                let a = document.createElement('a');
                                a.style.display = 'none';
                                a.href = url;
                                a.download = 'selected_images.zip';
                                document.body.appendChild(a);
                                a.click();
                                window.URL.revokeObjectURL(url);
                            })
                            .catch(error => {
                                console.error('Error downloading images:', error);
                            });
                    });
                </script>
            @endsection
