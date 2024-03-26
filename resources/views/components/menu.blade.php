<link href="{{ asset('css/menu.css') }}" rel="stylesheet">

<div class="menu">
    <li class="menu-title">Menu</li>
    <div class="menu-items">
        <ul>
            @auth <!-- Check if the user is a guest-->
            <li><a href="{{ route('profile') }}">PROFILE</a></li>
            @endauth
            <li><a href="#">EVENT</a></li>
            <li><a href="#">EXPLORE</a></li>
        </ul>
        @auth
        <a href="{{ route('logout') }}" class="button">LOG OUT</a>
        @else
        <a href="{{ route('register') }}" class="button">SIGN UP</a>
        <a href="{{ route('login') }}" class="button">LOG IN</a>
        @endauth
    </div>
</div>

<script src="{{ asset('js/menu.js') }}"></script>