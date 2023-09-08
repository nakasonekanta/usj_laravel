<?php
 
namespace App\Repositories;
 
use App\Models\User;
 
class UsjRepository
{
    /**
        * ユーザーのタスク一覧取得
        *
        * @param User $user
        * @return Collection
        */
    public function forUser(User $user)
    {
        return $user->usjs()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}