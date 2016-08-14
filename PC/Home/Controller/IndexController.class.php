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
//        var_dump(json_encode($vote));
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

//        var_dump($userip);
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
    public function adapt(){
        /*方法1、获取用户ip地址，可以查看是否已投票,本地测试ip为：：1，效果不好*/
        $ip=$_SERVER["REMOTE_ADDR"];

//        print_r($ip);
        /*方法2、获取用户username，查看是否在对应投票栏下已存在投票记录*/
//        if($_COOKIE['username']){
        //实例化模型
        $m=M('Vote');
        $vote=$m->order('vote_count desc')->select();
//        var_dump(json_encode($vote));
        $detail=$vote['0']['user_detail'];
        var_dump($vote);
        $id=I('post.id');

//        $m->where('vote_id="'.$id.'"')->save($array);
        $this->assign("vote",$vote);
    }
    public function data(){
        $m=M('Vote');
        $vote=$m->where('vote_id='.$_POST['id'])->select();
        //查询触发投票事件对应的数据库ip列表
        $voteip=(string)$vote['0']['user_ip'];
        $votecount=(int)$vote['0']['vote_count'];
        $newip=(string)$_SERVER['REMOTE_ADDR'];
        $array['newip']=$newip;
        $array['voteip']=$voteip;
        $array['id']=I('post.id');
        //匹配当前用户投票的ip是否成功
        if(strpos($voteip,$newip)!==false){
            $array['userip']="exist";
//            $m->where('user_ip='.$voteip)->save($array);
            $back['status']=1;
        }else{
            $updateip=$voteip.",".$newip;
            $newdata['user_ip']=$updateip;
            $m->where('vote_id='.I('post.id'))->setInc('vote_count',1);
            $m->where('vote_id='.I('post.id'))->save($newdata);

//            $array['userip']=$_SERVER['REMOTE_ADDR'];
            $array['userip']=$updateip;
            $back['status']="0";
            $back['vote_count']=$votecount;
        }
//        var_dump($ip);
        return $this->ajaxReturn($back,"json");
    }
    public function responsive(){
        /*方法1、获取用户ip地址，可以查看是否已投票,本地测试ip为：：1，效果不好*/
        $ip=$_SERVER["REMOTE_ADDR"];

//        print_r($ip);
        /*方法2、获取用户username，查看是否在对应投票栏下已存在投票记录*/
//        if($_COOKIE['username']){
        //实例化模型
        $m=M('Vote');
        $vote=$m->order('vote_count desc')->select();
        $id=I('post.id');
//        var_dump($vote.vote_ip);
        $this->assign("vote",$vote);
        $this->display();
    }
}