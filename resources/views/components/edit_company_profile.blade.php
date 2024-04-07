@foreach ([
'name' => ['label' => 'Företagsnamn', 'type' => 'text', 'value' => $user->name],
'company_contact_name' => ['label' => 'Kontaktperson', 'type' => 'text', 'value' => $extraInfo->company_name ?? ''],
'linkedin' => ['label' => 'LinkedIn', 'type' => 'text', 'value' => $user->linkedin],
'facebook' => ['label' => 'Facebook', 'type' => 'text', 'value' => $user->facebook],
'phone' => ['label' => 'Telefon (publik)', 'type' => 'phone', 'value' => $extraInfo->company_contact_number ?? ''],
'email' => ['label' => 'Email (publik)', 'type' => 'email', 'value' => $extraInfo->company_contact_email ?? ''],
'website' => ['label' => 'Hemsida', 'type' => 'url', 'value' => $extraInfo->company_website ?? ''],
'industry' => ['label' => 'Bransch', 'type' => 'text', 'value' => $extraInfo->company_industry ?? ''],
'employees' => ['label' => 'Antal anställda', 'type' => 'number', 'value' => $extraInfo->employees ?? ''],
'location' => ['label' => 'Plats', 'type' => 'text', 'value' => $extraInfo->location ?? ''],
'total_positions' => ['label' => 'Antal platser', 'type' => 'number', 'value' => $extraInfo->total_positions ?? ''],
] as $field => $attributes)
<!-- All input fields-->
<div class="form-group">
    <label for="{{ $field }}">{{ $attributes['label'] }}</label>
    <input type="{{ $attributes['type'] }}" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $attributes['value'] }}">
</div>
@endforeach

<!-- About us-->
<div class="form-group">
    <label for="description">Om oss</label>
    <textarea id="description" name="description" rows="4" class="form-control">{{ $user->description ?? '' }}</textarea>
    <!-- Technologies-->
    @foreach($technologies as $technology)
    <label>
        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" {{ $user->technologies->contains($technology) ? 'checked' : '' }}>
        {{ $technology->name }}
    </label>
    @endforeach
</div>
<!-- "Looking for"-->
<div class="form-group">
    <label for="job_description">Vi söker</label>
    <textarea id="job_description" name="job_description" rows="4" class="form-control">{{ $userJob->description ?? '' }}</textarea>
    <!-- Technologies-->
    @foreach($technologies as $technology)
    <label>
        <input type="checkbox" name="user_job_technologies[]" value="{{ $technology->id }}" {{ $userJob->technologies->contains($technology) ? 'checked' : '' }}>
        {{ $technology->name }}
    </label>
    @endforeach
</div>