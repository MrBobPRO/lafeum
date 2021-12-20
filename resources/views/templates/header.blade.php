<header class="header">
    <div class="main-container header__inner">
        <a class="logo header__logo" href="{{ route("home") }}">
            <img class="logo__img" src="{{ asset('img/main/logo.svg') }}" alt="Дурдонаҳо лого">
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

    {{-- Mobile header start --}}
    <div class="mobile-header">
        <div class="mobile-header__logo-container">
            <a class="logo mobile-header__logo" href="{{ route("home") }}">
                <img class="logo__img" src="{{ asset('img/main/logo.svg') }}" alt="Дурдонаҳо лого">
            </a>
        </div>

        <div class="mobile-header__row">
            <button class="button mobile-menu-toggler" data-action="toggle_mobile_menu">
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

        {{-- Mobile menu start --}}
        <div class="mobile-menu" id="mobile_menu">
            <a class="logo mobile-menu__logo" href="{{ route("home") }}">
                <img class="mobile-menu__logo-img" src="{{ asset('img/main/logo-white.svg') }}" alt="Дурдонаҳо лого">
            </a>

            <nav class="mobile-menu__nav">
                <ul class="mobile-menu__ul">
                    <li class="mobile-menu__li">
                        <a class="mobile-menu__link" href="{{ route('home') }}">Главная</a>
                    </li>

                    <li class="mobile-menu__li">
                        <a class="mobile-menu__link" href="{{ route('quotes.index') }}">Иқтибосҳо</a>
                    </li>

                    <li class="mobile-menu__li">
                        <a class="mobile-menu__link" href="javascript:void(0)" data-action="toggle_mobile_categories">Категорияҳо</a>
                    </li>

                    <li class="mobile-menu__li">
                        <a class="mobile-menu__link" href="{{ route('authors.index') }}">Муаллифон</a>
                    </li>
                </ul>
            </nav>

            <button class="mobile-menu__close" data-action="toggle_mobile_menu">
                <span class="material-icons-outlined">close</span>
            </button>
        </div> {{-- Mobile menu end --}}
        
        {{-- Mobile categories start --}}
        <div class="mobile-categories" id="mobile_categories">
            <div class="mobile-categories__controls">
                <button class="mobile-menu__return" data-action="toggle_mobile_categories">
                    <span class="material-icons-outlined">keyboard_backspace</span>
                </button>

                <button class="mobile-menu__close" data-action="toggle_mobile_menu">
                    <span class="material-icons-outlined">close</span>
                </button>
            </div>

            <h1 class="mobile-categories__title">Категорияҳо</h1>

            <nav class="mobile-menu__nav">
                <ul class="mobile-menu__ul">
                    @foreach ($categories as $cat)
                        <li class="mobile-menu__li">
                            <a class="mobile-menu__link" href="{{ route('categories.single', $cat->url) }}">{{$cat->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div {{-- Mobile categories end --}}

    </div>  {{-- Mobile header end --}}
</header>