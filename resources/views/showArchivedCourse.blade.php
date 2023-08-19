@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/archiveCourse.css')}}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="main"> 
<body>
    <div class="search-container">
        <h1>Archived Courses</h1>
        <a href="/home">Back</a>
    </div>
    @if(session('success'))
        <div id="flash-message" class="alert alert-success text-center mx-auto" style="font-size: 22px; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            @if(count($archivedCourse)>0)
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Course Name</th>
                    <th>Deleted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($archivedCourse as $course)
                <tr>
                    <td class="id">{{$course ->course_id}}</td>
                    <td class="code">{{$course ->course_code}}</td>
                    <td class="courseName">{{$course->course_name}}</td>
                    <td class="deleted_at">{{ $course->deleted_at }}</td>
                    <div class="btn">
                        <td>
                            <a href="{{ route('restoreCourse',['course_id'=>$course->course_id]) }}" class="btn btn-secondary">Restore</a>
                        </td>
                    </div>
                </tr>
                @endforeach
                <span>
                    {{$archivedCourse->links()}}
                </span>
            </tbody>
            @else
                <p>No courses archived</p>
            @endif
        </table>
    </div>
    <script>
        const duration = 3000; // 3 seconds

        const flashMessage = document.getElementById('flash-message');

        setTimeout(function() {
            flashMessage.style.display = 'none';
        }, duration);
    </script>
</body>
</div>
@endsection


