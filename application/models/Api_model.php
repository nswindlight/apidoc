<?php
/**
 * Created by PhpStorm.
 * User: shengjie
 * Date: 2018/12/19
 * Time: 14:37
 */
class Api_model extends CI_Model{

    public static $tb_name = 'tb_api';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('lw_db', ['tb_name' => static::$tb_name],  static::$tb_name);
    }

    public function getInfo($admin_id){
        $list = $this->db->select('*')
            ->from(static::$tb_name)
            ->where('admin_id', $admin_id)
            ->order_by('group ASC')
            ->get()
            ->result_array();
        return $list;
    }
    public function getOne($id){
        return $this->{static::$tb_name} ->get_one(['id'=>$id]);
    }
    public function getList($filter,$page ){

        $this->load->library('lw_pagination');
        $paramFilter = ['admin_id','group'];
        $sql = "select * from `".static::$tb_name."` ";
        $order = "id desc";

        $data = $this->lw_pagination->lists($sql, $filter, $page, false, null, $order, $paramFilter, $pageSize = 10);
        return $data;
    }


    public function edit($id, $post)
    {
        if ($id == 0) {
            $field = lwCheckValue($post, ['admin_id', 'group', 'name', 'link','method','descript']);
            if ($field === false) {
                return false;
            }
            $field['ctime'] = date("Y-m-d H:i:s");
            $result = $this->{static::$tb_name}->insert($field);
        } else {
            $result = $this->{static::$tb_name}->update($post, ['id' => $id]);
        }
        return $result;
    }
    public function del($id){
        $this->{static::$tb_name}->delete(['id'=>$id]);
    }
}