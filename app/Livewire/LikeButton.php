<?php

namespace App\Livewire;

use App\Models\Likes;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class LikeButton extends Component
{
    public $userId;
    public $liked = false;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->checkIfLiked();
    }

    public function toggleLike()
    {
        $existingLike = Likes::where('liker_id', Auth::id())
            ->where('liked_user_id', $this->userId)
            ->first();

        if ($existingLike) {
            // If a like exists, remove it
            $existingLike->delete();
            $this->liked = false;
        } else {
            // If a like doesn't exist, create it
            Likes::create([
                'liker_id' => Auth::id(),
                'liked_user_id' => $this->userId
            ]);
            $this->liked = true;
        }
    }

    public function checkIfLiked()
    {
        $existingLike = Likes::where('liker_id', Auth::id())
            ->where('liked_user_id', $this->userId)
            ->exists();

        $this->liked = $existingLike;
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
