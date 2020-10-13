<div class="shadow card mb-3">
    <div class="card-body">
        <h2 class="card-title">{{ $subcategory->title }}</h2>
        @if ($subcategory->description)
        <p class="card-text">{{ $subcategory->description }}</p>
        @endif
        <h6 class="card-text"><a href="{{action('GuestController@subcategory_show', $subcategory->id)}}">Ver contenidos</a></h6>
    </div>
</div>
