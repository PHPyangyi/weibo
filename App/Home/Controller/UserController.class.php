<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/15
     * Time: 11:18
     */

    namespace Home\Controller;

    class UserController extends HomeController
    {
        public function register ()
        {
            if (IS_AJAX) {
                $User= D('User');
                $uid=$User->register(I('post.username'), I('post.password'), I('post.email'));
                echo $uid;
            } else{
                $this->error('非法访问！');
            }
        }

        //ajax login
        public function login ()
        {
            if (IS_AJAX) {
                $User = D('User');
                $uid = $User->login(I('post.username'), I('post.password'));
                echo $uid;
            } else {
                $this->error('非法访问');
            }
        }

        //ajax username
        public function checkUserName ()
        {
            if (IS_AJAX) {
                $User = D('User');
                $uid = $User->checkField(I('post.username'), 'username');
                echo $uid > 0 ? 'true' : 'false';

            } else {
                $this->error('非法访问！');
            }
        }
        //ajax email
        public function checkEmail ()
        {
            if (IS_AJAX) {
                $User = D('User');
                $uid = $User->checkField(I('post.email'), 'email');
                echo $uid > 0 ? 'true' : 'false';

            } else {
                $this->error('非法访问！');
            }
        }
        //ajax 验证码
        public function checkVerify ()
        {
            if (IS_AJAX) {
                $User = D('User');
                $uid = $User->checkField(I('post.verify'), 'verify');
                echo $uid > 0 ? 'true' : 'false';

            } else {
                $this->error('非法访问！');
            }
        }
    }