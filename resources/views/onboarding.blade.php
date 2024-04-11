@extends('layout')

@section('title', '- Onboarding')



@section('menu')
    @include('components.menu')
@endsection

@section('content')
    <div class="main">
        @include('components.error')
        <div class="onboarding-page">
            <div class="header">
                <div class="numbers">
                    <div class="number-1 active">1</div>
                    <div class="number-2 active">2</div>
                    <div class="number-3 active">3</div>
                </div>
                <div class="form-header">
                    @if ($user->role == 'student')
                        <div class="form-title">Student</div>
                        <div class="form-subtitle">Trevligt nu har du ett konto!</div>
                    @else
                        <div class="form-title">Företag</div>
                        <div class="form-subtitle">Trevligt nu har du ett konto!</div>
                    @endif

                </div>
            </div>
            <form action="/onboarding" method="post" class="onboarding-form">
                @csrf
                <div class="first-section active">
                    <div class="top-section">
                        <div class="text">Vad Brukar ni hålla på med?</div>
                        <div class="used-technologies-section">
                            @foreach ($technologies as $technology)
                                <div class="used-technology" data-value="{{ $technology->name }}">{{ $technology->name }}
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="technology_names_using">
                    </div>
                    <div class="arrows">
                        <div class="dummy-arrow"></div>
                        <div class="arrow-right"><img src="/images/icons/chevron-right-large.svg" alt=""></div>
                    </div>
                </div>

            </form>
            <div class="completed">
                <div class="pop-up">
                    <div class="animatio-container">
                        <div class="animation">
                            <svg class="animated-check" viewBox="0 0 24 24">
                                <path d="M4.1 12.7L9 17.6 20.3 6.3" fill="none" />
                            </svg>
                        </div>
                        <div class="text">Du är klar!</div>
                    </div>
                    <div class="buttons">
                        <div class="back">Tillbaka</div>
                        <div class="done">Klar</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@vite(['resources/js/onboarding.js'])
