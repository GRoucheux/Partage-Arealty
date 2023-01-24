<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts_liked_by extends Model
{
    protected $fillable = [
        'username',
        'id'
    ];

    // Forçage du nom de la table (bug Laravel)
    protected $table = "posts_liked_by";
}
