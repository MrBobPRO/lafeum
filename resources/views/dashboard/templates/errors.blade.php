@if($errors->any())
    <div class="single-page-alert alert alert-danger">
        <b class="alert__title">Ошибка! Пожалуйста исправьте ошибки и попробуйте заново.</b>
        @foreach ($errors->all() as $error)
            <li class="alert__item">{{ $error }}</li>
        @endforeach
    </div>
@endif