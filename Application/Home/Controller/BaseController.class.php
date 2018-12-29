<?php
/**
 * 基类
 */
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller 
{
		
	protected $uid = null;
	protected $set = null;
	
	public function _initialize()
	{
		//推广保存 openid
    	$pid = I('get.pid');

    	if(!empty($pid))
    	{
    		session('pid', $pid);
    	}

		//判断用户是否登录
		$this->uid = session('member');
				
		//用户不存在登录openid
		if(empty($this->uid))
		{
			redirect('/User/login');		
		}
		
		$model = M('set');
		$this->set = $model->find();
		
		
	}
	
	
 
}