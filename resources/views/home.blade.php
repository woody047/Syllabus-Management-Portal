@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/main.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="main"> 
<body>
    <h1>List of Course Syllabus</h1>
    <div class="search-container">
        <form action="{{route('searchCourse')}}" method="GET" class="searchCourse">
            <div class="search">
                <input type="text" id="search-input" placeholder="Search by Code or Course Name" name="keyword">
                <button id="search-button" type="submit"> Search</button>
            </div>
        </form>
        <a href="/createCourse">{{ __('Create New Course') }}</a>
    </div>
    @if(session('success'))
        <div id="flash-message" class="alert alert-success text-center mx-auto" style="font-size: 22px; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-container">
        <table>
        @if(count($course)>0)
        <thead>
            <tr>
                <th>Code</th>
                <th>Course Name</th>
                <th>Synopsis</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($course as $courselist)
            <tr>
                <td class="code">{{$courselist->course_code}}</td>
                <td class="courseName">{{$courselist->course_name}}</td>
                <td class="desc">{{$courselist->course_synopsis}}</td>
                <td class="status">{{$courselist->status}}</td>
                <div class="action">
                    <td>
                        <div class="actionButton">
                            @if (Gate::allows('isStaff') && $courselist->status == 'pending')
                            <form action="{{ route('approveCourse', ['course_id' => $courselist->course_id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            @endif
                            <a href="{{ route('showCourse', ['course_id' => $courselist->course_id]) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('editCourse', ['course_id' => $courselist->course_id]) }}" class="btn btn-info">Update</a>
                            @if (Gate::allows('isStaff'))
                            <a href="{{ route('archiveCourse', ['course_id' => $courselist->course_id]) }}" class="btn btn-danger archive-link">Archive</a>
                            @endif
                            <!-- Archive confirmation modal -->
                            <div class="modal fade" id="archiveModal" tabindex="-1" aria-labelledby="archiveModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="archiveModalLabel">Archive Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want to archive the course syllabus? Archiving will move the course syllabus to the archived course files.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" id="confirmArchive">Archive</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </div>
            </tr>
            @endforeach
            <span>
                {{ $course->links() }}
            </span>
        </tbody>
        @else
            <p>No courses created</p>
        @endif
        </table>
    </div>
    <script>
        const duration = 5000; // 3 seconds

        const flashMessage = document.getElementById('flash-message');

        setTimeout(function() {
            flashMessage.style.display = 'none';
        }, duration);
    </script>
</body>
</div>

<script src="{{ asset('js/archivebutton.js') }}"></script>
@endsection
