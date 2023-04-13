<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public static function getAll()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/filter.php', [
            'query' => [
                'a' => 'Alcoholic',
            ],
        ]);

        $body = $response->getBody();
        return json_decode($body->getContents(), true)['drinks'];
    }
}
