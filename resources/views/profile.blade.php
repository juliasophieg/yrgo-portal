@extends('layout')

@section('title', '- Profile')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@section('menu')
    @include('components.menu')
@endsection

@section('content')


<div class="profile-container">
    <!-- STUDENT PROFILE -->
    @if ($user->userable_type === "App\Models\StudentInfo")
    @include('components.student_profile')
    <!-- COMPANY PROFILE -->
    @elseif ($user->userable_type === "App\Models\CompanyInfo")
    @include('components.company_profile')
    @endif
</div>
@endsection
