<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Wholeseller extends Authenticatable
{
use Notifiable;

protected $fillable = [
'name', 'email', 'password', 'profile_picture', 'role', 'status'
];
protected $hidden = [
'password', 'remember_token',
];
protected $casts = [
'email_verified_at' => 'datetime',
];

}
