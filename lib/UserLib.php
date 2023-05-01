<?php

namespace Lib;

use Models\User;
use Models\Session;

class UserLib
{

    private $ci;

    public function __construct()
    {
        $this->ci = Leaf\Config::get("app")["instance"];

        if (is_object($this->ci)) {
            $this->ci->load->model('User');
            $this->ci->load->model('Role');
        }
    }

    public function login($user, $pass)
    {
        auth()->useSession();

        $user = auth()->login([
            'email' => $user,
            'password' => $pass
        ]); // returns null if failed

        if (!$user) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
