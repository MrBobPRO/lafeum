@extends('dashboard.templates.master')
@section("main")

{{-- Main list start --}}
<section class="list">
    {{-- Titles start --}}
    <div class="titles">
        <div class="titles__item width-50">Топ</div>
        <div class="titles__item width-50">Категория</div>

        <div class="titles__controls">Действия</div>
    </div> {{-- Titles end --}}

    {{-- Multiple Items form start --}}
    <form action="#" method="POST" id="multiple_items_form">
        @csrf
        @foreach ($top as $t)
        {{-- List Item start --}}
        <div class="list__item">
            {{-- checkboxes for multiple remove --}}
            <div class="checkbox">
                <label for="{{$t->id}}" class="checkbox__label">
                    <input class="checkbox__input" id="{{$t->id}}" type="checkbox" name="ids[]"
                        value="{{$t->id}}">
                    <span class="checkbox__checkmark"></span>
                </label>
            </div>

            <div class="list__item-div width-50">#{{$t->id}}</div>
            <div class="list__item-div width-50">{{$t->category->name}}</div>

            {{-- Item Controls start --}}
            <div class="list__item-controls">
                <a class="control-button" href="{{route('dashboard.top.single', $t->id)}}" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="Редактировать"><span class="material-icons">edit</span></a>
            </div> {{-- Item Controls start --}}
        </div> {{-- List Item start --}}
        @endforeach
    </form> {{-- Multiple Items form end --}}

</section> {{-- Main list end --}}


@endsection