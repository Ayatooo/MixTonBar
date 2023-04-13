<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'favorited_id',
    ];

    /**
     * The favorites that belong to the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}