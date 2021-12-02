@extends('templates.master')
@section('main')

<div class="main-container quotes">
    {{-- Page description start --}}
    <section class="page-desc">
        <h1 class="main-title page-desc__title">Иқтибосҳо ва афоризмҳо</h1>
        <p class="page-desc__text">
            Беҳтарин иқтибосҳо ва афоризмҳои инсонҳо  ва мутафаккирони бузург .
        </p>
    </section>   {{-- Page description end --}}

    <section class="refresher quotes__refresher">
        @include('templates.refresher')
    </section>

    {{-- Filters and search start --}}
    <section class="rules-wrapper quotes-rules-wrapper">
        @include('templates.rules')
    </section>
    {{-- Filters and search end --}}

    <section class="quotes-list-wrapper">
        <h1 class="main-title quotes-list-title">Ҳама иқтибосҳо</h1>

        <div class="quotes-list">
            @include('quotes.list')
        </div>
    </section>

</div>

@endsection