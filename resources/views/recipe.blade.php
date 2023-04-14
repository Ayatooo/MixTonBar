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
                    <div class="cocktail-name">{{$data->strDrink}}  <i class="fa-regular fa-star fa-mg" style="color: #010101;"></i></div>
                </div>
                <div class="container-cocktail-ingredients">
                    <div class="text-ingredients">Pour préparer ce cocktail, il vous faudra par verre :</div>
                    <ul class="list-ingredients">
                        @for ($i = 1; $i <= 15; $i++)
                        @if ($data->{'strIngredient'.$i} !== null)
                            <li>{{$data->{'strMeasure'.$i} }} {{ $data->{'strIngredient'.$i} }}</li>
                        @endif
                    @endfor
                    </ul>
                </div>
                <div class="container-cocktail-recipe">
                    <div class="cocktail-recipe">
                        <div class="text-recipe">
                            Pour préparer ce cocktail, c’est super simple ! Armez vous d’un shaker et suivez les instructions ci-dessous.
                        </div>
                        <div class="infos-recipe">
                            <i class="fa-solid fa-square-caret-right fa-xl" style="color: #010101;"></i>
                            <div class="instructions">
                                {{$data->strInstructions}}
                            </div>
                        </div>
                        <div class="degustez">Dégustez !</div>
                    </div>
                </div>
            </div>
        </div>
        <img class="container-the-alcool" src="https://www.thecocktaildb.com/images/ingredients/{{$data->strIngredient1}}-Medium.png">
    </div>
    <div>
</x-app-layout>
