{{-- @foreach ($data as $recipe)
    <div>
        <h2>{{ $recipe['strDrink'] }}</h2>
    </div>
@endforeach --}}

{{-- CARDS --}}

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/recipe-card.css') }}" media="all">


<div class="container-card-cocktail">
    <img src="{{ URL::asset('img/img-cocktail.png') }}" alt="img cocktail" class="img-cocktail">
    <div class="infos-cocktail">
        <div class="title">1001</div>
        <div class="container-barre">
            <div class="barre"></div>
        </div>
        <div class="category">Ordinary Drink</div>
        <div class="alcoolornot">Alcoholic</div>
    </div>
</div>


<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/header.css') }}" media="all">


{{-- HEADER --}}
<div class="container-header">
    <div class="filters"><img src="{{ URL::asset('img/filters.svg') }}" alt="img-filters" class="img-filters"></div>
    <div class="logo">MIX TON BAR</div>
    <div class="with-alcool">Avec Alcool</div>
    <div class="without-alcool">Sans Alcool</div>
    <div class="container-right"></div>
    <div class="container-searchbar"></div>
    <div class="connexion">Connexion</div>
</div>

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/random.css') }}" media="all">


{{-- RANDOM --}}
<div class="container-random-cocktails">
    <div class="title-random-cocktails">Cocktails aléatoire</div>
    <div class="container-recipe-card">
        {{-- template --}}
    </div>
</div>

