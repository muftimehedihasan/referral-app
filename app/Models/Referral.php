<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'referrer_id',
        'email',
        'code',
    ];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }



}
