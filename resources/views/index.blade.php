@extends('layout')

@section('title', '- Index')

@section('menu')
@include('components.menu')
@endsection

@section('content')

@guest
<div class="index-page guest">
    @include('components.index_guest')
</div>
@endguest

@auth
<div class="index-page auth">
    <div class="event-page auth" id="event-page">
        <div class="width-container">
            <div class="event-info">
                <div class="event-title">
                    <h1 class="title-2">Du är registrerad!</h1>
                    <div class="divider"></div>
                </div>
                <div class="event-description">
                    <div class="event-text">
                        <img src="/images/icons/date.svg">
                        <p class="body">24 april 2024 </p>
                    </div>
                    <div class="event-text">
                        <img src="/images/icons/clock.svg">
                        <p class="body">Kl. 15:00-17:00 </p>
                    </div>
                    <div class="event-text">
                        <img src="/images/icons/location.svg">
                        <p class="body">Visual Arena Lindholmen</p>
                    </div>
                    <div class="event-text box">
                        <div class="text-box">
                            <p class="body">
                                Välkomna på mingelevent för att hitta framtida medarbetare i ert företag eller bara jobba tillsammans under LIA. Ni kommer att träffa Webbutvecklare och Digital Designers från Yrgo som vill visa vad de har jobbat med under året och vi hoppas att ni hittar en match.
                            </p>
                            <p class="body">
                                Ni som företag kan med fördel ta med någon form av identifikation för synlighet. Vi kommer att ha stationer där företag och studerande kan träffas.
                            </p>
                            <p class="body">
                                Varmt välkomna önskar Webbutvecklare och Digital Designer!
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('profile') }}" class="button button-secondary-fill">Min profil</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endauth

@endsection

@vite(['resources/js/index.js'])