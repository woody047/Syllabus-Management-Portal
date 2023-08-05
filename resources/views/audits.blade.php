@extends('layouts.auth')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ url('css/audit.css') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">    
    </head>

    <div class="main">

        <body>
            <h1>Audit Logs</h1>
            <div class="search-container">
                <form action="{{ route('searchAudit') }}" method="GET" class="searchAudit">
                    <div class="search">
                        <input type="text" id="search-input" placeholder="Search by Code or Course Name" name="keyword">
                        <button id="search-button" type="submit"> Search</button>
                    </div>
                </form>
                <a href="/home">Back</a>
            </div>

            <div class="table-container">
                <table>
                    @if (count($audits) > 0)
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">User</th>
                                <th scope="col" class="text-center">Action</th>
                                <th scope="col" class="text-center">Time</th>
                                <th scope="col" class="text-center">Old Values</th>
                                <th scope="col" class="text-center">New Values</th>
                            </tr>
                        </thead>
                        <tbody id="audits">
                            @foreach ($audits as $audit)
                                <tr>
                                    <td>{{ $audit->user->name }}</td>
                                    <td>{{ $audit->event }}</td>
                                    <td>{{ $audit->created_at }}</td>
                                    <td>
                                        <button class="btn btn-link" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOldValues{{ $audit->id }}" aria-expanded="false">
                                            Expand/Collapse
                                        </button>
                                        <div class="collapse" id="collapseOldValues{{ $audit->id }}">
                                            <table class="table">
                                                @foreach ($audit->old_values as $attribute => $value)
                                                    <tr>
                                                        <td><b>{{ $attribute }}</b></td>
                                                        <td>{{ $value }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-link" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseNewValues{{ $audit->id }}" aria-expanded="false">
                                            Expand/Collapse
                                        </button>
                                        <div class="collapse" id="collapseNewValues{{ $audit->id }}">
                                            <table class="table">
                                                @foreach ($audit->new_values as $attribute => $value)
                                                    <tr>
                                                        <td><b>{{ $attribute }}</b></td>
                                                        <td>{{ $value }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <p>No audit logs recorded</p>
                    @endif
                </table>
            </div>
        </body>
    </div>
@endsection
