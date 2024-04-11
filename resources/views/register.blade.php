@extends('layout')

@section('title', '- Register')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
    <div class="main">
        @include('components.error')
        <div class="register-page">
            <div class="first-section">
                <div class="header">
                    <div class="numbers">
                        <div class="number-1 active">1</div>
                        <div class="number-2">2</div>
                        <div class="number-3">3</div>

                    </div>
                    <div class="bottom-header">
                        <div class="sign-up">
                            <div class="title">Sign Up</div>
                            <div class="line"></div>
                        </div>
                        <div class="subtitle">Who are you?</div>
                    </div>
                </div>

                <div class="choices">
                    <div class="text">I'm a:</div>
                    <div class="option-buttons">
                        <button type="button" id="studentButton" value="student">Student</button>
                        <button type="button" id="companyButton" value="company">Företag</button>
                    </div>
                </div>
            </div>
            <div class="form-section" style="display: none;">
                <div class="header">
                    <div class="numbers">
                        <div class="number-1 active">1</div>
                        <div class="number-2 active">2</div>
                        <div class="number-3">3</div>
                    </div>
                    <div class="form-header">
                        <div class="form-title">Title</div>
                        <div class="form-subtitle">Skapa Konto</div>
                    </div>
                </div>
                <form id="registrationForm" action="/register" method="POST">
                    @csrf
                    <div class="form-content">
                        <div class="input">
                            <label for="name" class="name">Namn</label>
                            <input id="name" name="name" type="name" required placeholder="Förnamn Efternamn">
                        </div>
                        <div class="input">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" required
                                placeholder="name.namesson@gmail.com">
                        </div>
                        <div class="input">
                            <label for="password">Lösenord</label>
                            <input id="password" name="password" type="password" required placeholder="Ditt lösenord">
                        </div>
                        <input type="hidden" name="role" id="role">
                        <button type="submit">Skapa Konto</button>
                    </div>
                    <div class="bottom-text">
                        <div class="sub-text">Har du redan ett konto?</div>
                        <div class="login"><a href="{{ route('login') }}">Logga in</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@vite(['resources/js/register.js'])
