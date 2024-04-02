<div class="student-profile">
    <div class="profile-header">
        <div class="profile-img"></div>
        <div class="profile-info">
            <h1>{{ $user->name }}</h1>
            <p>Studerar {{ $extraInfo->program }}</p>
            <!-- Display "Redigera" if the logged-in user's ID matches the profile ID -->
            @if ($user->id === Auth::id())
            <a href="{{ route('edit-profile') }}">Redigera</a>
            <a href="{{ route('likes') }}">Sparat</a>
            @else
            <a href="#">Spara</a>
            @endif
        </div>
    </div>
    <div class="profile-main">
        <h2>Om mig:</h2>
        <p>{{ $user->description}} #tags</p>
        <h2>Jag söker:</h2>
        <p>(Söker #tags)</p><!--OBS finns ej! -->
        <h2>Kontakt</h2>
        <ul>
            <li><a href="{{ $user->linkedin }}">LinkedIn</a></li>
            <li><a href="{{ $user->facebook }}">Facebook</a></li>
            <li>Email: {{ $user->email }}</li>
            <li>Telfon: {{ $user->phone }}</li>
        </ul>
    </div>
</div>