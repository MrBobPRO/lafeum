@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('top.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$top->id}}">

    <div class="form-group">
        <label class="label">Категория <span class="required">*</span></label>
        <div class="select2_single_container form-group__select2-single">
            <select class="select2_single" data-dropdown-css-class="select2_single_dropdown" name="category_id" required>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $top->category_id) 
                    selected
                    @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Изображение</label>
        <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg">

        <div class="form-group__image-container" style="border: none">
            <img class="form-group__image" src="{{ asset('img/categories/' . $top->image)}}">
        </div>
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                class="material-icons-outlined">
                done_all
            </span> Сохранить</button>
    </div>
</form>

@endsection