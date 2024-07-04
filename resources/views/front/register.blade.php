@extends('front.layout.app')

@section('content')
    <main>

        <section class="Return-policy">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="loca">
                            <h6>HOME > <span>My Account</span></h6>
                        </div>
                        <div class="return">
                            <div class="Return-Warranty-head">
                                <h1>Register</h1>
                            </div>
                            <div class="Return-Warranty-inner">
                                <p>
                                    {{-- {!! $page_info->info !!} --}}
                                    {{-- <i class="fa fa-pen"></i> Edit --}}
                                </p>
                            </div>
                        </div>

                    </div>

                    {{-- for register --}}
                    <div class="">
                        <form action="{{ route('register_newUser') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="col-md-4">
                                <label class="control-label  required " for="name" aria-required="true">Name:</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="control-label  required " for="name" aria-required="true">Email:</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="control-label  required " for="name" aria-required="true">Phone:</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="control-label  required " for="name"
                                    aria-required="true">Password:</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="control-label  required " for="name" aria-required="true">Confirm
                                    Password:</label>
                                <input type="password" name="cpassword" class="form-control">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <p>Already registered? <a href="{{ route('myaccount') }}" style="color: blue;"> click here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
