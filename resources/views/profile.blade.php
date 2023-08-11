@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/profile.css')}}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="main"> 
<body>
        <div class="create-container">
            <h1>Profile > {{ Auth::user()->name }}</h1>
                <a href="/home">Back</a>
        </div>
</body>
</div>

@endsection