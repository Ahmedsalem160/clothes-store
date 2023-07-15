<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSizeColor;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'image', 'description', 'price', 'discount', 'category_id', ];

    ######################################### STARTING RELATIONS METHODS ########################
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function colors(){
        return $this ->hasMany(ProductColor::class, 'product_id');
    }

    public function sizes(){
        return $this ->hasMany(ProductSize::class, 'product_id');
    }
    public function colorsizes(){
        return $this->hasMany(ProductSizeColor::class, 'product_size_color_id');
    }
    ######################################### ENDING RELATIONS METHODS ##########################
}
