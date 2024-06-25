<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerLead extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function product()
    {
        return $this->belongsTo(Loan::class,'product_id');
    }

    public function type()
    {
        return $this->belongsTo(ProductType::class,'type_id');
    }
}
