@extends('templates.master')

@section("title", $author->name)

@section("meta-tags")
    @php
        //remove slice body
        $share_text = $author->biography;
        $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...'    
    @endphp
    <meta name="description" content="{{ $share_text }}">
    <meta property="og:description" content="{{ $share_text }}">
    <meta property="og:title" content="{{ $author->name }}" />
    <meta property="og:image" content="{{ asset('img/authors/' . $author->photo) }}">
    <meta property="og:image:alt" content="{{ $author->name }}">
    <meta name="twitter:title" content="{{ $author->name }}">
    <meta name="twitter:image" content="{{ asset('img/authors/' . $author->photo) }}">
@endsection

@section('main')

<div class="main-container single-author">
    {{-- About author start --}}
    <section class="single-author__about">
        <div class="card">
            <div class="card__img-container">
                <img class="card__img" src="{{ asset('img/authors/' . $author->photo) }}" alt="{{$author->name}}">
            </div>
        
            <div class="card__body">       
                <div class="card__header">
                    <h2 class="card__header-title"><a href="{{ route('authors.single', $author->url) }}">{{ $author->name }}</a></h2>
                    <a href="{{ route('authors.single', $author->url) }}" class="card__header-hash">#{{ $author->id }}</a>
                    <span class="card__header-icon">
                        @include("templates.share_buttons", ["share_url" => route("authors.single", $author->url)])
                    </span>
                </div>
        
                <div class="card__text">
                    {{ $author->biography}}
                </div>
            </div>
        </div>
    </section>   {{-- About author end --}}

    <section class="refresher single-authors__refresher" id="refresher">
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