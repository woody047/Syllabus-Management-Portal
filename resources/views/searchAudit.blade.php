@extends('layouts.auth')

@section('content')
<head>
    <link rel="stylesheet" href="{{url('css/audit.css')}}" />
</head>

<div class="main">
    <body>
        <h1>Search Results for "{{$keyword}}"</h1>
        <div class="search-container">
            <form action="{{route('searchAudit')}}" method="GET" class="searchAudit">
                <div class="search">
                    <input type="text" id="search-input" placeholder="Search by Code or Course Name" name="keyword">
                    <button id="search-button" type="submit"> Search</button>
                </div>
            </form>
            <a href="/home">Back</a>
        </div>
        @if(count($audit)>0)
        <div class="table-container">
        <table>
            <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">Action</th>
                <th scope="col">Time</th>
                <th scope="col">Old Values</th>
                <th scope="col">New Values</th>
            </tr>
            </thead>
            <tbody id="audits">
                @foreach($audits as $audit)
                <tr>
                <td>{{ $audit->user->name }}</td>
                <td>{{ $audit->event }}</td>
                <td>{{ $audit->created_at }}</td>
                <td>
                    <table class="table">
                    @foreach($audit->old_values as $attribute => $value)
                        <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value }}</td>
                        </tr>
                    @endforeach
                    </table>
                </td>
                <td>
                    <table class="table">
                    @foreach($audit->new_values as $attribute => $value)
                        <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value }}</td>
                        </tr>
                    @endforeach
                    </table>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        @else
            <p>No audit log found matching "{{$keyword}}"</p>
        @endif
    </body>
</div>
@endsection
