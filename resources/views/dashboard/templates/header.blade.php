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
        Категории / Добавить категорию
        @break

        @case('dashboard.categories.single')
        Категории / {{$category->name}}
        @break

        @case('dashboard.options.index')
        Текста
        @break

        @case('dashboard.options.single')
        Текста / {{$option->key}}
        @break

        @case('dashboard.top.index')
        Топ категории
        @break

        @case('dashboard.top.single')
        Топ категории / Топ #{{$top->id}}
        @break

        @endswitch
    </h1> {{-- Header Title end --}}

    {{-- Page info start --}}
    <div class="header__actions">
        {{-- Routes may have different actions --}}
        @switch($route)
        @case('dashboard.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <button class="header__actions-button" id="select_all_button" type="button">Отметить все</button>
        <a class="header__actions-link" href="{{route('dashboard.quotes.create')}}">Добавить цитату</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.authors.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <button class="header__actions-button" id="select_all_button" type="button">Отметить все</button>
        <a class="header__actions-link" href="{{route('dashboard.authors.create')}}">Добавить автора</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.authors.single')
        <form action="{{ route('authors.drop_image') }}" method="POST">
            @csrf
            <input type="hidden" value="{{$author->id}}" name="id">
            <button class="header__actions-button" type="submit">Сбросить фото автора</button>
        </form>
        @break

        @case('dashboard.categories.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <button class="header__actions-button" id="select_all_button" type="button">Отметить все</button>
        <a class="header__actions-link" href="{{route('dashboard.categories.create')}}">Добавить категорию</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @endswitch
    </div> {{-- Page info end --}}

</header>