<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(){
        return view("home");
    }

    public function private_page(){
        return view("private-page");
    }
}
