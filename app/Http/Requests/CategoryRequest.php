<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// for faild Validtion function
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CategoryRequest extends FormRequest
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

            'name' => 'required|min:3|string',
            'image'=> 'required',
        ];
    }
    public function messages()
    {
        return [

            'name.required' =>  __('messages.categoryNameRequired') ,
            'name.min'      =>  __('messages.categoryNameMin') ,
            'name.string'   =>  __('messages.categoryNameString') ,
            'image.required'=>  __('messages.categoryImageRequired'),
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
