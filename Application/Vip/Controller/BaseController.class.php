<?php
/**
 * 基类
 */
namespace Vip\Controller;
use Think\Controller;
class BaseController extends Controller 
{
		
	protected $uid = null;
	
	public function _initialize()
	{
		//判断用户是否登录
		$this->uid = session('member');
		
		//用户不存在登录openid
		if(empty($this->uid))
		{
			redirect('/User/login');
		}
		$btid=4;
		$this->assign('btid',$btid);
		
	}
	
	
 
}