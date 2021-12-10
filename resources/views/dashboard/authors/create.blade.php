@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('authors.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="label">Имя <span class="required">*</span></label>
        <input class="input" name="name" type="text" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Биография <span class="required">*</span></label>
        <textarea class="textarea" rows="10" name="biography" required>{{ old('biography') }}</textarea>
    </div>

    <div class="form-group switch-container">
        <label for="popular">Добавить к популярным авторам ?</label>
        <label class="switch">
            <input class="switch__input" type="checkbox" name="popular" id="popular">
            <span class="switch__slider"></span>
        </label>
    </div>

    <div class="form-group">
        <label class="label">Фото</label>
        <input class="input" name="photo" type="file" accept=".png, .jpg, .jpeg">

        <div class="form-group__image-container">
            <img class="form-group__image" src="{{ asset('img/authors/__default.jpg')}}">
            <span class="form-group__image-filename">Фото по умолчанию</span>
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