<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    // public function passDataProfile()
    // {
    //     $user = Auth::user();
    //     return view('editProfile', compact('user'));
    // }
    
    // public function saveProfile(Request $req){
    //     $this->validate($req, [
    //         'name' => 'required',
    //         'email' => 'required|unique:users,email|email',
    //         'password' => 'required|confirmed|min:6',
    //     ]);
    //     $user = Auth::user();
    //     $user->name = $req->name;
    //     $user->email = $req->email;
    //     $user->password = bcrypt($req->password);
    //     $user->save();
    //     return redirect('profile');
    // }
}