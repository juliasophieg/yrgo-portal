<link href="{{ asset('css/register.css') }}" rel="stylesheet">
@include('components.menu')
<div class="signup-container">
    <div class="first-section">
        <div class="form-header">Sign Up</div>
        <div class="form-subtitle">Who are you?</div>
        <button type="button" id="studentButton" value="student">Student</button>
        <button type="button" id="companyButton" value="company">Företag</button>
    </div>
    <div class="form-section" style="display: none;">
        <div class="form-header">
            <div class="form-title">Title</div>
            <div class="form-subtitle">Create Account</div>
        </div>
        <form id="registrationForm" action="/register" method="POST">
            @csrf
            <div class="form-content">
                <label for="name">Namn</label>
                <input id="name" name="name" type="name" required>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" required>
                <label for="password">Lösenord</label>
                <input id="password" name="password" type="password" required>
                <input type="hidden" name="role" id="role">
                <button type="submit">Registrera</button>
            </div>
        </form>
        @include('components.error')

    </div>
</div>


<script src="{{ asset('js/register.js') }}"></script>
