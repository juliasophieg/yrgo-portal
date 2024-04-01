<div>
    <div wire:click="toggleLike">
        @if ($liked)
            <img src="/images/icons/liked-icon.svg" alt="">
        @else
            <img src="/images/icons/like-icon.svg" alt="">
        @endif
    </div>
</div>
