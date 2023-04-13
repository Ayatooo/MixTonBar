<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\RecipesController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = RecipesController::getAll();
        return view('home');
    }
}
