@foreach($quotes as $q)
<div class="card">
    <div class="card__img-container">
        <img class="card__img" src="{{ asset('img/authors/thumbs/' . $q->author->photo) }}">
    </div>

    <div class="card__body">
        <div class="card__categories">
            @foreach ($q->categories as $c)
            <a class="card__categories-item" href="#">{{ $c->name }}</a>
            @endforeach
        </div>

        <div class="card__header">
            <h2 class="card__header-title">{{ $q->author->name }}</h2>
            <p class="card__header-hash">#{{ $q->id }}</p>
            <span class="card__header-icon">
                @include("svgs.share")
            </span>
        </div>

        <div class="card__text">
            {{ $q->body}}
        </div>

        <div class="more more_align_center">
            <button class="more__button more__button--vertical">Идомаашро мутолиа кунед
                <span class="material-icons-outlined more__icon">expand_more</span>
            </button>
        </div>
    </div>
</div>
@endforeach

{{ $quotes->onEachSide(2)->links("templates.pagination") }}