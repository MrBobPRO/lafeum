@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('quotes.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="label">Текст <span class="required">*</span></label>
        <textarea class="textarea" rows="10" name="body" required></textarea>
    </div>

    <div class="form-group">
        <label class="label">Автор <span class="required">*</span></label>
        <div class="select2_single_container form-group__select2-single">
            <select class="select2_single" data-dropdown-css-class="select2_single_dropdown" name="author_id" required>
                @foreach ($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group switch-container">
        <label for="popular">Добавить к популярным цитатам ?</label>
        <label class="switch">
            <input class="switch__input" type="checkbox" name="popular" id="popular">
            <span class="switch__slider"></span>
        </label>
    </div>

    <div class="form-group">
        <label class="label">Категории <span class="required">*</span></label>
        <div class="select2_multiple_container">
           <select name="categories[]" class="select2_multiple" data-dropdown-css-class="select2_multiple_dropdown" multiple required>
              @foreach ($categories as $category)
                 <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
           </select>
        </div>
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                class="material-icons-outlined">
                done_all
            </span> Добавить</button>
    </div>

</form>

@endsection