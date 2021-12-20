@extends('templates.master')

@section("title", $page_title)

@section('main')

<div class="main-container privacy-page">
    {{-- Page description start --}}
    <section class="page-desc">
        <h1 class="main-title page-desc__title">{{ $page_title}}</h1>
        <div class="page-desc__text">
            {!! $option->value !!}
        </div>
    </section>   {{-- Page description end --}}

</div>

@endsection