@extends('admin.layout.app')

@section('content')
<style>
    .message-content {
    background: rgba(0, 0, 0, .05);
    border-radius: 5px;
    font-family: Roboto, sans-serif;
    padding: 15px;
    font-size: 14px;
   
}

</style>
      <form action="{{ route('admin.ecommerce.update_contact', ['id' => $contact->id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="main-panel">
            <div class="pagesbodyarea">
                <div class="pageinfo">
                    <ul class="d-flex">
                        <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="fa-solid fa-house"> </i>
                                Dashboard
                                /</a>
                        </li>
                        <li><a class="breadcrumb-item">Ecommerce
                                /</a>
                        </li>
                        <li><a href="{{ route('admin.ecommerce.contact') }}" class="breadcrumb-item">Contact
                                /</a>
                        </li>
                        <li><a class="breadcrumb-item">Edit Contact</a>
                        </li>
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
                <!-- todo edit main body ara -->
                <div class="row">
                   <div class="col-md-9">
                        <div class="widget meta-boxes" style="margin-top: 0">
                        <div class="widget-title">
                            <h4>
                                <span>Contact information</span>
                            </h4>
                        </div>
                        <div class="widget-body">
                            <p>Time: <i>{{ $contact->created_at }}</i></p>
                            <p>Full Name: <i>{{ $contact->name }}</i></p>
                            <p>Email: <i><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></i></p>
                            <p>Phone: <i><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></i></p>
                            <p>Address: <i>{{ $contact->address }}</i></p>
                            <p>Subject: <i>{{ $contact->subject }}</i></p>
                            <p><b>Content:</b></p>
                            <pre class="message-content">{{ $contact->content }}</pre>
                        </div>
                    </div>

                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4>
                                    <span>Replies</span>
                                </h4>
                            </div>
                            <div class="widget-body">
                                <div class="answer-wrapper">
                                    <div class="form-group mb-3">
                                        <textarea without-buttons="" class="form-control form-control editor-ckeditor ays-ignore" id="message" rows="4" name="message" cols="50" spellcheck="false" data-ms-editor="true"></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="hidden" value="2" id="input_contact_id">
                                        <button class="btn btn-success bg-success answer-send-button"><i class="fas fa-reply"></i> Send</button>
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
                                        <select class="form-control ui-select" v-pre="" id="status"
                                            name="status">
                                            <option value="read"
                                                {{ $contact->status == 'read' ? 'selected' : '' }}>
                                                Read</option>
                                            <option value="unread" {{ $contact->status == 'unread' ? 'selected' : '' }}>
                                                Unread
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
            </div>
        </div>
    </form>
@endsection