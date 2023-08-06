@extends('layouts.auth')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ url('css/audit.css') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                            @foreach ($audits as $audit)
                                <tr>
                                    <td>
                                    <!-- If the auditable type is 'App\Models\Course' and there is an actual auditable model instance present
                                    , then proceed to display the course code and course name -->
                                        @if ($audit->auditable_type === 'App\Models\Course' && $audit->auditable)
                                            {{ $audit->auditable->course_code }}
                                        @endif
                                    </td>
                                    <td>
                                    <!-- If the auditable type is 'App\Models\Course' and there is an actual auditable model instance present
                                    , then proceed to display the course code and course name -->
                                        @if ($audit->auditable_type === 'App\Models\Course' && $audit->auditable)
                                            {{ $audit->auditable->course_name }}
                                        @endif
                                    </td>
                                    <td>{{ $audit->user->name }}</td>
                                    <td>{{ $audit->event }}</td>
                                    <td>{{ $audit->created_at }}</td>
                                    <td>
                                        <button class="btn btn-primary expand-collapse-btn" data-target="#collapseOldValues{{ $audit->id }}" aria-expanded="false">
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
                                        <button class="btn btn-info expand-collapse-btn" data-target="#collapseNewValues{{ $audit->id }}" aria-expanded="false">
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

<script>
    $(document).ready(function() {
        $(".expand-collapse-btn").click(function() {
            const target = $(this).data("target");
            $(target).collapse("toggle");
        });
    });
</script>
@endsection
