<?php

use Models\User;
use Models\Session;

class Auth_hooks{

    private $user;
    private $ci;

    public function __construct() {
        $this->ci = Leaf\Config::get("app")["instance"];

        if (is_object($this->ci)) {
            $this->ci->load->library('MenuLib');
            $this->ci->load->library('Menu_PerfilLib');
        }
    }
}

