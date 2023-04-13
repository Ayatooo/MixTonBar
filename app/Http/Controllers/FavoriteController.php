<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function updateStatus(Request $request)
    {
        if (Auth::check()) {
            $favorite = Favorites::where('user_id', Auth::user()->id)->where('cocktail_id', $request->input('cocktail_id'))->first();
            if ($favorite) {
                $favorite->delete();
                return response()->json([
                    'success' => true,
                    'status' => 'delete',
                ]);
            }
            Favorites::create([
                'user_id' => Auth::user()->id,
                'cocktail_id' => $request->input('cocktail_id'),
            ]);
            return response()->json([
                'success' => true,
                'status' => 'store',
            ]);
        }
        return response()->json(['success' => false]);
    }
}
