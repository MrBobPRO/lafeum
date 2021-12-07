@extends('templates.master')
@section('main')

<div class="main-container single-quote">
    {{-- Page description start --}}
    <section class="single-quote__about">
        <div class="card">
            <div class="card__img-container">
                <img class="card__img" src="{{ asset('img/authors/thumbs/' . $quote->author->photo) }}">
            </div>
        
            <div class="card__body">
                <div class="card__categories">
                    @foreach ($quote->categories as $c)
                    <a class="card__categories-item" href="{{ route('categories.single', $c->url) }}">{{ $c->name }}</a>
                    @endforeach
                </div>
        
                <div class="card__header">
                    <h2 class="card__header-title"><a href="{{ route('authors.single', $quote->author->url) }}">{{ $quote->author->name }}</a></h2>
                    <a href="{{ route('quotes.single', $quote->id) }}" class="card__header-hash">#{{ $quote->id }}</a>
                    <span class="card__header-icon">
                        @include("svgs.share")
                    </span>
                </div>
        
                <div class="card__text" data-identificator="single_quote{{$quote->id}}">
                    {{ $quote->body}}
                </div>
        
                <div class="more more_align_center">
                    <button class="more__button more__button--vertical" data-action="expand_quote" data-quote="single_quote{{$quote->id}}">Идомаашро мутолиа кунед
                        <span class="material-icons-outlined more__icon">expand_more</span>
                    </button>
                </div>
            </div>
        </div>
    </section>   {{-- Page description end --}}

    <section class="refresher single-quote__refresher" id="refresher">
        @include('templates.refresher')
    </section>

    <section class="quotes-list-wrapper">
        <h1 class="main-title quotes-list-title">Ҳама иқтибосҳои муаллиф</h1>

        <div class="quotes-list">
            @include('quotes.list')
        </div>
    </section>

</div>

@endsection