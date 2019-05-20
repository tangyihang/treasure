<?php
/**
 * 用户管理
 */

namespace Admin\Controller;

use Think\Controller;

class RechargeController extends BaseController
{

    public function _initialize()
    {

        parent::_initialize();

        $this->assign('access', 'qc');
        $this->assign('position', '二维码充值订单');
    }

    /**
     * 显示所有用户
     */
    public function read()
    {

        $pageSize = 10;
        $p = I('get.p');//获取第几页

        //筛选条件
        $phone = I('get.phone');
        $startime = I('get.startime');
        $endtime = I('get.endtime');
        $startime2 = date('Y-m-d') . ' 00:00:00';
        $endtime2 = date('Y-m-d') . ' 23:59:59';
        $where = array();
        $sqlWhere = '(code_id != 0  OR (code_id = 0 and state=1)) and isDelete = 2';

        if (!empty($phone)) {
            $where['phone'] = $phone;
            $sqlWhere .= " and phone='$phone'";
        }

        $where['isDelete'] = 2;
        if ($startime && $endtime) {
            $this->assign('start', $startime);
            $this->assign('end', $endtime);

            $where['created'] = array(array('EGT', $startime), array('ELT', $endtime));
            $sqlWhere .= " and created<='$endtime' and created >='$startime'";
        }

        $model = M('recharge');
        $memberRows = $model->where($sqlWhere)
            ->order('sh_recharge.created desc')
            ->page($p, $pageSize)->select();

        $memberCount = $model->where($sqlWhere)->count();
        $memberSum = $model->where($sqlWhere)
            ->sum('rechargeMoney');

        $where2['isDelete'] = 2;
        $where2['created'] = array(array('EGT', $startime2), array('ELT', $endtime2));
        $memberSum2 = $model->where($where2)->sum('rechargeMoney');

        $Page = new \Think\Page($memberCount, $pageSize);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('header', '<span style="line-height:30px;">共 %TOTAL_ROW% 条记录</span>');
        $Page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('output', $memberRows);
        $this->assign('memberSum', $memberSum);
        $this->assign('memberSum2', $memberSum2);
        $this->assign('where', $where);
        $this->display('admin_recharge_read');
    }

    /**
     * 管理员操作充值记录
     */
    public function adminlog(){
        $pageSize 			= 10;
        $p					= I('get.p');//获取第几页

        $modelAdminlog		= M('recharge_admin_log');

        //筛选条件
        $phone 			= I('get.phone');
        $startime		= I('get.startime');
        $endtime		= I('get.endtime');
        $is_count_in	= I('get.is_count_in');

        $where = array();

        if(!empty($phone))
        {
            $where['phone'] = $phone;
        }

        if(!empty($is_count_in))
        {
            $where['is_count_in'] = $is_count_in;
        }

        if($startime && $endtime){
            $this->assign('start', $startime);
            $this->assign('end', $endtime);

            $where['created'] = array(array('EGT', $startime), array('ELT', $endtime));
        }

        $rowsLog = $modelAdminlog->where($where)->page($p, $pageSize)->order('created desc')->select();
        $count 	= $modelAdminlog->where($where)->count();

        $Page       = new \Think\Page($count, $pageSize);
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('header','<span style="line-height:30px;">共 %TOTAL_ROW% 条记录</span>');
        $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show       = $Page->show();// 分页显示输出

        $this->assign('where',$where);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('output', $rowsLog);
        $this->display('admin_recharge_adminlog');
    }

