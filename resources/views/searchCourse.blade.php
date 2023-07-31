@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/main.css')}}" />
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
                            <a href="{{ route('showCourse',['course_id'=>$courselist->course_id]) }}">View</a>
                            <a href="{{ route('editCourse',['course_id'=>$courselist->course_id]) }}">Update</a>
                            @if (Gate::allows('isStaff'))
                            <a href="{{ route('archiveCourse',['course_id'=>$courselist->course_id]) }}">Archive</a>
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

