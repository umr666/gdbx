<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:52:"E:\webroot\gdbx\addons\cms\view\default\tab_bar.html";i:1536043300;s:58:"E:\webroot\gdbx\addons\cms\view\default\common\layout.html";i:1536040747;s:58:"E:\webroot\gdbx\addons\cms\view\default\common\footer.html";i:1535940394;}*/ ?>
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
    <?php switch($__CHANNELP__['diyname']): case "resolve": ?><img src="/uploads/20180830/457d9a50929076684e68e40709ca4610.png" class="img-responsive"/><?php break; case "information": ?><img src="/uploads/20180830/2de440ef73db4cbb0e85d03af1862a80.jpg" class="img-responsive"/><?php break; case "contact": ?><img src="/uploads/20180830/b5d122190f1864815d507d61dbd91f32.png" class="img-responsive"/><?php break; endswitch; if($isloadmap == true): ?>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=LROQRa8CdZEQ2rzz1Av3Xj3f"></script>
    <script type="text/javascript">
        $(function(){
            $('#allmap').parent().addClass('allmap-parent');
            // 百度地图API功能
            var map = new BMap.Map("allmap");
            var point = new BMap.Point(113.369836,23.102247);
            var marker = new BMap.Marker(point);  // 创建标注
            map.addOverlay(marker);              // 将标注添加到地图中
            map.centerAndZoom(point, 15);
            var opts = {
              width : 350,     // 信息窗口宽度
              height: 80,     // 信息窗口高度
              offset: new BMap.Size(0, -15),
              enableMessage:true,//设置允许信息窗发送短息
              message:""
            }
            var infoWindow = new BMap.InfoWindow("地址：广州琶洲会展中心凤浦中路679号广交会大厦14层", opts);  // 创建信息窗口对象
            map.openInfoWindow(infoWindow,point);
            marker.addEventListener("click", function(){
                map.openInfoWindow(infoWindow,point); //开启信息窗口
            });
            map.enableScrollWheelZoom(true);
        })
    </script>
    <?php endif; ?>
    <div class="container"  id="content-container">
        <h1 class="clearfix">
            <ol class="breadcrumb pull-left">
                <!-- S 面包屑导航 -->
                <?php $__LIST__ = \addons\cms\model\Channel::getBreadcrumb(isset($__CHANNEL__)?$__CHANNEL__:[], isset($__ARCHIVES__)?$__ARCHIVES__:[], isset($__TAGS__)?$__TAGS__:[], isset($__PAGE__)?$__PAGE__:[]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li><?php if(($i == count($__LIST__)) or ($item['disabled'] != 0)): ?><?php echo $item['name']; else: ?><a href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a><?php endif; ?></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <!-- E 面包屑导航 -->
            </ol>
        </h1>

        <div class="tab-body">
            <ul class="tab-nav clearfix">
                <?php $__LIST__ = \addons\cms\model\Archives::getPageList($__PAGELIST__, ["id"=>"item"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <li class="tab-nav-item <?php if($notchannel): if($item['id'] == $__ARCHIVES__['id']): ?>active<?php endif; endif; ?>"><a href="<?php echo url('/cms',array('a'=>$item['id'])); ?>"><?php echo $item['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

            <?php if($notchannel): ?>
            <div class="tab-content">
                <h3 class="tab-content-title"><?php echo $__ARCHIVES__['title']; ?></h3>
                <div class="tab-content-main">
                    <?php echo $__ARCHIVES__['content']; ?>
                </div>
            </div>
            <?php endif; ?>
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