<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/15
     * Time: 19:47
     */

    namespace Home\Controller;


    use Think\Controller;

    class HomeController  extends Controller
    {
        protected function login ()
        {
            if (session('?user_auth')) {
                return 1;
            } else {
                $this->redirect('Login/index');
            }
        }
    }