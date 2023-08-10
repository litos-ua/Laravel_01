<?php

namespace App\Models;

use Illuminate\Contracts\auth\MustVerifyEmail;
use App\Models\MessageUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];


    /**
     * Default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 0,
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => 'integer', // Change 'allowed_status' to 'status' to match the migration
        //'status' => 'array', // Specify 'status' as an array
        //'status.*' => 'integer', // Specify that the array contains integer values
    ];

    public function phones()
    {
        return $this->hasMany(Phone::class, 'user_id', 'id');
    }

    public function sentMessages()
    {
        return $this->hasMany(MessageUser::class, 'sender_id', 'id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(MessageUser::class, 'receiver_id', 'id');
    }

}
