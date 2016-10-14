<?php
/**
 * Created by PhpStorm.
 * User: kaldmax
 * Date: 3/25/2016
 * Time: 6:18 PM
 */

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int $id
     * @return Response
     */
    public function showProfile($username)
    {
        $user = User::findByUsername($username);
        return view('user.profile', ['user' => $user]);
    }
}