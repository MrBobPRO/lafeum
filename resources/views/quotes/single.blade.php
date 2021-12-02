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
                    <h2 class="card__header-title">{{ $quote->author->name }}</h2>
                    <a href="{{ route('quotes.single', $quote->id) }}" class="card__header-hash">#{{ $quote->id }}</a>
                    <span class="card__header-icon">
                        @include("svgs.share")
                    </span>
                </div>
        
                <div class="card__text">
                    {{ $quote->body}}
                </div>
        
                <div class="more more_align_center">
                    <button class="more__button more__button--vertical">Идомаашро мутолиа кунед
                        <span class="material-icons-outlined more__icon">expand_more</span>
                    </button>
                </div>
            </div>
        </div>
    </section>   {{-- Page description end --}}

    <section class="refresher quotes__refresher" id="refresher">
        @include('templates.refresher')
    </section>

    {{-- Filters and search start --}}
    <section class="rules-wrapper quotes-rules-wrapper">
        @include('templates.rules')
    </section>
    {{-- Filters and search end --}}

    <section class="quotes-list-wrapper">
        <h1 class="main-title quotes-list-title">Ҳама иқтибосҳои муаллиф</h1>

        <div class="quotes-list">
            @include('quotes.list')
        </div>
    </section>

</div>

@endsection