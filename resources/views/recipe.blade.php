<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/recipe.css') }}" media="all">
@if (Auth::check())
    @php
    $isFavorite = false;
    DB::table('favorites')->where('user_id', Auth::user()->id)->where('cocktail_id', $data->idDrink)->get()->each(function($item) use (&$isFavorite) {
        $isFavorite = true;
    });
    @endphp
@endif
<x-app-layout>
    <div class="container-one-cocktail">
        <div class="container-cocktail">
            <div class="container-cocktail-img">
                <img src="{{$data->strDrinkThumb}}" alt="cocktail" class="cocktail-img" />
            </div>
            <div data-id="{{$data->idDrink}}" class="container-cocktail-infos">
                <div class="container-cocktail-name">
                    <div class="favorite">
                        @if (Auth::check() && $isFavorite)
                            <i class="icon fa-solid fa-star" style="color: #be21cc"></i>
                        @elseif (Auth::check())
                            <i class="icon fa-regular fa-star" style="color: black"></i>
                        @endif
                    </div>
                    <div class="cocktail-name">{{$data->strDrink}}
                    </div>
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
        <img class="container-the-alcool" alt="alcool-png" src="https://www.thecocktaildb.com/images/ingredients/{{$data->strIngredient1}}-Medium.png">
    </div>
    <div>
</x-app-layout>
<script>
$('.favorite').unbind().click(function() {
    let icon = $(this).find('i');
    $.ajax({
        type: 'POST',
        url: '/add-favorite',
        data: {
            cocktail_id: $(this).parent().parent().attr('data-id'),
            _token: '{{ csrf_token() }}'
        },
        success: function(data) {
            if (data.status == "store") {
                icon.css('color', '#be21cc');
                icon.removeClass('fa-regular');
                icon.addClass('fa-solid');
            } else {
                if (window.location.href.includes('favorites')) {
                    icon.parent().parent().parent().remove();
                }
                icon.css('color', 'black');
                icon.removeClass('fa-solid');
                icon.addClass('fa-regular');
            }
        }
    })
    return false;
});
</script>