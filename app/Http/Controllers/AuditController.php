<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;


class AuditController extends Controller
{
    public function index()
    {   
        //retrieve the audits along with the auditable info (course)
        $audits = Audit::with(['user','auditable'])
            ->orderBy('created_at', 'desc')->paginate(10);

        return view('audits', ['audits' => $audits]);
    }

    // function searchAudit(Request $req) { 
    //     $keyword = $req->input('keyword');
    
    //     //added an additional orWhereHas clause to the query
    //     //checks the relationship between the audit logs and the related Course model 
    //     //to match the course_name and course_code attributes
    //     $audit = Audit::with('user', 'auditable')
    //     ->where(function ($query) use ($keyword) {
    //         $query->whereHas('auditable', function ($query) use ($keyword) {
    //             $query->where('course_name', 'like', '%' . $keyword . '%')
    //                   ->orWhere('course_code', 'like', '%' . $keyword . '%');
    //         })
    //         ->orWhereHas('auditable.courseRows', function ($query) use ($keyword) {
    //             $query->where('course_name', 'like', '%' . $keyword . '%')
    //                   ->orWhere('course_code', 'like', '%' . $keyword . '%');
    //         })
    //         ->orWhereHas('auditable.infoOnPracRows', function ($query) use ($keyword) {
    //             $query->where('course_name', 'like', '%' . $keyword . '%')
    //                   ->orWhere('course_code', 'like', '%' . $keyword . '%');
    //         });
    //     })
    //     ->paginate(10);        
        
    //     return view('searchAudit', compact('audits', 'keyword'));
    // }


    //separated the Course model search from the CourseRow and InfoOnPracRow models' searches. 
    //It first searches for course_code and course_name within the Course model, 
    //and then searches for those values within related CourseRow and InfoOnPracRow models' course relationships.
    public function searchAudit(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $audits = Audit::with('auditable','user')
        ->whereHasMorph('auditable', ['App\Models\Course'], function ($query) use ($keyword) {
            $query->where('course_code', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('course_name', 'LIKE', '%' . $keyword . '%');
        })->orWhereHasMorph('auditable', ['App\Models\CourseRow', 'App\Models\InfoOnPracRow'], function ($query) use ($keyword) {
            $query->whereHas('course', function ($courseQuery) use ($keyword) {
                $courseQuery->where('course_code', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('course_name', 'LIKE', '%' . $keyword . '%');
            });
        })->orderBy('created_at', 'desc')->paginate(10);
        return view('searchAudit', compact('audits','keyword'));
    }
}
