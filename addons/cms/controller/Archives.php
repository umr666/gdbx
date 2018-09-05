<?php

namespace addons\cms\controller;

use addons\cms\model\Archives as ArchivesModel;
use addons\cms\model\Channel;
use addons\cms\model\Modelx;
use think\Config;

/**
 * 文档控制器
 * Class Archives
 * @package addons\cms\controller
 */
class Archives extends Base
{

    public function index()
    {
        $action = $this->request->post("action");
        if ($action && $this->request->isPost()) {
            return $this->$action();
        }
        $diyname = $this->request->param('diyname');
        if ($diyname && !is_numeric($diyname)) {
            $archives = ArchivesModel::getByDiyname($diyname);
        } else {
            $id = $diyname ? $diyname : $this->request->get('id', '');
            $archives = ArchivesModel::get($id);
        }
        if (!$archives || $archives['status'] == 'hidden' || $archives['deletetime']) {
            $this->error(__('No specified article found'));
        }
        $channel = Channel::get($archives['channel_id']);
        if (!$channel) {
            $this->error(__('No specified channel found'));
        }
        if($channel['parent_id']==0){
            $channel_parent = $channel;
        }else{
            $channel_parent = Channel::get($channel['parent_id']);
        }
        $pagelist = ArchivesModel::alias('a')
            ->where('status', 'normal')
            ->where('deletetime', 'exp', \think\Db::raw('IS NULL'))
            ->where('channel_id', $archives['channel_id'])
            ->order('createtime', 'desc')
            ->paginate(10, false, ['type' => '\\addons\\cms\\library\\Bootstrap']);
        $model = Modelx::get($channel['model_id'], [], true);
        if (!$model) {
            $this->error(__('No specified model found'));
        }
        $addon = db($model['table'])->where('id', $archives['id'])->find();
        if ($addon) {
            if ($model->fields) {
                $fieldsContentList = $model->getFieldsContentList($model->id);
                //附加列表字段
                array_walk($fieldsContentList, function ($content, $field) use (&$addon) {
                    $addon[$field . '_text'] = isset($content[$addon[$field]]) ? $content[$addon[$field]] : $addon[$field];
                });
            }
            $archives->setData($addon);
        } else {
            $this->error('No specified addon article found');
        }

        $isLoadMap = $archives['diyname'] == 'address' ? true : false;
        $archives->setInc("views", 1);
        $this->view->assign("__ARCHIVES__", $archives);
        $this->view->assign("__CHANNEL__", $channel);
        $this->view->assign("__PAGELIST__", $pagelist);
        $this->view->assign("__CHANNELP__", $channel_parent);
        $this->view->assign("notchannel", true);
        $this->view->assign("isloadmap",$isLoadMap);
        Config::set('cms.title', $archives['title']);
        Config::set('cms.keywords', $archives['keywords']);
        Config::set('cms.description', $archives['description']);
        $template = preg_replace('/\.html$/', '', $channel['showtpl']);
        return $this->view->fetch('/' . $template);
    }

    /**
     * 赞与踩
     */
    public function vote()
    {
        $id = (int)$this->request->post("id");
        $type = trim($this->request->post("type", ""));
        if (!$id || !$type) {
            $this->error(__('Operation failed'));
        }
        $archives = ArchivesModel::get($id);
        if (!$archives || $archives['status'] == 'hidden') {
            $this->error(__('No specified article found'));
        }
        $archives->where('id', $id)->setInc($type === 'like' ? 'likes' : 'dislikes', 1);
        $archives = ArchivesModel::get($id);
        $this->success(__('Operation completed'), null, ['likes' => $archives->likes, 'dislikes' => $archives->dislikes, 'likeratio' => $archives->likeratio]);
    }

}
