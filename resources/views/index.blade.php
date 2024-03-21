@if (isset($user))
    @if ($user->role == 'student')
        <p>Welcome Student!</p>
        {{ $extraInfo->program }}
    @elseif ($user->role == 'company')
        <p>Welcome Company!</p>
        {{ $extraInfo->company_name }}
    @endif
    <a href="/logout">logout</a>
@else
    <h1>hej</h1>

@endif
