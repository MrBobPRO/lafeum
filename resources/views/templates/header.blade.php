<header class="header">
    <div class="main-container header__inner">
        <a class="logo header__logo" href="{{ route("home") }}">
            <img class="logo__img" src="{{ asset('img/main/logo.png') }}" alt="Дурдунаҳо лого">
        </a>
    
        <form class="search" action="#">
            <span class="material-icons-outlined unselectable search__icon">search</span>
            <input class="search__input" placeholder="Ҷӯстуҷӯ..." type="text" name="search" id="search">
        </form>
    
        <nav class="header__nav">
            <ul class="page-nav">
                <li class="page-nav__item">
                    <a class="page-nav__link home-link @if($route == "home") home-link--active @endif" href="{{ route('home') }}"><span class="material-icons unselectable home-link__span">home</span></a>
                </li>
    
                <li class="page-nav__item">
                    <a class="page-nav__link @if($route == "quotes.index") page-nav__link--active @endif" href="{{ route('quotes.index') }}">Иқтибосҳо</a>
                </li>
    
                <li class="page-nav__item">
                    <a class="page-nav__link @if($route == "authors.index") page-nav__link--active @endif" href="{{ route('authors.index') }}">Муаллифон</a>
                </li>
            </ul>
        </nav>
    </div>
</header>