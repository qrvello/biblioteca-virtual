<div id="category_name" class="carousel slide mb-4 mx-auto" data-ride="carousel">

    <div class="carousel-inner mx-auto">
        @foreach ($publications as $publication)
        <div class="carousel-item @if($publication == $publications->first()) active @endif">
            <x-card-publication :publication="$publication" />
        </div>
        @endforeach
    </div>


    <a class="carousel-control-prev" href="#category_name" role="button" data-slide="prev">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle-fill" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z" />
        </svg>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#category_name" role="button" data-slide="next">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-11.5.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z" />
        </svg>
        <span class="sr-only">Next</span>
    </a>

</div>
