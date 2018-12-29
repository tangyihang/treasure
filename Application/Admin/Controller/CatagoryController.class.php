<?php
namespace Admin\Controller;
use Think\Controller;
class CatagoryController extends BaseController 
{
  
	public function _initialize()
	{
	
		parent::_initialize();

		$this->assign('access', 'a');
		$this->assign('position', '夺宝分类');
	}
	
	/**
	 * 获取分类
	 */
	public function read()
	{
		$modelCata 			= M('catagory');
		$output['rowCata'] 	= $modelCata->select();
		
		$this->assign('output', $output);
		$this->display('admin_catagory_read');
	}
    

    
    
}