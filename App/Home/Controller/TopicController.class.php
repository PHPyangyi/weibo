<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/18
     * Time: 9:14
     */

    namespace Home\Controller;


    use Think\Controller;

    class TopicController extends Controller
    {
        public function publish()
        {
            if (IS_AJAX) {
                $Topic = D('Topic');
                $tip = $Topic->publish(I('post.content'), session('user_auth')['id']);
                echo $tip;
            } else {
                $this->error('非法访问！');
            }
        }
    }