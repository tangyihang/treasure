<?php 
namespace Home\Model;
use Think\Model;

class OrderModel extends Model 
{
	
	/**
	 * 根据id获取商品
	 */
	public function getByUser($userId,$page,$pageSize)
	{
	
		
		$model 		= M('order');
		
		$where 				= array();
		$where['user_id'] 	= $userId;
		$where['pay_status']= 1;

		
		$row 		= $model->where($where)->page($page, $pageSize)->order('pay_time desc')->select();
	
		return $row;
	
	}
	
	/**
	 * 最新参与记录
	 */
	public function newBuy()
	{
		$model = M('order');
		
		$row 	= S('order_newBuy_60');
		
		if(empty($row))
		{
			$where = array();
			$where['pay_status'] = 1;
			$row = $model->table('sh_order as o')->field('u.nickname, u.headimgurl,u.phone,o.goods_name,o.goods_num,o.create_time')->join('sh_user as u ON u.id = o.user_id')->order('o.id desc')->where($where)->limit(60)->select();
		}
		
		return $row;
		
		
	}
	
	
	/**
	 * 最新夺宝
	 */
	public function newAward()
	{
		$model = M('order');
		
		$row 	= S('order_newAward_60');
		
		if(empty($row))
		{
			$where = array();
			$where['pay_status'] = 1;
			$where['result']	 = 2;
			$row = $model->table('sh_order as o')->field('u.nickname, u.headimgurl,u.phone,o.goods_name,o.goods_num,o.create_time')->join('sh_user as u ON u.id = o.user_id')->order('o.id desc')->where($where)->limit(60)->select();
		}
		
		return $row;
	}
	
	/**
	 * 某个商品最新中奖纪录
	 */
	public function newAwardByGoodsId($id)
	{
		$model = M('order');
		
		$row 	= S('order_newAward_GOODSID_$id_60');
		
		if(empty($row))
		{
			$where = array();
			$where['pay_status'] = 1;
			$where['result']	 = 2;
			$where['goods_id']	 = $id;
			
			$row = $model->table('sh_order as o')->field('u.nickname, u.headimgurl, u.phone,o.goods_name,o.goods_num,o.create_time')->join('sh_user as u ON u.id = o.user_id')->order('o.id desc')->where($where)->limit(60)->select();
		}
		
		return $row;
	}
	
	/**
	 * 某个商品最新中奖纪录
	 */
	public function newBuyByGoodsId($id)
	{
		$model = M('order');
	
		$row 	= S('order_newBuy_GOODSID_$id_60');
	
		if(empty($row))
		{
			$where = array();
			$where['pay_status'] = 1;
			$where['goods_id']	 = $id;
				
			$row = $model->table('sh_order as o')->field('u.nickname, u.headimgurl,u.phone,o.goods_name,o.goods_num,o.create_time')->join('sh_user as u ON u.id = o.user_id')->order('o.id desc')->where($where)->limit(60)->select();
		}
	
		return $row;
	}
	
	/**
	 * sum
	 */
	public function getRankDay()
	{
		$model = M('order');
		
		$where = array(
			'create_time'
		);
		
		$row = $model
				->alias('o')
				->field('u.nickname, u.headimgurl, u.phone, sum(goods_num) as num')
				->join('LEFT JOIN __USER__ as u ON o.user_id = u.id')
				->group('o.user_id')
				->order('num desc')
				->where('o.result=2 AND o.create_time >=  NOW() - interval 1 day')
				->limit(20)
				->select();

		return $row;
	}
	
	
	/**
	 * 7day
	 */
	public function getRank7Day()
	{
		$model = M('order');
	
		$where = array(
				'create_time'
		);
	
		$row = $model
		->alias('o')
		->field('u.nickname, u.headimgurl, u.phone, sum(goods_num) as num')
		->join('LEFT JOIN __USER__ as u ON o.user_id = u.id')
		->group('o.user_id')
		->order('num desc')
		->where('o.result=2 AND o.create_time >=  NOW() - interval 7 day')
		->limit(20)
		->select();
	
		return $row;
	}
	
	/**
	 * 30 day
	 */
	public function getRank30Day()
	{
		$model = M('order');
	
		$where = array(
				'create_time'
		);
	
		$row = $model
		->alias('o')
		->field('u.nickname, u.headimgurl, u.phone, sum(goods_num) as num')
		->join('LEFT JOIN __USER__ as u ON o.user_id = u.id')
		->group('o.user_id')
		->order('num desc')
		->where('o.result=2 AND o.create_time >=  NOW() - interval 30 day')
		->limit(20)
		->select();
	
		return $row;
	}
	
	

}


?>