<form action="/register" method="POST">
    @csrf


    <label for="student">Student</label>
    <input type="radio" id="student" name="role" value="student">
    <label for="company">Företag</label>
    <input type="radio" id="company" name="role" value="company">
    <label for="name">Namn</label>
    <input id="name" name="name" type="name">
    <label for="email">Email</label>
    <input id="email" name="email" type="email">
    <label for="password">Lösenord</label>
    <input id="password" name="password" type="password">

    <button type="submit">Registrera</button>
</form>
{{-- //TODO: password confirmation?  --}}
@include('components.error')
