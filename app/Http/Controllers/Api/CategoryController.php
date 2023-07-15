<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * All functions in that controller Must Followed Constructor
     */
    public function __construct(){
        $this->middleware('auth:user-api');
    }
    /**
     * Adding Category throug api
     */
    public function create(CategoryRequest $req){
        // adding data
        if(!$category = Category::create($req->all())){
            returnError('500', 'Some Thing Error in Your inputs Please Try Again.');
        }

        return returnData('category', $category, 'Mission Done Successfully.');
    }
    /**
     * Update Category Through api
     */
    public function update(CategoryRequest $req){
        // check about id at request
        if (!$req->has('id')) {

            return returnError('s0000','Error in data');

        }else{
            // check about id of category exist already or not
            if($category = Category::find($req->id)){

                $category->update($req->except('created_at'));
                return returnData('category', $category, 'Category Updated Successfully');

            }else{
                return returnError('s0000','This Category does not exist');
            }

        }
    }
    /**
     * Return All Categories in My DB
     */
    public function index(){
        $categories = Category::all();
        return returnData('categories', $categories, 'All Categories in the DB');
    }
    /**
     * Delete Category Through api
     */
    public function delete(Request $req){
        $category_id = $req->id;

        if(isset($category_id) && is_numeric($category_id)){

            if (!$category = Category::find($category_id)) {
                return returnError('s00', 'This Category Already Does not Existing');
            }else{
                $category->delete();
                return returnSuccessMessage('Mission Done. The Category Deleted Successfully');
            }
        }else{
            return returnError('s00', 'which Data You need to Delete it !!');
        }

    }
}
