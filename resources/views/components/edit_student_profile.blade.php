@foreach ([
'name' => ['label' => 'Namn', 'type' => 'text', 'value' => $user->name],
'program' => ['label' => 'Program', 'type' => 'text', 'value' => $extraInfo->program ?? ''],
'linkedin' => ['label' => 'LinkedIn', 'type' => 'text', 'value' => $user->linkedin],
'facebook' => ['label' => 'Facebook', 'type' => 'text', 'value' => $user->facebook],
'phone' => ['label' => 'Telefon', 'type' => 'phone', 'value' => $user->phone ?? ''],
] as $field => $attributes)
<!-- All input fields-->
<div class="form-group">
    <label for="{{ $field }}">{{ $attributes['label'] }}</label>
    <input type="{{ $attributes['type'] }}" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $attributes['value'] }}">
</div>
@endforeach

<!-- About me-->
<div class="form-group">
    <label for="description">Om mig</label>
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
    <label for="job_description">Vad jag söker</label>
    <textarea id="job_description" name="job_description" rows="4" class="form-control">{{ $userJob->description ?? '' }}</textarea>
    <!-- Technologies-->
    @foreach($technologies as $technology)
    <label>
        <input type="checkbox" name="user_job_technologies[]" value="{{ $technology->id }}" {{ $userJob->technologies->contains($technology) ? 'checked' : '' }}>
        {{ $technology->name }}
    </label>
    @endforeach
</div>