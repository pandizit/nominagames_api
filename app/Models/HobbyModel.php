<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobbyModel extends Model
{
    use HasFactory;

    protected $table = 'hobby';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['name', 'active'];
    protected $attributes = [
        'name' => '',
        'active' => 'true'
    ];
}
