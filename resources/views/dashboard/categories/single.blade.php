@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('news.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$new->id}}">

    <div class="form-group">
        <label class="label">Заголовок <span class="required">*</span></label>
        <input class="input" name="title" type="text" value="{{ old('title') == '' ? $new->title : old('title') }}"
            required>
    </div>

    <div class="form-group">
        <label class="label">Текст <span class="required">*</span></label>
        <textarea class="simditor-wysiwyg" name="body" required>{{ old("body") == '' ? $new->body : old("body") }}</textarea>
    </div>

    <div class="form-group">
        <label class="label">Тип <span class="required">*</span></label>
        <div class="select2_single_container form-group__select2-single">
            <select class="select2_single" data-dropdown-css-class="select2_single_dropdown" name="inner">
                <option value="1" 
                @if(old('inner') != '')
                    {{ old('inner') == 1 ? 'selected' : '' }}
                @else
                    {{ $new->inner == 1 ? 'selected' : ''}}
                @endif
                >Новости компании</option>

                <option value="0" 
                @if(old('inner') != '')
                    {{ old('inner') == 0 ? 'selected' : '' }}
                @else
                    {{ $new->inner == 0 ? 'selected' : ''}}
                @endif
                >Отраслевые новости</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Изображение <span class="required">*</span></label>
        {{-- Archive with id = 1 --}}
        <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
            data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input"/>
        @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
        <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive1_input">

        <a class="form-group__image-container" href="{{ asset('img/archive/' . $new->image)}}" target="_blank">
            <img class="form-group__image" src="{{ asset('img/archive/medium/' . $new->image)}}">
            <span class="form-group__image-filename">{{$new->image}}</span>
        </a>
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
                Вы уверены что хотите удалить новость ?
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('news.remove') }}" method="POST" id="remove_single_item_form">
                    @csrf
                    <input type="hidden" value="{{$new->id}}" name="id" id="remove_single_modal_input"/>
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->

{{-- Images Archive with id = 1 --}}
@include("dashboard.templates.archives.images", ["archive_id" => "1"])

{{-- Galleries archive_id => 99 --}}
@include("dashboard.templates.common_gallery_edit", ["relation_column_name" => "news_id", "item" => $new])

@endsection