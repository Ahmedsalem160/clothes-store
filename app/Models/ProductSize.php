<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\ProductSizeColor;

class ProductSize extends Model
{
    use HasFactory;
    protected $table = "product_sizes";
    protected $fillable = ['id', 'product_id', 'size',];

    ######################################### STARTING RELATIONS METHODS ########################

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function sizeColors(){
        return $this->hasMany(ProductSizeColor::class, 'product_size_id');
    }
    ######################################### ENDING RELATIONS METHODS ##########################
}
