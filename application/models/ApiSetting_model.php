<?php
/**
 * Created by PhpStorm.
 * User: shengjie
 * Date: 2018/12/21
 * Time: 15:52
 */
class ApiSetting_model extends CI_Model{

    public static $tb_name = 'tb_api_setting';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('lw_db', ['tb_name' => static::$tb_name],  static::$tb_name);
    }


    public function getOne($id){
        return $this->{static::$tb_name}->get_one('id = '.$id);
    }

    public function edit($id, $post)
    {
        $field = lwCheckValue($post, ['admin_id', 'group', 'name', 'link','method','descript']);
        if ($field === false) {
            return false;
        }

        if ($id == 0) {
            $field['ctime'] = date("Y-m-d H:i:s");
            $result = $this->{static::$tb_name}->insert($field);
        } else {
            $result = $this->{static::$tb_name}->update($field, ['id' => $id]);
        }
        return $result;
    }
}