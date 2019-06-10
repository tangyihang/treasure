<?php

namespace Admin\Controller;

use Think\Controller;

class CodeController extends BaseController
{

    public function _initialize()
    {

        parent::_initialize();

        $this->assign('access', 'q');
        $this->assign('position', '二维码设置');
    }

    /**
     * 获取分类
     */
    public function read()
    {
        getNowDate();
        $modelCode = M('code');

        $output['rowCodes'] = $modelCode->where('status != 2')->select();

        $this->assign('output', $output);
        $this->display('admin_code_read');
    }


    /**
     * 添加产品
     */
    public function add()
    {
        if (IS_GET) {
            $this->display('admin_code_add');
        }


        if (IS_POST) {
            $type = I('post.type');
            $name = I('post.name');
            $account = I('post.account');
            $opening_bank = I('post.opening_bank');
            $opening_bank_branch = I('post.opening_bank_branch');
            //参数空
            if (empty($name) || empty($account)) {
                $this->error('参数不能为空！');
                exit;
            }

            //格式化数据
            $r = array();
            $r['name'] = $name;
            $r['type'] = $type;
            $r['account'] = $account;
            $r['opening_bank'] = $opening_bank;
            $r['opening_bank_branch'] = $opening_bank_branch;

            if (!empty($_FILES['code_img']['name'])) {
                //图片上传
                $setting = C('UPLOAD_SITEIMG_QINIU');
                //上传到七牛云存储
                $Upload = new \Think\Upload($setting);    //实例化
                $resultQiniu = $Upload->upload();                //执行上传
                $r['code_img'] = $resultQiniu['code_img']['url']; //获取图片名称带扩展名
                $r['code_img'] = str_replace('http://faqis.me','https://faqis.me',$r['code_img']);
            }

            //入库
            $modelGoods = M('code');
            $result = $modelGoods->add($r);

            if ($result) {
                $this->success('夺宝充值转账二维码添加成功！', '/Admin/Code/read');
                exit;
            }

            $this->error('夺宝充值转账二维码添加失败！');
            exit;
        }

    }

    /**
     * 编辑
     */
    public function edit()
    {
        //get
        if (IS_GET) {
            $id = I('get.id');
            $modelCode = M('code');
            $output['code'] = $modelCode->where('id = ' . $id)->find();

            $this->assign('output', $output);
            $this->display('admin_code_edit');
        }

        //post
        if (IS_POST) {
            $id = I('post.id');
            $type = I('post.type');
            $name = I('post.name');
            $account = I('post.account');
            $opening_bank = I('post.opening_bank');
            $opening_bank_branch = I('post.opening_bank_branch');

            //参数空
            if (empty($id) || empty($name) || empty($account)) {
                $this->error('参数不能为空！');
                exit;
            }

            $r = array();
            //格式化数据
            $r['id'] = $id;
            $r['name'] = $name;
            $r['account'] = $account;
            $r['type'] = $type;
            $r['opening_bank'] = $opening_bank;
            $r['opening_bank_branch'] = $opening_bank_branch;

            if (!empty($_FILES['code_img']['name'])) {
                //图片上传
                $setting = C('UPLOAD_SITEIMG_QINIU');
                //上传到七牛云存储
                $Upload = new \Think\Upload($setting);    //实例化
                $resultQiniu = $Upload->upload();                //执行上传
                $r['code_img'] = $resultQiniu['code_img']['url']; //获取图片名称带扩展名
                $r['code_img'] = str_replace('http://faqis.me','https://faqis.me',$r['code_img']);
            }


            //入库
            $modelCode = M('code');
            $result = $modelCode->save($r);

            if ($result) {
                $this->error('夺宝充值转账二维码更新成功！');
                exit;
            }

            $this->error('夺宝充值转账二维码更新失败！');
            exit;

        }


    }

    /**
     * 停用启用
     */
    public function isstop()
    {

        $id = I('get.id');
        $status = I('get.status');
        $modelCode = M('code');

        $r = array();
        //格式化数据
        $r['id'] = $id;
        $r['status'] = $status;
        $result = $modelCode->save($r);

        if ($result) {
            $this->success('删除成功', '/Admin/Code/read');
            exit;
        }

        $this->error('删除失败');

    }

    /**
     * 删除记录
     */
    public function del()
    {

        $id = I('get.id');
        $status = I('get.status');
        $modelCode = M('code');

        $r = array();
        //格式化数据
        $r['id'] = $id;
        $r['status'] = $status;
        $result = $modelCode->save($r);

        if ($result) {
            $this->success('删除成功', '/Admin/Code/read');
            exit;
        }

        $this->error('删除失败');

    }


}