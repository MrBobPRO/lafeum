@extends('templates.master')
@section('content')

<main class="primary-container home">
    {{-- Welcome start --}}
    <section class="welcome">

        <aside class="categories">
            <h1 class="main-title categories__title">Категории</h1>
            <div class="categories__list">
                @foreach ($categories as $cat)
                    <a class="categories__link" href="#">{{$cat->name}}</a>
                @endforeach
            </div>
        </aside>

        {{-- Welcome Bodt start --}}
        <div class="welcome__body">
            {{-- About start --}}
            <div class="about">
                <h1 class="main-title about__title">О Дурдунаҳо</h1>
                <p class="about__text">
                    Уважаемый читатель, искренне рады видеть вас на нашем ресурсе! Сайт представляет собой коллекцию самых популярных, вдохновляющих и мотивационных цитат, высказываний и афоризмов от выдающихся личностей, ученых, философов и других, заслуживающих внимания, авторов. Ресурс посвящен основным актуальным вопросам существования человека - вопросам бытия, смысла жизни, любви к жизни, личностного роста, свободы воли и мн. др. Цель ресурса - доступность необходимых знаний для формирования рационального мировоззрения и миропонимания, раскрытию личностного потенциала и самореализации. Для удобства навигации, весь материал сгруппирован по темам. Есть деление по авторам, где вы можете почитать конкретного заинтересовавшего вас ученого или философа, художника или артиста, писателя. На сайте есть подборка пословиц и поговорок народов мира, и ставшие "крылатыми" фразы из известных фильмов и сериалов. В будущем, планируется расширять возможности сайта, например, можно будет размещать свои авторские цитаты, публикации и научные работы, посвященные вопросам современного общества, обсуждать их на внутреннем форуме. Следите за обновлениями! Счастливого путешествия в мир знаний, мудрости и любви!
                </p>
            </div>  {{-- About end --}}
            
            {{-- Latest quotes start --}}
            <div class="latest-quotes">
                <h1 class="main-title latest-quotes__title">Последние цитаты</h1>
                {{-- Owl carousel container start --}}
                <div class="owl-carousel-container">
                    <div class="owl-carousel quotes-carousel">
                        @foreach ($latest_quotes as $q)
                            <div class="card">
                                <div class="card__img-container">
                                    <img class="card__img" src="{{ asset('img/authors/thumbs/' . $q->author->photo) }}">
                                </div>
                
                                <div class="card__body">
                                    <div class="card__categories">
                                        @foreach ($q->categories as $c)
                                            <a class="card__categories-item" href="#">{{ $c->name }}</a>
                                        @endforeach
                                    </div>
                
                                    <div class="card__header">
                                        <h2 class="card__header-title">{{ $q->author->name }}</h2>
                                        <p class="card__header-hash">#{{ $q->id }}</p>
                                        <span class="material-icons-outlined card__header-icon">screen_share</span>
                                    </div>
                
                                    <div class="card__text">
                                        {{ $q->body}}
                                    </div>
                
                                    <div class="card__more card__more--center">
                                        <button class="card__more-btn card__more-btn--vertical">Читать дальше
                                            <span class="material-icons-outlined card__more-icon">expand_more</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Carousel navs --}}
                    <span class="material-icons-outlined owl-navs no-selection owl-nav-prev" onclick="window.prev_slide()">arrow_back_ios</span>
                    <span class="material-icons-outlined owl-navs no-selection owl-nav-next" onclick="window.next_slide()">arrow_forward_ios</span>
                </div>  {{-- Owl carousel container end --}}

            </div> {{-- Latest quotes end --}}
        </div> {{-- Welcome Bodt end --}}
    </section> {{-- Welcome end --}}

</main>
@endsection