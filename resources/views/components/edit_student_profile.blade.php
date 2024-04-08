<div class="student-profile">

    <div class="profile-header">
        <!-- USER INFO -->
        <div class="profile-img">
            @if ($user->profile_picture == null)
            <img src="/images/profiles/default_image_user.png" alt="">
            @else
            <img src="{{ $user->profile_picture }}" alt="">
            @endif
        </div>
        <div class="profile-info">
            <div class="info">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                <p class="subtitle">Student på Yrgo</p>
            </div>
            <a href="{{ route('profile') }}">Avbryt</a>
        </div>
    </div>

    <div class="profile-main">
        <!-- ABOUT ME -->
        <div class="main-section">
            <h2 class="title-4">Om mig</h2>
            <textarea id="description" name="description" rows="4" class="form-control">{{ $user->description ?? '' }}</textarea>
            <!-- Technologies-->
            <div class="technologies">
                @foreach($user->technologies as $technology)
                <div class="technology">{{ $technology->name }}</div>
                @endforeach
            </div>
            @foreach($technologies as $technology)
            <label>
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" {{ $user->technologies->contains($technology) ? 'checked' : '' }}>
                {{ $technology->name }}
            </label>
            @endforeach
        </div>

        <div class="divider"></div>

        <!-- LOOKING FOR -->
        <div class="main-section">
            <h2 class="title-4">Vad jag söker</h2>
            <textarea id="job_description" name="job_description" rows="4" class="form-control">{{ $userJob->description ?? '' }}</textarea>
            <!-- Technologies-->
            <div class="technologies">
                @foreach($user->job->technologies as $technology)
                <div class="technology">{{ $technology->name }}</div>
                @endforeach
            </div>
            @foreach($technologies as $technology)
            <label>
                <input type="checkbox" name="user_job_technologies[]" value="{{ $technology->id }}" {{ $userJob->technologies->contains($technology) ? 'checked' : '' }}>
                {{ $technology->name }}
            </label>
            @endforeach
        </div>

        <div class="divider"></div>

        <div class="main-section">
            <!-- CONTACT -->
            <h2 class="title-4">Kontakt</h2>
            <ul>
                @foreach ([
                'linkedin' => ['label' => 'LinkedIn', 'type' => 'text', 'icon' => '/images/icons/linkedin.svg', 'value' => $user->linkedin],
                'facebook' => ['label' => 'Facebook', 'type' => 'text', 'icon' => '/images/icons/facebook.svg', 'value' => $user->facebook],
                'phone' => ['label' => 'Telefon', 'type' => 'phone', 'icon' => '/images/icons/phone.svg', 'value' => $user->phone ?? ''],
                ] as $field => $attributes)
                <!-- Input fields-->
                <div class="form-group">
                    <img src="{{ $attributes['icon'] }}" alt="">
                    <input type="{{ $attributes['type'] }}" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $attributes['value'] }}">
                </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>