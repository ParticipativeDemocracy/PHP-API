<?php
/**
 * Created by PhpStorm.
 * User: brycemeyer
 * Date: 8/18/17
 * Time: 7:04 PM
 */

namespace Government\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SignUpRequest
 * @package Government\Http\Requests\User
 */
class SignUpRequest extends FormRequest
{

    /**
     * @return array
     */
    public function rules()
    {

        return [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'name' => 'required|string'
        ];
    }

    /**
     * All requests to this route are authorized
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}