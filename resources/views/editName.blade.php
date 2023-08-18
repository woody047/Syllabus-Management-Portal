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
                <h1>Profile > {{ Auth::user()->name }} > Edit Name</h1>
            </div>
            <form method="POST" action="{{ route('saveName') }}">
                @csrf
                <div class="profile row mt-2">
                    <h1>Edit Name</h1>
                    <hr>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h4 class="mb-0">Name</h4>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="name" value="{{ Auth::user()->name }}" required></input>
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
