
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/recipe-card.css') }}" media="all">

<div data-id="{{ $recipe['idDrink'] }}" class="container-card-cocktail">
    <img src="{{ $recipe['strDrinkThumb'] }}" alt="img cocktail" class="img-cocktail">
    <div class="infos-cocktail">
        <div class="favorite">
            <i class="icon fa-regular fa-star"></i>
        </div>
        <div class="title">{{ $recipe['strDrink'] }}</div>
        <div class="container-barre">
            <div class="barre"></div>
        </div>
        <div class="category">{{ $recipe['strCategory'] ?? '' }}</div>
        <div class="alcoolornot">{{ $recipe['strAlcoholic'] ?? '' }}</div>
    </div>
</div>
