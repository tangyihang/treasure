<?php 
namespace Vip\Model;
use Think\Model;

class UserModel extends Model 
{
	
	
	/**
	 * 
	 * @param unknown $openid
	 * @return mixed|boolean|NULL|string|unknown|object
	 */
	public function getByOpenId($openid)
	{
		$model = M('user');
		$row   = $model->where(array(['openid'=>$openid]))->find();
		return $row;
	}
	
	/**
	 *
	 * @param unknown $openid
	 * @return mixed|boolean|NULL|string|unknown|object
	 */
	public function getById($id)
	{
		$model = M('user');
		$row   = $model->where(array(['id'=>$id]))->find();
		return $row;
	}
	
	/**
	 *
	 * @param unknown $openid
	 * @return mixed|boolean|NULL|string|unknown|object
	 */
	public function getByPhone($phone)
	{
		$model = M('user');
		$row   = $model->where(array(['phone'=>$phone]))->find();
		return $row;
	}
	
	
	//获取推广人下所有用户
	public function getByParentId($parentid, $page, $pageSize)
	{
		$model = M('user');
		$row   = $model->where(array(['parent_id'=>$parentid]))->page($page, $pageSize)->order('id desc')->select();
		return $row;
	}
	

}


?>