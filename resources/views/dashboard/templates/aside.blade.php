<aside class="aside" id="aside">
    <a class="aside__logo" href="{{ route('home') }}" target="_blank">
        <img class="aside__logo-image" src="{{ asset('img/main/logo.svg') }}">
    </a>

    <img class="aside__avatar" src="{{ asset('img/main/admin.jpg') }}">

    <nav class="aside__nav">
        <ul class="aside__nav-ul">
            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.index' || $route == 'dashboard.quotes.single' || $route == 'dashboard.quotes.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span
                        class="aside__nav-link-icon material-icons">edit</span> Цитаты</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.authors.index' || $route == 'dashboard.authors.single' || $route == 'dashboard.authors.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.authors.index')}}"><span class="aside__nav-link-icon material-icons">account_circle</span>
                    Авторы</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.categories.index' || $route == 'dashboard.categories.single' || $route == 'dashboard.categories.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.categories.index')}}"><span class="aside__nav-link-icon material-icons">article</span>
                    Категории</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.top.index' || $route == 'dashboard.top.single') aside__nav-link--active @endif"
                    href="{{route('dashboard.top.index')}}"><span class="aside__nav-link-icon material-icons">star_rate</span>
                    Топ категории</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.options.index' || $route == 'dashboard.options.single') aside__nav-link--active @endif"
                    href="{{route('dashboard.options.index')}}"><span class="aside__nav-link-icon material-icons">notes</span>
                    Текста</a>
            </li>

            <li class="aside__nav-li">
                <form class="aside__form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="aside__form-button" type="submit"><span class="aside__form-icon material-icons">logout</span>
                        Выйти</button>
                </form>
            </li>
        </ul>
    </nav>

</aside>