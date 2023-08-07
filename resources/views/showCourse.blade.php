@extends('layouts.auth')
@section('content')

<head>
    <link rel="stylesheet" href="{{url('css/showCourse.css')}}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="main"> 
<body>
        <div class="create-container">
            <h1>{{ $course->course_name }}</h1>
            <div class="create-btn">
                <a href="{{ route('editCourse',['course_id'=>$course->course_id]) }}">Update</a>
                <a href="/home">Back</a>
            </div>
        </div>
        @if($course)
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
                            <p>Course Code:&nbsp;{{ $course->course_code }}</p>
                            <p>Name of Course:&nbsp;{{ $course->course_name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td class="courseInfo">
                            <p>Synopsis:<br>{{ $course->course_synopsis }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td class="courseInfo">
                            <p>Name(s) of academic staff:&nbsp;{{ $course->course_staff }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td class="courseInfo">
                            <p>Trimester / Year offered:&nbsp;{{ $course->course_trimester }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td class="courseInfo">
                            <p>Credit Value:&nbsp;{{ $course->course_credit }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td class="courseInfo">
                            <p>Per-requisite / co-requisite:&nbsp;{{ $course->course_pre }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td class="courseInfo">
                            <p>Course Classification:&nbsp;{{ $course->course_classification }}</p>
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
                                        <label>CO1- &nbsp;</label>{{ $course->{'8CLO1'} }}<br>
                                        <label>CO2- &nbsp;</label>{{ $course->{'8CLO2'} }}<br>
                                        <label>CO3- &nbsp;</label>{{ $course->{'8CLO3'} }}<br>
                                        <label>CO4- &nbsp;</label>{{ $course->{'8CLO4'} }}<br>

                                    </td>
                                    <td style="width:100px;">
                                        {{ $course->{'8DTL1'} }}<br>
                                        {{ $course->{'8DTL2'} }}<br>
                                        {{ $course->{'8DTL3'} }}<br>
                                        {{ $course->{'8DTL4'} }}<br>
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
                                        <!-- &#10004 means tick symbol, &#10008 means cross symbol -->
                                        <!-- true or false statement -->
                                        <td>{!! $course->{'9CO1_PO1'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO1_PO2'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO1_PO3'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO1_PO4'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO1_PO5'} ? '&#10004;' : ' ' !!}</input></td>
                                        <td>{!! $course->{'9CO1_PO6'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO1_PO7'} ? '&#10004;' : ' ' !!}</input></td>
                                        <td>{!! $course->{'9CO1_PO8'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO1_PO9'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{{ $course->CO1_L }}</td>
                                        <td>{{ $course->CO1_A }}</td>
                                    </tr>
                                    <tr>
                                        <td><label>CO2</label></td>           
                                        <td>{!! $course->{'9CO2_PO1'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO2_PO2'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO2_PO3'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO2_PO4'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO2_PO5'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO2_PO6'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO2_PO7'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO2_PO8'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO2_PO9'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{{ $course->CO2_L }}</td>
                                        <td>{{ $course->CO2_A }}</td>
                                    </tr>
                                    <tr>
                                        <td><label>CO3</label></td>           
                                        <td>{!! $course->{'9CO3_PO1'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO3_PO2'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO3_PO3'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO3_PO4'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO3_PO5'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO3_PO6'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO3_PO7'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO3_PO8'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO3_PO9'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{{ $course->CO3_L }}</td>
                                        <td>{{ $course->CO3_A }}</td>
                                    </tr>
                                    <tr>
                                        <td><label>CO4</label></td>           
                                        <td>{!! $course->{'9CO4_PO1'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO4_PO2'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO4_PO3'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO4_PO4'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO4_PO5'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO4_PO6'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO4_PO7'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO4_PO8'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{!! $course->{'9CO4_PO9'} ? '&#10004;' : ' ' !!}</td>
                                        <td>{{ $course->CO4_L }}</td>
                                        <td>{{ $course->CO4_A }}</td>
                                    </tr>
                                    <tr>
                                        <td><label>Total</label></td>           
                                        <td>{{ $course->total_PO1 }}</td>
                                        <td>{{ $course->total_PO2 }}</td>
                                        <td>{{ $course->total_PO3 }}</td>
                                        <td>{{ $course->total_PO4 }}</td>
                                        <td>{{ $course->total_PO5 }}</td>
                                        <td>{{ $course->total_PO6 }}</td>
                                        <td>{{ $course->total_PO7 }}</td>
                                        <td>{{ $course->total_PO8 }}</td>
                                        <td>{{ $course->total_PO9 }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="courseInfo">Indicate the primary causal link between the CO and PO by ticking “√” the appropriate box.<br>
                                <label>Other Teaching Methods:&nbsp;</label>{{ $course->{'9OTM'} }}<br>
                                <label>Other Assessment Methods:&nbsp;</label>{{ $course->{'9OAM'} }}</p>
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
                                    <td>{!! $course->{'10TS1_Y'} ? '&#10004;' : ' ' !!}</td>
                                    <td>{!! $course->{'10TS1_N'} ? '&#10004;' : ' ' !!}</td>                                
                                </tr>  
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 2: Interpersonal Skills</td>
                                    <td>{!! $course->{'10TS2_Y'} ? '&#10004;' : ' ' !!}</td>
                                    <td>{!! $course->{'10TS2_N'} ? '&#10004;' : ' ' !!}</td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 3: Communication Skills</td>
                                    <td>{!! $course->{'10TS3_Y'} ? '&#10004;' : ' ' !!}</td>
                                    <td>{!! $course->{'10TS3_N'} ? '&#10004;' : ' ' !!}</td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 4: Digital Skills</td>
                                    <td>{!! $course->{'10TS4_Y'} ? '&#10004;' : ' ' !!}</td>
                                    <td>{!! $course->{'10TS4_N'} ? '&#10004;' : ' ' !!}</td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 5: Numeracy Skills </td>
                                    <td>{!! $course->{'10TS5_Y'} ? '&#10004;' : ' ' !!}</td>
                                    <td>{!! $course->{'10TS5_N'} ? '&#10004;' : ' ' !!}</td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 6: Leadership, autonomy and responsibilities</td>
                                    <td>{!! $course->{'10TS6_Y'} ? '&#10004;' : ' ' !!}</td>
                                    <td>{!! $course->{'10TS6_N'} ? '&#10004;' : ' ' !!}</td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 7: Personal Skills (Life-long learning) </td>
                                    <td>{!! $course->{'10TS7_Y'} ? '&#10004;' : ' ' !!}</td>
                                    <td>{!! $course->{'10TS7_N'} ? '&#10004;' : ' ' !!}</td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 8: Entrepreneurial Skills</td>
                                    <td>{!! $course->{'10TS8_Y'} ? '&#10004;' : ' ' !!}</td>
                                    <td>{!! $course->{'10TS8_N'} ? '&#10004;' : ' ' !!}</td>                                
                                </tr>                                
                                <tr>
                                    <td class="courseInfo" style="width:1400px">TS 9: Ethics and Professionalism </td>
                                    <td>{!! $course->{'10TS9_Y'} ? '&#10004;' : ' ' !!}</td>
                                    <td>{!! $course->{'10TS9_N'} ? '&#10004;' : ' ' !!}</td>                                
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
                                    @if($course)
                                        @foreach($course->courseRows as $row)
                                        <tr>
                                            <td>{{ $row->courseOutline }}</td>           
                                            <td>{{ $row->CO }}</td>
                                            <td>{{ $row->L }}</td>
                                            <td>{{ $row->T }}</td>
                                            <td>{{ $row->P }}</td>
                                            <td>{{ $row->O }}</td>
                                            <td>{{ $row->GuidedLearning }}</td>
                                            <td>{{ $row->IndependentLearning }}</td>
                                            <td>{{ $row->TotalSLT }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        @else
            <h1>Course not found</h1>
        @endif
    </div>
</body>
</div>
@endsection


