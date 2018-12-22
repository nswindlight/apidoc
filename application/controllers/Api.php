<?php
/**
 * Created by PhpStorm.
 * User: shengjie
 * Date: 2018/12/22
 * Time: 9:54
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends BaseController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('apiSetting_model');
    }

    public function index($id){
        $code = $this->input->get('code');
        $setting = $this->apiSetting_model->getOne(intval($id));

        if(!$setting || $setting['code'] != $code){
            redirect('errors/error_404');
        }
        $this->load->model('api_model');
        $apiData = $this->api_model->getInfo($id);
        $list = [];
        if($apiData){
            foreach($apiData as $v){
                $list[$v['group']][] = $v;
            }
        }
        $menu = [];
        $menu[] = [
            'icon'=>"",
            'id'=>0,
            'isHeader'=>true,
            'text'=> "接口列表"
        ];
        $i= 1;
        if($list){
            foreach($list as $name=> $head){
                $m = [
                    'id' => $i++,
                    'icon'=>"fa fa-list",
                    'text'=>$name,
                    'children'=>[],
                ];
                foreach ($head as $v){
                    $m['children'][] = [
                        'id' => $i++,
                        'icon'=>'fa fa-circle-o',
                        'text'=>$v['name'],
                        'targetType'=>"iframe-tab",
                        'urlType'=>"absolute",
                        'url'=>site_url('api/view/'.$v['id'])."?code=".$setting['code']
                    ];
                }
                $menu[] = $m;
            }
        }

        $data['assets'] = $this->lw_assets->getPageAssets();
        $data['apiInfo'] = $setting;
        $data['menu'] = json_encode($menu);
        $this->load->view('api/index',$data);
    }

    public function welcome($id){
        $code = $this->input->get('code');
        $setting = $this->apiSetting_model->getOne(intval($id));
        if(!$setting || $setting['code'] != $code){
            redirect('errors/error_404');
        }
        $data['assets'] = $this->lw_assets->getPageAssets();
        $data['apiInfo'] = $setting;
        $this->_tpl_page('api/welcome',$data);
    }

    public function view($id){
        $code = $this->input->get('code');
        $this->load->model('api_model');
        $apiData = $this->api_model->getOne($id);
        if(!$apiData){
            redirect('errors/error_404');
        }
        $admin_id = intval($apiData['admin_id']);
        $setting =  $this->apiSetting_model->getOne($admin_id);
        if(!$setting || $setting['code'] != $code){
            redirect('errors/error_404');
        }
        $this->load->model('apiRequestParams_model');
        $this->load->model('apiReturnParams_model');
        $this->load->model('apiErr_model');
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
        $data['requestGroup'] = $requestGroup;
        $data['returnGroup'] = $returnGroup;
        $data['errCode'] = $errCode;
        $data['apiData'] =$apiData;
        $this->_tpl_page('api/view',$data);
    }

}
