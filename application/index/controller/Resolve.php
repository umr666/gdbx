<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\library\Token;

class Resolve extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function _initialize()
    {
        parent::_initialize();
    }

    public function index()
    {
        $this->model = model('Resolve');
        $a = $this->model->getList();
        var_dump($a);exit;
        $cid = $this->request->param('id');
        $navi_title = db('cms_archives')->where('channel_id',53)->select();
        $this->view->assign('navi_title', $navi_title);
        return $this->view->fetch();
    }

}
