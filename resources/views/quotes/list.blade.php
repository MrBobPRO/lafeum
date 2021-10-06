<div class="quotes-list">
    @foreach($quotes as $q)
        <div class="card card_shadow_sm">
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
                    <span class="material-icons-outlined card__header-icon">screen_share</span>
                </div>

                <div class="card__text">
                    {{ $q->body}}
                </div>

                <div class="card__more card__more--center">
                    <button class="card__more-btn card__more-btn--vertical">Идомаашро мутолиа кунед
                        <span class="material-icons-outlined card__more-icon">expand_more</span>
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $quotes->onEachSide(2)->links() }}