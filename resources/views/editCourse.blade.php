@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/editCourse.css')}}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                            <label>Course Code:&nbsp;</label><input type="text" name="course_code" class="tab-space" value="{{$course->course_code}}" required><br>
                            <label>Name of Course:&nbsp;</label><input type="text" name="course_name" class="tab-space" style="width:300px;" value="{{$course->course_name}}"required></input>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td class="courseInfo">
                            <label>Synopsis:&nbsp;</label><br><textarea name="course_synopsis" rows="5" cols="50" style="width:1100px;height:200px;" required>{{$course->course_synopsis}}</textarea>
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
                            <label>Trimester / Year offered:&nbsp;</label><input name="course_trimester" value="{{$course->course_trimester}}" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td class="courseInfo">
                            <label>Credit Value:&nbsp;</label><input name="course_credit" value="{{$course->course_credit}}" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td class="courseInfo">
                            <label>Per-requisite / co-requisite:&nbsp;</label><input name="course_pre" style="width:400px" value="{{$course->course_pre}}" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td class="courseInfo">
                            <label>Course Classification:&nbsp;</label><input name="course_classification" value="{{$course->course_classification}}" required></input>
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
                                        <label>CO5- &nbsp;</label><input type="text" name="8CLO5" class="tab-space" style="width:700px;" value="{{ $course->{'8CLO5'} }}"></input><br>
                                        <label>CO6- &nbsp;</label><input type="text" name="8CLO6" class="tab-space" style="width:700px;" value="{{ $course->{'8CLO6'} }}"></input><br>
                                        <label>CO7- &nbsp;</label><input type="text" name="8CLO7" class="tab-space" style="width:700px;" value="{{ $course->{'8CLO7'} }}"></input><br>
                                    </td>
                                    <td style="width:100px;">
                                        <input type="text" name="8DTL1" class="tab-space" value="{{ $course->{'8DTL1'} }}"></input><br>
                                        <input type="text" name="8DTL2" class="tab-space" value="{{ $course->{'8DTL2'} }}"></input><br>
                                        <input type="text" name="8DTL3" class="tab-space" value="{{ $course->{'8DTL3'} }}"></input><br>
                                        <input type="text" name="8DTL4" class="tab-space" value="{{ $course->{'8DTL4'} }}"></input><br>
                                        <input type="text" name="8DTL5" class="tab-space" value="{{ $course->{'8DTL5'} }}"></input><br>
                                        <input type="text" name="8DTL6" class="tab-space" value="{{ $course->{'8DTL6'} }}"></input><br>
                                        <input type="text" name="8DTL7" class="tab-space" value="{{ $course->{'8DTL7'} }}"></input><br>
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
                                        <td><label>CO5</label></td>           
                                        <td><input type="checkbox" name="9CO5_PO1" {{ $course->{'9CO5_PO1'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO5_PO2" {{ $course->{'9CO5_PO2'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO5_PO3" {{ $course->{'9CO5_PO3'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO5_PO4" {{ $course->{'9CO5_PO4'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO5_PO5" {{ $course->{'9CO5_PO5'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO5_PO6" {{ $course->{'9CO5_PO6'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO5_PO7" {{ $course->{'9CO5_PO7'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO5_PO8" {{ $course->{'9CO5_PO8'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO5_PO9" {{ $course->{'9CO5_PO9'} ? 'checked' : '' }}></input></td>
                                        <td><input type="text" name="CO5_L" style="width:100px" value="{{$course->CO5_L}}"></input></td>
                                        <td><input type="text" name="CO5_A" style="width:80px" value="{{$course->CO5_A}}"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label>CO6</label></td>           
                                        <td><input type="checkbox" name="9CO6_PO1" {{ $course->{'9CO6_PO1'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO6_PO2" {{ $course->{'9CO6_PO2'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO6_PO3" {{ $course->{'9CO6_PO3'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO6_PO4" {{ $course->{'9CO6_PO4'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO6_PO5" {{ $course->{'9CO6_PO5'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO6_PO6" {{ $course->{'9CO6_PO6'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO6_PO7" {{ $course->{'9CO6_PO7'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO6_PO8" {{ $course->{'9CO6_PO8'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO6_PO9" {{ $course->{'9CO6_PO9'} ? 'checked' : '' }}></input></td>
                                        <td><input type="text" name="CO6_L" style="width:100px" value="{{$course->CO6_L}}"></input></td>
                                        <td><input type="text" name="CO6_A" style="width:80px" value="{{$course->CO6_A}}"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label>CO7</label></td>           
                                        <td><input type="checkbox" name="9CO7_PO1" {{ $course->{'9CO7_PO1'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO7_PO2" {{ $course->{'9CO7_PO2'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO7_PO3" {{ $course->{'9CO7_PO3'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO7_PO4" {{ $course->{'9CO7_PO4'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO7_PO5" {{ $course->{'9CO7_PO5'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO7_PO6" {{ $course->{'9CO7_PO6'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO7_PO7" {{ $course->{'9CO7_PO7'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO7_PO8" {{ $course->{'9CO7_PO8'} ? 'checked' : '' }}></input></td>
                                        <td><input type="checkbox" name="9CO7_PO9" {{ $course->{'9CO7_PO9'} ? 'checked' : '' }}></input></td>
                                        <td><input type="text" name="CO7_L" style="width:100px" value="{{$course->CO7_L}}"></input></td>
                                        <td><input type="text" name="CO7_A" style="width:80px" value="{{$course->CO7_A}}"></input></td>
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
                                <label>Other Teaching Methods:&nbsp;</label><input type="text" name="9OTM" class="tab-space" style="width:500px;" value="{{ $course->{'9OTM'} }}" required></input><br>
                                <label>Other Assessment Methods:&nbsp;</label><input type="text" name="9OAM" class="tab-space" style="width:500px;" value="{{ $course->{'9OAM'} }}" required></input></p>
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
                    <tr>
                        <td>11.</td>
                        <td>
                            <p class="courseInfo">
                                Distribution of Student Learning Time (SLT):          
                            </p>
                            <table>  
                                <thead>
                                    <tr>
                                        <th rowspan="3">Course Content Outline</th>
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
                                <tbody id="table-body">
                                    <!-- loop through the existing rows and generate input fields for each attribute of each row. -->
                                    @foreach($course->courseRows as $index => $row)
                                    <tr>
                                        <!-- additional input field in form for 'courseRowId[]' -->
                                        <input type="hidden" name="courseRowId[]" value="{{ $row->id ?? '' }}" required>
                                        <td><textarea type="text" name="courseOutline[]" rows="5" cols="50" style="width:500px; height:200px;" required>{{$row->courseOutline}}</textarea></td>           
                                        <td><input type="text" name="CO[]" style="width:100px" value="{{$row->CO}}" required></input></td>
                                        <td><input type="text" name="L[]" style="width:20px" value="{{$row->L}}" required></input></td>
                                        <td><input type="text" name="T[]" style="width:20px" value="{{$row->T}}" required></input></td>
                                        <td><input type="text" name="P[]" style="width:20px" value="{{$row->P}}" required></input></td>
                                        <td><input type="text" name="O[]" style="width:20px" value="{{$row->O}}" required></input></td>
                                        <td><input type="text" name="GuidedLearning[]" style="width:20px" value="{{$row->GuidedLearning}}" required></input></td>
                                        <td><input type="text" name="IndependentLearning[]" style="width:20px" value="{{$row->IndependentLearning}}" required></input></td>
                                        <td><input type="text" name="TotalSLT[]" style="width:20px" value="{{$row->TotalSLT}}" required></input></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="addnremove-button">
                                <button id="add-row" class="btn btn-primary" type="button">Add Row</button>
                                <button id="remove-row" class="btn btn-danger" type="button">Remove Row</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <table>  
                                <thead>
                                    <tr>
                                        <th rowspan="3">Course Content Outline</th>
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
                                        <td colspan="2">Total Notional Hours</td>
                                        <td><input type="text" name="totalNotionalHours_L" style="width:20px" value="{{$course->totalNotionalHours_L}}" required></input></td>
                                        <td><input type="text" name="totalNotionalHours_T" style="width:20px" value="{{$course->totalNotionalHours_T}}" required></input></td>
                                        <td><input type="text" name="totalNotionalHours_P" style="width:20px" value="{{$course->totalNotionalHours_P}}" required></input></td>
                                        <td><input type="text" name="totalNotionalHours_O" style="width:20px" value="{{$course->totalNotionalHours_O}}" required></input></td>
                                        <td><input type="text" name="totalNotionalHours_GuidedLearning" style="width:20px" value="{{$course->totalNotionalHours_GuidedLearning}}" required></input></td>
                                        <td><input type="text" name="totalNotionalHours_IndependentLearning" style="width:20px" value="{{$course->totalNotionalHours_IndependentLearning}}" required></input></td>
                                        <td><input type="text" name="totalNotionalHours_TotalSLT" style="width:20px" value="{{$course->totalNotionalHours_TotalSLT}}" required></input></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <table>
                                <th>Continuous Assessment</th> 
                                <th>Percentage(%)</th> 
                                <th>F2F</th> 
                                <th>NF2F</th> 
                                <th>Total SLT</th> 
                                <tr>
                                    <td>Test, Practical Assessment, Assignment</td>
                                    <td><input type="text" name="CA_Percentage" style="width:50px;" value="{{$course->CA_Percentage}}" required></input></td>
                                    <td><input type="text" name="CA_F2F" style="width:50px;" value="{{$course->CA_F2F}}" required></input></td>
                                    <td><input type="text" name="CA_NF2F" style="width:50px;" value="{{$course->CA_NF2F}}" required></input></td>
                                    <td><input type="text" name="CA_TotalSLT" style="width:50px;" value="{{$course->CA_TotalSLT}}" required></input></td>
                                </tr>
                                <th>Continuous Assessment</th> 
                                <th>Percentage(%)</th> 
                                <th>F2F</th> 
                                <th>NF2F</th> 
                                <th>Total SLT</th> 
                                <tr>
                                    <td>Final Examination</td>
                                    <td><input type="text" name="FA_Percentage" style="width:50px;" value="{{$course->FA_Percentage}}" required></input></td>
                                    <td><input type="text" name="FA_F2F" style="width:50px;" value="{{$course->FA_F2F}}" required></input></td>
                                    <td><input type="text" name="FA_NF2F" style="width:50px;" value="{{$course->FA_NF2F}}" required></input></td>
                                    <td><input type="text" name="FA_TotalSLT" style="width:50px;" value="{{$course->FA_TotalSLT}}" required></input></td>
                                </tr>
                                <tr>
                                    <td colspan="4">GRAND TOTAL SLT</td>
                                    <td><input type="text" name="grand_total_SLT" style="width:50px" value="{{$course->grand_total_SLT}}" required></input></td>
                                </tr>            
                            </table>
                            <br>
                            <h5 style="float:left;">**Please tick (√) if this course is Industrial Training / Clinical Placement / Practicum / WBL using
                            Effective Learning Time(ELT) of 50%</h5>
                            <input type="checkbox" name="11_tick" style="width: 20px;height: 20px;" {{ $course->{'11_tick'} ? 'checked' : '' }}></input>
                            <p class="courseInfo">* L = Lecture, T = Tutorial, P = Practical, O = Others, * F2F = Face-to-Face, NF2F = Non Face-to-Face</p>
                        </td>
                    </tr>
                    <tr>
                        <td>12.</td>
                        <td class="courseInfo">
                            <label>Special Requirement or Resources to Deliver the Course (e.g., software, nursery, computer laboratory, simulation room)</label><br>
                            <input type="text" name="special_requirement" class="tab-space" style="width:1100px;" value="{{$course->special_requirement}}" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td>13.</td>
                        <td class="courseInfo">
                            <label>Main References:</label><br>
                            <textarea name="main_references" style="width:1100px;height:100px;" required>{{$course->main_references}}</textarea><br>
                            <label>Additional References:</label><br>
                            <textarea name="additional_references" style="width:1100px;height:100px;" required>{{$course->additional_references}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>14.</td>
                        <td class="courseInfo">
                            <label>Other Additional Information</label><br>
                            <input type="text" name="other_addition_info" class="tab-space" style="width:1100px;" value="{{$course->other_addition_info}}" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td>15.</td>
                        <td class="courseInfo">
                            <label>Date of Senate Approval:&nbsp;</label>
                            <input type="text" name="date_of_senate_approval" class="tab-space" style="width:100px;" value="{{$course->date_of_senate_approval}}" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td>16.</td>
                        <td class="courseInfo">
                            <label>Effective Trimester:&nbsp;</label>
                            <input type="text" name="effective_trimester" class="tab-space" style="width:100px;" value="{{$course->effective_trimester}}" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="courseInfo">
                            <table>
                                <thead>
                                <tr>
                                    <th colspan="4">Information on Practical</th>
                                </tr>
                                <tr>
                                    <th>Lab</th>
                                    <th>CO</th>
                                    <th>Activity</th>
                                    <th>Contact Hours</th>
                                </tr>
                                </thead>
                                <tbody id="table-body-info-on-prac">
                                    <!-- loop through the existing rows and generate input fields for each attribute of each row. -->
                                    @foreach($course->infoOnPracRows as $index => $row)
                                    <tr>
                                        <input type="hidden" name="infoOnPracRowId[]" value="{{ $row->id ?? '' }}" required>
                                        <td><input type="text" name="lab[]" style="width:20px" value="{{$row->lab}}" required></input></td>
                                        <td><input type="text" name="co[]" style="width:100px" value="{{$row->co}}" required></input></td>
                                        <td><textarea type="text" name="activity[]" rows="5" cols="50" style="width:900px; height:200px;float:left;" required>{{$row->activity}}</textarea></td>           
                                        <td><input type="text" name="contact_hours[]" style="width:20px" value="{{$row->contact_hours}}" required></input></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="addnremove-button-for-info-on-prac">
                                <button id="add-row-for-info-on-prac" class="btn btn-primary" type="button">Add Row</button>
                                <button id="remove-row-for-info-on-prac" class="btn btn-danger" type="button">Remove Row</button>
                            </div>
                        </td>
                    </tr> 
                </tbody>
            </table>
        </div>
    </form>
</body>
</div>

<script src="{{ asset('js/addremovebutton.js') }}"></script>
<script src="{{ asset('js/addbutton_for_info_on_prac.js') }}"></script>
<script src="{{ asset('js/removebutton_for_info_on_prac.js') }}"></script>

@endsection


