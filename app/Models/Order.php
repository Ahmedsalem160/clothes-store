<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\ProductSizeColor;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [  'id', 'user_id', 'status', 'payment_status', 'payment_method', 'payment_id', 'total_price',
                             'name', 'surname', 'address', 'phone', 'email', 'city', 'country', 'postal_code',
                             'shipping_price'];

    ######################################### STARTING RELATIONS METHODS ########################
    // one To Many Relation between User & orders
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Many To Many Relation between Product size color & Order using order_details as table of relation
    public function products(){
        return $this -> belongsToMany(ProductSizeColor::class, 'order_details', 'product_size_color_id', 'order_id');
    }
    ######################################### ENDING RELATIONS METHODS ##########################

}
