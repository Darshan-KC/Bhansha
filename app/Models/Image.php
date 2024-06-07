<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['name','category'];

    /**
     * Get the user associated with the Image
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'image_id', 'id');
    }

    /**
     * Get the product associated with the Image
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'product_id', 'id');
    }

    public function about(){
        return $this->hasOne(AboutUs::class);
    }
    public function caurosel(){
        return $this->hasOne(Caurosel::class);
    }
}
