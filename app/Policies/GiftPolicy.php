<?php

namespace App\Policies;

use App\Models\Gift;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GiftPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Gift $gift)
    {
        //
    }

    public function create(User $user)
    {
        return $user->role->name == 'PARTNER';
    }


    public function update(User $user, Gift $gift)
    {
            return ($user->id == $gift->user_id) && ($user->role->name == 'PARTNER');
    }

    public function delete(User $user, Gift $gift)
    {
        return ($user->id == $gift->user_id) || ($user->role->name != 'USER' && $user->role->name != 'OPERATOR');
    }


    public function restore(User $user, Gift $gift)
    {
        //
    }


    public function forceDelete(User $user, Gift $gift)
    {
        //
    }
}
