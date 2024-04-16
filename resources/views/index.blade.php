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
                    <h1 class="title-1">Välkommen</h1>

                    <p class="body-small">Du är registrerad!</p>

                    <div class="divider"></div>
                </div>
                <div class="event-description">
                    <div class="event-text">
                        <h2 class="title-3">När?</h2>
                        <p class="body">15:00-17:00 Onsdag, 24 april, 2024</p>
                    </div>
                    <div class="event-text">
                        <h2 class="title-3">Vart?</h2>
                        <p class="body">Visual Arena Lindholmen</p>
                        <p class="body">Lindholmspiren 3, 417 56 Göteborg</p>
                    </div>
                    <div class="event-text box">
                        <h2 class="title-3">Vad kan du förvänta dig?</h2>
                        <div class="text-box">
                            <p class="body">
                                Välkomna på mingelevent för att hitta framtida medarbetare i ert företag eller bara
                                jobba tillsammans under LIA. Ni kommer att träffa Webbutvecklare och Digital
                                Designers från Yrgo som vill visa vad de har jobbat med under året och vi hoppas att
                                ni hittar en match.
                            </p>
                            <p class="body">
                                Ni som företag kan med fördel ta med någon form av identifikation för synlighet. Vi
                                kommer att ha stationer där företag och studerande kan träffas.
                            </p>
                            <p class="body">
                                Varmt välkomna önskar Webbutvecklare och Digital Designer!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('profile') }}" class="button button-secondary-fill">Min profil</a>
    </div>
</div>
@endauth

@endsection

@vite(['resources/js/index.js'])
