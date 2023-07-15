<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\ٌRequests\ProductRequest;
use Validator;

class ProductController extends Controller
{
    public function create(Request $req){
        $msgs =[
            'name.required' =>  __('messages.productNameRequired') ,
            'name.min'      =>  __('messages.productNameMin') ,
            'name.string'   =>  __('messages.productNameString') ,
            'description.required' =>  __('messages.productDescriptionRequired') ,
            'description.min'      =>  __('messages.productDescriptionMin') ,
            'description.string'   =>  __('messages.productDescriptionString') ,
            'price.required' =>  __('messages.productPriceRequired') ,
            'discount.required' =>  __('messages.productDiscountRequired') ,
            'image.required'=>  __('messages.productImageRequired'),
            'category_id.required' =>  __('messages.productCategoryRequired') ,
        ];
        $validator = Validator::make($req->all(),[
            'name'          => 'required|min:3|string',
            'description'   => 'required|min:3|string',
            'price'         => 'required',
            'discount'      => 'required',
            'image'         => 'required',
            'category_id'   => 'required',
        ], $msgs);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(),'status' => false,'msg' => 'Bad Request',]);
            //return failedValidation();
        }else{
            $product = Product::create( $req->all() );
            return returnData('product', $product, "Product Created successfully");
        }



    }

    public function index(Request $req){
        if(isset($req->page) && $req->page != null){
            $products = Product::paginate(2);
        }else{
            $products = Product::all();
        }

        return returnData('products', $products, "Mission Done Successfully");
    }

    public function update(Request $req, $id){
        $msgs =[
            'name.required' =>  __('messages.productNameRequired') ,
            'name.min'      =>  __('messages.productNameMin') ,
            'name.string'   =>  __('messages.productNameString') ,
            'description.required' =>  __('messages.productDescriptionRequired') ,
            'description.min'      =>  __('messages.productDescriptionMin') ,
            'description.string'   =>  __('messages.productDescriptionString') ,
            'price.required' =>  __('messages.productPriceRequired') ,
            'discount.required' =>  __('messages.productDiscountRequired') ,
            'image.required'=>  __('messages.productImageRequired'),
            'category_id.required' =>  __('messages.productCategoryRequired') ,
        ];
        $validator = Validator::make($req->all(),[
            'name'          => 'required|min:3|string',
            'description'   => 'required|min:3|string',
            'price'         => 'required',
            'discount'      => 'required',
            'image'         => 'required',
            'category_id'   => 'required',
        ], $msgs);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(),'status' => false,'msg' => 'Bad Request',]);
            //return failedValidation();
        }else{
            $product = Product::find($id);
            if ($product) {
                $product->update( $req->all() );
                return returnData('product', $product, "Product Updated successfully");
            }else{
                return returnError(500, "This Product isn't here");
            }

        }
    }
    public function delete($id){
        $product = Product::find($id);
            if ($product) {
                $product->delete();
                return returnSuccessMessage("Product Deleted successfully");
            }else{
                return returnError(500, "This Product isn't here");
            }
    }
}
