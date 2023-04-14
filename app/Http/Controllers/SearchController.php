<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{
    public function searchByStr(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/search.php', [
            'query' => [
                's' => $request->input('search'),
            ],
        ]);
        $body = $response->getBody();
        $data = (array) json_decode($body->getContents());
        $toReturn = '';
        if (count($data) != 0)
        {
            foreach($data as $key => $value)
            {
                if ($key == 5) {
                    break;
                }
                $toReturn .= View::make(
                    'components.recipe-card',
                    [
                        'recipe' => (array) $value[0],
                    ]
                )->render();
            }
        }
        return $toReturn;
    }
}
