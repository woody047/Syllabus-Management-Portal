@extends('layouts.auth')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ url('css/profile.css') }}" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <div class="main">

        <body>
            <div class="create-container">
                <h1>Profile > {{ Auth::user()->name }}</h1>
                <a href="/profile">Back</a>
            </div>
            <form method="POST" action="{{ route('saveProfile') }}"
                onsubmit="return confirm('Are you sure you want to save changes?');">
                @csrf
                <div class="profile row mt-2">
                    <h1>Personal Information</h1>
                    <hr>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h4 class="mb-0">Name</h4>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input value="{{ Auth::user()->name }}"></input>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h4 class="mb-0">Email</h4>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input value="{{ Auth::user()->email }}"></input>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h4 class="mb-0">Password</h4>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="password" required autocomplete="current-password"
                                            class="detail-field-input" placeholder="New Password"><hr>
                                        <input type="password" name="password_confirmation" required autocomplete="current-password"
                                            class="detail-field-input @error('password') is-invalid @enderror" placeholder="Confirm Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="/profile">
                                            <button type="button" class="btn btn-danger" >Cancel</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </body>
    </div>
@endsection
