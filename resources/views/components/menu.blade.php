<div class="menu">
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/logo/logo.svg') }}" alt="Logo">
        </div>
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
            <span></span>

        </div>
    </div>
    <div class="menu-content">
        @auth <!-- Check if the user is a guest-->
        <ul>
            <li><a href="{{ route('profile') }}">Profil</a></li>
            @if (Auth::user()->role == 'company')
            <li><a href="{{ route('likes') }}">Sparade studenter</a></li>
            <li><a href="{{ route('students') }}">Sök studenter</a></li>
            @else
            <li><a href="{{ route('likes') }}">Sparade företag</a></li>
            <li><a href="#">Sök företag</a></li>
            @endif
            <li><a href="#">Eventet</a></li>
        </ul>
        <div class="divider"></div>
        <div class="button-group">
            <a href="{{ route('logout') }}" class="button button-secondary">LOG OUT</a>
        </div>
        @else
        <ul>
            <li><a href="#">Anmälda företag</a></li>
            <li><a href="#">Eventet</a></li>
        </ul>
        <div class="divider"></div>
        <div class="button-group">
            <a href="{{ route('register') }}" class="button button-primary">SKAPA KONTO</a>
            <a href="{{ route('login') }}" class="button button-secondary">LOGGA IN</a>
        </div>
        @endauth
    </div>
</div>


<script>
    function toggleMenu() {
        var menu = document.querySelector('.menu-content');
        var lines = document.querySelectorAll('.hamburger');

        menu.classList.toggle('open');

        lines.forEach(function(line) {
            line.classList.toggle('open');
        });
    }
</script>