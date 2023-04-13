<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RecipesApiController extends Controller
{
    public static function getAll($isAlcohol = true)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/filter.php', [
            'query' => [
                'a' => $isAlcohol ? 'Alcoholic' : 'Non_Alcoholic',
            ],
        ]);

        $body = $response->getBody();
        return json_decode($body->getContents(), true)['drinks'];
    }

    public static function getRandom($number)
    {
        $client = new Client();

        $promises = [];
        for ($i = 0; $i < $number; $i++) {
            $promises[] = $client->requestAsync('GET', 'https://www.thecocktaildb.com/api/json/v1/1/random.php');
        }

        $results = \GuzzleHttp\Promise\settle($promises)->wait();

        $data = [];
        foreach ($results as $result) {
            if ($result['state'] === 'fulfilled') {
                $body = $result['value']->getBody();
                $data[] = json_decode($body->getContents(), true)['drinks'][0];
            }
        }
        return $data;
    }

    public static function getById($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/lookup.php', [
            'query' => [
                'i' => $id,
            ],
        ]);

        $body = $response->getBody();

        $data = json_decode($body->getContents());
        return isset($data) ? $data->drinks[0] : abort(404);
    }
}
