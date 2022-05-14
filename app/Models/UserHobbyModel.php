<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHobbyModel extends Model
{
    use HasFactory;

    protected $table = 'user_hobby';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['iduser', 'idhobby'];
    protected $attributes = [
        'iduser' => 0,
        'idhobby' => 0
    ];
}
