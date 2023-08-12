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
                <a href="/home">Back</a>
            </div>
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
                                    <h4>{{ Auth::user()->name }}</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4 class="mb-0">Email</h4>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h4>{{ Auth::user()->email }}</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4 class="mb-0">ID</h4>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h4>{{ Auth::user()->id }}</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4 class="mb-0">Role</h4>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h4>{{ Auth::user()->role }}</h4>
                                </div>
                            </div>
                            <!-- I dont include the edit function here cuz fyp scope didnt mentioned I want to do so -->
                        </div>
                    </div>
                </div>
                <h1>Audit Log History</h1>
                <hr>
                <div class="table-container">
                    <table>
                        @if (count($profiles) > 0)
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
                            <tbody>
                                @foreach ($profiles as $profile)
                                    <tr>
                                    <td>
                                        <!-- If the auditable type is 'App\Models\Course' and there is an actual auditable model instance present,
                                        then proceed to display the course code and course name -->
                                        @if ($profile->auditable_type === 'App\Models\Course' && $profile->auditable)
                                            {{ $profile->auditable->course_code }}
                                        @elseif ($profile->auditable_type === 'App\Models\CourseRow' && $profile->auditable)
                                            @if ($profile->auditable->course)
                                                {{ $profile->auditable->course->course_code }}<br>(Distribution of Student Learning Time)
                                            @endif                                       
                                        @elseif ($profile->auditable_type === 'App\Models\InfoOnPracRow' && $profile->auditable)
                                            @if ($profile->auditable->course)
                                                {{ $profile->auditable->course->course_code }}<br>(Information On Practical)
                                            @endif
                                        @endif                                    
                                    </td>
                                    <td>
                                        <!-- If the auditable type is 'App\Models\Course' and there is an actual auditable model instance present,
                                        then proceed to display the course code and course name -->
                                        @if ($profile->auditable_type === 'App\Models\Course' && $profile->auditable)
                                            {{ $profile->auditable->course_name }}
                                        @elseif ($profile->auditable_type === 'App\Models\CourseRow' && $profile->auditable)
                                            @if ($profile->auditable->course)
                                                {{ $profile->auditable->course->course_name }}<br>(Distribution of Student Learning Time)
                                            @endif
                                        @elseif ($profile->auditable_type === 'App\Models\InfoOnPracRow' && $profile->auditable)
                                            @if ($profile->auditable->course)
                                                {{ $profile->auditable->course->course_name }}<br>(Information On Practical)
                                            @endif
                                        @endif
                                    </td>                                    
                                        <td>{{ $profile->user->name }}</td>
                                        <td>{{ $profile->event }}</td>
                                        <td>{{ $profile->created_at }}</td>
                                        <td>
                                            <button class="btn btn-primary expand-collapse-btn" data-target="#collapseOldValues{{ $profile->id }}" aria-expanded="false">
                                                Expand/Collapse
                                            </button>
                                            <div class="collapse" id="collapseOldValues{{ $profile->id }}">
                                                <table class="table">
                                                    @foreach ($profile->old_values as $attribute => $value)
                                                        <tr>
                                                            <td><b>{{ $attribute }}</b></td>
                                                            <td>{{ $value }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-info expand-collapse-btn" data-target="#collapseNewValues{{ $profile->id }}" aria-expanded="false">
                                                Expand/Collapse
                                            </button>
                                            <div class="collapse" id="collapseNewValues{{ $profile->id }}">
                                                <table class="table">
                                                    @foreach ($profile->new_values as $attribute => $value)
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
