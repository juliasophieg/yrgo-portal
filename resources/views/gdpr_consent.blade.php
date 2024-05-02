@extends('layout')

@section('title', '- GDPR')

@section('menu')
@include('components.menu')
@endsection

@section('content')
<div class="gdpr-page">
    <div class="width-container">
        @include('components.error')
        <div class="text-top">
            <h2 class="title-2">Kul att du vill komma på vårt evenemang!</h2>
            <p class="body">För att säkerställa att studenterna och företagen vid evenemanget får de bästa
                förutsättningarna, behöver ni besvarar några frågor.</p>
        </div>
        <div class="divider"></div>
        <div class="gdpr-consent">
            <div class="text-bottom">
                <h2 class="title-2">GDPR</h2>
                <p class="body">Vänligen granska våra användarvillkor i enlighet med EU:s dataskyddslagar. De
                    beskriver dataanvändning och dina val.</p>
            </div>
            <div class="icon-link-button">
                <div class="GDPR-logo">
                    <img src="{{ asset('images/GDPR.png') }}" alt="GDPR">
                </div>
                <div class="link-button">
                    <a href="https://gdpr.eu/">Läs mer</a>
                    <a href="{{ 'register' }}" class="button button-primary-red">Acceptera</a>
                </div>
            </div>
        </div>
    </div>


    @endsection