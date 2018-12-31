<?php

namespace Vip\Controller;

use Think\Controller;

class RechargeController extends BaseController
{


    public function _initialize()
    {

        parent::_initialize();

    }

    /**
     * 生成充值订单
     */
    public function submit()
    {
        $money = I('post.money');
        $pay_account_name = I('post.pay_account_name');
        $type = I('post.type');

        if ($money < 1) {
            $response = array();
            $response['code'] = 1;
            $response['info'] = '充值金额不能小于1元';

            echo json_encode($response);
            exit;
        } else if ($money > 900) {
            $response = array();
            $response['code'] = 1;
            $response['info'] = '单笔充值金额不能超过900元';

            echo json_encode($response);
            exit;
        }

        $data = array();


        $data['order_id'] = date('ymdHis') . mt_rand(10000, 99999);
        $data['user_id'] = $this->uid['id'];
        $data['created'] = date('Y-m-d H:i:s');
        $data['money'] = $money;
        $data['pay_account_name'] = $pay_account_name;
        $data['pay_type'] = $type;

        $model = M('recharge');
        $result = $model->add($data);

        if (empty($result)) {
            $response = array();
            $response['code'] = 2;
            $response['info'] = '订单写入错误！';

            echo json_encode($response);
            exit;
        }

        // 获取图片连接信息
        $response['code'] = 11;
        $response['info'] = "";
        echo json_encode($response);
        exit;
    }

}