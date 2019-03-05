<?php
/*
 * 此页面仅用于命令行模式
 * 命令行自动下单
 */

namespace Admin\Controller;

use Think\Controller;

class AutomaticOrderController extends Controller
{

    public function index()
    {
        //while start
        while (true) {

            //2:00-9:59循环
            $nowHour = date('H');

            if ($nowHour < 10 && $nowHour > 1) {
                sleep(30);
                continue;
            }

            $arr = getNowDate();
            //获取第几期
            $phase = $this->getByHourAndMinute($arr['nextHour'], $arr['nextMinute']);

            //查看当前期数是否有下单记录
            $modelOrder = M('order');
            $orderAll = $modelOrder->where(array('pay_type' => 4, 'phase' => $phase, 'time_day' => $arr['day']))->find();

            //当前期数没有自动生成记录，则自动生成下单数据
            if (empty($orderAll)) {
                $users = $this->_getRandomUsers();
                foreach ($users as $val) {
                    $this->_submitOrder($val['user_id']);
                    sleep(mt_rand(20,50));
                }
            }
            sleep(30);
        }
        //while stop
    }

    /**
     * 获取随机的用户
     */
    private function _getRandomUsers()
    {
        // 随机用户数为 3-6 个
        $userNum = mt_rand(3,6);
        // 从表中获取随机用户手机号
        $modelAutomaticUser = M('automatic_user');
        $rowAll = $modelAutomaticUser->query("SELECT * FROM sh_automatic_user ORDER BY rand() LIMIT $userNum;");
        return $rowAll;
    }

    /**
     * 生成订单
     */
    private function _submitOrder($user_id){
        $goods_id 		= mt_rand(1,3);// 商品随机1-3  20，50，100
        $goods_num		= mt_rand(1,10);// 订单个数随机为1-10
        $snatch_type	= mt_rand(1,2);// 分类随机为：大小
        $pay_type = 4; //自动购买

        $modelGoods = D('goods');
        $modelCata 	= D('catagory');
        $modelOrder = M('order');

        //获取商品
        $rowGoods 	= $modelGoods->getById($goods_id);

        //获取分类
        $rowCata	= $modelCata->getById($rowGoods['cata_id']);

        if($snatch_type == 1)
        {
            $number_through = $rowCata['small'];
        }

        if($snatch_type == 2)
        {
            $number_through = $rowCata['big'];
        }

        $next = getNowDate();

        $data = array();
        $data['goods_id']		= $goods_id;
        $data['goods_name']		= $rowGoods['name'];
        $data['goods_img']		= $rowGoods['img_url'];
        $data['catagory_id']	= $rowCata['id'];
        $data['goods_num']		= $goods_num;
        $data['goods_price']	= $rowCata['price'];
        $data['goods_price_sum']= $rowCata['price'] * $goods_num;
        $data['snatch_type']	= $snatch_type;
        $data['pay_type']		= $pay_type;
        $data['create_time']	= date('Y-m-d H:i:s');
        $data['time_day']		= $next['nextDay'];
        $data['time_hour']		= $next['nextHour'];
        $data['time_minute']	= $next['nextMinute'];
        $data['number_through']	= $number_through;
        $data['user_id']		= $user_id;
        $data['pay_time']		= date('Y-m-d H:i:s');
        $data['pay_status']		= 1;

        $str = uniqid().$user_id.rand(1000,9999);
        $data['award_code']		= strtoupper(substr(md5($str),8,16));

        //下一期
        $data['phase']			= $this->getByHourAndMinute($next['nextHour'], $next['nextMinute']);

        $result = $modelOrder->add($data);
        return $result;
    }

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

            S('award_', $row, 864000);
        }

        return $row['phase'];
    }

}