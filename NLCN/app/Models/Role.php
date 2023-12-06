<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'list_route_admin',
        'updated_at',
        'created_at'
    ];

    protected $casts = [
        'list_route_admin' => 'array'
    ];
}
