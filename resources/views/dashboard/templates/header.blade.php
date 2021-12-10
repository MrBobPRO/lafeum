<header class="header" id="header">
    <span class="material-icons-outlined aside-toggler" id="aside_toggler" data-bs-toggle="tooltip"
        data-bs-placement="bottom" title="На весь экран">menu</span>
    {{-- Header Title start --}}
    <h1 class="header__title">
        @switch($route)
        @case('dashboard.index')
        Цитаты
        @break

        @case('dashboard.quotes.single')
        Цитаты / Редактировать цитату #{{$quote->id}}
        @break

        @case('dashboard.quotes.create')
        Цитаты / Добавить цитату
        @break

        @case('dashboard.authors.index')
        Авторы
        @break

        @case('dashboard.authors.create')
        Авторы / Добавить автора
        @break

        @case('dashboard.authors.single')
        Авторы / {{$author->name}}
        @break

        @case('dashboard.categories.index')
        Категории
        @break

        @case('dashboard.categories.create')
        Категории / Добавить слайд
        @break

        @case('dashboard.categories.single')
        Категории / {{$category->name}}
        @break

        @endswitch
    </h1> {{-- Header Title end --}}

    {{-- Page info start --}}
    <div class="header__actions">
        {{-- Routes may have different actions --}}
        @switch($route)
        @case('dashboard.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.quotes.create')}}">Добавить цитату</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.authors.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.authors.create')}}">Добавить автора</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.categories.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.categories.create')}}">Добавить категорию</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @endswitch
    </div> {{-- Page info end --}}

</header>