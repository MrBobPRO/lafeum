@foreach($authors as $a)
<div class="card card--vertical">
    <div class="card__img-container">
        <img class="card__img" src="{{ asset('img/authors/thumbs/' . $a->photo) }}">
    </div>

    <div class="card__body">

        <div class="card__header">
            <h2 class="card__header-title">{{ $a->name }}</h2>
        </div>

        <div class="card__text">
            {{ $a->biography}}
        </div>

        <div class="more more_align_right">
            <a href="#" class="more__button">Муфассал
                <span class="material-icons-outlined more__icon">chevron_right</span>
            </a>
        </div>
    </div>
</div>
@endforeach

{{ $authors->onEachSide(2)->links("templates.pagination") }}