@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/main.css')}}" />
</head>

<div class="main"> 
<body>
    <h1>Archived Courses</h1>
    <!-- <div class="search-container">
        <form action="{{route('archiveCourse')}}" method="GET" class="archiveCourse">
            <div class="search">
                <input type="text" id="search-input" placeholder="Search by Code or Course Name" name="keyword">
                <button id="search-button" type="submit"> Search</button>
            </div>
        </form>
        <a href="/createCourse">{{ __('Create New Course') }}</a>
    </div> -->
    <div class="table-container">
        <table>
            @if(count($archivedCourse)>0)
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
                @foreach ($archivedCourse as $course)
                <tr>
                    <td class="id">{{$course ->course_id}}</td>
                    <td class="code">{{$course ->course_code}}</td>
                    <td class="courseName">{{$course->course_name}}</td>
                    <td class="desc">{{$course->course_synopsis}}</td>
                    <div class="btn">
                        <td>
                            @if (Gate::allows('isStaff'))
                            <a href="{{ route('restoreCourse',['course_id'=>$course->course_id]) }}">Restore</a>
                            @endif
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
</body>
</div>
@endsection


