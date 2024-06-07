<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTable extends Model
{
    use HasFactory;
    protected $table="Book";
    protected $fillable = ['tablename','tableprice','description','category'];
}
