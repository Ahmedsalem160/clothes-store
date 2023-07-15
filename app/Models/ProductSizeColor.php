<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductImage;
use App\Models\Order;

class ProductSizeColor extends Model
{
    use HasFactory;

    protected $table = "product_size_color";
    protected $fillable = [ 'id', 'product_size_id', 'product_color_id','quantity',
                            'price', 'discount', 'active'];

    ######################################### STARTING RELATIONS METHODS ########################
    // one To Many Relation between Product Color & product size colors
    public function productColors(){
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }
    // one To Many Relation between Product size & product size colors

    public function productSizes(){
        return $this -> belongsTo(ProductSize::class, 'product_size_id');
    }
    // one to many between Product & productsizecolor
    public function product(){
        return $this -> belongsTo(Product::class, 'product_size_color_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_size_color_id');
    }
    // Many to many relation between Order and product_size_color the table of relation named oredr_details
    public function orders(){
        return $this->belongsToMany(Order::class, 'order_details', 'order_id', 'product_size_color_id');
    }
    ######################################### ENDING RELATIONS METHODS ##########################

}
