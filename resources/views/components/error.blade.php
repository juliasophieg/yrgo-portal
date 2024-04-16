@if ($errors->any())
<div class="error-div">
    <div class="error-close">x</div>
    <p class="error">{{ $errors->first() }}</p>
</div>
@endif