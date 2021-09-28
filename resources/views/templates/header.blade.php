<header class="header">
    <nav class="header__nav">
        <a class="logo header__logo" href="#">
            <img class="logo__img" src="{{ asset('img/main/lafeum-ru-logo.png') }}" alt="Лафеюм лого">
        </a>

        <ul class="page-nav">
            <li class="page-nav__item">
                <a class="page-nav__link page-nav__link--active" href="{{ route('quotes.index') }}">Цитаты</a>
            </li>
            <li class="page-nav__item">
                <a class="page-nav__link" href="{{ route('authors.index') }}">Авторы</a>
            </li>
            <li class="page-nav__item">
                <a class="page-nav__link" href="{{ route('contacts.index') }}">Контакты</a>
            </li>
        </ul>
    </nav>
</header>