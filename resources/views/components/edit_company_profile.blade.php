@foreach ([
'name' => ['label' => 'Företagsnamn', 'type' => 'text', 'value' => $user->name],
'company_contact_name' => ['label' => 'Kontaktperson', 'type' => 'text', 'value' => $extraInfo->company_name ?? ''],
'linkedin' => ['label' => 'LinkedIn', 'type' => 'text', 'value' => $user->linkedin],
'facebook' => ['label' => 'Facebook', 'type' => 'text', 'value' => $user->facebook],
'phone' => ['label' => 'Telefon (publik)', 'type' => 'phone', 'value' => $extraInfo->company_contact_number ?? ''],
'email' => ['label' => 'Email (publik)', 'type' => 'email', 'value' => $user->email ?? ''],
'website' => ['label' => 'Hemsida', 'type' => 'url', 'value' => $user->website ?? ''],
'location' => ['label' => 'Plats', 'type' => 'text', 'value' => $extraInfo->location ?? ''],
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