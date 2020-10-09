<div class="shadow card mb-3">
    <div class="card-body">
        <h2 class="card-title">{{ $category -> title }}</h2>
        <p class="card-text">{{ $category -> description }}</p>

        @if($category->subcategories->count() >= 1)
        <h6 class="card-text"><a href="{{action('GuestController@subcategories', $category->id)}}">Ver subcategorías</a>
        </h6>
        @else
        <h6 class="card-text"><a href="{{action('GuestController@category_show', $category->id)}}">Ver contenidos</a></h6>
        @endif
    </div>
</div>
