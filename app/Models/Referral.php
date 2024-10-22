<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'refer_id',
        'amount',
        'wallet',
    ];
}
