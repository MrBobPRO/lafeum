@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('quotes.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$quote->id}}">

    <div class="form-group">
        <label class="label">Текст <span class="required">*</span></label>
        <textarea class="textarea" rows="10" name="body" required>{{ $quote->body }}</textarea>
    </div>

    <div class="form-group">
        <label class="label">Автор <span class="required">*</span></label>
        <div class="select2_single_container form-group__select2-single">
            <select class="select2_single" data-dropdown-css-class="select2_single_dropdown" name="author_id">
                @foreach ($authors as $author)
                <option value="{{$author->id}}" @if($author->id == $quote->author_id) 
                    selected
                    @endif
                    >{{$author->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group switch-container">
        <label for="popular">Добавить к популярным цитатам ?</label>
        <label class="switch">
            <input class="switch__input" type="checkbox" name="popular" id="popular" @if($quote->popular)
            checked
            @endif
            >
            <span class="switch__slider"></span>
        </label>
    </div>

    <div class="form-group">
        <label class="label">Категории <span class="required">*</span></label>
        <div class="select2_multiple_container">
            <select name="categories[]" class="select2_multiple" data-dropdown-css-class="select2_multiple_dropdown"
                multiple required>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @foreach($quote->categories as $quote_cat)    
                            @if($quote_cat->id == $category->id)
                                selected
                            @endif
                        @endforeach
                    >{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                class="material-icons-outlined">
                done_all
            </span> Сохранить</button>

        <button class="button button--danger button--iconed main-form__controls-button" type="button"
            data-bs-toggle="modal" data-bs-target="#remove_single_modal"><span class="material-icons-outlined">
                remove_circle
            </span> Удалить</button>
    </div>
</form>

<!-- Remove Single Items Modal Start-->
<div class="modal fade" id="remove_single_modal" tabindex="-1" aria-labelledby="remove_single_modal_label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remove_single_modal_label">Удалить</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены что хотите удалить цитату ?
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('quotes.remove') }}" method="POST" id="remove_single_item_form">
                    @csrf
                    <input type="hidden" value="{{$quote->id}}" name="id" id="remove_single_modal_input" />
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->

@endsection