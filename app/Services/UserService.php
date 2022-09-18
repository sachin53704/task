<?php

namespace App\Services;

use App\Models\User;
use Auth;

class UserService
{
    public function saveProfile($req)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $req->name;
        $user->mobile = $req->mobile;
        if($req->password != "")
        {
            $user->password = bcrypt($req->password);
        }
        if($user->save())
        {
            return true;
        }
    }
}