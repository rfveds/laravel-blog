<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;
    
    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id || $user->id === $comment->post->user_id;
    }

    public function moderateComments(User $user)
{
    return $user->is_admin || $user->has_moderation_rights;
}
}