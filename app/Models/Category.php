<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'image', 'parent_id',];


    ######################################### STARTING RELATIONS METHODS ########################
    public function child(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function products(){
        return $this->hasMany(Product::class, 'product_id');
    }
    ######################################### ENDING RELATIONS METHODS ##########################


}
