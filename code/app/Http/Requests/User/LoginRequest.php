<?php
/**
 * Created by PhpStorm.
 * User: brycemeyer
 * Date: 8/18/17
 * Time: 6:59 PM
 */

namespace Government\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package Government\Http\Requests\User
 */
class LoginRequest extends FormRequest
{

    /**
     * @return array
     */
    public function rules()
    {

        return [
            'email' => 'required|email',
            'password' => 'required|min:6'
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