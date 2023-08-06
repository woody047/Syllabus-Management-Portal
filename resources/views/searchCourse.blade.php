@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/main.css')}}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="main"> 
<body>
    <h1>Search Results for "{{$keyword}}"</h1>
    <div class="search-container">
        <form action="{{route('searchCourse')}}" method="GET" class="searchCourse">
            <div class="search">
                <input type="text" id="search-input" placeholder="Search by Code or Course Name" name="keyword">
                <button id="search-button" type="submit"> Search</button>
            </div>
        </form>
        <a href="/home">Back</a>
    </div>
    @if(count($course)>0)
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Course Name</th>
                    <th>Synopsis</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course as $courselist)
                <tr>
                    <td class="id">{{$courselist ->course_id}}</td>
                    <td class="code">{{$courselist ->course_code}}</td>
                    <td class="courseName">{{$courselist->course_name}}</td>
                    <td class="desc">{{$courselist->course_synopsis}}</td>
                    <div class="btn">
                        <td>
                            <a href="{{ route('showCourse',['course_id'=>$courselist->course_id]) }}"  class="btn btn-primary">View</a>
                            <a href="{{ route('editCourse',['course_id'=>$courselist->course_id]) }}"  class="btn btn-info">Update</a>
                            @if (Gate::allows('isStaff'))
                            <a href="{{ route('archiveCourse',['course_id'=>$courselist->course_id]) }}" class="btn btn-danger archive-link">Archive</a>
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
                            @endif
                        </td>
                    </div>
                </tr>
                @endforeach
                <span>
                     {{$course->links()}}
                </span>
            </tbody>
        </table>
    </div>
    @else
            <p>No courses found matching "{{$keyword}}"</p>
    @endif
</body>
</div>
@endsection


