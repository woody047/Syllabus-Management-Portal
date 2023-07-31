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
                        <td class="courseInfo">
                            <label>Synopsis:&nbsp;</label><br><textarea name="course_synopsis" style="width:1100px;height:150px;" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td class="courseInfo">
                            <label>Name(s) of academic staff:&nbsp;</label><input name="course_staff"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td class="courseInfo">
                            <label>Trimester / Year offered:&nbsp;</label><input name="course_trimester" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td class="courseInfo">
                            <label>Credit Value:&nbsp;</label><input name="course_credit" required></input>
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td class="courseInfo">
                            <label>Per-requisite / co-requisite:&nbsp;</label><input name="course_pre" style="width:400px"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td class="courseInfo">
                            <label>Course Classification:&nbsp;</label><input name="course_classification" required></input>
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
                                        <label>CO1- &nbsp;</label><input type="text" name="8CLO1" class="tab-space" style="width:700px;"></input><br>
                                        <label>CO2- &nbsp;</label><input type="text" name="8CLO2" class="tab-space" style="width:700px;"></input><br>
                                        <label>CO3- &nbsp;</label><input type="text" name="8CLO3" class="tab-space" style="width:700px;"></input><br>
                                        <label>CO4- &nbsp;</label><input type="text" name="8CLO4" class="tab-space" style="width:700px;"></input><br>

                                    </td>
                                    <td style="width:100px;">
                                        <input type="text" name="8DTL1" class="tab-space"></input><br>
                                        <input type="text" name="8DTL2" class="tab-space"></input><br>
                                        <input type="text" name="8DTL3" class="tab-space"></input><br>
                                        <input type="text" name="8DTL4" class="tab-space"></input><br>

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
                                        <td><input type="checkbox" name="9CO1_PO1"></input></td>
                                        <td><input type="checkbox" name="9CO1_PO2"></input></td>
                                        <td><input type="checkbox" name="9CO1_PO3"></input></td>
                                        <td><input type="checkbox" name="9CO1_PO4"></input></td>
                                        <td><input type="checkbox" name="9CO1_PO5"></input></td>
                                        <td><input type="checkbox" name="9CO1_PO6"></input></td>
                                        <td><input type="checkbox" name="9CO1_PO7"></input></td>
                                        <td><input type="checkbox" name="9CO1_PO8"></input></td>
                                        <td><input type="checkbox" name="9CO1_PO9"></input></td>
                                        <td><input type="text" name="CO1_L" style="width:100px"></input></td>
                                        <td><input type="text" name="CO1_A" style="width:80px"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label>CO2</label></td>           
                                        <td><input type="checkbox" name="9CO2_PO1" ></input></td>
                                        <td><input type="checkbox" name="9CO2_PO2" ></input></td>
                                        <td><input type="checkbox" name="9CO2_PO3" ></input></td>
                                        <td><input type="checkbox" name="9CO2_PO4" ></input></td>
                                        <td><input type="checkbox" name="9CO2_PO5" ></input></td>
                                        <td><input type="checkbox" name="9CO2_PO6" ></input></td>
                                        <td><input type="checkbox" name="9CO2_PO7" ></input></td>
                                        <td><input type="checkbox" name="9CO2_PO8" ></input></td>
                                        <td><input type="checkbox" name="9CO2_PO9" ></input></td>
                                        <td><input type="text" name="CO2_L" style="width:100px"></input></td>
                                        <td><input type="text" name="CO2_A" style="width:80px"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label>CO3</label></td>           
                                        <td><input type="checkbox" name="9CO3_PO1" ></input></td>
                                        <td><input type="checkbox" name="9CO3_PO2" ></input></td>
                                        <td><input type="checkbox" name="9CO3_PO3" ></input></td>
                                        <td><input type="checkbox" name="9CO3_PO4" ></input></td>
                                        <td><input type="checkbox" name="9CO3_PO5" ></input></td>
                                        <td><input type="checkbox" name="9CO3_PO6" ></input></td>
                                        <td><input type="checkbox" name="9CO3_PO7" ></input></td>
                                        <td><input type="checkbox" name="9CO3_PO8" ></input></td>
                                        <td><input type="checkbox" name="9CO3_PO9" ></input></td>
                                        <td><input type="text" name="CO3_L" style="width:100px"></input></td>
                                        <td><input type="text" name="CO3_A" style="width:80px"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label>CO4</label></td>           
                                        <td><input type="checkbox" name="9CO4_PO1" ></input></td>
                                        <td><input type="checkbox" name="9CO4_PO2" ></input></td>
                                        <td><input type="checkbox" name="9CO4_PO3" ></input></td>
                                        <td><input type="checkbox" name="9CO4_PO4" ></input></td>
                                        <td><input type="checkbox" name="9CO4_PO5" ></input></td>
                                        <td><input type="checkbox" name="9CO4_PO6" ></input></td>
                                        <td><input type="checkbox" name="9CO4_PO7" ></input></td>
                                        <td><input type="checkbox" name="9CO4_PO8" ></input></td>
                                        <td><input type="checkbox" name="9CO4_PO9" ></input></td>
                                        <td><input type="text" name="CO4_L" style="width:100px"></input></td>
                                        <td><input type="text" name="CO4_A" style="width:80px"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label>Total</label></td>           
                                        <td><input type="text" name="total_PO1" style="width:20px"></input></td>
                                        <td><input type="text" name="total_PO2" style="width:20px"></input></td>
                                        <td><input type="text" name="total_PO3" style="width:20px"></input></td>
                                        <td><input type="text" name="total_PO4" style="width:20px"></input></td>
                                        <td><input type="text" name="total_PO5" style="width:20px"></input></td>
                                        <td><input type="text" name="total_PO6" style="width:20px"></input></td>
                                        <td><input type="text" name="total_PO7" style="width:20px"></input></td>
                                        <td><input type="text" name="total_PO8" style="width:20px"></input></td>
                                        <td><input type="text" name="total_PO9" style="width:20px"></input></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="courseInfo">Indicate the primary causal link between the CO and PO by ticking “√” the appropriate box.<br>
                                <label>Other Teaching Methods:&nbsp;</label><input type="text" name="9OTM" class="tab-space" style="width:500px;" required></input><br>
                                <label>Other Assessment Methods:&nbsp;</label><input type="text" name="9OAM" class="tab-space" style="width:500px;" required></input></p>
                            <p class="courseInfo">2 L = Lecture, T = Tutorial, P = Practical, O = Others<br>3 Te = Test, Q = Quiz, A = Assignment, P = Practical, Pre = Presentation, CaS = Case Study, FE = Final Exam, O = Others</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</body>
</div>
@endsection

