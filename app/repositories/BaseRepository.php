<?php


namespace App\Repositories;
use Illuminate\Support\Facades\Session;


class BaseRepository
{



    function getModelBy($model, $match, $columns)
    {
        $foundModel = $model::where($match)->get($columns);
        return $foundModel->isEmpty() ? false : $foundModel;
    }


    function getLoggedUserId()
    {

        $userId = Session::get('user_id');
        if (!$userId) {

            $cookieId = "user_id";
            return isset($_COOKIE[$cookieId]) ? $_COOKIE[$cookieId] : 0;

        } else {

            return $userId;
        }


    }

    function setLoggedUser($userId)
    {


        /* save in user session*/
        Session::put('user_id', $userId);
        $result["stored_session"] = Session::get('user_id');

        /* save in user cookies */
        $cookie_name = "user_id";
        $cookie_value = $userId;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        $result["stored_cookies"] = $_COOKIE[$cookie_name];


    }



}