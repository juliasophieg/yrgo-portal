<div class="student-profile">
    <div class="profile-header">
        <div class="profile-img">
            @if ($user->profile_picture == null)
            <img src="/images/profiles/default_image_user.png" alt="">
            @else
            <img src="{{ $user->profile_picture }}" alt="">
            @endif
        </div>
        <div class="profile-info">
            <div class="info">
                <h1 class="title-2">{{ $user->name }}</h1>
                <p class="subtitle">Student på Yrgo</p>
            </div>
            <!-- Display "Redigera" if the logged-in user's ID matches the profile ID -->
            @if ($user->id === Auth::id())
            <a href="{{ route('edit-profile') }}">Ändra profil</a>
            @endif
        </div>
        <!-- Display "Spara" if the logged-in user's ID does not match the profile ID -->
        @if ($user->id !== Auth::id())
        <div class="save">
            <livewire:like-button :userId="$user->id" />
        </div>
        @endif

    </div>
    <div class="profile-main">
        <div class="main-section">
            <h2 class="title-4">Om mig</h2>
            <p>{{ $user->description}}</p>
            <div class="technologies">
                <div class="technology">Label</div>
                <div class="technology">Label</div>
                <div class="technology">Label</div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="main-section">
            <h2 class="title-4">Vad jag söker</h2>
            <p>Lorem ipsum dolor sit amet.</p><!--OBS finns ej! -->
            <div class="technologies">
                <div class="technology">Label</div>
                <div class="technology">Label</div>
                <div class="technology">Label</div>
                <div class="technology">Label</div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="main-section">
            <h2 class="title-4">Kontakt</h2>
            <ul>
                @php
                $contactInfo = [
                ['value' => $extraInfo->student_website, 'label' => 'Website', 'icon' => ''],
                ['value' => $user->linkedin, 'label' => $user->name, 'icon' => '/images/icons/linkedin.svg'],
                ['value' => $user->facebook, 'label' => $user->name, 'icon' => '/images/icons/facebook.svg'],
                ['value' => $user->email, 'label' => $user->email, 'icon' => '/images/icons/mail.svg'],
                ['value' => $user->phone, 'label' => $user->phone, 'icon' => '/images/icons/phone.svg'],
                ];
                @endphp

                @foreach($contactInfo as $info)
                @if($info['value'])
                <li>
                    <div class="contact-icon"><img src="{{ $info['icon'] }}" alt=""></div>
                    <a href="{{ $info['value'] }}">{{ $info['label'] }}</a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>