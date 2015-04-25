<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class UpdateRequest extends Request {

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
            'old_password'  =>  'required|min:6',
            'email'         =>  'required|email|confirmed|unique:users,email,'.Auth::id(),
            'password'      =>  'min:6|confirmed',
        ];
    }

}
