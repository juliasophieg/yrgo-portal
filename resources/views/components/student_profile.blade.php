<div class="student-profile">
    <div class="profile-header">
        <div class="profile-img">
            <img src="/images/profiles/default_image_user.png" alt="">
        </div>
        <div class="profile-info">
            <h1>{{ $user->name }}</h1>
            @if ($extraInfo->program)
            <p>Studerar {{ $extraInfo->program }}</p>
            @else
            <p>Yrgo-student</p>
            @endif
            <!-- Display "Redigera" if the logged-in user's ID matches the profile ID -->
            @if ($user->id === Auth::id())
            <a href="{{ route('edit-profile') }}">Redigera</a>
            @else
            <div class="save">
                <livewire:like-button :userId="$user->id" />
            </div>
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
            @php
            $contactInfo = [
            ['value' => $extraInfo->student_website, 'label' => 'Website', 'icon' => ''],
            ['value' => $user->linkedin, 'label' => $user->name, 'icon' => '/images/icons/linkedin.svg'],
            ['value' => $user->facebook, 'label' => $user->name, 'icon' => '/images/icons/facebook.svg'],
            ['value' => $user->email, 'label' => null, 'icon' => '/images/icons/mail.svg'],
            ['value' => $user->phone, 'label' => null, 'icon' => '/images/icons/phone.svg'],
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