<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
    ];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function jobs() {
        return $this->hasMany(Job::class);
    }

    public function applications() {
        return $this->hasMany(Application::class);
    }

    public function information() {
        return $this->hasOne(Information::class);
    }

    public function contact() {
        return $this->hasOne(Contact::class);
    }

    public function educations() {
        return $this->hasMany(Education::class);
    }

    public function works() {
        return $this->hasMany(Work::class);
    }

    public function skills() {
        return $this->hasMany(Skill::class);
    }
}