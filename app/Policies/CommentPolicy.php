<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Comment $comment)
    {
        //
    }

    public function create(User $user)
    {
        return $user->role->name == 'USER';
    }


    public function update(User $user, Comment $comment)
    {
        return ($user->id == $comment->user_id) || ($user->role->name != 'USER' && $user->role->name != 'OPERATOR'&& $user->role->name != 'PARTNER');

    }

    public function delete(User $user, Comment $comment)
    {
        return ($user->id == $comment->user_id) || ($user->role->name != 'USER' && $user->role->name != 'OPERATOR'&& $user->role->name != 'PARTNER');
    }


    public function restore(User $user, Comment $comment)
    {
        //
    }


    public function forceDelete(User $user, Comment $comment)
    {
        //
    }
}
