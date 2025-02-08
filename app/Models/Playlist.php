<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Playlist extends Model
{
    //

    use HasFactory;

    protected $fillable = ['name'];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
