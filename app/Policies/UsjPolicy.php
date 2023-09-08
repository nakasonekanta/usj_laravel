<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Usj;

class UsjPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * 指定されたユーザータスクの時削除可能
     * 
     * @param User $user
     * @@param Usj $usj
     * @return bool
     */
    public function destroy(User $user, Usj $usj)
    {
        return $user->id === $usj->user_id;
    }
}
