<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{



    public function secret() {
        $user = \Auth::user();

        return 'Hello ' . $user->email;
    }
}
