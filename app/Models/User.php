<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'password' => 'hashed',
    ];

    /**
     * Get the resume associated with the user.
     */
    public function resume(): HasOne
    {
        return $this->hasOne(Resume::class);
    }

    public static function booted()
    {
        static::created(function($user){
            $user->resume()->create([
                'it_position' => '"Your position"',
                'introduction_text' => "I am a beginnerdeveloper with 1 year of experience.
                I'd love to have a chance to work with you, that's why I have a Telegram for offers :)",
                'inspire_phrase' => "Everything is achievable with hard work",
                'about_me' => 'I have been working as a php developer only one year. During this year, I managed to study a lot of technologies, work on one interesting project, but very often I feel that I am not even a junior developer. It\'s like: "The more you know the less you know"
                In 2020 i have started to learn programming with Python. I got the main programming base with this language. But now, due to unexpected circumstances, I\'m working with PHP and I don\'t regret at all.',
            ]);
        });
    }
}
