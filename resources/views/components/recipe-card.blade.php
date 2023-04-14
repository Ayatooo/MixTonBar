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

<script>
    $(document).ready(function() {
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
                        icon.css('color', 'white');
                        icon.removeClass('fa-solid');
                        icon.addClass('fa-regular');
                    }
                }
            })
            return false;
        });

        $('.container-card-cocktail').unbind().click(function() {
            const id = $(this).attr('data-id');
            window.location.href = '/recipe/' + id;
        });
    });
</script>