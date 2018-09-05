<?php

namespace app\admin\validate;

use think\Validate;

class Fields extends Validate
{

    /**
     * 验证规则
     */
    protected $rule = [
        'name|名称'       => 'require|unique:fields,model_id^name',
        'title|管理员'     => 'require',
        'model_id|模型ID' => 'require|integer',
        'status|状态'     => 'require|in:normal,hidden',
    ];

    /**
     * 提示消息
     */
    protected $message = [
    ];

    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [
            'name', 'title', 'model_id', 'status'
        ],
        'edit' => [
            'name', 'title', 'model_id', 'status'
        ],
    ];

    public function __construct(array $rules = array(), $message = array(), $field = array())
    {
        //如果是编辑模式，则排除下主键
        $ids = request()->param("ids");
        if ($ids)
        {
            $this->rule['name|名称'] .= ",{$ids}";
        }
        parent::__construct($rules, $message, $field);
    }

}
