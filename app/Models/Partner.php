<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Partner extends Authenticatable
{
    use HasFactory,HasApiTokens,Notifiable;
    protected $table = "partners";
    public function bank()
    {
        return $this->hasOne(PartnerBankDetails::class, 'partner_id', 'id');
    }

}
