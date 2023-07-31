<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
    public function index()
    {   
        $audits = Audit::with('user')
            ->orderBy('created_at', 'desc')->get();

        return view('audits', ['audits' => $audits]);
    }

    function searchAudit(Request $req){
        $keyword = $req->input('keyword');

        $audit = Audit::where('course_name','like','%'.$keyword.'%')
                ->orWhere('course_code','like','%'.$keyword.'%')
                ->paginate(10);

        return view('searchAudit',compact('audit','keyword'));
    }


    // public function showAudits(){
    //     // Retrieve all courses and their corresponding audits
    //     $coursesWithAudits = Course::with('user','auditLogs')->get();

    //      // Pass the data to the 'audits.blade.php' view
    //     return view('audits', compact('coursesWithAudits'));
    // }
}
