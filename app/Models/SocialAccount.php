<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialAccount extends Model
{
    use HasFactory;

    protected $guarded  = [];
    // belongs to table user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
