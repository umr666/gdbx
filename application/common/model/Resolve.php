<?php

namespace app\common\model;

use think\Db;
use think\Model;

class Resolve extends Model{
    // 表名
    protected $name = 'solve_test';

    public function setData($data)
    {
        if (is_object($data)) {
            $data = get_object_vars($data);
        }
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    public function getList($id = 0){
        return $this->data;
        $data = db('cms_archives')->where('id',$id)->select();
        return $data;
    }
}