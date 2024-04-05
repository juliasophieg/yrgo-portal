@extends('layout')

@section('title', '- Edit')

@section('menu')
@include('components.menu')
@endsection

@section('content')
<div class="edit-page">
    <form method="POST" action="{{ route('update-profile', ['user' => $user]) }}">
        @csrf
        @method('PUT')
        <!-- STUDENT -->
        @if ($user->role === 'student')
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
            <label for="looking-for">Vad jag söker</label>
            <textarea id="looking-for" name="looking-for" rows="4" class="form-control">{{ $user->description ?? '' }}</textarea>
            <!-- Technologies-->

        </div>

        <!-- COMPANY -->
        @elseif ($user->role === 'company')
        @foreach ([
        'name' => ['label' => 'Kontaktperson (privat)', 'type' => 'text', 'value' => $user->name],

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
            <label for="looking-for">Vi söker</label>
            <textarea id="looking-for" name="looking-for" rows="4" class="form-control">{{ $extraInfo->looking_for ?? '' }}</textarea>
            <!-- Technologies-->
        </div>

        @endif
        <button type="submit">Spara</button>
        <a href="{{ route('profile') }}">Avbryt</a>
    </form>
</div>
@endsection