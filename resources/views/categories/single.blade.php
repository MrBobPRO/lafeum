@extends('templates.master')
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
        @include('templates.rules', ["rules_title" => $category->name])
    </section>
    {{-- Filters and search end --}}

    <section class="quotes-list-wrapper">
        <h1 class="main-title quotes-list-title">Ҳама иқтибосҳо</h1>

        <div class="quotes-list">
            @include('quotes.list')
        </div>
    </section>

</div>

@endsection