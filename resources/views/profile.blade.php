<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@include('components.menu')

<div class="profile-container">
    <div class="profile-info-container">
        <div class="img-container"></div>
        <div class="profile-info">
            <p>Name: {{ $user->name }}</p>
            <p>{{ $user->description}}</p>
            @if ($user->userable_type === "App\Models\CompanyInfo")
            <p>{{ $extraInfo->company_name }}</p>
            @elseif ($user->userable_type === "App\Models\StudentInfo")
            <p>Program: {{ $extraInfo->program }}</p>
            @endif
        </div>
    </div>
    <a href="#">Redigera</a>
</div>