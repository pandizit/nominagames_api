<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['email', 'password', 'firstname', 'lastname', 'age'];
    protected $attributes = [
        'email' => '',
        'password' => '',
        'firstname' => '',
        'lastname' => '',
        'age' => 0,
    ];
}
