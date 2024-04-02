<div class="company-profile">
    <div class="profile-header">
        <div class="profile-img">
            <img src="/images/profiles/default_image_company.png" alt="">
        </div>
        <div class="profile-info">
            <h1>{{ $extraInfo->company_name }}</h1>
            <p>{{ $extraInfo->location}}</p>
            <!-- Display "Redigera" if the logged-in user's ID matches the profile ID -->
            @if ($user->id === Auth::id())
            <a href="{{ route('edit-profile') }}">Redigera profil</a>
            @else
            <a href="#">Spara</a>
            @endif
        </div>
    </div>
    <div class="profile-main">
        <h2>Om oss</h2>
        <p>{{ $user->description}}</p>
        <h2>Vi söker</h2>
        <p>{{ $extraInfo->looking_for}}</p>
        <h2>Kontakt</h2>
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