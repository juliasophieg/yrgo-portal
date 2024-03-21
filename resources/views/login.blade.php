@include('components.menu')

<form action="/login" method="POST">
    @csrf
    <label for="email">Email</label>
    <input name="email" id="email" type="email">
    <label for="password">Password</label>
    <input name="password" id="password" type="password">
    <button>Login</button>
</form>

@include('components.error')