@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/createCourse.css')}}" />
</head>

<div class="main"> 
<body>
    <form action="createCourse" method="POST">
        @csrf
        <div class="create-container">
            <h1>Create New Course Syllabus</h1>
            <div class="create-btn">
                <button type="submit">Create</button>
                <a href="/home">Cancel</a>
            </div>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th class="No">No.</th>
                        <th>Course Information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>11.</td>
                        <td>
                            <p class="courseInfo">
                                Distribution of Student Learning Time (SLT):          
                            </p>
                            <table>  
                                <thead>
                                    <tr>
                                        <th rowspan="3" style="width:1000px;">Course Content Outline</th>
                                        <th rowspan="3">CO</th>
                                        <th colspan="6">Teaching & Learning Activites</th>
                                        <th rowspan="3">Total SLT</th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Guided Learning (F2F)*</th>
                                        <th rowspan="2" style="max-width:150px;">Guided Learning (NF2F)*</th>
                                        <th rowspan="2" style="max-width:150px;">Independent Learning (NF2F)*</th>
                                    </tr>
                                    <tr>
                                        <th>L</th>
                                        <th>T</th>
                                        <th>P</th>
                                        <th>O</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><textarea type="text" name="9CO1_PO1" rows="5" cols="50" style="width:600px; height:200px;"></textarea></td>           
                                        <td><input type="text" name="9CO1_PO1" style="width:20px"></input></td>
                                        <td><input type="text" name="9CO1_PO2" style="width:20px"></input></td>
                                        <td><input type="text" name="9CO1_PO3" style="width:20px"></input></td>
                                        <td><input type="text" name="9CO1_PO4" style="width:20px"></input></td>
                                        <td><input type="text" name="9CO1_PO5" style="width:20px"></input></td>
                                        <td><input type="text" name="9CO1_PO6" style="width:20px"></input></td>
                                        <td><input type="text" name="9CO1_PO7" style="width:20px"></input></td>
                                        <td><input type="text" name="9CO1_PO8" style="width:20px"></input></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</body>
</div>
@endsection


