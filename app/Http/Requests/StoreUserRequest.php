<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'=> 'required',
            'email'=>'required|email|unique:users|ends_with:laravel.com,jasonmccreary.me,gmail.com',
            'password'=>'required|min:8'
        ];
    }
    public function messages()
    {
        return[
            'name.require'=>'Truong nay khong duoc de trong',
            'email.require'=>'Truong nay khong duoc de trong',
            'email.email'=>'Khong dung dinh danng',
            'email.unique'=>'Email da ton tai',
            'password.require'=>'Truong nay khong duoc de trong',
            'password.min'=>'Mat khau it nhat 8 ky tu'
        ];
    }
}
