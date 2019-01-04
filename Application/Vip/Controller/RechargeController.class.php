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
        $pay_account_name = trim(I('post.pay_account_name'));
        $type = I('post.type');
        $response = array();

        if ($money < 1) {
            $response['code'] = 1;
            $response['info'] = '充值金额不能小于1元';

            echo json_encode($response);
            exit;
        } else if ($money > 20000) {
            $response = array();
            $response['code'] = 1;
            $response['info'] = '单笔充值金额不能超过2万元';

            echo json_encode($response);
            exit;
        }
        if (empty($pay_account_name)) {
            $response['code'] = 1;
            $response['info'] = '付款账号名称不能为空';

            echo json_encode($response);
            exit;
        }

        // 获取二维码图片连接
        $modelcode = M('code');
        $codeInfo = $modelcode->where("type={$type}")->order("RAND()")->find();

        $data = array();

        $data['order_id'] = date('ymdHis') . mt_rand(10000, 99999);
        $data['user_id'] = $this->uid['id'];
        $data['phone'] = $this->uid['phone'];
        $data['created'] = date('Y-m-d H:i:s');
        $data['money'] = $money;
        $data['pay_account_name'] = $pay_account_name;
        $data['pay_type'] = $type;
        $data['code_id'] = $codeInfo['id'];
        $data['code_name'] = $codeInfo['name'];

        $model = M('recharge');
        $result = $model->add($data);

        if (empty($result)) {
            $response['code'] = 2;
            $response['info'] = '订单写入错误！';

            echo json_encode($response);
            exit;
        }

        // 获取图片连接信息
        $response['code'] = 11;
        $response['info'] = $codeInfo['code_img'];
        $response['recharge_id'] = $result;
        echo json_encode($response);
        exit;
    }

    /**
     * 取消充值记录
     */
    public function remove(){
        // 只能取消本人的充值记录
        $id = I('post.id');
        $modelRecharge = M('recharge');
        $result = $modelRecharge->where(array('id'=> $id, 'user_id'=> $this->uid['id']))->find();
        if ($result) {
            $modelRecharge->save(array('id' => $id, 'isDelete' => 1));

            $this->ajaxReturn(array(
                'flag'    => true,
                'message' => '取消成功'
            ));
        } else {
            $this->ajaxReturn(array(
                'flag'    => false,
                'message' => '取消失败'
            ));
        }

    }

    /**
     * 查看充值记录
     */
    public function getlist()
    {

        $page = I('request.page');

        if (empty($page)) {
            $page = 1;
        }

        $modelRecharge = M('recharge');

        $where = array();
        $where['user_id'] = $this->uid['id'];
        $where['isDelete'] = 2;
        $rows = $modelRecharge->where($where)->page($page, 1000)->order('id desc')->select();

        if (IS_GET) {
            $output = [];
            $output['rowOrder'] = $rows;

            $this->assign('output', $output);
            $this->display('vip_recharge_getlist');
        }
    }

}