@extends('templates.master')

@section("title", "Ҷӯстуҷӯ")

@section('main')

<div class="main-container search-page">
    {{-- Page description start --}}
    <section class="page-desc">
        <h1 class="main-title page-desc__title">Натиҷаи ҷӯстуҷӯ</h1>
        <p class="page-desc__text">
            Бо калимаи &laquo;{{$keyword}}&raquo; .
        </p>

        @if($authors->count() + $quotes->count() == 0)
            <p><br><b>Ба дархости шумо ягон натича ёфт нашуд !</b></p>
        @endif
    </section>   {{-- Page description end --}}

    @if (count($authors))
        <section class="search-page__authors">
            <h1 class="main-title">Муаллифон</h1>
            <div class="search-page__list">
                @foreach($authors as $author)
                    <div class="card">
                        <div class="card__img-container">
                            <img class="card__img" src="{{ asset('img/authors/' . $author->photo) }}">
                        </div>
                    
                        <div class="card__body">       
                            <div class="card__header">
                                <h2 class="card__header-title">
                                    <a href="{{ route('authors.single', $author->url) }}">{!! App\Helpers\Helper::highlight_search($keyword, $author->name) !!}</a>
                                </h2>
                                <a href="{{ route('authors.single', $author->url) }}" class="card__header-hash">#{{ $author->id }}</a>
                                <span class="card__header-icon">
                                    @include("templates.share_buttons", ["share_url" => route("authors.single", $author->url)])
                                </span>
                            </div>
                    
                            <div class="card__text">
                                {!! App\Helpers\Helper::highlight_search($keyword, $author->biography) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if (count($quotes))
        <section class="search-page__authors">
            <h1 class="main-title">Иқтибосҳо</h1>
            <div class="search-page__list">
                @foreach($quotes as $q)
                    <div class="card">
                        <div class="card__img-container">
                            <img class="card__img" src="{{ asset('img/authors/' . $q->author->photo) }}">
                        </div>
                    
                        <div class="card__body">
                            <div class="card__categories">
                                @foreach ($q->categories as $c)
                                <a class="card__categories-item" href="{{ route('categories.single', $c->url) }}">{{ $c->name }}</a>
                                @endforeach
                            </div>
                    
                            <div class="card__header">
                                <h2 class="card__header-title">
                                    <a href="{{ route('authors.single', $q->author->url) }}">{!! App\Helpers\Helper::highlight_search($keyword, $q->author->name) !!}</a>
                                </h2>
                                <a href="{{ route('quotes.single', $q->id) }}" class="card__header-hash">#{{ $q->id }}</a>
                                <span class="card__header-icon">
                                    @include("templates.share_buttons", ["share_url" => route("quotes.single", $q->id)])
                                </span>
                            </div>
                    
                            <div class="card__text" data-identificator="quote_list{{$q->id}}">
                                {!! App\Helpers\Helper::highlight_search($keyword, $q->body) !!}
                            </div>
                    
                            <div class="more more_align_center">
                                <button class="more__button more__button--vertical" data-action="expand_quote" data-quote="quote_list{{$q->id}}">Идомаашро мутолиа кунед
                                    <span class="material-icons-outlined more__icon">expand_more</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</div>

@endsection