<div class="company-profile">
    <div class="profile-header">
        <div class="profile-img">
            @if ($user->profile_picture == null)
            <img id="user-profile-img" src="/images/profiles/default_image_company.png" alt="">
            @else
            <img id="user-profile-img" src="/storage/{{ $user->profile_picture }}" alt="">
            @endif

        </div>
        <div class="profile-info">
            <div class="info">
                <input field="text" class="name company" id="name" name="name" value="{{ $user->name }}" placeholder="Företagsnamn">
            </div>
            <!-- LOCATION -->
            <input field="text" class="location" id="location" name="location" value="{{ $extraInfo->location }}" placeholder="Storgatan 1, Göteborg">
            <div class="upload-img">
                <label for="profile_picture">Ändra bild</label>
                <input type="file" class="upload-profile-img" id="profile_picture" name="profile_picture">
            </div>
        </div>
    </div>

    <div class="profile-main">
        <!-- ABOUT ME -->

        <div class="desktop-selection">

            <div class="main-section">
                <h2 class="title-4">Om oss</h2>
                @if ($user->description == null)
                <textarea id="description" name="description" rows="4" class="form-control user-description" placeholder="Här får ni gärna berätta lite mer om företaget (ex. antal LIA-platser, hur många ni är i teamet etc.)"></textarea>
                @else
                <textarea id="description" name="description" rows="4" class="form-control user-description">{{ $user->description }}</textarea>
                @endif
                <div id="charCount">0/900</div>
            </div>
            <div class="divider"></div>


            <!-- COMPETENCIES -->
            <div class="main-section">
                <h2 class="title-4">Vad vi jobbar med</h2>
                <!-- Technologies-->
                <div class="technologies">
                    <!-- Display selected technologies -->
                    <div class="selected-technologies">
                        @foreach ($user->technologies as $technology)
                        <div class="technology-checkbox selected">
                            <label>{{ $technology->name }}</label>
                            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" checked>
                        </div>
                        @endforeach
                    </div>
                    <div class="more-technologies">Se fler teknologier</div>
                    <div class="unselected-technologies">
                        <!-- Hide unselected technologies intitially -->
                        @foreach ($technologies as $technology)
                        @if (!$user->technologies->contains($technology))
                        <div class="technology-checkbox">
                            <label>{{ $technology->name }}</label>
                            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}">
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="divider"></div>

        </div>
        <!-- CONTACT -->
        <div class="main-section contact">
            <h2 class="title-4">Kontakt</h2>
            <ul>
                @foreach ([
                'phone' => ['label' => 'Telefon', 'type' => 'phone', 'icon' => '/images/icons/phone.svg', 'value' => $user->phone ?? '', 'placeholder' => 'Telefonnummer'],

                'website' => ['label' => 'Hemsida', 'type' => 'url', 'icon' => '/images/icons/website.svg', 'value' => $user->website ?? '', 'placeholder' => 'https://www.exempel.se'],
                'linkedin' => ['label' => 'LinkedIn', 'type' => 'url', 'icon' => '/images/icons/linkedin.svg', 'value' => $user->linkedin, 'placeholder' => 'LinkedIn-URL'],
                'facebook' => ['label' => 'instagram', 'type' => 'text', 'icon' => '/images/icons/instagram.svg', 'value' => $user->facebook, 'placeholder' => 'Instagram-namn'],
                ] as $field => $attributes)
                <!-- Input fields-->
                <li>
                    <img src="{{ $attributes['icon'] }}" alt="">
                    <input type="{{ $attributes['type'] }}" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $attributes['value'] }}" placeholder="{{ $attributes['placeholder'] }}">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>