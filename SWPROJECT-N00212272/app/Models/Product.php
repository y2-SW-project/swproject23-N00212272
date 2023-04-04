<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
// where if i would want them to be fillable i would change the guarded to fillable like this
    protected $fillable = ['name','description','price','image1','image2','image3','size_id','condition_id'];
    public function materials()
    {
        return $this->belongsToMany('App\Models\Material', 'material_product');
    }
    public function size(){
        return $this->belongsTo(Size::class);
       }
       public function condition(){
        return $this->belongsTo(Condition::class);
       }
       public function category(){
        return $this->belongsTo(Category::class);
       }
}
