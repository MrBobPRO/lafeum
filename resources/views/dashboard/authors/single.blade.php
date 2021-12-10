@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('authors.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$author->id}}">

    <div class="form-group">
        <label class="label">Имя <span class="required">*</span></label>
        <input class="input" name="name" type="text" value="{{ old("name") == '' ? $author->name : old("name") }}" required>
    </div>

    <div class="form-group">
        <label class="label">Биография <span class="required">*</span></label>
        <textarea class="textarea" rows="10" name="biography" required>{{ old("biography") == '' ? $author->biography : old("biography") }}</textarea>
    </div>

    <div class="form-group switch-container">
        <label for="popular">Добавить к популярным авторам ?</label>
        <label class="switch">
            <input class="switch__input" type="checkbox" name="popular" id="popular"
                @if($author->popular)
                    checked
                @endif
            >
            <span class="switch__slider"></span>
        </label>
    </div>

    <div class="form-group">
        <label class="label">Фото</label>
        <input class="input" name="photo" type="file" accept=".png, .jpg, .jpeg">

        <div class="form-group__image-container">
            <img class="form-group__image" src="{{ asset('img/authors/' . $author->photo)}}">
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
                Вы уверены что хотите удалить автора ? <br><br>
                Также удалятся все цитаты авторв !
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('authors.remove') }}" method="POST" id="remove_single_item_form">
                    @csrf
                    <input type="hidden" value="{{$author->id}}" name="id" id="remove_single_modal_input" />
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->

@endsection