<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteConfig extends Model
{
    use HasFactory;
    protected $fillable = ['logo_title','logo_id','company_name','popular_dish_title', 'special_food','social_headline'];

    /**
     * Get the image that owns the SiteConfig
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'logo_id', 'id');
    }
}
