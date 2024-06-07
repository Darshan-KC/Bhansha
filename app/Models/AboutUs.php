<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['image_id','heading','description'];

    public function image(){
        return $this->belongsTo(Image::class);
    }

}

