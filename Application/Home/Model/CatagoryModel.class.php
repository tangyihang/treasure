<?php 
namespace Home\Model;
use Think\Model;

class CatagoryModel extends Model 
{

	/**
	 * 根据id获取商品
	 */
	public function getById($id)
	{
		
		//$rowCata  = S('catagory_'.$id);
    	
    	if(empty($rowCata))
    	{
    		$model 		= M('catagory');
    		$rowCata 	= $model->where('id ='.$id)->find();
    		S('catagory_'.$id, $rowCata, 864000);
    	}
    	
    	return $rowCata;
		
	}
	
	
	/**
	 * 获取所有商品
	 */
	public function getAll()
	{
		
		//$rowCata  = S('catagory_all');
		 
		if(empty($rowCata))
		{
			$model 		= M('catagory');
			$rowCata 	= $model->select();
			S('catagory_all', $rowCata, 864000);
		}
		 
		return $rowCata;
		
	}
	
	

}


?>