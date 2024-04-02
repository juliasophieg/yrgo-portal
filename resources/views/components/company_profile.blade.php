<div class="company-profile">
    <div class="profile-header">
        <div class="profile-img"></div>
        <div class="profile-info">
            <h1>{{ $extraInfo->company_name }}</h1>
            <p>(Adress)</p><!--OBS finns ej! -->
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
        <h2>Om oss</h2>
        <p>{{ $user->description}} #tags</p>
        <h2>Vi söker:</h2>
        <p>{{ $extraInfo->looking_for}} #tags</p>
        <h2>Kontakt</h2>
        <ul>
            <li><a href="{{ $user->linkedin }}">LinkedIn</a></li>
            <li><a href="{{ $user->facebook }}">Facebook</a></li>
            <li>{{ $extraInfo->company_contact_email }}</li>
            <li>{{ $extraInfo->company_contact_number }}</li>
            <li><a href="{{ $extraInfo->company_website}}">Website</a></li>
        </ul>
    </div>
</div>