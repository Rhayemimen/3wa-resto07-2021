<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;

class AppController extends Controller
{
    public function welcome()
    {
        $meals = Meal::all();

        return view ('welcome',
        ['msg' => "Welcome to 3W acedmy",
         'meals'=> $meals
        ]);
        //'customers' => Customer::take(6)->get()]);ou Customer::all() pour afficher toute la liste

    }
}
