<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/15
     * Time: 18:30
     */

    function check_verify($code, $id = 1)
    {
        $Verify =new \Think\Verify();
        $Verify->reset = false;
        return $Verify->check($code, $id);
    }

    //cookie 加密
    function  encryption($username, $type = 0)
    {
        $key=sha1(C('COOKIE_key'));
        if (!$type) {
            return base64_encode($username ^ $key);
        }

        $username=base64_decode($username);
        return $username ^ $key;

    }