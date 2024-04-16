<div class="company-profile">
    <div class="profile-header">
        <div class="profile-img">
            @if ($user->profile_picture == null)
                <img src="/images/profiles/default_image_company.png" alt="">
            @else
                <img src="/storage/{{ $user->profile_picture }}" alt="">
            @endif
        </div>
        <div class="profile-info-desktop-wrapper">
            <div class="profile-info">
                <div class="info">
                    <h1 class="title-2">{{ $user->name }}</h1>
                    <p class="subtitle">{{ $extraInfo->location }}</p>
                </div>
            </div>
            <!-- Display "Redigera" if the logged-in user's ID matches the profile ID -->
            @if ($user->id === Auth::id())
                <a href="{{ route('edit-profile') }}">Ändra profil</a>
            @endif
        </div>
        <!-- Display save-button if the logged-in user's ID does not match the profile ID -->
        @if ($user->id !== Auth::id())
            <div class="save">
                <livewire:like-button :userId="$user->id" />
            </div>
        @endif
    </div>
    <div class="profile-main">

        <div class="desktop-selection">

        <div class="main-section">
            <h2 class="title-4">Om oss</h2>
            @if ($user->description == null)
            <p class="description-placeholder">Den här användaren har inte skrivit någon beskrivning ännu.</p>
            @else
            <p>{{ $user->description}}</p>
            @endif
        </div>
        <div class="divider"></div>
        <div class="main-section">
            <h2 class="title-4">Vad vi jobbar med</h2>
            <div class="technologies">
                @foreach($user->technologies as $technology)
                <div class="technology">{{ $technology->name }}</div>
                @endforeach
            </div>
            <div class="divider"></div>
            <div class="main-section">
                <h2 class="title-4">Vad vi jobbar med</h2>
                <div class="technologies">
                    @foreach ($user->technologies as $technology)
                        <div class="technology">{{ $technology->name }}</div>
                    @endforeach
                </div>
            </div>

            <div class="divider"></div>
        </div>
        <div class="main-section contact">
            <h2 class="title-4">Kontakt</h2>
            <ul>
                @php
                $contactInfo = [
                ['value' => $user->phone, 'label' => $user->phone, 'href' => '', 'icon' => '/images/icons/phone.svg'],
                ['value' => $user->email, 'label' => $user->email, 'href' => '', 'icon' => '/images/icons/mail.svg'],
                ['value' => $user->website, 'label' => $user->website, 'href' => $user->website, 'icon' => '/images/icons/website.svg'],
                ['value' => $user->linkedin, 'label' => $user->name, 'href' => $user->linkedin, 'icon' => '/images/icons/linkedin.svg'],
                ['value' => $user->facebook, 'label' => '@' . $user->facebook, 'href' => 'https://www.instagram.com/' . $user->facebook, 'icon' => '/images/icons/instagram.svg'],
                ];
                @endphp

                @foreach($contactInfo as $info)
                @if($info['value'])
                <li>
                    <div class="contact-icon"><img src="{{ $info['icon'] }}" alt=""></div>
                    <a href="{{ $info['href'] }}">{{ $info['label'] }}</a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
