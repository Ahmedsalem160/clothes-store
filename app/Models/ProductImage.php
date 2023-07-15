<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductSizeColor;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = "product_images";
    protected $fillable = ['product_color_size_id', 'image',];


    ######################################### STARTING RELATIONS METHODS ########################

    public function product(){
        return $this->belongsTo(ProductSizeColor::class, 'product_color_size_id');
    }

    ######################################### ENDING RELATIONS METHODS ##########################
}
