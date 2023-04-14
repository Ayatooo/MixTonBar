<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/recipe.css') }}" media="all">
{{-- @php
            dd($data)
@endphp --}}
<x-app-layout>
    <div class="container-one-cocktail">
        <div class="container-cocktail">
            <div class="container-cocktail-img">
                <img src="{{$data->strDrinkThumb}}" alt="cocktail" class="cocktail-img" />
            </div>
            <div class="container-cocktail-infos">
                <div class="container-cocktail-name">
                    <div class="cocktail-name">{{$data->strDrink}}</div>
                </div>
                <div class="container-cocktail-ingredients">
                    <div class="text-ingredients">Pour préparer ce cocktail, il vous faudra par verre :</div>
                    <ul class="list-ingredients">
                        <li>{{$data->strIngredient1}}</li>
                        <li>{{$data->strIngredient2}}</li>
                        <li>{{$data->strIngredient3}}</li>
                        <li>{{$data->strIngredient4}}</li>
                    </ul>
                </div>
                <div class="container-cocktail-recipe">
                    <div class="cocktail-recipe">
                        <div class="text-recipe">
                            Pour préparer ce cocktail, c’est super simple ! Armez vous d’un shaker et suivez les instructions ci-dessous.
                        </div>
                        <div class="infos-recipe">
                            <ul class="list-recipe">
                                <li>{{$data->strMeasure1}}</li>
                                <li>{{$data->strMeasure2}}</li>
                                <li>{{$data->strMeasure3}}</li>
                                <li>{{$data->strMeasure4}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-the-alcool"></div>
    </div>
    <div>
</x-app-layout>
