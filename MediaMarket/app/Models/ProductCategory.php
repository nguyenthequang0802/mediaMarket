<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;
    public function parentCategory(){
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }
    public function childs():HasMany{
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
    public function product(){
        return $this->hasMany(Product::class,'category_id');
    }
}
