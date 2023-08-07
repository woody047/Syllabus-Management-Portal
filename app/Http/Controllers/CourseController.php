<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseRow;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller{
    function showlist(){
        $course = Course::paginate(10,['course_id', 'course_code', 'course_name','course_synopsis']);
        return view('home')->with('course',$course);
    }

    function showCourse($course_id){
        $course = Course::find($course_id);
        return view('showCourse',compact('course'));
    }

    function createCourse(Request $req){
        // user_id cannot be nullable, must provide a valid user_id value when inserting a new record into the courses table.
        // Assuming you have a logged-in user
        $userId = Auth::id();

        //retrieve or create the course instance for the user
        $course = Course::where('user_id',$userId)
                ->where('course_code',$req->course_code)
                ->first();

        if(!$course){
            $course = new Course;
            $course->user_id = $userId;
            $course->course_code = $req->course_code;
            $course->course_name = $req->course_name;
            $course->course_synopsis = $req->course_synopsis;
            $course->course_staff = $req->course_staff;
            $course->course_trimester = $req->course_trimester;
            $course->course_credit = $req->course_credit;
            $course->course_pre = $req->course_pre;
            $course->course_classification = $req->course_classification;
            //8. Course learning outcomes and domain & taxonomy level
            $course->{'8CLO1'} = $req->{'8CLO1'};
            $course->{'8CLO2'} = $req->{'8CLO2'};
            $course->{'8CLO3'} = $req->{'8CLO3'};
            $course->{'8CLO4'} = $req->{'8CLO4'};
            $course->{'8DTL1'} = $req->{'8DTL1'};
            $course->{'8DTL2'} = $req->{'8DTL2'};
            $course->{'8DTL3'} = $req->{'8DTL3'};
            $course->{'8DTL4'} = $req->{'8DTL4'};
            //9. CO1
            //use a ternary operator to convert the checkbox value to an integer (1 for checked, 0 for unchecked) before saving it to the database.
            $course->{'9CO1_PO1'} = $req->has('9CO1_PO1');
            $course->{'9CO1_PO2'} = $req->has('9CO1_PO2');
            $course->{'9CO1_PO3'} = $req->has('9CO1_PO3');
            $course->{'9CO1_PO4'} = $req->has('9CO1_PO4');
            $course->{'9CO1_PO5'} = $req->has('9CO1_PO5');
            $course->{'9CO1_PO6'} = $req->has('9CO1_PO6');
            $course->{'9CO1_PO7'} = $req->has('9CO1_PO7');
            $course->{'9CO1_PO8'} = $req->has('9CO1_PO8');
            $course->{'9CO1_PO9'} = $req->has('9CO1_PO9');
            $course->{'CO1_L'} = $req->{'CO1_L'};
            $course->{'CO1_A'} = $req->{'CO1_A'};
            //9. CO2
            $course->{'9CO2_PO1'} = $req->has('9CO2_PO1');
            $course->{'9CO2_PO2'} = $req->has('9CO2_PO2');
            $course->{'9CO2_PO3'} = $req->has('9CO2_PO3');
            $course->{'9CO2_PO4'} = $req->has('9CO2_PO4');
            $course->{'9CO2_PO5'} = $req->has('9CO2_PO5');
            $course->{'9CO2_PO6'} = $req->has('9CO2_PO6');
            $course->{'9CO2_PO7'} = $req->has('9CO2_PO7');
            $course->{'9CO2_PO8'} = $req->has('9CO2_PO8');
            $course->{'9CO2_PO9'} = $req->has('9CO2_PO9');
            $course->{'CO2_L'} = $req->{'CO2_L'};
            $course->{'CO2_A'} = $req->{'CO2_A'};
            //9. CO3
            $course->{'9CO3_PO1'} = $req->has('9CO3_PO1');
            $course->{'9CO3_PO2'} = $req->has('9CO3_PO2');
            $course->{'9CO3_PO3'} = $req->has('9CO3_PO3');
            $course->{'9CO3_PO4'} = $req->has('9CO3_PO4');
            $course->{'9CO3_PO5'} = $req->has('9CO3_PO5');
            $course->{'9CO3_PO6'} = $req->has('9CO3_PO6');
            $course->{'9CO3_PO7'} = $req->has('9CO3_PO7');
            $course->{'9CO3_PO8'} = $req->has('9CO3_PO8');
            $course->{'9CO3_PO9'} = $req->has('9CO3_PO9');
            $course->{'CO3_L'} = $req->{'CO3_L'};
            $course->{'CO3_A'} = $req->{'CO3_A'};
            //9. CO4
            $course->{'9CO4_PO1'} = $req->has('9CO4_PO1');
            $course->{'9CO4_PO2'} = $req->has('9CO4_PO2');
            $course->{'9CO4_PO3'} = $req->has('9CO4_PO3');
            $course->{'9CO4_PO4'} = $req->has('9CO4_PO4');
            $course->{'9CO4_PO5'} = $req->has('9CO4_PO5');
            $course->{'9CO4_PO6'} = $req->has('9CO4_PO6');
            $course->{'9CO4_PO7'} = $req->has('9CO4_PO7');
            $course->{'9CO4_PO8'} = $req->has('9CO4_PO8');
            $course->{'9CO4_PO9'} = $req->has('9CO4_PO9');
            $course->{'CO4_L'} = $req->{'CO4_L'};
            $course->{'CO4_A'} = $req->{'CO4_A'};
            //9. total
            $course->{'total_PO1'} = $req->{'total_PO1'};
            $course->{'total_PO2'} = $req->{'total_PO2'};
            $course->{'total_PO3'} = $req->{'total_PO3'};
            $course->{'total_PO4'} = $req->{'total_PO4'};
            $course->{'total_PO5'} = $req->{'total_PO5'};
            $course->{'total_PO6'} = $req->{'total_PO6'};
            $course->{'total_PO7'} = $req->{'total_PO7'};
            $course->{'total_PO8'} = $req->{'total_PO8'};
            $course->{'total_PO9'} = $req->{'total_PO9'};
            $course->{'9OTM'} = $req->{'9OTM'};
            $course->{'9OAM'} = $req->{'9OAM'};
            //10. transferable skills
            $course->{'10TS1_Y'} = $req->has('10TS1_Y');
            $course->{'10TS1_N'} = $req->has('10TS1_N');
            $course->{'10TS2_Y'} = $req->has('10TS2_Y');
            $course->{'10TS2_N'} = $req->has('10TS2_N');
            $course->{'10TS3_Y'} = $req->has('10TS3_Y');
            $course->{'10TS3_N'} = $req->has('10TS3_N');
            $course->{'10TS4_Y'} = $req->has('10TS4_Y');
            $course->{'10TS4_N'} = $req->has('10TS4_N');
            $course->{'10TS5_Y'} = $req->has('10TS5_Y');
            $course->{'10TS5_N'} = $req->has('10TS5_N');
            $course->{'10TS6_Y'} = $req->has('10TS6_Y');
            $course->{'10TS6_N'} = $req->has('10TS6_N');
            $course->{'10TS7_Y'} = $req->has('10TS7_Y');
            $course->{'10TS7_N'} = $req->has('10TS7_N');
            $course->{'10TS8_Y'} = $req->has('10TS8_Y');
            $course->{'10TS8_N'} = $req->has('10TS8_N');
            $course->{'10TS9_Y'} = $req->has('10TS9_Y');
            $course->{'10TS9_N'} = $req->has('10TS9_N');
            $course->save();
        }


        // loop through the dynamically genereated rows and associate them with course_id
        // which means the multiple rows will only refer to the particular course_id
        $rowcount = count($req->courseOutline);
        for ($i=0;$i<$rowcount;$i++){
            $courseRow = new CourseRow;
            //use the same course_id for all rows
            $courseRow->course_id = $course->course_id;
            //11
            $courseRow->courseOutline = $req->courseOutline[$i];
            $courseRow->CO = $req->CO[$i];
            $courseRow->L = $req->L[$i];
            $courseRow->T = $req->T[$i];
            $courseRow->P = $req->P[$i];
            $courseRow->O = $req->O[$i];
            $courseRow->GuidedLearning = $req->GuidedLearning[$i];
            $courseRow->IndependentLearning = $req->IndependentLearning[$i];
            $courseRow->TotalSLT = $req->TotalSLT[$i];
            $courseRow->save();
        }
        return redirect("home");
    }

    //retrieve data from database and pass to the edit page    
    function passDataCourse(Request $req){
        $course = Course::find($req->course_id);    
        return view("editCourse",compact('course'));
    }

    function saveCourse(Request $req){
        $course = Course::find($req->course_id);
        $course->course_code = $req->course_code;
        $course->course_name = $req->course_name;
        $course->course_synopsis = $req->course_synopsis;
        $course->course_staff = $req->course_staff;
        $course->course_trimester = $req->course_trimester;
        $course->course_credit = $req->course_credit;
        $course->course_pre = $req->course_pre;
        $course->course_classification = $req->course_classification;
        //8. Course learning outcomes and domain & taxonomy level
        $course->{'8CLO1'} = $req->{'8CLO1'};
        $course->{'8CLO2'} = $req->{'8CLO2'};
        $course->{'8CLO3'} = $req->{'8CLO3'};
        $course->{'8CLO4'} = $req->{'8CLO4'};
        $course->{'8DTL1'} = $req->{'8DTL1'};
        $course->{'8DTL2'} = $req->{'8DTL2'};
        $course->{'8DTL3'} = $req->{'8DTL3'};
        $course->{'8DTL4'} = $req->{'8DTL4'};
        //9. CO1
        //use a ternary operator to convert the checkbox value to an integer (1 for checked, 0 for unchecked) before saving it to the database.
        $course->{'9CO1_PO1'} = $req->has('9CO1_PO1');
        $course->{'9CO1_PO2'} = $req->has('9CO1_PO2');
        $course->{'9CO1_PO3'} = $req->has('9CO1_PO3');
        $course->{'9CO1_PO4'} = $req->has('9CO1_PO4');
        $course->{'9CO1_PO5'} = $req->has('9CO1_PO5');
        $course->{'9CO1_PO6'} = $req->has('9CO1_PO6');
        $course->{'9CO1_PO7'} = $req->has('9CO1_PO7');
        $course->{'9CO1_PO8'} = $req->has('9CO1_PO8');
        $course->{'9CO1_PO9'} = $req->has('9CO1_PO9');
        $course->{'CO1_L'} = $req->{'CO1_L'};
        $course->{'CO1_A'} = $req->{'CO1_A'};
        //9. CO2
        $course->{'9CO2_PO1'} = $req->has('9CO2_PO1');
        $course->{'9CO2_PO2'} = $req->has('9CO2_PO2');
        $course->{'9CO2_PO3'} = $req->has('9CO2_PO3');
        $course->{'9CO2_PO4'} = $req->has('9CO2_PO4');
        $course->{'9CO2_PO5'} = $req->has('9CO2_PO5');
        $course->{'9CO2_PO6'} = $req->has('9CO2_PO6');
        $course->{'9CO2_PO7'} = $req->has('9CO2_PO7');
        $course->{'9CO2_PO8'} = $req->has('9CO2_PO8');
        $course->{'9CO2_PO9'} = $req->has('9CO2_PO9');
        $course->{'CO2_L'} = $req->{'CO2_L'};
        $course->{'CO2_A'} = $req->{'CO2_A'};
        //9. CO3
        $course->{'9CO3_PO1'} = $req->has('9CO3_PO1');
        $course->{'9CO3_PO2'} = $req->has('9CO3_PO2');
        $course->{'9CO3_PO3'} = $req->has('9CO3_PO3');
        $course->{'9CO3_PO4'} = $req->has('9CO3_PO4');
        $course->{'9CO3_PO5'} = $req->has('9CO3_PO5');
        $course->{'9CO3_PO6'} = $req->has('9CO3_PO6');
        $course->{'9CO3_PO7'} = $req->has('9CO3_PO7');
        $course->{'9CO3_PO8'} = $req->has('9CO3_PO8');
        $course->{'9CO3_PO9'} = $req->has('9CO3_PO9');
        $course->{'CO3_L'} = $req->{'CO3_L'};
        $course->{'CO3_A'} = $req->{'CO3_A'};
        //9. CO4
        $course->{'9CO4_PO1'} = $req->has('9CO4_PO1');
        $course->{'9CO4_PO2'} = $req->has('9CO4_PO2');
        $course->{'9CO4_PO3'} = $req->has('9CO4_PO3');
        $course->{'9CO4_PO4'} = $req->has('9CO4_PO4');
        $course->{'9CO4_PO5'} = $req->has('9CO4_PO5');
        $course->{'9CO4_PO6'} = $req->has('9CO4_PO6');
        $course->{'9CO4_PO7'} = $req->has('9CO4_PO7');
        $course->{'9CO4_PO8'} = $req->has('9CO4_PO8');
        $course->{'9CO4_PO9'} = $req->has('9CO4_PO9');
        $course->{'CO4_L'} = $req->{'CO4_L'};
        $course->{'CO4_A'} = $req->{'CO4_A'};
        //9. total
        $course->{'total_PO1'} = $req->{'total_PO1'};
        $course->{'total_PO2'} = $req->{'total_PO2'};
        $course->{'total_PO3'} = $req->{'total_PO3'};
        $course->{'total_PO4'} = $req->{'total_PO4'};
        $course->{'total_PO5'} = $req->{'total_PO5'};
        $course->{'total_PO6'} = $req->{'total_PO6'};
        $course->{'total_PO7'} = $req->{'total_PO7'};
        $course->{'total_PO8'} = $req->{'total_PO8'};
        $course->{'total_PO9'} = $req->{'total_PO9'};
        $course->{'9OTM'} = $req->{'9OTM'};
        $course->{'9OAM'} = $req->{'9OAM'};
        //10. transferable skills
        $course->{'10TS1_Y'} = $req->has('10TS1_Y');
        $course->{'10TS1_N'} = $req->has('10TS1_N');
        $course->{'10TS2_Y'} = $req->has('10TS2_Y');
        $course->{'10TS2_N'} = $req->has('10TS2_N');
        $course->{'10TS3_Y'} = $req->has('10TS3_Y');
        $course->{'10TS3_N'} = $req->has('10TS3_N');
        $course->{'10TS4_Y'} = $req->has('10TS4_Y');
        $course->{'10TS4_N'} = $req->has('10TS4_N');
        $course->{'10TS5_Y'} = $req->has('10TS5_Y');
        $course->{'10TS5_N'} = $req->has('10TS5_N');
        $course->{'10TS6_Y'} = $req->has('10TS6_Y');
        $course->{'10TS6_N'} = $req->has('10TS6_N');
        $course->{'10TS7_Y'} = $req->has('10TS7_Y');
        $course->{'10TS7_N'} = $req->has('10TS7_N');
        $course->{'10TS8_Y'} = $req->has('10TS8_Y');
        $course->{'10TS8_N'} = $req->has('10TS8_N');
        $course->{'10TS9_Y'} = $req->has('10TS9_Y');
        $course->{'10TS9_N'} = $req->has('10TS9_N');
        $course->save();

         // Retrieve the IDs of rows being deleted from the HTML table
         // array_diff function used to find the IDs of rows that exist in the database
         // but are not present in the form data
        $deletedRowIds = array_diff($course->courseRows->pluck('id')->toArray(), $req->courseRowId);
        // Loop through the dynamically generated rows
        $rowcount = count($req->courseOutline);
        for ($i = 0; $i < $rowcount; $i++) {
        // Check if the row exists in the database or create a new instance
        // additional input 'courseRowId[]' to keep track of the existing 'courseRow' IDs
        // can update existing rows instead of always creating new ones
        // If the courseRowId exists for a specific row, it means you're updating an existing courseRow
        // and if it doesn't exist, you're creating a new courseRow
        if (isset($req->courseRowId[$i])) {
            $courseRow = CourseRow::find($req->courseRowId[$i]);
        } else {
            $courseRow = new CourseRow;
            // Set course_id for new rows
            $courseRow->course_id = $course->course_id; 
        }

        // Update or set the attributes for the courseRow
        $courseRow->courseOutline = $req->courseOutline[$i];
        $courseRow->CO = $req->CO[$i];
        $courseRow->L = $req->L[$i];
        $courseRow->T = $req->T[$i];
        $courseRow->P = $req->P[$i];
        $courseRow->O = $req->O[$i];
        $courseRow->GuidedLearning = $req->GuidedLearning[$i];
        $courseRow->IndependentLearning = $req->IndependentLearning[$i];
        $courseRow->TotalSLT = $req->TotalSLT[$i];

        // whereIn is used to delete rows that were removed from the HTML table
        CourseRow::whereIn('id', $deletedRowIds)->delete();
        // Save the courseRow data
        $courseRow->save();
        }
        return redirect('home');
    }

    function archiveCourse($course_id){
        $course = Course::findOrFail($course_id);
        $course->delete();
        // pass course_id as a parameter when calling archiveCourse route
        return redirect('home');
    }

    function showArchivedCourse(){
        //show archived courses
        $archivedCourse = Course::onlyTrashed()->paginate(10);
        return view('showArchivedCourse',compact('archivedCourse'));
    }

    function restoreCourse($course_id){
        $course = Course::withTrashed()->findOrFail($course_id);
        // check if the course is actually softDelete
        if($course->trashed()){
            $course->restore();
        }

        // redirect to the showArchivedCourse once the restore button clicked
        return redirect()->route('showArchivedCourse');
    }

    function searchCourse(Request $req){
        $keyword = $req->input('keyword');

        $course = Course::where('course_name','like','%'.$keyword.'%')
                ->orWhere('course_code','like','%'.$keyword.'%')
                ->paginate(10);

        return view('searchCourse',compact('course','keyword'));
    }
}
