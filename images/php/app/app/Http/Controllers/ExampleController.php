<?php

namespace App\Http\Controllers;

use App\Models\User;

class ExampleController extends Controller
{
    public function index() {
        return "Hello!";
    }

    public function secret() {
        $user = \Auth::user();

        return 'Hello ' . $user->email;
    }
}
