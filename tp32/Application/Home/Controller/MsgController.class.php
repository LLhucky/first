<?php
namespace Home\Controller;
use Think\Controller;

class MsgController extends Controller
{
	//列表
    public function index()
    {	
    	#1.获取数据
    	$msgs = M('msg')->select();
    	#2.加载视图
    	$this->assign('msgs', $msgs);
    	$this->display('index');
    }

    public function add(){
    	if(IS_POST){
    		$postData=I('post.');
    		$postData['created_at']=$postData['updated_at']=time();
    		$rs=M('msg')->add($postData);
    		if($rs){
    			$this->success('留言成功',U('msg/index'));
    		}else{
    			$this->error('留言失败');
    		}
    	}
    }

    public function search(){
        if(IS_POST){
            $startTime=strtotime(I('post.startTime'));
            $endTime=strtotime(I('post.endTime'));
            $map['created_at']=array(array('gt',$startTime),array('lt',$endTime));
            $msgs=M('msg')->where($map)->select();
            // $msgs=M('msg')->where("created_at > $startTime and created_at < $endTime")->select();
            $this->assign('msgs', $msgs);
            $this->display('index');
        }
            
    }
}