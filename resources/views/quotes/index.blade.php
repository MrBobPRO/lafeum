@extends('templates.master')
@section('content')

<main class="primary-wrapper quotes">
    {{-- Page description start --}}
    <div class="page-desc">
        <h1 class="main-title page-desc__title">Иқтибосҳо ва афоризмҳо</h1>
        <p class="page-desc__text">
            Беҳтарин иқтибосҳо ва афоризмҳои инсонҳо  ва мутафаккирони бузург .
        </p>
    </div>   {{-- Page description end --}}

    @include('templates.card_switcher', ['class_name' => 'quotes__card-switcher'])

    {{-- Filters and search start --}}
    <section class="rules__wrapper">
        <div class="rules quotes__rules">
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

    <section class="quotes-list-wrapper">
        <h1 class="main-title quotes-list__title">Ҳама иқтибосҳо</h1>

        @include('quotes.list')
    </section>

</main>

@endsection