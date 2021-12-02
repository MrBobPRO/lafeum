<footer class="footer">
    <div class="main-container footer__inner">

        <a href="#" class="logo footer__logo">
            <img class="logo__img" src="{{ asset('img/main/logo.png') }}" alt="Лафеюм лого">
        </a>

        <div class="footer__terms">
            <a class="footer__terms-link" href="#">Сиёсати маҳрамият</a>
            <a class="footer__terms-link" href="#">Аҳдномаи истифодабарӣ</a>
            <p class="copyright">© 2017 - {{ date("Y")}} — ДУРДУНАҲО. Ҳамаи ҳуқуқҳо ҳифз шудаанд.</p>
        </div>

        <div class="footer__socials">
            <p class="footer__socials-text">Моро мутолиа намоед:</p>

            <div class="socials">
                <a class="socials__link" href="#">
                    @include('svgs.twitter')
                </a>
        
                <a class="socials__link" href="#">
                    @include('svgs.telegram')
                </a>
        
                <a class="socials__link" href="#">
                    @include('svgs.facebook')
                </a>
        
                <a class="socials__link" href="#">
                    @include('svgs.instagram')
                </a>
            </div>
        </div>

    </div>
</footer>