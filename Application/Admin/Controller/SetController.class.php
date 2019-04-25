<?php
namespace Admin\Controller;
use Think\Controller;
class SetController extends BaseController 
{
  
	public function _initialize()
	{
	
		parent::_initialize();
	}
	
	/**
	 * 获取分类
	 */
	public function read()
	{
        $this->assign('access', 'g');
        $this->assign('position', '系统设置');
		$modelSet			= M('set');
		
		if(IS_GET)
		{
			$output['rowSet'] 	= $modelSet->find();
			$this->assign('output', $output);
			$this->display('admin_set_read');
		}
		
		if(IS_POST)
		{
			$r = array();
			$r['tip_top'] 		= I('post.tip_top');	
			$r['tip_center']	= I('post.tip_center');
			$r['rule']			= $_POST['rule'];
			
			if(!empty($_FILES['goods_img']['name']))
			{
				//图片上传
				$setting			= 	C('UPLOAD_SITEIMG_QINIU');
				//上传到七牛云存储
				$Upload 			= 	new \Think\Upload($setting);	//实例化
				$resultQiniu 		= 	$Upload->upload();				//执行上传
				$r['wechat']		= $resultQiniu['goods_img']['url']; //获取图片名称带扩展名
			}
			
			$result = $modelSet->where(1)->save($r);
			
			if($result)
			{
				$this->success('更新成功', '/Admin/Set/read');
				exit;
			}
			
			$this->error('提交失败');
		}
	}

    /**
     * 自动下单设置
     */
    public function automatic()
    {
        $this->assign('access', 'zd');
        $this->assign('position', '自动下单设置');
        $modelSet			= M('automatic_set');
        $modelUser			= M('automatic_user');

        if(IS_GET)
        {
            $output['rowSet'] 	= $modelSet->find();
            $users 	= $modelSet->query('select a.user_id, b.nickname, a.isstart from sh_automatic_user as a left join sh_user as b on a.user_id = b.id');
            $this->assign('output', $output);
            $this->assign('users', $users);
            $this->display('admin_set_automatic');
        }

        if(IS_POST)
        {
            $r = array();
            $r['user_bottom'] 	= I('post.user_bottom');
            $r['user_top']	= I('post.user_top');
            $r['order_bottom']	= I('post.order_bottom');
            $r['order_top']	= I('post.order_top');
            $r['time_bottom']	= I('post.time_bottom');
            $r['time_top']	= I('post.time_top');
            $r['isstart']	= I('post.isstart');
            // 更新自动下单用户
            $users = I('post.users');
            $result3 = $result2 = '';
            if (!empty($users)) {
                $ids = implode(',', $users);
                // 更新不进入自动下单的用户
                $result2 = $modelUser->execute("update sh_automatic_user set isstart = 2 where user_id not in ($ids)");
                // 更新进入自动下单的用户
                $result3 = $modelUser->execute("update sh_automatic_user set isstart = 1 where user_id in ($ids)");
            } else {
                $this->error('自动下单用户不能为空，提交失败');
            }

            if (empty($r['user_bottom']) ||
                empty($r['user_top']) ||
                empty($r['order_bottom']) ||
                empty($r['order_top']) ||
                empty($r['time_bottom']) ||
                empty($r['time_top'])) {
                $this->error('上下限区间不能为空，提交失败');
            }
            $result = $modelSet->where(1)->save($r);
            if($result || $result2 || $result3)
            {
                $this->success('更新成功', '/Admin/Set/automatic');
                exit;
            }

            $this->error('提交失败');
        }
    }

    
    
}