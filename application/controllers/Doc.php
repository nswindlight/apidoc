<?php
/**
 * Created by PhpStorm.
 * User: shengjie
 * Date: 2018/12/19
 * Time: 14:09
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Doc extends AuthController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->model('apiRequestParams_model');
        $this->load->model('apiReturnParams_model');
        $this->load->model('apiErr_model');
    }


    public function index()
    {
        $data['assets'] = $this->lw_assets->getPageAssets();
        $data['breadcrumb'] = [
            ['接口管理',null]
        ];
        $this->_tpl_page('doc/index', $data);
    }

    public function page($page)
    {
        $post = $this->input->post();
        $filter = [];
        $filter['equal']['admin_id'] = $this->session->adminId;
        $filter['like']['name'] = $post['name'];
        $data = $this->api_model->getList(json_encode($filter), $page);
        $this->rs['html'] = $this->_view('doc/page', $data, true);
        $this->rs['msg'] = '列表';
        $this->rs['success'] = true;
        lwReturn($this->rs);
    }

    public function edit($id){
        $apiData = $this->api_model->getOne($id);
        $post = $this->input->post();
        if($post){
            if(!$apiData || $apiData['admin_id'] != $this->session->adminId){
                $this->rs['msg'] = '接口信息未找到';
                lwReturn($this->rs);
            }

            $apiDataInfo = $post['apiData'];
            $requestParam = $post['requestParam'];
            $responseParam = $post['responseParam'];
            $err_code = $post['err_code'];
            $this->api_model->edit($id,$apiDataInfo);
            $this->apiRequestParams_model->delByApiId($id);
            $this->apiReturnParams_model->delByApiId($id);
            $this->apiErr_model->delByApiId($id);

            if($requestParam){
                foreach($requestParam as $v){
                    $data = $v;
                    $data['api_id'] = $id;
                    $this->apiRequestParams_model->edit(0,$data);
                }
            }
            if($responseParam){
                foreach($responseParam as $v){
                    $data = $v;
                    $data['api_id'] = $id;
                    $this->apiReturnParams_model->edit(0,$data);
                }
            }
            if($err_code){
                foreach($err_code as $v){
                    $data = $v;
                    $data['api_id'] = $id;
                    $this->apiErr_model->edit(0,$data);
                }
            }
            $this->rs['success'] = true;
            $this->rs['msg'] = '操作成功';
            lwReturn($this->rs);
        }


        if(!$apiData || $apiData['admin_id'] != $this->session->adminId){
            redirect('errors/error_404');
        }

        $requestParam = $this->apiRequestParams_model->getInfo($apiData['id']);
        $returnParam = $this->apiReturnParams_model->getInfo($apiData['id']);
        $errCode = $this->apiErr_model->getInfo($apiData['id']);

        $requestGroup = [];
        $returnGroup = [];

        if($requestParam){
            foreach ($requestParam as  $v){
                $requestGroup[$v['group_name']][] = $v;
            }
        }
        if($returnParam){
            foreach ($returnParam as  $v){
                $returnGroup[$v['group_name']][] = $v;
            }
        }
        $data = [];
        $data['assets'] = $this->lw_assets->getPageAssets();
        $data['breadcrumb'] = [
            ['我的接口',site_url('doc/index')],
            ['修改接口',null]
        ];
        $data['requestGroup'] = $requestGroup;
        $data['returnGroup'] = $returnGroup;
        $data['errCode'] = $errCode;
        $data['apiData'] =$apiData;
        $this->_tpl_page('doc/edit', $data);
    }
    public function create(){
        $post = $this->input->post();
        if($post){
            $apiData = $post['apiData'];
            $requestParam = $post['requestParam'];
            $responseParam = $post['responseParam'];
            $err_code = $post['err_code'];
            $apiData['admin_id'] = $this->session->adminId;
            $api_id = $this->api_model->edit(0,$apiData);

            if(!$api_id){
                $this->rs['msg'] = '操作失败';
                lwReturn($this->rs);
            }
            if($requestParam){
                foreach($requestParam as $v){
                    $data = $v;
                    $data['api_id'] = $api_id;
                    $this->apiRequestParams_model->edit(0,$data);
                }
            }
            if($responseParam){
                foreach($responseParam as $v){
                    $data = $v;
                    $data['api_id'] = $api_id;
                    $this->apiReturnParams_model->edit(0,$data);
                }
            }
            if($err_code){
                foreach($err_code as $v){
                    $data = $v;
                    $data['api_id'] = $api_id;
                    $this->apiErr_model->edit(0,$data);
                }
            }
            $this->rs['success'] = true;
            $this->rs['msg'] = '操作成功';
            lwReturn($this->rs);
        }

        $data['assets'] = $this->lw_assets->getPageAssets();
        $data['breadcrumb'] = [
            ['我的接口',site_url('doc/index')],
            ['创建接口',null]
        ];
        $this->_tpl_page('doc/create', $data);
    }
}