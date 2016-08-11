<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index(){
        $this->display();
    }
    public function vote(){
        /*方法1、获取用户ip地址，可以查看是否已投票,本地测试ip为：：1，效果不好*/
        $ip=$_SERVER["REMOTE_ADDR"];

//        print_r($ip);
        /*方法2、获取用户username，查看是否在对应投票栏下已存在投票记录*/
//        if($_COOKIE['username']){
        //实例化模型
        $m=M('Vote');
        $vote=$m->order('vote_count desc')->select();
        var_dump(json_encode($vote));
        $detail=$vote['0']['user_detail'];

        $id=I('post.id');
//        $m->where('vote_id="'.$id.'"')->save($array);
        $this->assign("vote",$vote);
        $this->display();
//        }else
//            redirect('add_vote');

    }
    public function add_vote(){
        //获取ip
        $ip=(string)$_SERVER["REMOTE_ADDR"];
        //排名数据
        $order=(int)I('post.order')+1;
        $m=M('Vote');
        //查询所投票对象的id并在此票数加1
        $array['user_ip']=$ip;
        $array['vote_order']=$order;
        //被投票人的ip；
        $voter= $m->where('vote_id='.I('post.id'))->select();
        $userip=(string)$voter['0']['user_ip'];

        var_dump($userip);
        //截取用户详情的第一句作为简介。有句号则以句号，没有句号就截取30个字符串？
        if(strpos($userip,$ip)!==false){
            //已投票
            echo '<script>alert("you had vote this one！")</script>';
            redirect("vote");
        }else{
//            echo '<script>alert("没有投票的ip");</script>';
            $m->where('vote_id='.I('post.id'))->setInc('vote_count',1);
            $m->where('vote_id='.I('post.id'))->save($array);
            redirect("vote");
        }
    }
}