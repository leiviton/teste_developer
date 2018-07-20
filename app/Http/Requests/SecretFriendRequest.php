<?php
/**
 * Created by PhpStorm.
 * User: Leiviton
 * Date: 19/07/2018
 * Time: 21:07
 */

namespace TestDeveloper\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class SecretFriendRequest extends FormRequest
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
            ];
    }
}