<?php
/**
 * Created by PhpStorm.
 * User: Leiviton
 * Date: 07/12/2017
 * Time: 12:34
 */

namespace TestDeveloper\Http\Controllers\Api\V1\Admin;

use TestDeveloper\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function logout()
    {
        if (\Auth::check()) {
            \Auth::user()->oauthAccessToken()->delete();
        }
        return response()->json(['status' => 'success']);
    }

}