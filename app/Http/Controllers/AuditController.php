<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;
//import course model for search engine
use App\Models\Course;

class AuditController extends Controller
{
    public function index()
    {   
        //retrieve the audits alogn with the auditable info (course)
        $audits = Audit::with(['user','auditable'])
            ->orderBy('created_at', 'desc')->get();

        return view('audits', ['audits' => $audits]);
    }

    function searchAudit(Request $req){
        $keyword = $req->input('keyword');

        $audit = Audit::with('user','auditable')
                ->whereHas('auditable',function($query) use ($keyword){
                $query->where('course_name','like','%'.$keyword.'%')
                ->orWhere('course_code','like','%'.$keyword.'%');})
                ->paginate(10);

        return view('searchAudit',compact('audit','keyword'));
    }
}
