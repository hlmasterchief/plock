<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class UserRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'display_name'  =>  'required|min:3',
            'avatar'        => 'mimes:jpeg,bmp,png',
            'cover'         => 'mimes:jpeg,bmp,png',
        ];
    }

}
