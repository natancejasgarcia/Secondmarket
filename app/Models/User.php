<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
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
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the flags for the user.
     */
    public function flags()
    {
        return $this->hasMany(Flag::class, 'user_id');
    }

    /**
     * Get the flags that the user has given.
     */
    public function givenFlags()
    {
        return $this->hasMany(Flag::class, 'flagged_by');
    }
    public function reviews()
    {
        return $this->hasMany(UserReview::class);
    }

    public function givenReviews()
    {
        return $this->hasMany(UserReview::class, 'reviewer_id');
    }
}
