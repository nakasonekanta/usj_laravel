<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usj extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * usjを保持する
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
