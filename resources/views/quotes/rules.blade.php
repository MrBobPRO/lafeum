<div class="rules__inner">
    <a href="{{ route('quotes.index') }}" class="rules__all">Ҳама</a>

    <div class="search rules__search">
        <span class="material-icons-outlined unselectable search__icon rules__search-icon">search</span>
        <input class="search__input rules__search-input" value="{{$keyword}}" placeholder="Вожаи ҷустуҷӯро ворид кунед" type="text" id="rules_keyword" data-source="quotes">
    </div>

    <input type="hidden" id="rules_category_id" value="{{ $active_category_id }}">
    <button type="button" class="filters-toggler" id="filters_toggler">
        <span class="material-icons-outlined card__more-icon">chevron_right</span> Тасфияи категорияро боз кардан
    </button>
</div>


<div class="category-filters" id="category_filter">
    <div class="category-filters__inner">
        @foreach ($categories as $category)
            <a href="{{ route('categories.single', $category->url) }}"
                class="category-filters__button
                    @if($category->id === $active_category_id)
                        category-filters__button--active
                    @endif
                ">{{$category->name}}
            </a>
        @endforeach
    </div>
</div>

