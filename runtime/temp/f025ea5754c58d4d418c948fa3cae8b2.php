<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"E:\webroot\gdbx\public/../application/admin\view\cms\channel\edit.html";i:1534231760;s:58:"E:\webroot\gdbx\application\admin\view\layout\default.html";i:1533742466;s:55:"E:\webroot\gdbx\application\admin\view\common\meta.html";i:1533742466;s:57:"E:\webroot\gdbx\application\admin\view\common\script.html";i:1533742466;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !$config['fastadmin']['multiplenav']): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">
    <input type="hidden" value="<?php echo $row['id']; ?>" id="channel-id" />
    <div class="form-group">
        <label for="c-type" class="control-label col-xs-12 col-sm-2"><?php echo __('Type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <div class="radio">
                <?php if(is_array($typeList) || $typeList instanceof \think\Collection || $typeList instanceof \think\Paginator): if( count($typeList)==0 ) : echo "" ;else: foreach($typeList as $key=>$vo): ?>
                <label for="row[type]-<?php echo $key; ?>"><input id="row[type]-<?php echo $key; ?>" name="row[type]" disabled type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['type'])?$row['type']:explode(',',$row['type']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="margin" style="margin-left:0;">
                <div class="alert alert-dismissable bg-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>栏目</strong>: 栏目类型下不可以发布文章,但可以添加子栏目、列表、链接<br>
                    <strong>列表</strong>: 列表类型下可以发布文章,但不能添加子栏目<br>
                    <strong>链接</strong>: 链接类型下不可以发布文章和子级栏目<br>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group tf tf-list tf-channel">
        <label for="c-model_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Model_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select name="row[model_id]" id="c-model_id" class="form-control " disabled>
                <?php if(is_array($modelList) || $modelList instanceof \think\Collection || $modelList instanceof \think\Paginator): if( count($modelList)==0 ) : echo "" ;else: foreach($modelList as $key=>$vo): ?>
                <option <?php if(in_array(($vo['id']), is_array($row['model_id'])?$row['model_id']:explode(',',$row['model_id']))): ?>selected="selected"<?php endif; ?> value="<?php echo $vo['id']; ?>" data-channeltpl="<?php echo $vo['channeltpl']; ?>" data-listtpl="<?php echo $vo['listtpl']; ?>" data-showtpl="<?php echo $vo['showtpl']; ?>"><?php echo $vo['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="parent_id" class="control-label col-xs-12 col-sm-2"><?php echo __('上级栏目'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select name="row[parent_id]" data-rule="required" id="parent_id" class="form-control">
                <option value="0"><?php echo __('None'); ?></option>
                <?php if(is_array($channelList) || $channelList instanceof \think\Collection || $channelList instanceof \think\Paginator): if( count($channelList)==0 ) : echo "" ;else: foreach($channelList as $key=>$vo): ?>
                <option value="<?php echo $vo['id']; ?>" <?php if($vo['type']!=='link'): ?>data-model="<?php echo $vo['model_id']; ?>"<?php endif; if($vo['type']=='link' || $vo['id']==$row['id'] || $vo['model_id']!=$row['model_id']): ?>disabled<?php endif; if($vo['id']==$row['parent_id']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="c-name" class="control-label col-xs-12 col-sm-2"><?php echo __('Name'); ?>:</label>
        <div class="col-xs-12 col-sm-4">
            <input id="c-name" data-rule="required" class="form-control" name="row[name]" type="text" value="<?php echo $row['name']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="c-image" class="control-label col-xs-12 col-sm-2"><?php echo __('Image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-image" data-rule="" class="form-control" size="50" name="row[image]" type="text" value="<?php echo $row['image']; ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-image" class="btn btn-danger plupload" data-input-id="c-image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-image" class="btn btn-primary fachoose" data-input-id="c-image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-image"></ul>
        </div>
    </div>
    <div class="form-group tf tf-channel tf tf-list">
        <label for="c-keywords" class="control-label col-xs-12 col-sm-2"><?php echo __('Keywords'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-keywords" data-rule="" class="form-control" name="row[keywords]" type="text" value="<?php echo $row['keywords']; ?>">
        </div>
    </div>
    <div class="form-group tf tf-channel tf tf-list">
        <label for="c-description" class="control-label col-xs-12 col-sm-2"><?php echo __('Description'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-description" data-rule="" class="form-control" name="row[description]"><?php echo $row['description']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="c-diyname" class="control-label col-xs-12 col-sm-2"><?php echo __('Diyname'); ?>:</label>
        <div class="col-xs-12 col-sm-4">
            <input id="c-diyname" data-rule="required; diyname" class="form-control" name="row[diyname]" type="text" value="<?php echo $row['diyname']; ?>">
        </div>
    </div>
    <div class="form-group tf tf-link">
        <label for="c-outlink" class="control-label col-xs-12 col-sm-2"><?php echo __('Outlink'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-outlink" data-rule="required" class="form-control" name="row[outlink]" type="text" value="<?php echo $row['outlink']; ?>">
        </div>
    </div>
    <div class="form-group tf tf-channel">
        <label for="c-channeltpl" class="control-label col-xs-12 col-sm-2"><?php echo __('Channeltpl'); ?>:</label>
        <div class="col-xs-12 col-sm-4">
            <input id="c-channeltpl" data-rule="required" class="form-control selectpage" name="row[channeltpl]" data-source="cms/ajax/get_template_list" data-primary-key="name" data-field="name" type="text" value="<?php echo $row['channeltpl']; ?>">
        </div>
    </div>
    <div class="form-group tf tf-list">
        <label for="c-listtpl" class="control-label col-xs-12 col-sm-2"><?php echo __('Listtpl'); ?>:</label>
        <div class="col-xs-12 col-sm-4">
            <input id="c-listtpl" data-rule="required" class="form-control selectpage" name="row[listtpl]" data-source="cms/ajax/get_template_list" data-primary-key="name" data-field="name" type="text" value="<?php echo $row['listtpl']; ?>">
        </div>
    </div>
    <div class="form-group tf tf-list">
        <label for="c-showtpl" class="control-label col-xs-12 col-sm-2"><?php echo __('Showtpl'); ?>:</label>
        <div class="col-xs-12 col-sm-4">
            <input id="c-showtpl" data-rule="required" class="form-control selectpage" name="row[showtpl]" data-source="cms/ajax/get_template_list" data-primary-key="name" data-field="name" type="text" value="<?php echo $row['showtpl']; ?>">
        </div>
    </div>
    <div class="form-group tf tf-list">
        <label for="c-pagesize" class="control-label col-xs-12 col-sm-2"><?php echo __('Pagesize'); ?>:</label>
        <div class="col-xs-12 col-sm-4">
            <input id="c-pagesize" data-rule="required" class="form-control" name="row[pagesize]" type="number" value="<?php echo $row['pagesize']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-weigh" class="control-label col-xs-12 col-sm-2"><?php echo __('Weigh'); ?>:</label>
        <div class="col-xs-12 col-sm-4">
            <input id="c-weigh" data-rule="required" class="form-control" name="row[weigh]" type="number" value="<?php echo $row['weigh']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-status" class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <div class="radio">
                <?php if(is_array($statusList) || $statusList instanceof \think\Collection || $statusList instanceof \think\Paginator): if( count($statusList)==0 ) : echo "" ;else: foreach($statusList as $key=>$vo): ?>
                <label for="row[status]-<?php echo $key; ?>"><input id="row[status]-<?php echo $key; ?>" name="row[status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>