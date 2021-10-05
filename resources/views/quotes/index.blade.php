@extends('templates.master')
@section('content')

<main class="primary-container quotes">
    {{-- Page description start --}}
    <div class="page-desc">
        <h1 class="main-title page-desc__title">Иқтибосҳо ва афоризмҳо</h1>
        <p class="page-desc__text">
            Беҳтарин иқтибосҳо ва афоризмҳои инсонҳо  ва мутафаккирони бузург .
        </p>
    </div>   {{-- Page description end --}}

    @include('templates.card_switcher', ['class_name' => 'quotes__card-switcher'])

</main>

@endsection