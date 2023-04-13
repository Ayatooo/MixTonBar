<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\RecipesApiController;

class RecipesController extends Controller
{
    public static function index(Request $request, $id)
    {
        $data = RecipesApiController::getById($id);
        return view('recipe', compact('data'));
    }
}
