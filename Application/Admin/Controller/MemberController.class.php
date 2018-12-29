<?php
/**
 * 管理员登录
 * 
 */
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller {
    
	public function login(){

		layout(false);
    	//get
		if(IS_GET){
			
			$this->display('admin_member_login');
    	}
    	//post
    	if(IS_POST){
    		//设置单独的管理员账号
			$dbusername='duobao';
			$dbpassword='dbadmin2017';
    		$member_name 		= I('post.member_name');
    		$member_password	= I('post.member_password');
    		$piccode			= I('post.piccode');
    		
    		if(empty($member_name) || empty($member_password) || empty($piccode)){
    			
    			$this->error('必要参数不能为空！');
    			exit;
    			
    		}
    		
    		$verify = new \Think\Verify ();
    		$result = $verify->check ( $piccode );
    			
    		if (! $result) {
    			$this->error('图片验证码错误！');
    			exit;
    		}
    		if($member_name==$dbusername && $member_password==$dbpassword){
				$_SESSION['admin']['id']='2';
				$_SESSION['admin']['member_name']=$dbusername;
				$_SESSION['admin']['member_password']=$dbpassword;
				$this->success('登录成功！','/Admin/Order/read');
			}else{
				//实例化管理员表
				$model 					= M('admin');
				$where['member_name'] 	= $member_name;
				$row 					= $model->where($where)->find();

				//登录失败
				if(md5($member_password) != $row['member_password']){
					$this->error('用户名或密码错误！');
					exit;
				}
				
				$_SESSION['admin'] = $row;

				$this->success('登录成功！','/Admin');
			}
    	}
			
    }
    
    /**
     * 图形验证码
     */
    public function piccode() {
    	$Verify = new \Think\Verify ();
    	$Verify->fontSize = 60;
    	$Verify->length = 4;
    	$Verify->imageH = 150;
    	$Verify->useNoise = true;
    	$Verify->codeSet = '1234567890';
    	$Verify->entry ();
    }
    
    //change
    public function pass_edit(){
    
    	// 登录验证
    	if (empty ($_SESSION ['admin'])) {
    		redirect('/admin/User/Login');
    	}
    
    	if(IS_GET){
    		
    		$this->assign('access', 'm');
    		$this->assign('position', '修改密码');
    		$this->display('pass_edit');
    	}
    
    	if(IS_POST){
    
    		$pass_old = I('post.pass_old');
    		$pass_new = I('post.pass_new');
    		$pass_confirm = I('post.pass_confirm');
    
    		if(empty($pass_old) || empty($pass_new) || empty($pass_confirm))
    		{
    			$this->error("密码不能为空!");
    			exit;
    		}
    
    		$model = M('admin');
    		$row = $model->find();
    		
    		
    		if($row['member_password'] != md5($pass_old))
    		{
    			$this->error("原密码输入错误!");
    			exit;
    		}
    
    		if($pass_new != $pass_confirm)
    		{
    			$this->error("密码两次输入不一样!");
    			exit;
    		}
    
    		$pass = md5($pass_new);
    		$where = array();
    		$where['id'] = 1;
    		$result = $model->where($where)->setField('member_password', $pass);
    		
    		if($result)
    		{
    			$this->success("密码设置成功!",'/Admin/Member/logout');
    			exit;
    		}
    		else
    		{
    			$this->error("密码设置失败!");
    			exit;
    		}
    
    	}
    }
    
    //登出
    public function logout(){
    	 
    	$_SESSION['admin'] = '';
    	unset($_SESSION['admin']);
    	header("Location:/Admin/Member/login");
    }
    
    

    
    
}