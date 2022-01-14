@extends('dashboard.templates.master')
@section("main")

{{-- Search start --}}
<section class="search">
    <div class="select2_single_container">
        <select class="select2_single select2_single_linked" data-placeholder="Поиск..."
            data-dropdown-css-class="select2_single_dropdown">
            <option></option>
            @foreach($all_items as $item)
            <option value="{{ route('dashboard.authors.single', $item->id)}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
</section>
{{-- Search end --}}

{{-- Main list start --}}
<section class="list">
    {{-- Titles start --}}
    <div class="titles">
        <div class="titles__item titles__item--center titles__item--ava">Фото</div>

        <div class="titles__item width-25">
            @if($order_by != "name")
            <a class="titles__link"
                href="{{ route('dashboard.authors.index') . '?page=' . $active_page . '&order_by=name&order_type=asc' }}">Имя
                <span class="material-icons-outlined titles__icon">arrow_upward</span>
            </a>
            @elseif($order_by == "name" && $order_type == "asc")
            <a class="titles__link"
                href="{{ route('dashboard.authors.index') . '?page=' . $active_page . '&order_by=name&order_type=desc' }}">Имя
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_upward</span>
            </a>
            @elseif($order_by == "name" && $order_type == "desc")
            <a class="titles__link"
                href="{{ route('dashboard.authors.index') . '?page=' . $active_page . '&order_by=name&order_type=asc' }}">Имя
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_downward</span>
            </a>
            @endif
        </div>

        <div class="titles__item width-25">Биография</div>

        <div class="titles__item titles__item--center width-25">
            @if($order_by != "quotes_count")
            <a class="titles__link"
                href="{{ route('dashboard.authors.index') . '?page=' . $active_page . '&order_by=quotes_count&order_type=desc' }}">Кол-во
                цитат
                <span class="material-icons-outlined titles__icon">arrow_downward</span>
            </a>
            @elseif($order_by == "quotes_count" && $order_type == "asc")
            <a class="titles__link"
                href="{{ route('dashboard.authors.index') . '?page=' . $active_page . '&order_by=quotes_count&order_type=desc' }}">Кол-во
                цитат
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_upward</span>
            </a>
            @elseif($order_by == "quotes_count" && $order_type == "desc")
            <a class="titles__link"
                href="{{ route('dashboard.authors.index') . '?page=' . $active_page . '&order_by=quotes_count&order_type=asc' }}">Кол-во
                цитат
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_downward</span>
            </a>
            @endif
        </div>

        <div class="titles__item width-25">
            @if($order_by != "created_at")
            <a class="titles__link"
                href="{{ route('dashboard.authors.index') . '?page=' . $active_page . '&order_by=created_at&order_type=asc' }}">Дата добавления
                <span class="material-icons-outlined titles__icon">arrow_upward</span>
            </a>
            @elseif($order_by == "created_at" && $order_type == "asc")
            <a class="titles__link"
                href="{{ route('dashboard.authors.index') . '?page=' . $active_page . '&order_by=created_at&order_type=desc' }}">Дата добавления
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_upward</span>
            </a>
            @elseif($order_by == "created_at" && $order_type == "desc")
            <a class="titles__link"
                href="{{ route('dashboard.authors.index') . '?page=' . $active_page . '&order_by=created_at&order_type=asc' }}">Дата добавления
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_downward</span>
            </a>
            @endif
        </div>

        <div class="titles__controls">Действия</div>
    </div> {{-- Titles end --}}

    {{-- Multiple Items form start --}}
    <form action="{{ route('authors.remove_multiple') }}" method="POST" id="multiple_items_form">
        @csrf
        @foreach ($authors as $author)
        {{-- List Item start --}}
        <div class="list__item">
            {{-- checkboxes for multiple remove --}}
            <div class="checkbox">
                <label for="{{$author->id}}" class="checkbox__label">
                    <input class="checkbox__input" id="{{$author->id}}" type="checkbox" name="ids[]"
                        value="{{$author->id}}">
                    <span class="checkbox__checkmark"></span>
                </label>
            </div>

            <div class="list__item-div list__item-div list__item-ava-container">
                <img class="list__item-ava" src="{{ asset('img/authors/' . $author->photo) }}">
            </div>
            <div class="list__item-div width-25">{{$author->name}}</div>
            <div class="list__item-div width-25">{{$author->biography}}</div>
            <div class="list__item-div list__item-div--center width-25">{{$author->quotes_count}}</div>
            @php
                $formatted = Carbon\Carbon::create($author->created_at)->locale("ru");
            @endphp
            <div class="list__item-div width-25">{{ $formatted->isoFormat("DD MMMM YYYY") }}</div>

            {{-- Item Controls start --}}
            <div class="list__item-controls">
                <a class="control-button control-button--blue" href="{{ route('authors.single', $author->url)}}"
                    target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Посмотреть"><span
                        class="material-icons">visibility</span></a>

                <a class="control-button" href="{{route('dashboard.authors.single', $author->id)}}" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="Редактировать"><span class="material-icons">edit</span></a>

                <button class="control-button control-button--red" type="button" data-action="show_single_remove_modal"
                    data-item-id="{{$author->id}}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Удалить"><span class="material-icons">delete</span></button>
            </div> {{-- Item Controls start --}}
        </div> {{-- List Item start --}}
        @endforeach
    </form> {{-- Multiple Items form end --}}

    {{$authors->onEachSide(3)->links("templates.pagination")}}
</section> {{-- Main list end --}}


<!-- Remove Multiple Items Modal Start-->
<div class="modal fade" id="remove_multiple_modal" tabindex="-1" aria-labelledby="remove_multiple_modal_label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remove_multiple_modal_label">Удалить</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены что хотите удалить отмеченных авторов ?<br><br>
                Также удалятся все цитаты каждого автора !
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="button button--danger" id="remove_multiple_modal_button">Удалить</button>
            </div>
        </div>
    </div>
</div>
<!-- Rmove Multiple Items Modal End-->


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
                Вы уверены что хотите удалить автора ?<br><br>
                Также удалятся все цитаты автора !
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('authors.remove') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="0" name="id" id="remove_single_modal_input" />
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->


@endsection