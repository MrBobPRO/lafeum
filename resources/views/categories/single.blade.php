@extends('templates.master')

@section("title", $category->name)

@section("meta-tags")
    @php
        //remove slice body
        $share_text = $category->description;
        $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...'    
    @endphp
    <meta name="description" content="{{ $share_text }}">
    <meta property="og:description" content="{{ $share_text }}">
    <meta property="og:title" content="{{ $category->name }}" />
    <meta name="twitter:image" content="{{ asset('img/main/logo-share.png') }}">
    <meta property="og:image:alt" content="{{ $category->name }}">
    <meta name="twitter:title" content="{{ $category->name }}">
    <meta name="twitter:image" content="{{ asset('img/main/logo-share.png') }}">
@endsection

@section('main')

<div class="main-container single-category">
    {{-- Page description start --}}
    <section class="page-desc">
        <h1 class="main-title page-desc__title">{{ $category->name }}</h1>
        <p class="page-desc__text">
            {{ $category->description }}
        </p>
    </section>   {{-- Page description end --}}

    <section class="refresher single-category__refresher" id="refresher">
        @include('templates.refresher')
    </section>

    {{-- Filters and search start --}}
    <section class="rules-wrapper single-category-rules-wrapper">
        @include('quotes.rules')
    </section>
    {{-- Filters and search end --}}

    <section class="quotes-list-wrapper" id="quotes_list_wrapper">
        <h1 class="main-title quotes-list-title">{{ $category->name }}</h1>

        <div class="quotes-list" id="quotes_list">
            @include('quotes.list')
        </div>
    </section>

</div>

@endsection