<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\RecipesApiController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = RecipesApiController::getAll();
        return view('dashboard', compact('data'));
    }
}
