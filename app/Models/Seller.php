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

    public static function generateUniqueCode()
    {
        do {
            $uniqueNo = 'SELLER' . str_pad(rand(0, 9999), 6, '0', STR_PAD_LEFT);
        } while (self::where('seller_id', $uniqueNo)->exists());
        return $uniqueNo;
    }
    
    public function createdBy()
    {
        return $this->morphTo();
    }

}
