<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['ageRange'];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
