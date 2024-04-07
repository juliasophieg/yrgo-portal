<div class="company-profile">
    <div class="profile-header">
        <div class="profile-img">
            @if ($user->profile_picture == null)
            <img src="/images/profiles/default_image_company.png" alt="">
            @else
            <img src="{{ $user->profile_picture }}" alt="">
            @endif
        </div>
        <div class="profile-info">
            <div class="info">
                <h1 class="title-2">{{ $user->name }}</h1>
                <p class="subtitle">{{ $extraInfo->location }}</p>
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
            <h2 class="title-4">Om oss</h2>
            <p>{{ $user->description}}</p>
            <div class="technologies">
                @foreach($user->technologies as $technology)
                <div class="technology">{{ $technology->name }}</div>
                @endforeach
            </div>
        </div>
        <div class="divider"></div>
        <div class="main-section">
            <h2 class="title-4">Vi söker</h2>
            @if($user->job)
            <p>{{ $user->job->description }}</p>
            <div class="technologies">
                @foreach($user->job->technologies as $technology)
                <div class="technology">{{ $technology->name }}</div>
                @endforeach
            </div>
            @else
            <p>{{ $user->name}} har inte angett vad de söker ännu.</p>
            @endif
        </div>
        <div class="divider"></div>
        <div class="main-section">
            <h2 class="title-4">Kontakt</h2>
            <ul>
                @php
                $contactInfo = [
                ['value' => $extraInfo->company_website, 'label' => 'Website', 'icon' => ''],
                ['value' => $user->linkedin, 'label' => $extraInfo->company_name, 'icon' => '/images/icons/linkedin.svg'],
                ['value' => $user->facebook, 'label' => $extraInfo->company_name, 'icon' => '/images/icons/facebook.svg'],
                ['value' => $extraInfo->company_contact_email, 'label' => null, 'icon' => '/images/icons/mail.svg'],
                ['value' => $extraInfo->company_contact_number, 'label' => null, 'icon' => '/images/icons/phone.svg'],
                ];
                @endphp

                @foreach($contactInfo as $info)
                @if($info['value'])
                <li>
                    @if($info['icon'])
                    <div class="contact-icon"><img src="{{ $info['icon'] }}" alt=""></div>
                    @else
                    <div class="contact-icon"></div>
                    @endif
                    @if($info['label'])
                    <a href="{{ $info['value'] }}">{{ $info['label'] }}</a>
                    @else
                    {{ $info['value'] }}
                    @endif
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>