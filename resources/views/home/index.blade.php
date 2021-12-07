@extends('templates.master')
@section('main')

<div class="main-container home">
    {{-- Welcome start --}}
    <section class="welcome">

        <aside class="categories">
            <h1 class="main-title categories__title">Категорияҳо</h1>
            <div class="categories__list">
                @foreach ($categories as $cat)
                    <a class="categories__link" href="{{ route('categories.single', $cat->url) }}">{{$cat->name}}</a>
                @endforeach
            </div>
        </aside>

        {{-- Welcome Bodt start --}}
        <div class="welcome__body">
            {{-- About start --}}
            <div class="about">
                <h1 class="main-title about__title">Роҷеъ ба сомона</h1>
                <p class="about__text">
                    Хуш омадед, хонандаи муҳтарам.<br><br>
                    Асоси сомона-ин иқтибосҳо ва афоризмҳо аз тамоми дунё, аз одамони комилан гуногун-шуҳратманд, на начандон машҳур, олимон, файласуфон аст. Гуфторҳои нишонрас ва ҳадафманди онҳо то рӯзҳои мо  расидаанд. Инсонҳои мазкур ба хотири саодати инсоният зиндагӣ ва эҷод кардаанд. Вақте бо андешаҳо ва гуфтори уламо ва мутафаккирони муосир ошно мешавед, метавон ба масоили мубрами ҷомеа посух дарёфт кард. <br><br>
                    Мутолиаи хуш.
                </p>
            </div>  {{-- About end --}}
            
            {{-- Latest quotes start --}}
            <div class="latest-quotes">
                <h1 class="main-title latest-quotes__title">Иқтибосҳои ахир</h1>
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
                                            @if($loop->index > 1) @break @endif
                                            <a class="card__categories-item" href="{{ route('categories.single', $c->url) }}">{{ $c->name }}</a>
                                        @endforeach
                                    </div>
                
                                    <div class="card__header">
                                        <h2 class="card__header-title"><a href="{{ route('authors.single', $q->author->url) }}">{{ $q->author->name }}</a></h2>
                                        <a href="{{ route('quotes.single', $q->id) }}" class="card__header-hash">#{{ $q->id }}</a>
                                        <span class="card__header-icon">
                                            @include("svgs.share")
                                        </span>
                                    </div>
                
                                    <div class="card__text" data-identificator="owl_quote{{$q->id}}">
                                        {{ $q->body}}
                                    </div>
                
                                    <div class="more more_align_center">
                                        <button class="more__button more__button--vertical" data-action="expand_quote" data-quote="owl_quote{{$q->id}}">Идомаашро мутолиа кунед
                                            <span class="material-icons-outlined more__icon">expand_more</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Carousel navs --}}
                    <span class="material-icons-outlined unselectable owl-nav owl-nav-prev quotes-carousel__nav-prev" id="owl_prev_nav">arrow_back_ios</span>
                    <span class="material-icons-outlined unselectable owl-nav owl-nav-next quotes-carousel__nav-next" id="owl_next_nav">arrow_forward_ios</span>
                </div>  {{-- Owl carousel container end --}}

            </div> {{-- Latest quotes end --}}
        </div> {{-- Welcome Body end --}}
    </section> {{-- Welcome end --}}

    <section class="refresher home__refresher" id="refresher">
        @include('templates.refresher')
    </section>


    <section class="popular-categories">
        <h1 class="main-title">Категорияҳои маъмул</h1>

        <div class="popular-categories__list">
            <a href="{{ route('categories.single', 'arzish_va_hadafho') }}" class="category-block">
                <img class="category-block__image" src="{{ asset('img/home/categories/1.jpg') }}" alt="Арзиш ва ҳадафҳо">
                <p class="category-block__name">Арзиш ва ҳадафҳо</p> 
            </a>

            <a href="{{ route('categories.single', 'buniodi_hasti') }}" class="category-block">
                <img class="category-block__image" src="{{ asset('img/home/categories/2.jpg') }}" alt="Бунёди ҳастӣ">
                <p class="category-block__name">Бунёди ҳастӣ</p> 
            </a>

            <a href="{{ route('categories.single', 'ilm_va_falsafa') }}" class="category-block">
                <img class="category-block__image" src="{{ asset('img/home/categories/3.jpg') }}" alt="Илм ва Фалсафа">
                <p class="category-block__name">Илм ва Фалсафа</p> 
            </a>

            <a href="{{ route('categories.single', 'jamaiyat') }}" class="category-block">
                <img class="category-block__image" src="{{ asset('img/home/categories/4.jpg') }}" alt="Ҷамъият">
                <p class="category-block__name">Ҷамъият</p> 
            </a>
        </div>
    </section>

</div>
@endsection