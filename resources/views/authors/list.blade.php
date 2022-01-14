@unless(count($authors))
    <h1 class="no-authors-title">Ба дархости шумо ягон муаллиф ёфт нашуд !</h1>
@endunless

@foreach($authors as $a)
<div class="card card--vertical">
    <div class="card__img-container">
        <img class="card__img" src="{{ asset('img/authors/' . $a->photo) }}" alt="{{$a->name}}">
        <a href="{{ route('authors.single', $a->url) }}" class="card--vertical__mobile-title">{{ $a->name }}</a>
    </div>

    <div class="card__body">

        <div class="card__header">
            <h2 class="card__header-title"><a href="{{ route('authors.single', $a->url) }}">{{ $a->name }}</a></h2>
        </div>

        <div class="card__text">
            {{ $a->biography}}
        </div>

        <div class="more more_align_right">
            <a href="{{ route('authors.single', $a->url) }}" class="more__button">Муфассал
                <span class="material-icons-outlined more__icon">chevron_right</span>
            </a>
        </div>
    </div>
</div>
@endforeach

{{ $authors->onEachSide(3)->links("templates.pagination") }}