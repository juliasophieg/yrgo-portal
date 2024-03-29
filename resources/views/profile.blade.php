@extends('layout')

@section('title', '- Profile')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@section('menu')
    @include('components.menu')
@endsection

@section('content')
    <div class="profile-container">
        <!-- STUDENT PROFILE -->
        @if ($user->userable_type === 'App\Models\StudentInfo')
            <div class="student-profile">
                <div class="profile-header">
                    <div class="profile-img"></div>
                    <div class="profile-info">
                        <h1>{{ $user->name }}</h1>
                        <p>{{ $extraInfo->program }} student</p>
                        <!-- Display "Redigera" if the logged-in user's ID matches the profile ID -->
                        @if ($user->id === Auth::id())
                            <a href="#">Redigera</a>
                            <a href="#">Sparat</a>
                        @else
                            <a href="#">Spara</a>
                        @endif
                    </div>
                </div>
                <div class="profile-main">
                    <h2>Om mig:</h2>
                    <p>{{ $user->description }} #tags</p>
                    <h2>Jag söker:</h2>
                    <p>(Söker #tags)</p><!--OBS finns ej! -->
                    <h2>Kontakt</h2>
                    <ul>
                        <li>(Telefon)</li><!--OBS finns ej! -->
                        <li>{{ $user->email }}</li>
                        <li>(Facebook)</li><!--OBS finns ej! -->
                        <li>(LinkedIn)</li><!--OBS finns ej! -->
                    </ul>
                </div>
            </div>
            <!-- COMPANY PROFILE -->
        @elseif ($user->userable_type === 'App\Models\CompanyInfo')
            <div class="company-profile">
                <div class="profile-header">
                    <div class="profile-img"></div>
                    <div class="profile-info">
                        <h1>{{ $extraInfo->company_name }}</h1>
                        <p>(Adress)</p><!--OBS finns ej! -->
                        <!-- Display "Redigera" if the logged-in user's ID matches the profile ID -->
                        @if ($user->id === Auth::id())
                            <a href="#">Redigera</a>
                            <a href="#">Sparat</a>
                        @else
                            <a href="#">Spara</a>
                        @endif
                    </div>
                </div>
                <div class="profile-main">
                    <h2>Om oss</h2>
                    <p>{{ $user->description }} #tags</p>
                    <h2>Vi söker:</h2>
                    <p>{{ $extraInfo->looking_for }} #tags</p>
                    <h2>Kontakt</h2>
                    <ul>
                        <li>{{ $extraInfo->company_contact_email }}</li>
                        <li>{{ $extraInfo->company_contact_number }}</li>
                        <li>(Facebook)</li><!--OBS finns ej! -->
                        <li>(LinkedIn)</li><!--OBS finns ej! -->
                        <li>{{ $extraInfo->company_website }}</li>
                    </ul>
                </div>
        @endif
    </div>
    </div>

@endsection
