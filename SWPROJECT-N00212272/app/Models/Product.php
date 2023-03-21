<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
// where if i would want them to be fillable i would change the guarded to fillable like this
    protected $fillable = ['name','category','category','description','price','condition','image1','image2','image3'];
    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size', 'product_size');
    }
}
