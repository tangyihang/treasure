<?php 
namespace Home\Model;
use Think\Model;

class GoodsModel extends Model 
{

	/**
	 * 根据id获取商品
	 */
	public function getById($id)
	{
		
		//$row 	= S('goods_'.$id);
		
		/**
		 * 不存在缓存
		 */
		if(empty($row))
		{
			$model 		= M('goods');
			$row 		= $model->where('id ='.$id)->find();
		
			S('goods_'.$id, $row, 864000);
		}
		
		return $row;
		
	}
	
	
	/**
	 * 获取所有商品
	 */
	public function getAll()
	{
		
		//$rowGoods = S('all_goods');
		/**
		 * 不存在缓存
		 */
		if(empty($rowGoods))
		{
			$model 		= M('goods');
			$rowGoods 	= $model->select();
			S('all_goods', $rowGoods, 864000);
		}
		
		return  $rowGoods;
		
	}
	
	

}


?>