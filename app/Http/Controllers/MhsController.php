<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MhsController extends Controller
{
    public function login(){
        return view('layoutmhs.login');
    }
}
