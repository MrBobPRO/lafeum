@extends('templates.master')

@section("title", "Муаллифон")

@section('main')

<div class="main-container authors">
    {{-- Page description start --}}
    <section class="page-desc">
        <h1 class="main-title page-desc__title">Муаллифон</h1>
        <p class="page-desc__text">
            Ҳама муаллифон аз рӯйи алифбо.
        </p>
    </section>   {{-- Page description end --}}

    <section class="refresher authors__refresher" id="refresher">
        @include('templates.refresher')
    </section>

    {{-- Filters and search start --}}
    <section class="rules authors-rules">
        <div class="rules__inner">
            <div class="search rules__search rules__search--max">
                <span class="material-icons-outlined unselectable search__icon rules__search-icon">search</span>
                <input class="search__input rules__search-input" value="{{$keyword}}" placeholder="Вожаи ҷустуҷӯро ворид кунед" type="text" id="rules_keyword" data-source="authors">
            </div>
        </div>
    </section>
    {{-- Filters and search end --}}

    <section class="authors-list-wrapper" id="authors_list_wrapper">
        <h1 class="main-title authors-list-title">Ҳама муаллифон</h1>

        <div class="authors-list" id="authors_list">
            @include('authors.list')
        </div>
    </section>

</div>

@endsection