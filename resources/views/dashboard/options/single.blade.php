@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('options.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$option->id}}">

    <div class="form-group">
        <label class="label">Значение <span class="required">*</span></label>
        <textarea class="simditor-wysiwyg" rows="10" name="value" required>{{ old("value") == '' ? $option->value : old("value") }}</textarea>
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                class="material-icons-outlined">
                done_all
            </span> Сохранить</button>
    </div>
</form>

@endsection