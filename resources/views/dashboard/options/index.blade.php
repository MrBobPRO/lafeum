@extends('dashboard.templates.master')
@section("main")

{{-- Search start --}}
<section class="search">
    <div class="select2_single_container">
        <select class="select2_single select2_single_linked" data-placeholder="Поиск..."
            data-dropdown-css-class="select2_single_dropdown">
            <option></option>
            @foreach($all_items as $item)
            <option value="{{ route('dashboard.categories.single', $item->id)}}">{{$item->key}}</option>
            @endforeach
        </select>
    </div>
</section>
{{-- Search end --}}

{{-- Main list start --}}
<section class="list">
    {{-- Titles start --}}
    <div class="titles">
        <div class="titles__item width-50">Ключ</div>
        <div class="titles__item width-50">Значение</div>

        <div class="titles__controls">Действия</div>
    </div> {{-- Titles end --}}

    {{-- Multiple Items form start --}}
    <form action="#" method="POST" id="multiple_items_form">
        @csrf
        @foreach ($options as $option)
        {{-- List Item start --}}
        <div class="list__item">
            {{-- checkboxes for multiple remove --}}
            <div class="checkbox">
                <label for="{{$option->id}}" class="checkbox__label">
                    <input class="checkbox__input" id="{{$option->id}}" type="checkbox" name="ids[]"
                        value="{{$option->id}}">
                    <span class="checkbox__checkmark"></span>
                </label>
            </div>

            <div class="list__item-div width-50">{{$option->key}}</div>
            <div class="list__item-div width-50">{{$option->value}}</div>

            {{-- Item Controls start --}}
            <div class="list__item-controls">
                <a class="control-button" href="{{route('dashboard.options.single', $option->id)}}" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="Редактировать"><span class="material-icons">edit</span></a>
            </div> {{-- Item Controls start --}}
        </div> {{-- List Item start --}}
        @endforeach
    </form> {{-- Multiple Items form end --}}

    {{$options->onEachSide(3)->links("templates.pagination")}}
</section> {{-- Main list end --}}


@endsection