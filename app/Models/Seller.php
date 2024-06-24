<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Seller extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = "sellers";
    protected $guarded = ['id'];

    public function bank()
    {
        return $this->hasOne(BankDetails::class, 'seller_id', 'id');
    }
}
