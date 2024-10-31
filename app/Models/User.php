<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */



     ////= ================================

    //  protected $fillable = [
    //     'referrer_id', 'name', 'email', 'password', 'username', 'referral_token',
    // ];

    protected $fillable = [
        'name', 'email', 'password', 'username', 'referral_token',
    ];


    protected $appends = ['referral_link'];


    public function referrals()
    {
        // return $this->hasMany( 'referrer_id');
        return $this->hasMany(Referral::class, 'referrer_id');
    }


    // Method to count the total referrals
    public function referralCount()
    {
        return $this->referrals()->count();
    }



    public function getReferralLinkAttribute()
    {
        return route('register', ['ref' => $this->username]);
    }



     ////= ================================



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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
