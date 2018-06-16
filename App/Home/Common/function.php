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