<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller{
	public function index(){
		$data1 = '张三'; 
		$data2 = [ 'name' => '李四', 'age'  => 18, 'sex'  => '男'];
		$data3 = [
    		[ 'name' => '李四1', 'age'  => 181, 'sex'  => '男1'],
    		[ 'name' => '李四2', 'age'  => 182, 'sex'  => '男2'],
    		[ 'name' => '李四3', 'age'  => 183, 'sex'  => '男3']
		];
		$this->assign('data1',$data1);
		$this->assign('data2',$data2);
		$this->assign('data3',$data3);
		$this->display('index');
	}
	public function index2()
	{
		#查询所有数据
		$t2s = M('t2')->select();
		foreach ($t2s as $t2) {
			echo $t2['id'] . '__' . $t2['uname'] . '<br />';
		}
		echo '<pre>';
		print_r($t2s);die;
	}

	public function index3(){
		$rs = M('t2')->add([
			'uname' => str_shuffle('d4a1s33f'),
			'pwd' => str_shuffle('sdfadf')
		]);
		var_dump($rs);die;
	}
}