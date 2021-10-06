<div class="authors-list">
    @foreach($authors as $a)
        <div class="card card_shadow_sm card--vertical">
            <div class="card__img-container card__img-container--vertical">
                <img class="card__img" src="{{ asset('img/authors/thumbs/' . $a->photo) }}">
            </div>

            <div class="card__body">

                <div class="card__header card__header--vertical">
                    <h2 class="card__header-title">{{ $a->name }}</h2>
                </div>

                <div class="card__text card__text--vertical">
                    {{ $a->biography}}
                </div>

                <div class="card__more card__more--right">
                    <a href="" class="card__more-btn">Муфассал
                        <span class="material-icons-outlined card__more-icon">chevron_right</span>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $authors->onEachSide(2)->links() }}