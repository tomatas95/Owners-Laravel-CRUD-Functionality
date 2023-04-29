<?php

namespace App\Policies;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OwnerPolicy
{
    public function before(User $user){
        if($user->super_permissions == 3){
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Owner $owner): bool
    {
        if ($user->super_permissions == 2) {
            return true;    
        }else{
            return $owner->user_id == $user->id;
        }
    }

    // /**
    //  * Determine whether the user can update the model.
    //  */
    public function update(User $user, Owner $owner): bool
    {
    return $owner->user_id == $user->id;
    }

    // /**
    //  * Determine whether the user can delete the model.
    //  */
    public function delete(User $user, Owner $owner): bool
    {
        return $owner->user_id == $user->id;

    }
}
