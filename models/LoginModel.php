<?php

namespace Models;

use Illuminate\Support\Facades\Hash;
use Leaf\Helpers\Password;
use PhpParser\Node\Stmt\If_;

class LoginModel
{

    public static function authenticate($request)
    {

        $email = $request['user_email'];
        $password = $request['user_password'];

        $user = User::where('email', $email)->first();

        if ($user) {
            if (Password::verify($password,$user->password)) {
                return 90000;
                //return $user->password."\r\n".password_hash('secret',PASSWORD_BCRYPT);
            } else {
                return -1000;
            }
        } else {
            return 5000;
        }
    }
}
