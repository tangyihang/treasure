<?php 
namespace Home\Model;
use Think\Model;

class AwardModel extends Model 
{

	/**
	 * 
	 * @param unknown $hour
	 * @param unknown $minute
	 */
	public function getByHourAndMinute($hour, $minute){
		
		$row 	= S('award_'.$hour.$minute);
		
		/**
		 * 不存在缓存
		 */
		if(empty($row))
		{
			$model 		= M('award');
			$row 		= $model->where(array('time_hour' => $hour, 'time_minute'=>$minute))->find();
		
			S('award_'.$id, $row, 864000);
		}
		
		return $row['phase'];
	}
	
	

}


?>