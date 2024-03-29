<div class="company-profile">
    <div class="profile-header">
        <div class="profile-img"></div>
        <div class="profile-info">
            <h1>{{ $extraInfo->company_name }}</h1>
            <p>(Adress)</p><!--OBS finns ej! -->
            <!-- Display "Redigera" if the logged-in user's ID matches the profile ID -->
            @if ($user->id === Auth::id())
            <a href="{{ route('edit-profile') }}">Redigera</a>
            <a href="#">Sparat</a>
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
            <li>{{ $extraInfo->company_contact_email }}</li>
            <li>{{ $extraInfo->company_contact_number }}</li>
            <li>(Facebook)</li><!--OBS finns ej! -->
            <li>(LinkedIn)</li><!--OBS finns ej! -->
            <li>{{ $extraInfo->company_website}}</li>
        </ul>
    </div>
</div>