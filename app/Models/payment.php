<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'transaction_code',
        'amount',
        'quantity',
        'product_id',
    ];
    public function product(){
        return $this->belongsTo(product::class,"product_id");
    }
    public function user(){
        return $this->belongsTo(user::class,"user_id");
    }
    
}
