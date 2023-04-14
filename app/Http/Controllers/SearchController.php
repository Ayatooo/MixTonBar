<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchByStr(Request $request)
    {
        $term = $request->input('search')['term'];
        $client = new Client();
        $response = $client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/search.php', [
            'query' => [
                's' => $term,
            ],
        ]);
        $body = $response->getBody();
        $data = (array) json_decode($body->getContents());
        $toReturn = [];
        if (isset($data['drinks'])) {
            foreach ($data['drinks'] as $drink) {
                $toReturn[] = [
                    'id' => $drink->idDrink,
                    'name' => $drink->strDrink,
                ];
            }
        }
        return $toReturn;
    }
}
