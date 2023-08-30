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

    public function passDataName()
    {
        $user = Auth::user();
        return view('editName', compact('user'));
    }
    
    public function passDataEmail()
    {
        $user = Auth::user();
        return view('editEmail', compact('user'));
    }

    public function passDataPassword()
    {
        $user = Auth::user();
        return view('editPassword', compact('user'));
    }
    
    public function saveName(Request $req){
        $this->validate($req, [
            'name' => 'required',
        ]);
        $user = Auth::user();
        $user->name = $req->name;
        $user->save();
        return redirect('profile')->with('success', 'Profile name ' . $user->name . ' edited successfully');
    }

    public function saveEmail(Request $req){
        $this->validate($req, [
            'email' => 'required|unique:users,email|email',
        ]);
        $user = Auth::user();
        $user->email = $req->email;
        $user->save();
        return redirect('profile')->with('success', 'Profile email ' . $user->email . ' edited successfully');
    }

    public function savePassword(Request $req){
        $this->validate($req, [
            'password' => 'required|confirmed|min:6',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($req->password);
        $user->save();
        return redirect('profile')->with('success', 'Profile password edited successfully');
    }
}