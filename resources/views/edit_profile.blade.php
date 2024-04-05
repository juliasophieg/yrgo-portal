@extends('layout')

@section('title', '- Edit')

@section('menu')
@include('components.menu')
@endsection

@section('content')

<form method="POST" action="{{ route('update-profile', ['user' => $user]) }}">
    @csrf
    @method('PUT')
    <!-- If student -->
    @if ($user->role === 'student')
    @foreach ([
    'name' => ['label' => 'Namn', 'type' => 'text', 'value' => $user->name],
    'program' => ['label' => 'Program', 'type' => 'text', 'value' => $extraInfo->program ?? ''],
    'linkedin' => ['label' => 'LinkedIn', 'type' => 'text', 'value' => $user->linkedin],
    'facebook' => ['label' => 'Facebook', 'type' => 'text', 'value' => $user->facebook],
    'phone' => ['label' => 'Telefon', 'type' => 'phone', 'value' => $extraInfo->phone ?? ''],
    ] as $field => $attributes)
    <div class="form-group">
        <label for="{{ $field }}">{{ $attributes['label'] }}</label>
        <input type="{{ $attributes['type'] }}" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $attributes['value'] }}">
    </div>
    @endforeach

    <div class="form-group">
        <label for="description">Om mig</label>
        <textarea id="description" name="description" rows="4" class="form-control">{{ $user->description ?? '' }}</textarea>
    </div>

    @foreach($technologies as $technology)
    <label>
        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" {{ $user->technologies->contains($technology) ? 'checked' : '' }}>
        {{ $technology->name }}
    </label>
    @endforeach

    <!-- If company -->
    @elseif ($user->role === 'company')
    @foreach ([
    'name' => ['label' => 'Kontaktperson (visas ej)', 'type' => 'text', 'value' => $user->name],

    'company_name' => ['label' => 'Företagsnamn', 'type' => 'text', 'value' => $extraInfo->company_name],
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
    <div class="form-group">
        <label for="{{ $field }}">{{ $attributes['label'] }}</label>
        <input type="{{ $attributes['type'] }}" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $attributes['value'] }}">
    </div>
    @endforeach
    <div class="form-group">
        <label for="description">Om oss</label>
        <textarea id="description" name="description" rows="4" class="form-control">{{ $user->description ?? '' }}</textarea>
    </div>
    <div class="form-group">
        <label for="looking-for">Vi söker</label>
        <textarea id="looking-for" name="looking-for" rows="4" class="form-control">{{ $extraInfo->looking_for ?? '' }}</textarea>
    </div>
    @foreach($technologies as $technology)
    <label>
        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" {{ $user->technologies->contains($technology) ? 'checked' : '' }}>
        {{ $technology->name }}
    </label>
    @endforeach
    @endif
    <button type="submit">Spara</button>
</form>


@endsection