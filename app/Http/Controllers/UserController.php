<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use OwenIt\Auditing\Models\Audit;
use Auth;


class UserController extends Controller
{
    public function auditLogHistory()
    {   
        $userId = auth()->user()->id;

        //retrieve the audits along with the auditable info (course)
        $profiles = Audit::with(['user','auditable'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile', ['profiles' => $profiles]);
    }

    public function passDataProfile()
    {
        $user = Auth::user();
        return view('editProfile', compact('user'));
    }
    
}