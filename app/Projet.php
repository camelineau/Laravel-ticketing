<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'titre', 'description', 'status'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
