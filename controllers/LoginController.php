<?php

namespace Controllers;

//use Models\Test;

use Leaf\Auth;
use Leaf\Http\Request;
use Models\Menu;
use Models\Role;
use Models\User;
use Lib\UserLib;
use Models\LoginModel;

class LoginController extends Controller
{

    protected $model = NULL;
    public function index()
    {
        return view('example/login');
    }

    public function acceder()
    {

        /*$email = app()->request()->get('user_email');

        print_r("Email: ".$email."\n\r");

        $user = User::where('email',$email)->get();

        //dump($user);

        print_r("user: ".$user);

        /*$password = app()->request()->get('user_password');

        $validation = auth()->validate(['user_email' => 'noSpaces']);

        if (!$validation) {
            response()->exit(auth()->errors());
        }

        auth::useSession();

        if (auth::login(
            [
                'email' => $email,
                'password' => $password
            ]
        )) {
            //return view('example/exito');
            echo 'Exito';
        } else {
            //return view('example/fallo');
            response()->exit(auth()->errors());
        }*/

        $request = app()->request()->body();
        //print_r($request['user_password']);
        $model = LoginModel::authenticate($request);

        print_r($model);
    }
}
