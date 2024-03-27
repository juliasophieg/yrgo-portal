<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@include('components.menu')

<div class="profile-container">
    <!-- STUDENT PROFILE -->
    @if ($user->userable_type === "App\Models\StudentInfo")
    @include('components.student_profile')
    <!-- COMPANY PROFILE -->
    @elseif ($user->userable_type === "App\Models\CompanyInfo")
    @include('components.company_profile')
    @endif
</div>