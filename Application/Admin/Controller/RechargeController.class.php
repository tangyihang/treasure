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
     * 获取充值信息
     */
    public function getRecharge(){
        $model = M('recharge');
        $data = $model->where(array('state' => 0, 'isDelete' => 2, 'isignore' => 0))->find();
        if ($data) {
            $this->ajaxReturn(array(
                'flag'    => true,
                'message' => '有新的充值请求需要处理',
                'data_id' => $data['id'],
            ));
        }
        $this->ajaxReturn(array(
            'flag'    => false
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
            'flag'    => true,
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