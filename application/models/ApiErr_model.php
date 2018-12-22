<?php
/**
 * Created by PhpStorm.
 * User: shengjie
 * Date: 2018/12/21
 * Time: 10:20
 */
class ApiErr_model extends CI_Model{

    public static $tb_name = 'tb_api_err';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('lw_db', ['tb_name' => static::$tb_name],  static::$tb_name);
    }


    public function getInfo($api_id){
        $list = $this->db->select('*')
            ->from(static::$tb_name)
            ->where('api_id', $api_id)
            ->order_by('code ASC')
            ->get()
            ->result_array();
        return $list;
    }

    public function edit($id, $post)
    {
        if ($id == 0) {
            $result = $this->{static::$tb_name}->insert($post);
        } else {
            $result = $this->{static::$tb_name}->update($post, ['id' => $id]);
        }
        return $result;
    }
    public function delByApiId($api_id){
        $this->{static::$tb_name}->delete(['api_id'=>$api_id]);
    }
}