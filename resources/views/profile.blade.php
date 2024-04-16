@extends('layout')

@section('title', '- Profile')

@section('menu')
    @include('components.menu')
@endsection

@section('content')


    <div class="profile-page">
        <div class="width-container">
            <!-- STUDENT PROFILE -->
            @if ($user->role === 'student')
                @include('components.student_profile')
                <!-- COMPANY PROFILE -->
            @elseif ($user->role === 'company')
                @include('components.company_profile')
            @endif
        </div>
    </div>
@endsection
