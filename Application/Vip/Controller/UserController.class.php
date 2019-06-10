<?php
namespace Vip\Controller;
use Think\Controller;
class UserController extends BaseController {
		
	
	public function _initialize(){
		
		parent::_initialize();	
		
	}
	
	/**
	 * 个人中心
	 */
	public function set()
	{
		
		if(IS_GET){
			$this->display('vip_user_set');
		}
		
		
		if(IS_POST)
		{	
			
			if(empty($_FILES['goods_img']['name']))
			{
				$this->error('图片不能为空！');
				exit;
			}
			
			$name = I('post.nickname');
			
			if(empty($name))
			{
				$this->error('昵称不能为空！');
				exit;

			}
			
			
			//图片上传
			$setting			= 	C('UPLOAD_SITEIMG_QINIU');
			//上传到七牛云存储
			$Upload 			= 	new \Think\Upload($setting);	//实例化
			
			$Upload->exts      	= 	array('jpg', 'gif', 'png', 'jpeg');
            $Upload->maxSize	= 	1024*1024*1024;

			$resultQiniu 		= 	$Upload->upload();				//执行上传
			
			if (!$resultQiniu) {
				//捕获上传异常
				$this->error($Upload->getError());
			}
			
			//格式化数据
			$r = array();
			$r['nickname'] 		= $name;
			$r['headimgurl']	= $resultQiniu['goods_img']['url']; //获取图片名称带扩展名
            $r['headimgurl']    = str_replace('http://faqis.me','https://faqis.me',$r['headimgurl']);
			$r['id']			= $this->uid['id'];
			
			$model = M('user');
			$result = $model->save($r);
			
			if($result){
				
				redirect('/');
			}
			
			$this->error('更新失败');
			
			
		}
		
		
	}
	
	
	public function bank()
	{
		$id = $this->uid['id'];
		$model 		= M('user');
		if(IS_GET)
		{
			
			$rowUser 	= $model->where(['id'=>$id])->find();
			
			if(empty($rowUser['bank_num']) || empty($rowUser['bank_num']) || empty($rowUser['user_name']))
			{
				
				$this->display('vip_user_bank');
				
			}else{
				$this->assign('rowUser', $rowUser);
				$this->display('vip_user_show');
			}
			
			
		}
		
		if(IS_POST)
		{
			if(empty($rowUser['bank_num']) || empty($rowUser['bank_num']) || empty($rowUser['user_name']))
			{
				
				$user_name 	= I('post.username');
				$bank		= I('post.bank');
				$bank_num	= I('post.bank_num');
				$bank_num_2 = I('post.bank_num_2');
				
				if($bank_num != $bank_num_2)
				{
					$this->error('银行卡号输入有误！');
					exit;
				}
				
				$data['user_name'] 	= $user_name;
				$data['bank']		= $bank;
				$data['bank_num']	= $bank_num;
				$data['id']			= $id;
				
				$result = $model->save($data);
				
				if($result)
				{
					$this->success('修改成功！');
				}else{
					$this->error('修改失败!');
				}
				
				
			}else{
				$this->error('不能修改');
				exit;
			}
		}
		
	}
	
    
    
   
    
 
}