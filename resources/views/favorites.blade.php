<x-app-layout>
    <div class="py-12">
        <h1 class="container-title">Mes Favoris 🎈</h1>
        <div class="container">
            @if (count($favoritesArr) == 0)
                <p style="color: #fff; font-size: 1.5rem; font-weight: 700; text-align: center;">Vous n'avez pas encore de favoris !</p>
            @else
                @for($i = 0; $i < count($favoritesArr); $i++)
                    <x-recipe-card :recipe="$favoritesArr[$i]" />
                @endfor
            @endif
        </div>
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
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 0 5%;
        }
        </style>
</x-app-layout>
