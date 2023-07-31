@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/editCourse.css')}}" />
</head>

<div class="main"> 
<body>
    <form action="{{ route('saveCourse',$course->course_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="create-container">
            <h1>Update Course Syllabus</h1>
            <div class="create-btn">
                <button type="submit">Update</button>
                <a href="/home" class="btn btn-danger">Cancel</a>
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
                        <td>1.</td>
                        <td class="courseInfo">
                            <label>Course Code:&nbsp;</label><input type="text" name="course_code" class="tab-space" value="{{$course->course_code}}"><br>
                            <label>Name of Course:&nbsp;</label><input type="text" name="course_name" class="tab-space" style="width:300px;" value="{{$course->course_name}}"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td class="courseInfo">
                            <label>Synopsis:&nbsp;</label><br><input name="course_synopsis" style="width:1100px;height:50px;" value="{{$course->course_synopsis}}"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td class="courseInfo">
                            <label>Name(s) of academic staff:&nbsp;</label><input name="course_staff" value="{{$course->course_staff}}"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td class="courseInfo">
                            <label>Trimester / Year offered:&nbsp;</label><input name="course_trimester" value="{{$course->course_trimester}}"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td class="courseInfo">
                            <label>Credit Value:&nbsp;</label><input name="course_credit" value="{{$course->course_credit}}"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td class="courseInfo">
                            <label>Per-requisite / co-requisite:&nbsp;</label><input name="course_pre" style="width:400px" value="{{$course->course_pre}}"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td class="courseInfo">
                            <label>Course Classification:&nbsp;</label><input name="course_classification" value="{{$course->course_classification}}"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>
                            <table>                  
                                <th>Course Learning Outcomes (CO):</th>
                                <th>Domain & Taxonomy Level</th>
                                <tr>
                                    <td class="courseInfo">
                                        <label>CO1- &nbsp;</label><input type="text" name="8CLO1" class="tab-space" style="width:700px;" value="{{ $course->{'8CLO1'} }}"></input><br>
                                        <label>CO2- &nbsp;</label><input type="text" name="8CLO2" class="tab-space" style="width:700px;" value="{{ $course->{'8CLO2'} }}"></input><br>
                                        <label>CO3- &nbsp;</label><input type="text" name="8CLO3" class="tab-space" style="width:700px;" value="{{ $course->{'8CLO3'} }}"></input><br>
                                        <label>CO4- &nbsp;</label><input type="text" name="8CLO4" class="tab-space" style="width:700px;" value="{{ $course->{'8CLO4'} }}"></input><br>
                                    </td>
                                    <td style="width:100px;">
                                        <input type="text" name="8DTL1" class="tab-space" value="{{ $course->{'8DTL1'} }}"></input><br>
                                        <input type="text" name="8DTL2" class="tab-space" value="{{ $course->{'8DTL2'} }}"></input><br>
                                        <input type="text" name="8DTL3" class="tab-space" value="{{ $course->{'8DTL3'} }}"></input><br>
                                        <input type="text" name="8DTL4" class="tab-space" value="{{ $course->{'8DTL4'} }}"></input><br>
                                    </td>
                                </tr>
                                <p class="courseInfo">Domain and Taxonomy Level – Cognitive (C), Level 1 - 6; Affective (A), Level 1 - 5; Psychomotor (P), Level 1 - 5</p>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>
                            <p class="courseInfo">
                                <label>Mapping of the COurse Learning Outcomes to the Programme Outcomes, Teaching Methods and Assssment:&nbsp;</label>             
                            </p>
                            <table>  
                                <thead>
                                    <tr>
                                        <th rowspan="2">CO</th>
                                        <th colspan="9">Programme Outcomes (PO)</th>
                                        <th rowspan="2">Learning and Teaching Methods</th>
                                        <th rowspan="2">Assessment</th>
                                    </tr>
                                    <tr>
                                        <th>PO1</th>
                                        <th>PO2</th>
                                        <th>PO3</th>
                                        <th>PO4</th>
                                        <th>PO5</th>
                                        <th>PO6</th>
                                        <th>PO7</th>
                                        <th>PO8</th>
                                        <th>PO9</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label>CO1</label></td>           
                                        <td><input type="checkbox" name="9CO1_PO1" {{ $course->{'9CO1_PO1'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO1_PO2" {{ $course->{'9CO1_PO2'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO1_PO3" {{ $course->{'9CO1_PO3'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO1_PO4" {{ $course->{'9CO1_PO4'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO1_PO5" {{ $course->{'9CO1_PO5'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO1_PO6" {{ $course->{'9CO1_PO6'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO1_PO7" {{ $course->{'9CO1_PO7'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO1_PO8" {{ $course->{'9CO1_PO8'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO1_PO9" {{ $course->{'9CO1_PO9'} ? 'checked' : '' }}></input></td>
                                        <td><input type="text" name="CO1_L" style="width:100px" value="{{$course->CO1_L}}"></input></td>
                                        <td><input type="text" name="CO1_A" style="width:80px"value="{{$course->CO1_A}}"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label>CO2</label></td>           
                                        <td><input type="checkbox" name="9CO2_PO1" {{ $course->{'9CO2_PO1'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO2_PO2" {{ $course->{'9CO2_PO2'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO2_PO3" {{ $course->{'9CO2_PO3'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO2_PO4" {{ $course->{'9CO2_PO4'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO2_PO5" {{ $course->{'9CO2_PO5'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO2_PO6" {{ $course->{'9CO2_PO6'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO2_PO7" {{ $course->{'9CO2_PO7'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO2_PO8" {{ $course->{'9CO2_PO8'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO2_PO9" {{ $course->{'9CO2_PO9'} ? 'checked' : '' }}></input></td>
                                        <td><input type="text" name="CO2_L" style="width:100px" value="{{$course->CO2_L}}"></input></td>
                                        <td><input type="text" name="CO2_A" style="width:80px" value="{{$course->CO2_A}}"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label>CO3</label></td>           
                                        <td><input type="checkbox" name="9CO3_PO1" {{ $course->{'9CO3_PO1'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO3_PO2" {{ $course->{'9CO3_PO2'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO3_PO3" {{ $course->{'9CO3_PO3'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO3_PO4" {{ $course->{'9CO3_PO4'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO3_PO5" {{ $course->{'9CO3_PO5'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO3_PO6" {{ $course->{'9CO3_PO6'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO3_PO7" {{ $course->{'9CO3_PO7'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO3_PO8" {{ $course->{'9CO3_PO8'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO3_PO9" {{ $course->{'9CO3_PO9'} ? 'checked' : '' }}></input></td>
                                        <td><input type="text" name="CO3_L" style="width:100px" value="{{$course->CO3_L}}"></input></td>
                                        <td><input type="text" name="CO3_A" style="width:80px" value="{{$course->CO3_A}}"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label>CO4</label></td>           
                                        <td><input type="checkbox" name="9CO4_PO1" {{ $course->{'9CO4_PO1'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO4_PO2" {{ $course->{'9CO4_PO2'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO4_PO3" {{ $course->{'9CO4_PO3'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO4_PO4" {{ $course->{'9CO4_PO4'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO4_PO5" {{ $course->{'9CO4_PO5'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO4_PO6" {{ $course->{'9CO4_PO6'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO4_PO7" {{ $course->{'9CO4_PO7'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO4_PO8" {{ $course->{'9CO4_PO8'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO4_PO9" {{ $course->{'9CO4_PO9'} ? 'checked' : '' }}></input></td>
                                        <td><input type="text" name="CO4_L" style="width:100px" value="{{$course->CO4_L}}"></input></td>
                                        <td><input type="text" name="CO4_A" style="width:80px" value="{{$course->CO4_A}}"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label>Total</label></td>           
                                        <td><input type="text" name="total_PO1" style="width:20px" value="{{$course->total_PO1}}"></input></td>
                                        <td><input type="text" name="total_PO2" style="width:20px" value="{{$course->total_PO2}}"></input></td>
                                        <td><input type="text" name="total_PO3" style="width:20px" value="{{$course->total_PO3}}"></input></td>
                                        <td><input type="text" name="total_PO4" style="width:20px" value="{{$course->total_PO4}}"></input></td>
                                        <td><input type="text" name="total_PO5" style="width:20px" value="{{$course->total_PO5}}"></input></td>
                                        <td><input type="text" name="total_PO6" style="width:20px" value="{{$course->total_PO6}}"></input></td>
                                        <td><input type="text" name="total_PO7" style="width:20px" value="{{$course->total_PO7}}"></input></td>
                                        <td><input type="text" name="total_PO8" style="width:20px" value="{{$course->total_PO8}}"></input></td>
                                        <td><input type="text" name="total_PO9" style="width:20px" value="{{$course->total_PO9}}"></input></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="courseInfo">Indicate the primary causal link between the CO and PO by ticking “√” the appropriate box.<br>
                                <label>Other Teaching Methods:&nbsp;</label><input type="text" name="9OTM" class="tab-space" style="width:500px;" value="{{ $course->{'9OTM'} }}"></input><br>
                                <label>Other Assessment Methods:&nbsp;</label><input type="text" name="9OAM" class="tab-space" style="width:500px;" value="{{ $course->{'9OAM'} }}"></input></p>
                            <p class="courseInfo">2 L = Lecture, T = Tutorial, P = Practical, O = Others<br>3 Te = Test, Q = Quiz, A = Assignment, P = Practical, Pre = Presentation, CaS = Case Study, FE = Final Exam, O = Others</p>
                        </td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td class="courseInfo">
                            <p class="courseInfo">Transferable Skills (if applicable):<br>
                            (Skills learned in the course of study which can be useful and utilized in other settings)</p>
                            <table>                  
                                <th>Transferable Skills</th>
                                <th>Yes</th>
                                <th>No</th>
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 1: Cognitive Skills</td>
                                    <td><input type="checkbox" name="10TS1_Y" {{ $course->{'10TS1_Y'} ? 'checked' : '' }}></input></td>
                                    <td><input type="checkbox" name="10TS1_N" {{ $course->{'10TS1_N'} ? 'checked' : '' }}></input></td>                                
                                </tr>  
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 2: Interpersonal Skills</td>
                                    <td><input type="checkbox" name="10TS2_Y" {{ $course->{'10TS2_Y'} ? 'checked' : '' }}></input></td>
                                    <td><input type="checkbox" name="10TS2_N" {{ $course->{'10TS2_N'} ? 'checked' : '' }}></input></td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 3: Communication Skills</td>
                                    <td><input type="checkbox" name="10TS3_Y" {{ $course->{'10TS3_Y'} ? 'checked' : '' }}></input></td>
                                    <td><input type="checkbox" name="10TS3_N" {{ $course->{'10TS3_N'} ? 'checked' : '' }}></input></td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 4: Digital Skills</td>
                                    <td><input type="checkbox" name="10TS4_Y" {{ $course->{'10TS4_Y'} ? 'checked' : '' }}></input></td>
                                    <td><input type="checkbox" name="10TS4_N" {{ $course->{'10TS4_N'} ? 'checked' : '' }}></input></td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 5: Numeracy Skills </td>
                                    <td><input type="checkbox" name="10TS5_Y" {{ $course->{'10TS5_Y'} ? 'checked' : '' }}></input></td>
                                    <td><input type="checkbox" name="10TS5_N" {{ $course->{'10TS5_N'} ? 'checked' : '' }}></input></td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 6: Leadership, autonomy and responsibilities</td>
                                    <td><input type="checkbox" name="10TS6_Y" {{ $course->{'10TS6_Y'} ? 'checked' : '' }}></input></td>
                                    <td><input type="checkbox" name="10TS6_N" {{ $course->{'10TS6_N'} ? 'checked' : '' }}></input></td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 7: Personal Skills (Life-long learning) </td>
                                    <td><input type="checkbox" name="10TS7_Y" {{ $course->{'10TS7_Y'} ? 'checked' : '' }}></input></td>
                                    <td><input type="checkbox" name="10TS7_N" {{ $course->{'10TS7_N'} ? 'checked' : '' }}></input></td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 8: Entrepreneurial Skills</td>
                                    <td><input type="checkbox" name="10TS8_Y" {{ $course->{'10TS8_Y'} ? 'checked' : '' }}></input></td>
                                    <td><input type="checkbox" name="10TS8_N" {{ $course->{'10TS8_N'} ? 'checked' : '' }}></input></td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 9: Ethics and Professionalism </td>
                                    <td><input type="checkbox" name="10TS9_Y" {{ $course->{'10TS9_Y'} ? 'checked' : '' }}></input></td>
                                    <td><input type="checkbox" name="10TS9_N" {{ $course->{'10TS9_N'} ? 'checked' : '' }}></input></td>                                
                                </tr>                                
                            </table><br>
                            <p class="courseInfo">Note: Yes denotes that this course contributes to the development of the transferable skills. No indicates that this course does not
                                                contribute to the development of the transferable skills.</p>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </form>
</body>
</div>
@endsection


