<form id="rules_form" action="#">
    @csrf

    <div class="rules">
        <button type="button" class="rules__nullifier" data-source="authors" id="rules_nullifier">Ҳама</button>
    
        <div class="search rules__search">
            <span class="material-icons-outlined unselectable search__icon rules__search-icon">search</span>
            <input class="search__input rules__search-input" value="{{$keyword}}" placeholder="Вожаи ҷустуҷӯро ворид кунед" type="text" name="keyword" id="rules_keyword" data-source="authors">
        </div>
    
        <button type="button" class="filters-toggler @if(count($active_category_ids) && $route != "categories.single") filters-toggler--active @endif" id="filters_toggler">
            <span class="material-icons-outlined card__more-icon">chevron_right</span> Тасфияи категорияро боз кардан
        </button>
    </div>
    
    <div class="category-filters" id="category_filter" @if(!count($active_category_ids) || $route == "categories.single") style="height: 0px" @endif>
        <div class="category-filters__inner">
            @foreach ($categories as $category)
                <button type="button" 
                    class="category-filters__button
                    @foreach($active_category_ids as $active_id)
                        @if($category->id == $active_id)
                            category-filters__button--active
                        @endif
                    @endforeach"
                    data-input-id="{{$category->id}}">{{$category->name}}
                </button>

                <input type="checkbox"
                    @foreach($active_category_ids as $active_id)
                        @if($category->id == $active_id)
                            checked
                        @endif
                    @endforeach
                    name="category_ids[]" id="cat{{$category->id}}" value="{{$category->id}}">
            @endforeach
        </div>
    </div>

</form>
