<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:50:"E:\webroot\gdbx\addons\cms\view\default\index.html";i:1536048595;s:58:"E:\webroot\gdbx\addons\cms\view\default\common\layout.html";i:1536040747;s:58:"E:\webroot\gdbx\addons\cms\view\default\common\footer.html";i:1535940394;}*/ ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=""> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
        <meta name="ideal viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta name="renderer" content="webkit">
        <title><?php echo \think\Config::get("cms.title"); ?> - <?php echo \think\Config::get("cms.sitename"); ?></title>
        <meta name="keywords" content="<?php echo \think\Config::get("cms.keywords"); ?>" />
        <meta name="description" content="<?php echo \think\Config::get("cms.description"); ?>" />

        <link rel="stylesheet" media="screen" href="/assets/addons/cms/css/common.css?v=<?php echo \think\Config::get("site.version"); ?>" />
        <link rel="stylesheet" media="screen" href="/assets/addons/cms/css/font-awesome.min.css?v=<?php echo \think\Config::get("site.version"); ?>" />

        <link rel="stylesheet" media="screen" href="/assets/addons/cms/css/jquery.colorbox.css?v=<?php echo \think\Config::get("site.version"); ?>" />
        <link rel="stylesheet" href="//at.alicdn.com/t/font_1461494259_6884313.css">
        <link rel="stylesheet" href="/assets/addons/cms/css/skin-bx.css?v=<?php echo \think\Config::get("site.version"); ?>">

        <!--[if lt IE 9]>
          <script src="/libs/html5shiv.js?v=<?php echo \think\Config::get("site.version"); ?>"></script>
          <script src="/libs/respond.min.js?v=<?php echo \think\Config::get("site.version"); ?>"></script>
        <![endif]-->


        <script type="text/javascript" src="/assets/libs/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/assets/addons/cms/js/bootstrap-typeahead.min.js"></script>
        <script type="text/javascript" src="/assets/addons/cms/js/common.js"></script>
    </head>
    <body class="group-page">

        <header class="header">
            <!-- S 导航 -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo \think\Config::get("cms.indexurl"); ?>"><img src="/assets/addons/cms/img/logo.png" width="180" alt=""></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <!--以下是两种实现导航菜单的方法-->

                            <!--如果你需要自定义NAV,可使用channellist标签来完成,这里只设置了2级-->

                            <!-- <?php $__LIST__ = \addons\cms\model\Channel::getChannelList(["id"=>"nav","type"=>"top"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
                            <li<?php if($nav['has_child']): ?> class="dropdown"<?php endif; ?>>
                                <a href="<?php echo $nav['url']; ?>"<?php if($nav['has_child']): ?> data-toggle="dropdown"<?php endif; ?>><?php echo $nav['name']; if($nav['has_child']): ?>  <b class="caret"></b><?php endif; ?></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php $__LIST__ = \addons\cms\model\Channel::getChannelList(["id"=>"sub","type"=>"son","typeid"=>$nav['id']]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                                    <li><a href="<?php echo $sub['url']; ?>"><?php echo $sub['name']; ?></a></li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?> -->


                            <!--实现无限级下拉菜单,maxlevel来控制最大层级-->
                            <?php $__LIST__ = \addons\cms\model\Channel::getNav(isset($__CHANNEL__)?$__CHANNEL__:[], ["maxlevel"=>"3"]); ?><?php echo $__LIST__; ?>
                        </ul>
                        <ul class="nav navbar-right hidden">
                            <ul class="nav navbar-nav">
                                <li><a href="javascript:;" class="addbookbark"><i class="fa fa-star"></i> 加入收藏</a></li>
                                <li><a href="javascript:;" class=""><i class="fa fa-phone"></i> 联系我们</a></li>
                            </ul>
                        </ul>
                        <!-- <ul class="nav navbar-nav navbar-right">
                            <li>
                                <form class="form-inline navbar-form" action="<?php echo addon_url('cms/search/index'); ?>" method="get">
                                    <div class="form-search hidden-sm">
                                        <input class="form-control typeahead" name="search" data-typeahead-url="<?php echo addon_url('cms/search/typeahead'); ?>" type="text" id="searchinput" placeholder="搜索">
                                    </div>
                                    <div class="form-search visible-sm">
                                        <a href="javascript:;" class="btn btn-default" id="searchbtn"><i class="fa fa-search"></i></a>
                                    </div>
                                </form>
                            </li>
                            <li class="dropdown">
                                <?php if($user): ?>
                                <a href="<?php echo url('index/user/index'); ?>" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 10px;height: 50px;">
                                    <span class="avatar-img"><img src="<?php echo $user['avatar']; ?>" style="width:30px;height:30px;border-radius:50%;" alt=""></span>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo url('index/user/index'); ?>" class="dropdown-toggle" data-toggle="dropdown">会员<span class="hidden-sm">中心</span> <b class="caret"></b></a>
                                <?php endif; ?>
                                <ul class="dropdown-menu">
                                    <?php if($user): ?>
                                    <li><a href="<?php echo url('index/user/index'); ?>"><i class="fa fa-user fa-fw"></i>会员中心</a></li>
                                    <li><a href="<?php echo url('index/user/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>退出</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo url('index/user/login'); ?>"><i class="fa fa-sign-in fa-fw"></i>登录</a></li>
                                    <li><a href="<?php echo url('index/user/register'); ?>"><i class="fa fa-user-o fa-fw"></i>注册</a></li>
                                    <?php endif; ?>

                                </ul>
                            </li>
                        </ul> -->
                    </div>

                </div>
            </nav>
            <!-- E 导航 -->

        </header>

        
<div class="main-box">
    <!-- S 焦点图 -->
        <div id="carousel-focus-captions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $__LIST__ = \addons\cms\model\Block::getBlockList(["id"=>"block","name"=>"focus","row"=>"5"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$block): $mod = ($i % 2 );++$i;?>
                <li data-target="#carousel-focus-captions" data-slide-to="<?php echo $i-1; ?>" class="<?php if($i==1): ?>active<?php endif; ?>"></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php $__LIST__ = \addons\cms\model\Block::getBlockList(["id"=>"block","name"=>"focus","row"=>"5"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$block): $mod = ($i % 2 );++$i;?>
                <div class="item <?php if($i==1): ?>active<?php endif; ?>">
                    <a href="<?php echo $block['url']; ?>">
                        <img src="<?php echo $block['image']; ?>" alt="...">
                        <div class="carousel-caption hidden">
                            <h3><?php echo $block['title']; ?></h3>
                            <?php if($block['content']): ?><p><?php echo $block['content']; ?></p><?php endif; ?>
                        </div>
                    </a>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <a class="left carousel-control" href="#carousel-focus-captions" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-focus-captions" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    <!-- E 焦点图 -->
    <div class="container" id="content-container">
        <div class="col-md-8">
            <h3 class="block-header"><img src="/assets/addons/cms/img/block.png" alt="">公司新闻</h3>
            <div class="clearfix">
                <div class="img-news-box">
                    <?php $__LIST__ = \addons\cms\model\Block::getBlockList(["id"=>"block","name"=>"news_img","row"=>"2"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$block): $mod = ($i % 2 );++$i;?>
                        <div class="img-news-block">
                            <a href="<?php echo url('/cms',array('a'=>$block['url'])); ?>">
                                <img src="<?php echo $block['image']; ?>" alt="">
                            </a>
                            <div class="img-news-block-title"><?php echo $block['title']; ?></div>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="index-news-tab">
                    <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <?php $__LIST__ = \addons\cms\model\Channel::getChannelList(["id"=>"channel","type"=>"son","typeid"=>54,"orderway"=>"asc"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$channel): $mod = ($i % 2 );++$i;?>
                        <li role="presentation" <?php if($i == '1'): ?>class="active"<?php endif; ?>><a href="#<?php echo $channel['diyname']; ?>" aria-controls="<?php echo $channel['diyname']; ?>" role="tab" data-toggle="tab"><?php echo $channel['name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <?php $__LIST__ = \addons\cms\model\Channel::getChannelList(["id"=>"channel","type"=>"son","typeid"=>54,"orderway"=>"asc"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$channel): $mod = ($i % 2 );++$i;?>
                        <div role="tabpanel" class="tab-pane <?php if($i == '1'): ?>active<?php endif; ?>" id="<?php echo $channel['diyname']; ?>">
                            <ul class="index-news-list">
                                <?php $__LIST__ = \addons\cms\model\Archives::getArchivesList(["id"=>"new","row"=>"6","orderby"=>"createtime","orderway"=>"desc","channel"=>$channel['id']]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                                <li class="index-news-item"><img src="/assets/addons/cms/img/new_arrow.gif">
                                    <a href="<?php echo url('/cms',array('a'=>$new['id'])); ?>"><?php echo $new['title']; ?></a>
                                    <div class="new-date"><?php echo date("Y-m-d",$new['createtime'] ); ?></div>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                      </div>

                    </div>
                </div>
            </div>
            <div class="left-bottom-box clearfix">
                <div class="index-contact">
                    <div class="contact-title">联系我们</div>
                    <div style="color: #4A6DBC">CONTACT US</div>
                    <img src="/assets/addons/cms/img/map.png" alt="">
                    <a href="<?php echo url('/cms',array('c'=>'contact')); ?>" class="contact-link">查看更多</a>
                </div>
                <div class="index-ad">
                    <div class="img-news-ad-list">
                        <?php $__LIST__ = \addons\cms\model\Block::getBlockList(["name"=>"contact_ad","id"=>"ad","orderway"=>"asc"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?>
                            <div class="img-news-ad-item">
                                <img src="<?php echo $ad['image']; ?>" alt="">
                                <div class="img-news-block-title"><?php echo $ad['title']; ?></div>
                            </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="index-about">
                        <div class="index-about-link">
                            <a href="<?php echo url('/cms',array('a'=>'aptitudes')); ?>" class="clearfix">
                                <img src="/assets/addons/cms/img/aptitudes.png" alt="" class="pull-left">
                                <div class="about-link-title pull-left">
                                    <div class="title-cn">资质证书</div>
                                    <div class="title-eng">Qualification Certificate</div>
                                </div>
                            </a>
                        </div>
                        <div class="index-about-link">
                            <a href="<?php echo url('/cms',array('a'=>'history')); ?>" class="clearfix">
                                <img src="/assets/addons/cms/img/reward.png" alt="" class="pull-left">
                                <div class="about-link-title pull-left">
                                    <div class="title-cn">企业荣誉</div>
                                    <div class="title-eng">Enterprise Honor</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="block-header" style="margin-bottom: 20px;"><img src="/assets/addons/cms/img/block.png" alt="">在线视频</h3>
            <div class="video-block"><a href="http://www.fastadmin.net"><img src="/uploads/20180831/61adb338ac83ee19395533e104c5e47b.jpg" class="img-responsive"/></a> <div class="playbtn"></div> </div>
            <div class="sidebar-link">
                <?php $__LIST__ = \addons\cms\model\Block::getBlockList(["name"=>"sidebar_link","id"=>"item","orderway"=>"asc"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <div class="sidebar-link-item clearfix">
                        <img src="<?php echo $item['image']; ?>" alt="" class="pull-left">
                        <div class="link-title pull-left">
                            <div class="title-cn"><?php echo $item['title']; ?></div>
                            <div class="title-eng"><?php echo $item['englishtitle']; ?></div>
                        </div>
                        <a href="<?php echo $item['url']; ?>" class="pull-right"><img src="/assets/addons/cms/img/link_to.png" alt=""></a>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>



        <footer>
            <div class="container-fluid" id="footer">
                <div class="container">
                    <div class="row footer-inner">
                        <div class="footer-contact">
    <h3 class="footer-title">联系我们</h3>
    <div class="footer-contact-item">联系邮箱：bangxincommerce@126.com</div>
    <div class="footer-contact-item">联系电话：020-84044608</div>
    <div class="footer-contact-item">公司地址：广州琶洲会展中心凤浦中路679号广交会大厦14层</div>
</div>
<div class="friend-link">
    <h3 class="footer-title">友情链接</h3>
    <ul class="friend-link-list">
        <?php $__LIST__ = \addons\cms\model\Block::getBlockList(["name"=>"friend_link","id"=>"item","orderway"=>"asc"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
            <li class="friend-link-item"><a href="<?php echo $item['url']; ?>" target="_blank"><?php echo $item['title']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
                    </div>
                </div>
            </div>
        </footer>

        <div id="floatbtn">
            <!-- S 浮动按钮 -->
            <!--
                <a id="fb-tipoff" class="hover" href="javascript:;" target="_blank">
                <i class="iconfont icon-pencil"></i>
            </a> -->
            <?php if($config['qrcode']): ?>
            <!-- <a id="fb-qrcode" href="javascript:;">
                <i class="iconfont icon-qrcode"></i>
                <div id="fb-qrcode-wrapper">
                    <div class="qrcode"><img src="<?php echo $config['qrcode']; ?>"></div>
                    <p>微信公众账号</p>
                    <p>微信扫一扫加关注</p>
                </div>
            </a> -->
            <?php endif; if(isset($__ARCHIVES__)): ?>
            <!-- <a id="feedback" class="hover" href="#comments">
                <i class="iconfont icon-feedback"></i>
            </a> -->
            <?php endif; ?>
            <a id="back-to-top" class="hover" href="javascript:;">
                <i class="iconfont icon-backtotop"></i>
            </a>
            <!-- E 浮动按钮 -->
        </div>

    </body>
</html>