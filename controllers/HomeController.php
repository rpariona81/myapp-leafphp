<?php

namespace Controllers;

//use Models\Test;

class HomeController extends Controller
{
    public function index()
    {
        session()->set("username", "Lucas");

        $item = session()->get('username');

        print_r($item);
        return view('example/index');
    }
}