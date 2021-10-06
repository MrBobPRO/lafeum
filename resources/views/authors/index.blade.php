@extends('templates.master')
@section('content')

<main class="primary-wrapper authors">
    {{-- Page description start --}}
    <div class="page-desc">
        <h1 class="main-title page-desc__title">Муаллифон</h1>
        <p class="page-desc__text">
            Ҳама муаллифон аз рӯйи алифбо.
        </p>
    </div>   {{-- Page description end --}}

    @include('templates.card_switcher', ['class_name' => 'authors__card-switcher'])

    {{-- Filters and search start --}}
    <section class="rules__wrapper">
        <div class="rules authors__rules">
            <h1 class="rules__title">Ҳама</h1>

            <form class="search rules__search" action="#">
                <span class="material-icons-outlined unselectable search__icon rules__search-icon">search</span>
                <input class="search__input rules__search-input" placeholder="Вожаи ҷустуҷӯро ворид кунед" type="text" name="search" id="search">
            </form>
    
            <button class="filters-toogle">
                <span class="material-icons-outlined card__more-icon">chevron_right</span> Тасфияи категорияро боз кардан
            </button>
        </div>

        <div class="filters"></div>
    </section>
    {{-- Filters and search end --}}

    <section class="authors-list-wrapper">
        <h1 class="main-title authors-list__title">Ҳама муаллифон</h1>

        @include('authors.list')
    </section>

</main>

@endsection