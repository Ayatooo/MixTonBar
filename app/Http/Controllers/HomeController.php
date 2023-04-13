<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\RecipesApiController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $alcoholArr = RecipesApiController::getAll();
        $nonAlcoholArr = RecipesApiController::getAll(false);
        $random = RecipesApiController::getRandom(4);
        return view('home', compact('alcoholArr', 'nonAlcoholArr', 'random'));
    }
}
