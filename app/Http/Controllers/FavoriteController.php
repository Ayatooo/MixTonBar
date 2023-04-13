<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $favoritesIdArr = Favorites::select('cocktail_id')->where('user_id', Auth::user()->id)->get()->toArray();
            $client = new Client();
            $promises = [];
            for ($i = 0; $i < count($favoritesIdArr); $i++) {
                $promises[] = $client->requestAsync('GET', 'https://www.thecocktaildb.com/api/json/v1/1/lookup.php', [
                    'query' => [
                        'i' => $favoritesIdArr[$i]['cocktail_id'],
                    ],
                ]);
            }
            $results = \GuzzleHttp\Promise\settle($promises)->wait();

            $data = [];
            foreach ($results as $result) {
                if ($result['state'] === 'fulfilled') {
                    $body = $result['value']->getBody();
                    $data[] = json_decode($body->getContents(), true)['drinks'][0];
                }
            }
            return view('favorites', [
                'favoritesArr' => $data,
            ]);
        }
        return redirect()->route('home');
    }

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
