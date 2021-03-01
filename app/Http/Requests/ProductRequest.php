<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\Product;

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
     * @return array
     */
    public function rules(Request $request)
    {

        // dd($request->image);

        // dd($request->all());
        // $product = Product::find(Auth::id());
        return [
        'name' => 'required|max:10',
//        'image' => 'file',
        'short_description' => 'required|max:20',
        'full_description' => 'required|max:225',
        'price' => 'required|min:2',
//        'category_id' => 'required',
        ];

        // if ($user->notHavingImageInDb()){
        //     $rules['image'] = 'required|image';
        // }
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Name is required!',
            // 'email.required' => 'Email is required!',
            // 'password.required' => 'Password is required!'
        ];
    }
}
