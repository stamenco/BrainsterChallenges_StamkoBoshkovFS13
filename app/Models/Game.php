<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function team()
    {
        return $this->hasMany(Team::class);
    }
    public function player()
    {
        return $this->hasMany(Player::class);
    }
}