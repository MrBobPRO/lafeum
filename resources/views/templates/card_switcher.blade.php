
{{-- Data cames from AppServiceProvider --}}
<section class="card-switcher {{$class_name}}">
    {{-- Popular quote start --}}
    <div class="card-switcher__item card-switcher__item-quote">
        <h1 class="main-title">Иқтибосҳои маъмул</h1>

        <div class="card card_size_sm card_shadow_sm">
            <div class="card__img-container card__img-container_size_sm">
                <img class="card__img card__img_size_sm" src="{{ asset('img/authors/thumbs/' . $popular_quote->author->photo) }}">
            </div>

            <div class="card__body">
                <div class="card__header card__header_size_sm">
                    <h2 class="card__header-title card__header-title_size_sm">{{ $popular_quote->author->name }}</h2>
                </div>

                <div class="card__text card__text_size_sm">
                    {{ $popular_quote->body}}
                </div>

                <div class="card__more card__more--right">
                    <a href="#" class="card__more-btn">Муфассал
                        <span class="material-icons-outlined card__more-icon">chevron_right</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Popular quote end --}}

    <span class="material-icons unselectable card-switcher__icon">all_inclusive</span>

    {{-- Popular author start --}}
    <div class="card-switcher__item card-switcher__item-author">
        <h1 class="main-title">Муаллифони машҳур</h1>

        <div class="card card_size_sm card_shadow_sm">
            <div class="card__img-container card__img-container_size_sm">
                <img class="card__img card__img_size_sm" src="{{ asset('img/authors/thumbs/' . $popular_author->photo) }}">
            </div>

            <div class="card__body">
                <div class="card__header card__header_size_sm">
                    <h2 class="card__header-title card__header-title_size_sm">{{ $popular_author->name }}</h2>
                </div>

                <div class="card__text card__text_size_sm">
                    {{ $popular_author->biography}}
                </div>

                <div class="card__more card__more--right">
                    <a href="#" class="card__more-btn">Муфассал
                        <span class="material-icons-outlined card__more-icon">chevron_right</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Popular author end --}}

</section>