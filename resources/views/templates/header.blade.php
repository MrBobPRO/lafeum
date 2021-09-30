<header class="header">
    <div class="primary-container header__primary-container">
        <a class="logo header__logo" href="#">
            <img class="logo__img" src="{{ asset('img/main/logo.png') }}" alt="Дурдунаҳо лого">
        </a>
    
        <form class="search" action="#">
            <span class="material-icons-outlined search__icon">search</span>
            <input class="search__input" placeholder="Поиск по дурдонахо" type="text" name="search" id="search">
        </form>
    
        <nav class="header__nav">
            <ul class="page-nav">
                <li class="page-nav__item">
                    <a class="page-nav__link home-link" href="{{ route('home') }}"><span class="material-icons home-link__span">home</span></a>
                </li>
    
                <li class="page-nav__item">
                    <a class="page-nav__link" href="{{ route('quotes.index') }}">Цитаты</a>
                </li>
    
                <li class="page-nav__item">
                    <a class="page-nav__link" href="{{ route('authors.index') }}">Авторы</a>
                </li>
            </ul>
        </nav>
    </div>
</header>