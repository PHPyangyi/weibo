<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/15
     * Time: 10:29
     */

    namespace Home\Controller;


    use Think\Verify;

    class LoginController extends HomeController
    {
        public function index ()
        {
            $this->display();
        }

        public function verify () {
            $Verify =new Verify();
            $Verify->length=4;
            $Verify->useNoise = false;
            $Verify->useCurve = false;
            $Verify->useImgBg = true;
            $Verify->entry(1);

        }
    }