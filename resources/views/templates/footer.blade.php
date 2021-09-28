<div class="fixed-scroll">
    <button class="fixed-scroll__button">
        <span class="material-icons-outlined ">arrow_upward</span>
    </button>

    <button class="fixed-scroll__button">
        <span class="material-icons-outlined">arrow_downward</span>
    </button>
</div>

<footer class="footer">
    <a href="#" class="logo footer__logo">
        <img class="logo__img" src="{{ asset('img/main/lafeum-en-logo.png') }}" alt="Лафеюм лого">
    </a>

    <div class="footer__terms">
        <a class="footer__terms-link" href="#">Политика конфиденциальности</a>
        <a class="footer__terms-link" href="#">Пользовательское соглашение</a>
    </div>

    <hr class="footer__divider">

    <p class="copyright">© 2017 - {{ date("Y")}} — Lafeum. Все права защищены.</p>

    <div class="site-share">
        <a class="site-share__link" href="#">
            <img src="{{ asset('img/main/twitter.png') }}" alt="">
        </a>

        <a class="site-share__link" href="#">
            <img src="{{ asset('img/main/telegram.png') }}" alt="">
        </a>

        <a class="site-share__link" href="#">
            <img src="{{ asset('img/main/facebook.png') }}" alt="">
        </a>

        <a class="site-share__link" href="#">
            <img src="{{ asset('img/main/instagram.png') }}" alt="">
        </a>
    </div>
</footer>