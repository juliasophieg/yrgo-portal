<div class="menu">
    <div class="navbar">
        <div class="width-container">
            @if (
                (request()->is('profile') ||
                    preg_match('/^students\/\d+($|\/)/', request()->path()) ||
                    preg_match('/^companies\/\d+($|\/)/', request()->path())) &&
                    Auth::user()->id !== $user->id)
                <a href="{{ URL::previous() }}" class="logo">
                    <img src="{{ asset('images/icons/chevron-left.svg') }}" alt="Logo">
                </a>
            @endif
            <a href="/" class="logo">
                <img src="{{ asset('images/logo/logo.svg') }}" alt="Logo">
            </a>
            <div class="button-menu">
                @guest <!-- Display login button if user is guest-->
                    <a href="{{ route('login') }}" class="button button-secondary-transparent">LOGGA IN</a>
                @endguest
                <div class="hamburger" onclick="toggleMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-content">
        @auth <!-- Check if the user is logged in-->

            <ul>
                <li><a href="{{ route('profile') }}">Profil</a></li>
                @if (Auth::user()->role == 'company')
                    <!-- If logged in user is company -->
                    <li><a href="{{ route('likes') }}">Sparade studenter</a></li>
                    <li><a href="{{ route('students') }}">Sök studenter</a></li>
                @else
                    <!-- If logged in user is student -->
                    <li><a href="{{ route('likes') }}">Sparade företag</a></li>
                    <li><a href="{{ route('companies') }}">Sök företag</a></li>
                @endif
                <li><a href="/">Eventet</a></li>
            </ul>
            <div class="divider"></div>
            <a href="{{ route('logout') }}" class="button button-secondary-transparent">LOGGA UT</a>
        @else
            <!-- If user is guest -->
            <ul>
                <li><a href="/#event-page">Eventet</a></li>
            </ul>
            <div class="divider"></div>
            <div class="button-group">
                <a href="{{ route('gdpr-consent') }}" class="button button-primary-blue">SKAPA KONTO</a>
                <a href="{{ route('login') }}" class="button button-secondary-transparent">LOGGA IN</a>
            </div>
        @endauth
    </div>
</div>


<script>
    function toggleMenu() {
        const menuContent = document.querySelector('.menu-content');
        const menuLines = document.querySelectorAll('.hamburger');
        menuContent.classList.toggle('open');
        menuLines.forEach(function(line) {
            line.classList.toggle('open');
        });
    }
</script>
