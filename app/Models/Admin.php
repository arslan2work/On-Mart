<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'admins';
    protected $fillable=[
        'full_name', 'email', 'password', 'photo', 'status', 'photo'
    ];
}
