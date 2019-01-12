<?php
/*
 * 此页面仅用于命令行模式
 */

namespace Admin\Controller;

use Think\Controller;

class AwardController extends Controller
{

    public function index()
    {

        $modelAward = M('award_log');
        $modelSetAward = M('set_award');
        $modelAwardAll = M('award');

        //while start
        while (true) {

            //2:00-9:59循环
            $nowHour = date('H');

            if ($nowHour < 10 && $nowHour > 1) {
                sleep(5);
                continue;
            }


            $arr = getNowDate();

            //判断当前时间是否已存在数据库
            $where = array();
            $where['time_day'] = date('Ymd');
            $where['time_hour'] = $arr['hour'];
            $where['time_minute'] = $arr['formatMinute'];

            $rowAward = $modelAward->where($where)->find();

            $where2 = array();
            $where2['time_hour'] = $arr['hour'];
            $where2['time_minute'] = $arr['formatMinute'];
            $rowAwardAll = $modelAwardAll->where($where)->find();

            //获取第几期
            $pharse = $rowAwardAll['phase'];

            //empty start
            //数据库无开奖记录，请求接口服务器
            if (empty($rowAward)) {

                if ($arr['hour'] == '00' && $arr['formatMinute'] == '00') {
                    $time = date('Y-m-d', strtotime('-1 day'));
                } else {
                    $time = date('Y-m-d');
                }

                if ($pharse < 10) {
                    $pharse = '00' . $pharse;
                }

                if ($pharse >= 10 && $pharse < 100) {
                    $pharse = '0' . $pharse;
                }

                $data = array();
                $data['phase'] = $rowAwardAll['phase'];
                $data['time_day'] = date('Ymd');
                $data['time_hour'] = $arr['hour'];
                $data['time_minute'] = $arr['formatMinute'];
                $data['time_post'] = date('Y-m-d H:i:s');

                //判断是否预设奖
                $rowSetAward = $modelSetAward->where(array('time_day' => date('Ymd'), 'time_hour' => $arr['hour'], 'time_minute' => $arr['formatMinute'], 'phase' => $pharse))->find();

                if (empty($rowSetAward)) {

                    $data['one'] = rand(0, 9);
                    $data['two'] = rand(0, 9);
                    $data['three'] = rand(0, 9);
                    $data['four'] = rand(0, 9);
                    $data['five'] = rand(0, 9);
                    $data['total'] = $data['one'] + $data['two'] + $data['three'] + $data['four'] + $data['five'];

                } else {

                    $data['one'] = $rowSetAward['one'];
                    $data['two'] = $rowSetAward['two'];
                    $data['three'] = $rowSetAward['three'];
                    $data['four'] = $rowSetAward['four'];
                    $data['five'] = $rowSetAward['five'];
                    $data['total'] = $rowSetAward['one'] + $rowSetAward['two'] + $rowSetAward['three'] + $rowSetAward['four'] + $rowSetAward['five'];

                }


                $result = $modelAward->add($data);

                if ($result) {
                    //计算佣金
                    $this->_perfomMin($data);
                    $this->_perfomMax($data);
                    $this->_perfomOddEven($data);
                }
            }
            //empty end
            sleep(5);
        }
        //while stop
    }

    /**
     * 修改用户可提现次数
     */
    public function resetWithdrawNum()
    {
        $modelUser = M('user');
        $modelUser->where(1)->setField('withdraw_num', 3);
        var_dump(date('Y-m-d H:i:s', time()) . ' reset WithdrawNum success');
        return true;
    }


    //获奖结果处理
    private function _perfomMax($data)
    {
        //获取当前开奖结果是否预设
        $num = $data['one'] . $data['two'] . $data['three'] . $data['four'] . $data['five'];

        //更新分类1 1-110
        $lastNum = $num % 110 + 1;


        //结果
        if ($lastNum <= 55 && $lastNum >= 1) {
            $snatch_type = 1;
        }

        if ($lastNum >= 56 && $lastNum <= 110) {
            $snatch_type = 2;
        }

        $where = array();
        $where['snatch_type'] = $snatch_type;
        $where['pay_status'] = 1;
        $where['time_day'] = $data['time_day'];
        $where['phase'] = $data['phase'];
        $where['catagory_id'] = 1;

        $model = M('order');
        $model->where($where)->save(array('result' => 2, 'number_win' => $lastNum, 'open_time' => date('Y-m-d H:i:s')));

        if ($snatch_type == 1) {
            $where['snatch_type'] = 2;
        }
        if ($snatch_type == 2) {
            $where['snatch_type'] = 1;
        }
        $model->where($where)->save(array('result' => 1, 'number_win' => $lastNum, 'open_time' => date('Y-m-d H:i:s')));

    }

    //获奖结果处理
    private function _perfomMin($data)
    {
        //获取当前开奖结果是否预设
        $num = $data['one'] . $data['two'] . $data['three'] . $data['four'] . $data['five'];

        //更新分类1 1-110
        $lastNum = $num % 56 + 1;


        //结果
        if ($lastNum <= 28 && $lastNum >= 1) {
            $snatch_type = 1;
        }

        if ($lastNum >= 29 && $lastNum <= 56) {
            $snatch_type = 2;
        }

        $where = array();
        $where['snatch_type'] = $snatch_type;
        $where['pay_status'] = 1;
        $where['time_day'] = $data['time_day'];
        $where['phase'] = $data['phase'];
        $where['catagory_id'] = 2;

        $model = M('order');
        $model->where($where)->save(array('result' => 2, 'number_win' => $lastNum, 'open_time' => date('Y-m-d H:i:s')));

        if ($snatch_type == 1) {
            $where['snatch_type'] = 2;
        }
        if ($snatch_type == 2) {
            $where['snatch_type'] = 1;
        }
        $model->where($where)->save(array('result' => 1, 'number_win' => $lastNum, 'open_time' => date('Y-m-d H:i:s')));

    }

    //获奖结果处理
    private function _perfomOddEven($data)
    {
        //获取当前开奖结果是否预设
        $num = $data['one'] . $data['two'] . $data['three'] . $data['four'] . $data['five'];

        //更新分类1 1-110
        $lastNum = $data['five'];
        $OddEven = $lastNum % 2;

        //结果
        if ($OddEven == 0) {
            $snatch_type = 2;
        } else {
            $snatch_type = 1;

        }

        $where = array();
        $where['snatch_type'] = $snatch_type;
        $where['pay_status'] = 1;
        $where['time_day'] = $data['time_day'];
        $where['phase'] = $data['phase'];
        $where['catagory_id'] = 3;

        $model = M('order');
        $model->where($where)->save(array('result' => 2, 'number_win' => $lastNum, 'open_time' => date('Y-m-d H:i:s')));

        if ($snatch_type == 1) {
            $where['snatch_type'] = 2;
        }
        if ($snatch_type == 2) {
            $where['snatch_type'] = 1;
        }
        $model->where($where)->save(array('result' => 1, 'number_win' => $lastNum, 'open_time' => date('Y-m-d H:i:s')));

    }


}