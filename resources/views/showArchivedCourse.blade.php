@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/main.css')}}" />
</head>

<div class="main"> 
<body>
    <h1>Archived Courses</h1>
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
                            <a href="{{ route('restoreCourse',['course_id'=>$course->course_id]) }}">Restore</a>
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


