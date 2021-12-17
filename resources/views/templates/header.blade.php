<header class="header">
    <div class="main-container header__inner">
        <a class="logo header__logo" href="{{ route("home") }}">
            <img class="logo__img" src="{{ asset('img/main/logo.png') }}" alt="Дурдонаҳо лого">
        </a>

        <form class="search @if($route == 'search') search--active @endif" action="{{ route('search') }}">
            <span class="material-icons-outlined unselectable search__icon">search</span>
            <input class="search__input" placeholder="Ҷӯстуҷӯ..." type="text" name="keyword" id="search" required min="3"
                @if($route == "search")
                    value="{{$keyword}}"
                @endif
            >
        </form>
    
        <nav class="header__nav">
            <ul class="page-nav">
                <li class="page-nav__item">
                    <a class="page-nav__link home-link @if($route == "home") home-link--active @endif" href="{{ route('home') }}"><span class="material-icons unselectable home-link__span">home</span></a>
                </li>
    
                <li class="page-nav__item">
                    <a class="page-nav__link @if($route == "quotes.index" || $route == "quotes.single" || $route == "categories.single") page-nav__link--active @endif" href="{{ route('quotes.index') }}">Иқтибосҳо</a>
                </li>
    
                <li class="page-nav__item">
                    <a class="page-nav__link @if($route == "authors.index" || $route == "authors.single") page-nav__link--active @endif" href="{{ route('authors.index') }}">Муаллифон</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="mobile-header">
        <div class="mobile-header__logo-container">
            <a class="logo mobile-header__logo" href="{{ route("home") }}">
                <img class="logo__img" src="{{ asset('img/main/logo.png') }}" alt="Дурдонаҳо лого">
            </a>
        </div>

        <div class="mobile-header__row">
            <button class="button mobile-menu-toggler">
                <span class="material-icons-outlined">
                    menu
                </span>
            </button>
    
            <form class="search @if($route == 'search') search--active @endif" action="{{ route('search') }}">
                <span class="material-icons-outlined unselectable search__icon">search</span>
                <input class="search__input mobile" placeholder="Ҷӯстуҷӯ..." type="text" name="keyword" id="search" required min="3"
                    @if($route == "search")
                        value="{{$keyword}}"
                    @endif
                >
            </form>
        </div>

    </div>
</header>