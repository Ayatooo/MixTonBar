<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            @foreach($data as $recipe)
                <x-recipe-card :recipe="$recipe" />
            @endforeach
            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> --}}
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>

<style>
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 0 5%;
    }
    </style>
