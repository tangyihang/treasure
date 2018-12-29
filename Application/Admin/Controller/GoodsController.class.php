<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends BaseController 
{
  
	public function _initialize()
	{
	
		parent::_initialize();

		$this->assign('access', 'b');
		$this->assign('position', '夺宝产品');
	}
	
	/**
	 * 获取分类
	 */
	public function read()
	{
		getNowDate();
		$modelGoods			= M('goods');
		
		$output['rowGoods'] = $modelGoods->select();
		
		$this->assign('output', $output);
		$this->display('admin_goods_read');
	}
	
	
	/**
	 * 添加产品
	 */
    public function add()
    {
    	if(IS_GET)
    	{
    		$modelCata		= M('catagory');
    		$output['cata'] = $modelCata->select();
    		
    		$this->assign('output', $output);
    		$this->display('admin_goods_add');
    	}
    	
    	
    	if(IS_POST)
    	{
    		$cata_id = I('post.cata_id');
    		$name	 = I('post.name');
    		
    		//参数空
    		if(empty($cata_id) || empty($name))
    		{
    			$this->error('参数不能为空！');
    			exit;
    		}
    		
    		if(empty($_FILES['goods_img']['name']))
    		{
    			$this->error('图片不能为空！');
    			exit;
    		}
    		 
    		//图片上传
    		$setting			= 	C('UPLOAD_SITEIMG_QINIU');
    		//上传到七牛云存储
    		$Upload 			= 	new \Think\Upload($setting);	//实例化
    		$resultQiniu 		= 	$Upload->upload();				//执行上传
    		
    		
    		//格式化数据
    		$r = array();
    		$r['name'] 		= $name;
    		$r['img_url']	= $resultQiniu['goods_img']['url']; //获取图片名称带扩展名
    		$r['cata_id']	= $cata_id;
    		
    		//入库
    		$modelGoods = M('goods');
    		$result 	= $modelGoods->add($r);
    		
    		if($result)
    		{
    			$this->error('夺宝商品添加成功！');
    			exit;
    		}
    		
    		$this->error('夺宝商品添加失败！');
    		exit;
    	}
    	
    }
    
    /**
     * 编辑
     */
    public function edit()
    {
    	//get
    	if(IS_GET)
    	{
    		$id		 = I('get.id');
    		$modelGoods		= M('goods');
    		$output['goods'] = $modelGoods->where('id = '.$id)->find();
    		
    		$modelCata		= M('catagory');
    		$output['cata'] = $modelCata->select();
    	
    		$this->assign('output', $output);
    		$this->display('admin_goods_edit');
    	}
    	
    	//post
    	if(IS_POST)
    	{
    		$id 	 = I('post.id');
    		$cata_id = I('post.cata_id');
    		$name	 = I('post.name');
    		
    		//参数空
    		if(empty($cata_id) || empty($name))
    		{
    			$this->error('参数不能为空！');
    			exit;
    		}
    		
    		$r = array();
    		//格式化数据
    		$r['id']		= $id;
    		$r['name'] 		= $name;
    		$r['cata_id']	= $cata_id;
    		
    		if(!empty($_FILES['goods_img']['name']))
    		{
    			//图片上传
    			$setting			= 	C('UPLOAD_SITEIMG_QINIU');
    			//上传到七牛云存储
    			$Upload 			= 	new \Think\Upload($setting);	//实例化
    			$resultQiniu 		= 	$Upload->upload();				//执行上传
    			$r['img_url']	= $resultQiniu['goods_img']['url']; //获取图片名称带扩展名
    		}
    		 
    		
    		//入库
    		$modelGoods = M('goods');
    		$result 	= $modelGoods->save($r);
    		
    		if($result)
    		{
    			$this->error('夺宝商品更新成功！');
    			exit;
    		}
    		
    		$this->error('夺宝商品更新失败！');
    		exit;
    		
    	}
    	
    	
    }

    
    
}