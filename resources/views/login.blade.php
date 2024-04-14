@extends('layout')

@section('title', '- Login')

@section('menu')
@include('components.menu')
@endsection

@section('content')
<div class="main">
    @include('components.error')
    <div class="login-page">
        <div class="text-top">
            <div class="text">Logga in</div>
            <div class="line"></div>
        </div>

        <div class="form">
            <form action="/login" method="POST">
                @csrf
                <div class="inputs">
                    <div class="input"> <label for="email">E-mail</label>
                        <input name="email" id="email" type="email" placeholder="ex. Email@email.com" required>
                    </div>
                    <div class="input"> <label for="password">Lösenord</label>
                        <input name="password" id="password" type="password" placeholder="Ditt Lösenord" required>
                    </div>
                </div>
                <button>Logga in</button>
            </form>
            <div class="bottom-text">
                <div class="sub-text">Har du inte ett konto?</div>
                <div class="register"><a href="{{ route('gdpr-consent') }}">Skapa Konto</a></div>
            </div>
        </div>
    </div>
</div>



@endsection