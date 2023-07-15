<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\ProductSizeColor;

class ProductColor extends Model
{
    use HasFactory;

    protected $table = "product_colors";
    protected $fillable = ['id', 'product_id', 'color',];

    ######################################### STARTING RELATIONS METHODS ########################

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function colorSizes(){
        return $this->hasMany(ProductSizeColor::class, 'product_color_id');
    }
    ######################################### ENDING RELATIONS METHODS ##########################
}
