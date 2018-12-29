<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
		
	
	public function _initialize(){

		parent::_initialize();
		$btid=0;
		$this->assign('btid', $btid);
		$time = getNowDate();
				 
	 	$endTime = date('Y-m-d', strtotime($time['nextDay'])) . ' ' .$time['nextTime'];
	 	$this->assign('endTime', $endTime);
	 	
	 	//头像昵称空
	 	$id = $this->uid['id'];
	 	$model = M('user');
	 	$row = $model->where(['id'=>$id])->find();
	 	
	 	if(empty($row['headimgurl']) || empty($row['nickname']))
	 	{
	 		$this->error('请先完善昵称和头像信息！', '/vip/user/set');
	 		exit;
	 	}
		
	}
	
	//个人中心首页
    public function index()
    {
    	   	
    	$modelGoods 	= D('Goods');
    	$modelCata		= M('catagory');
    	
    	$output['catagory'] = $modelCata->select();
    	$output['rowGoods'] = $modelGoods->getAll();
    	$output['title'] 	= '全民抢购商城';
    	
    	//最新参与记录
    	$modelOrder = D('order');
    	$output['newBuy'] 	= $modelOrder->newBuy();
    	//最新夺宝榜单
    	$output['newAward']	= $modelOrder->newAward();
    	$output['set']		= $this->set;
    	$this->assign('output', $output);
    	$this->display('home_index_index');
    }
    
    
    /**
     * detail
     */
    public function detail()
    {
    	$id = I('get.id');
    	
    	$modelGoods = D('Goods');
    	$modelCata	= D('Catagory');
    	
    	$rowGoods 	= $modelGoods->getById($id);
    	$rowCata	= $modelCata->getById($rowGoods['cata_id']);
    	
    	//获取上一期开奖结果
    	$modelAward = M('award_log');
    	$rowAward  	= $modelAward->order('id desc')->find();
    	
    	$output['lastNum'] = getResult($rowAward, $rowGoods['cata_id']);
    	
    	$modelOrder = D('order');
    	//最新夺宝榜单
    	$output['newAward']	= $modelOrder->newAwardByGoodsId($id);
    	//最新参与记录
    	$output['newBuy']	= $modelOrder->newBuyByGoodsId($id);
    	 
    	$output['row'] 		= $rowGoods;

    	$output['rowCata']	= $rowCata;
    	$output['title'] 	= $rowGoods['name'];
    	$output['set']		= $this->set;

        $modelMember = M('user');
        $rowMember   = $modelMember->where(array(id => $this->uid['id']))->find();
		$output['member']=$rowMember;

    	$output['phone']    = $rowMember['phone'];
    	$this->assign('output', $output);
    	$this->display('home_index_detail');
    	
    }
    
 
}