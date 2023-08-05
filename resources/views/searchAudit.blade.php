@extends('layouts.auth')

@section('content')
<head>
    <link rel="stylesheet" href="{{ url('css/audit.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">    
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
                <th scope="col" class="text-center">Course Code</th>
                <th scope="col" class="text-center">Course Name</th>
                <th scope="col" class="text-center">User</th>
                <th scope="col" class="text-center">Action</th>
                <th scope="col" class="text-center">Time</th>
                <th scope="col" class="text-center">Old Values</th>
                <th scope="col" class="text-center">New Values</th>
            </tr>
            </thead>
            <tbody id="audits">
                @foreach($audit as $audits)
                <tr>
                <td>
                <!-- If the auditable type is 'App\Models\Course' and there is an actual auditable model instance present
                , then proceed to display the course code and course name -->
                    @if ($audits->auditable_type === 'App\Models\Course' && $audits->auditable)
                        {{ $audits->auditable->course_code }}
                    @endif
                </td>
                <td>
                <!-- If the auditable type is 'App\Models\Course' and there is an actual auditable model instance present
                , then proceed to display the course code and course name -->
                    @if ($audits->auditable_type === 'App\Models\Course' && $audits->auditable)
                        {{ $audits->auditable->course_name }}
                    @endif
                </td>
                <td>{{ $audits->user->name }}</td>
                <td>{{ $audits->event }}</td>
                <td>{{ $audits->created_at }}</td>
                <td>
                    <button class="btn btn-link" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOldValues{{ $audits->id }}" aria-expanded="false">
                        Expand/Collapse
                    </button>
                    <div class="collapse" id="collapseOldValues{{ $audits->id }}">
                        <table class="table">
                            @foreach ($audits->old_values as $attribute => $value)
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
                            data-bs-target="#collapseNewValues{{ $audits->id }}" aria-expanded="false">
                        Expand/Collapse
                    </button>
                    <div class="collapse" id="collapseNewValues{{ $audits->id }}">
                        <table class="table">
                            @foreach ($audits->new_values as $attribute => $value)
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
            <span>
                {{$audit->links()}}
            </span>
            </tbody>
        </table>
        </div>
        @else
            <p>No audit log found matching "{{$keyword}}"</p>
        @endif
    </body>
</div>
@endsection
