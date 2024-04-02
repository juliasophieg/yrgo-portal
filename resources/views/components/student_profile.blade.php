<div class="student-profile">
    <div class="profile-header">
        <div class="profile-img">
            <img src="/images/profiles/default_image_user.png" alt="">
        </div>
        <div class="profile-info">
            <h1>{{ $user->name }}</h1>
            <p>Studerar {{ $extraInfo->program }}</p>
            <!-- Display "Redigera" if the logged-in user's ID matches the profile ID -->
            @if ($user->id === Auth::id())
            <a href="{{ route('edit-profile') }}">Redigera</a>
            @else
            <a href="#">Spara</a>
            @endif
        </div>
    </div>
    <div class="profile-main">
        <h2>Om mig</h2>
        <p>{{ $user->description}} #tags</p>
        <h2>Jag söker</h2>
        <p>(Söker #tags)</p><!--OBS finns ej! -->
        <h2>Kontakt</h2>
        <ul>
            <li>
                <div class="contact-icon"><img src="/images/icons/linkedin.svg" alt=""></div><a href="{{ $user->linkedin }}">{{ $user->name }}</a>
            </li>
            <li>
                <div class="contact-icon"><img src="/images/icons/facebook.svg" alt=""></div><a href="{{ $user->facebook }}">{{ $user->name }}</a>
            </li>
            <li>
                <div class="contact-icon"><img src="/images/icons/mail.svg" alt=""></div>{{ $user->email }}
            </li>
            <li>
                <div class="contact-icon"><img src="/images/icons/phone.svg" alt=""></div>{{ $user->phone }}
            </li>
        </ul>
    </div>
</div>