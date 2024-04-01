@extends('layout')

@section('title', '- Index')

@section('menu')
    @include('components.menu')
@endsection

@section('content')

    @if (isset($user))
        {{ $user->role }}
        @if ($user->role == 'company')
            <p>Welcome Company!</p>
            {{ $extraInfo->company_name }}
        @elseif ($user->role == 'student')
            <p>Welcome Student!</p>

            {{ $extraInfo->program }}
        @endif
        <a href="/logout">logout</a>
    @else
        <h1>hej</h1>
    @endif

@endsection
