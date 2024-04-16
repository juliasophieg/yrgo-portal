@extends('layout')

@section('title', '- Edit')

@section('menu')

@include('components.menu')
@endsection

@section('content')
<div class="edit-page">
    @include('components.error')
    <form method="POST" action="{{ route('update-profile', ['user' => $user]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- STUDENT -->
        @if ($user->role === 'student')
        @include('components.edit_student_profile')
        <!-- COMPANY -->
        @elseif ($user->role === 'company')
        @include('components.edit_company_profile')
        @endif
        <div class="button-container">
            <button type=" submit" class="button button-primary-blue">Spara</button>
            <a href="{{ route('profile') }}" class="button button-secondary-transparent">Avbryt</a>
        </div>
    </form>
</div>

@endsection

@vite(['resources/js/editProfile.js'])