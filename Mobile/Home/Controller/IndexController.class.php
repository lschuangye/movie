<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index(){
       $this->display();
    }
    public function vote(){
        //实例化模型
        $m=M('Vote');
        $vote=$m->order('vote_count desc')->select();
        $this->assign("vote",$vote);
        $this->display();
    }
    public function add_vote(){
        $m=M('Vote');
        //查询所投票对象的id并在此票数加1
        $vote=$m->where('vote_id='.I('post.id'))->setInc('vote_count',1);
        redirect("vote");
    }
}