    /**
     * 管理员添加充值订单
     */
    public function add()
    {
        if (IS_GET) {
            // 获取已启用充值二维码信息
            $modelCode = M('code');
            $rowCodes = $modelCode->where('status = 1')->select();

            $this->assign('rowCodes', $rowCodes);
            $this->display('admin_recharge_add');
        }


        if (IS_POST) {
            $phone = I('post.phone');
            $pay_account_name = I('post.pay_account_name');
            $money = I('post.money');
            $code_id = I('post.code_id');
            $is_count_in = I('post.is_count_in');

            //参数空
            if (empty($phone) || empty($pay_account_name) || empty($money) || empty($code_id)) {
                $this->error('参数不能为空！');
                exit;
            }

            // 获取用户信息，查看用户是否存在
            $modelUser = M('user');
            $userInfo = $modelUser->where(array('phone' => $phone))->find();
            if (empty($userInfo)) {
                $this->error('找不到该用户，请确认手机号是否输入正确。');
                exit;
            }

            // 获取充值二维码信息，查看二维码是否存在
            $modelCode = M('code');
            $codeInfo = $modelCode->where(array('id' => $code_id))->find();
            if (empty($codeInfo)) {
                $this->error('查不到到账账户');
                exit;
            }

            $rechargeInfo = array();
            $rechargeInfo['user_id'] = $userInfo['id'];
            $rechargeInfo['order_id'] = date('ymdHis') . mt_rand(10000, 99999);
            $rechargeInfo['phone'] = $userInfo['phone'];
            $rechargeInfo['money'] = $money;
            $rechargeInfo['pay_account_name'] = $pay_account_name;
            $rechargeInfo['pay_type'] = $codeInfo['type'];
            $rechargeInfo['code_id'] = $codeInfo['id'];
            $rechargeInfo['code_name'] = $codeInfo['name'];
            $rechargeInfo['rechargeTime'] = $rechargeInfo['created'] = date('Y-m-d H:i:s');
            $rechargeInfo['is_count_in'] = $is_count_in;
            // 添加管理员充值操作记录

            $modelRechargeAdminLog = M('recharge_admin_log');
            $result = $modelRechargeAdminLog->add($rechargeInfo);

            // 是否记入用户充值金额
            if ($is_count_in == 1) {
                // 添加充值订单
                $modelRecharge = M('recharge');
                $modelRecharge->add($rechargeInfo);
            } else {
                // 不记入充值订单，则直接更新用户余额数据
                $modelUser->save(array(
                    'id' => $userInfo['id'],
                    'points' => $userInfo['points'] + $money
                ));
            }

            if ($result) {
                $this->success('充值成功！', '/Admin/recharge/read');
                exit;
            }

            $this->error('充值失败！');
            exit;
        }

    }

    /**
     * 获取充值信息
     */
    public function getRecharge()
    {
        $model = M('recharge');
        $data = $model->where(array('state' => 0, 'isDelete' => 2, 'isignore' => 0))->find();
        if ($data) {
            $this->ajaxReturn(array(
                'flag' => true,
                'message' => '有新的充值请求需要处理',
                'data_id' => $data['id'],
            ));
        }
        $this->ajaxReturn(array(
            'flag' => false
        ));
    }

    /**
     * 到账处理
     */
    public function action()
    {
        //get
        if (IS_GET) {
            $id = I('get.id');
            $modelRecharge = M('recharge');
            $output['recharge'] = $modelRecharge->where('id = ' . $id)->find();

            $this->assign('output', $output);
            $this->display('admin_recharge_action');
        }

        //post
        if (IS_POST) {
            $id = I('post.id');
            $money = I('post.money');
            $rechargeMoney = I('post.rechargeMoney');

            //参数空
            if (empty($id) || empty($money) || empty($rechargeMoney)) {
                $this->error('参数不能为空！');
                exit;
            }

            $modelRecharge = M('recharge');

            // 更新到账金额和到账时间

            $recharge = $modelRecharge->where('id = ' . $id)->find();
            // 订单是否已到账，不要重复到账
            if ($recharge['state'] == 1) {
                $this->error('订单已到账处理，不要重复操作！');
                exit;
            }

            $modelRecharge->save(array(
                'id' => $id,
                'money' => $money,
                'rechargeMoney' => $rechargeMoney,
                'state' => 1,
                'rechargeTime' => date('Y-m-d H:i:s')
            ));

            //更新用户余额数据
            $modelUser = M('user');
            $userInfo = $modelUser->where('id = ' . $recharge['user_id'])->find();
            $modelUser->save(array(
                'id' => $recharge['user_id'],
                'points' => $userInfo['points'] + $rechargeMoney
            ));

            //插入充值记录写入日志
            $modelPointsDetail = M('points_detail');
            $modelPointsDetail->add(array(
                'before' => $userInfo['points'],
                'change' => $rechargeMoney,
                'after' => $userInfo['points'] + $rechargeMoney,
                'user_id' => $recharge['user_id'],
                'type' => 30,
                'create_time' => date('Y-m-d H:i:s'),
            ));

            $this->success('更新成功', '/Admin/Recharge/read');
            exit;

        }


    }

    /**
     * 不在提醒
     */
    public function ignore()
    {

        $id = I('get.id');
        $modelRecharge = M('recharge');
        $modelRecharge->save(array('id' => $id, 'isignore' => 1));

        $this->ajaxReturn(array(
            'flag' => true,
            'message' => '忽略成功'
        ));
    }

    /**
     * 删除记录
     */
    public function del()
    {

        $id = I('get.id');
        $modelRecharge = M('recharge');

        $r = array();
        //格式化数据
        $r['id'] = $id;
        $r['isDelete'] = 1;
        $result = $modelRecharge->save($r);

        if ($result) {
            $this->success('删除成功', '/Admin/Recharge/read');
            exit;
        }

        $this->error('删除失败');

    }
}