<div class="shadow card mb-3">
    <div class="card-body">
        <h2 class="card-title">{{ $subcategory->title }}</h2>
        <p class="card-text">Descripción: {{ $subcategory->description }}</p>
        <h6 class="card-text"><a href="{{action('GuestController@subcategory_show', $subcategory->id)}}">Ver contenidos</a></h6>
    </div>
</div>