<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RecipesController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        // https://www.thecocktaildb.com/api/json/v1/1/filter.php?a=Alcoholic
        $response = $client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/filter.php', [
            'query' => [
                'a' => 'Alcoholic',
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body->getContents(), true)['drinks'];

        return View('components.recipe-card', [
            'data' => $data,
        ]);
    }
}
