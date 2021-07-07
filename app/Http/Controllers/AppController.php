<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class AppController extends Controller
{
    public function welcome()
    {
        return view ('welcome',
        ['msg' => "Welcome to 3W acedmy"]);
        //'customers' => Customer::take(6)->get()]);ou Customer::all() pour afficher toute la liste

    }
}
