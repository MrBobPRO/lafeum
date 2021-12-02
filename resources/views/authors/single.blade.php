@extends('templates.master')
@section('main')

<div class="main-container single-author">
    {{-- About author start --}}
    <section class="single-author__about">
        <div class="card">
            <div class="card__img-container">
                <img class="card__img" src="{{ asset('img/authors/thumbs/' . $author->photo) }}">
            </div>
        
            <div class="card__body">       
                <div class="card__header">
                    <h2 class="card__header-title">{{ $author->name }}</h2>
                    <a href="{{ route('authors.single', $author->url) }}" class="card__header-hash">#{{ $author->id }}</a>
                    <span class="card__header-icon">
                        @include("svgs.share")
                    </span>
                </div>
        
                <div class="card__text">
                    {{ $author->biography}}
                </div>
            </div>
        </div>
    </section>   {{-- About author end --}}

    <section class="refresher single-category__refresher" id="refresher">
        @include('templates.refresher')
    </section>

    {{-- Filters and search start --}}
    <section class="rules-wrapper single-category-rules-wrapper">
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