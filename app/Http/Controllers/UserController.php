<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct()
    {
        // to call user service class
        $this->userService = new UserService;
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function saveProfile(Request $req)
    {
        // to update the user profile details
        $profile = $this->userService->saveProfile($req);

        if($profile)
        {
            session()->flash("success", "Profile updated successfully");

            return back();
        }
    }
}
