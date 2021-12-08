@unless(count($quotes))
    <h1 class="no-quotes-title">Ба дархости шумо ягон иқтибос ёфт нашуд !</h1>
@endunless

@foreach($quotes as $q)
<div class="card">
    <div class="card__img-container">
        <img class="card__img" src="{{ asset('img/authors/thumbs/' . $q->author->photo) }}">
    </div>

    <div class="card__body">
        <div class="card__categories">
            @foreach ($q->categories as $c)
            <a class="card__categories-item" href="{{ route('categories.single', $c->url) }}">{{ $c->name }}</a>
            @endforeach
        </div>

        <div class="card__header">
            <h2 class="card__header-title"><a href="{{ route('authors.single', $q->author->url) }}">{{ $q->author->name }}</a></h2>
            <a href="{{ route('quotes.single', $q->id) }}" class="card__header-hash">#{{ $q->id }}</a>
            <span class="card__header-icon">
                @include("templates.share_buttons", ["share_url" => route("quotes.single", $q->id)])
            </span>
        </div>

        <div class="card__text" data-identificator="quote_list{{$q->id}}">
            {{ $q->body}}
        </div>

        <div class="more more_align_center">
            <button class="more__button more__button--vertical" data-action="expand_quote" data-quote="quote_list{{$q->id}}">Идомаашро мутолиа кунед
                <span class="material-icons-outlined more__icon">expand_more</span>
            </button>
        </div>
    </div>
</div>
@endforeach

{{ $quotes->onEachSide(1)->links("templates.pagination") }}