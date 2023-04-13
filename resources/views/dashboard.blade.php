<x-app-layout>
    <div class="py-12">
        <h1 class="container-title">Cocktails Aléatoires</h1>
        <div class="container">
            @foreach($random as $recipe)
                <x-recipe-card :recipe="$recipe" />
            @endforeach
        </div>
        @if(request()->routeIs('home'))
        <h1 class="container-title">Les Cocktails Avec Alcool</h1>
        <div class="container">
            @for($i = 0; $i < 10; $i++)
                <x-recipe-card :recipe="$alcoholArr[$i]" />
            @endfor
        </div>
        @endif
        @if(request()->routeIs('noalcohol'))
        <h1 class="container-title">Les Cocktails Sans Alcool</h1>
        <div class="container">
            @for($i = 0; $i < 10; $i++)
                <x-recipe-card :recipe="$nonAlcoholArr[$i]" />
            @endfor
        </div>
        @endif
    </div>
    <style>
        .container-title {
            width: 100%;
            display: flex;
            justify-content: center;
            font-family: "Montserrat", sans-serif;
            color: #fff;
            font-size: 2rem;
            font-weight: 700;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 0 5%;
        }
        </style>
</x-app-layout>

<script>
    const containerCardCocktail = document.querySelectorAll('.container-card-cocktail');

    containerCardCocktail.forEach((cocktail) => {
        cocktail.addEventListener('click', () => {
            const id = cocktail.getAttribute('data-id');
            window.location.href = '/recipe/' + id;
        });
    });
</script>
