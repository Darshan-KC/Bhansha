<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class address extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'user_id',
        'phone',
    ];
    public function user(){
        return $this -> BelongsTo(user::class);
    }
}
