{{-- Data cames from AppServiceProvider --}}

{{-- Popular quote start --}}
<div class="refresher__item">
    <h1 class="main-title">Иқтибосҳои маъмул</h1>

    <div class="refresher__card">
        <div class="refresher__card-img-container">
            <img class="refresher__card-img" src="{{ asset('img/authors/thumbs/' . $popular_quote->author->photo) }}">
        </div>

        <div class="refresher__card-text">
            <h2 class="refresher__card-title">{{ $popular_quote->author->name }}</h2>
            <div class="refresher__card-body">
                {{ $popular_quote->body}}
            </div>
            <div class="more more_align_right">
                <a href="{{ route('quotes.single', $popular_quote->id) }}" class="more__button">Муфассал
                    <span class="material-icons-outlined more__icon">chevron_right</span>
                </a>
            </div>
        </div>
    </div>

</div>
{{-- Popular quote end --}}

<button class="refresher__icon" id="refresher_icon">
    @include("svgs.infinity")
</button>


{{-- Popular author start --}}
<div class="refresher__item">
    <h1 class="main-title">Муаллифони машҳур</h1>

    <div class="refresher__card">
        <div class="refresher__card-img-container">
            <img class="refresher__card-img" src="{{ asset('img/authors/thumbs/' . $popular_author->photo) }}">
        </div>

        <div class="refresher__card-text">
            <h2 class="refresher__card-title">{{ $popular_author->name }}</h2>
            <div class="refresher__card-body">
                {{ $popular_author->biography}}
            </div>
            <div class="more more_align_right">
                <a href="{{ route('authors.single', $popular_author->url) }}" class="more__button">Муфассал
                    <span class="material-icons-outlined more__icon">chevron_right</span>
                </a>
            </div>
        </div>
    </div>

</div>
{{-- Popular author end --}}