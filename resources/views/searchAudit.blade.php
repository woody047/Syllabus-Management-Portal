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
        <h1>Search Results for "{{$keyword}}"</h1>
        <div class="search-container">
            <form action="{{route('searchAudit')}}" method="GET" class="searchAudit">
                <div class="search">
                    <input type="text" id="search-input" placeholder="Search by Code or Course Name" name="keyword">
                    <button id="search-button" type="submit"> Search</button>
                </div>
            </form>
            <a href="/audits">Back</a>
        </div>
        @if(count($audits)>0)
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
                @foreach($audits as $audit)
                <tr>
                <td>
                <!-- If the auditable type is 'App\Models\Course' and there is an actual auditable model instance present
                , then proceed to display the course code and course name -->
                @if ($audit->auditable_type === 'App\Models\Course' && $audit->auditable)
                        {{ $audit->auditable->course_code }}
                    @elseif ($audit->auditable_type === 'App\Models\CourseRow' && $audit->auditable)
                        @if ($audit->auditable->course)
                            {{ $audit->auditable->course->course_code }}<br>(Distribution of Student Learning Time)
                        @endif                                       
                    @elseif ($audit->auditable_type === 'App\Models\InfoOnPracRow' && $audit->auditable)
                        @if ($audit->auditable->course)
                            {{ $audit->auditable->course->course_code }}<br>(Info On Practical)
                        @endif
                    @endif                                    
                </td>
                <td>
                <!-- If the auditable type is 'App\Models\Course' and there is an actual auditable model instance present
                , then proceed to display the course code and course name -->
                @if ($audit->auditable_type === 'App\Models\Course' && $audit->auditable)
                    {{ $audit->auditable->course_name }}
                @elseif ($audit->auditable_type === 'App\Models\CourseRow' && $audit->auditable)
                    @if ($audit->auditable->course)
                        {{ $audit->auditable->course->course_name }}<br>(Distribution of Student Learning Time)
                    @endif
                @elseif ($audit->auditable_type === 'App\Models\InfoOnPracRow' && $audit->auditable)
                    @if ($audit->auditable->course)
                        {{ $audit->auditable->course->course_name }}<br>(Info On Practical)
                    @endif
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
        </table>
        </div>
        @else
            <p>No audit log found matching "{{$keyword}}"</p>
        @endif
        <span>
            {{$audits->links()}}
        </span>
    </body>
</div>

<script>
    $(document).ready(function () {
        // Handle expand/collapse button click
        $('.expand-collapse-btn').click(function () {
            var target = $(this).data('target');
            $(target).toggleClass('show');
        });
    });
</script>
@endsection
