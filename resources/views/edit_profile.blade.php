@extends('layout')

@section('title', '- Edit')

@section('menu')
@include('components.menu')
@endsection

@section('content')
<div class="edit-page">
    <form method="POST" action="{{ route('update-profile', ['user' => $user]) }}">
        @csrf
        @method('PUT')
        <!-- STUDENT -->
        @if ($user->role === 'student')
        @include('components.edit_student_profile')
        <!-- COMPANY -->
        @elseif ($user->role === 'company')
        @include('components.edit_company_profile')
        @endif
        <button type="submit" class="button button-primary-blue">Spara</button>
        <a href="{{ route('profile') }}" class="button button-secondary-transparent">Avbryt</a>
    </form>
</div>
@endsection