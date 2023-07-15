<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => 'required|min:3|string',
            'description'   => 'required|min:3|string',
            'price'         => 'required',
            'discount'      => 'required',
            'image'         => 'required',
            'category_id'   => 'required',
        ];
    }

    public function messages()
    {
        return [

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
    }

    /**
     * Return validation errors as json response
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'status' => false,
            'errNum' => 400,
            'msg' => 'Bad Request',
            'errors' => $validator->errors(),
        ];

        throw new HttpResponseException(response()->json($response, 400));
    }
}
