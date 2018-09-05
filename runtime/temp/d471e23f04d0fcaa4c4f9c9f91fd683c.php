<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:54:"E:\webroot\gdbx\addons\cms\view\default\show_news.html";i:1534231759;s:58:"E:\webroot\gdbx\addons\cms\view\default\common\layout.html";i:1535944509;s:59:"E:\webroot\gdbx\addons\cms\view\default\common\comment.html";i:1534231759;s:59:"E:\webroot\gdbx\addons\cms\view\default\common\sidebar.html";i:1534231759;s:58:"E:\webroot\gdbx\addons\cms\view\default\common\footer.html";i:1535940394;}*/ ?>
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

        

<div class="container"  id="content-container"> 

    <div class="article-list-body row">

        <div class="col-md-8 article-detail-main">
            <section class="article-section article-content">
                <ol class="breadcrumb">
                    <!-- S 面包屑导航 -->
                    <?php $__LIST__ = \addons\cms\model\Channel::getBreadcrumb(isset($__CHANNEL__)?$__CHANNEL__:[], isset($__ARCHIVES__)?$__ARCHIVES__:[], isset($__TAGS__)?$__TAGS__:[], isset($__PAGE__)?$__PAGE__:[]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <li><a href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <!-- E 面包屑导航 -->
                </ol>        
                <div class="article-metas">
                    <!-- S 标题区域 -->
                    <div class="pull-left">
                        <div class="date">
                            <div class="day"><?php echo date('d',$__ARCHIVES__['createtime']); ?></div>
                            <div class="month"><?php echo date('m',$__ARCHIVES__['createtime']); ?><?php echo __('Month'); ?></div>
                        </div>
                    </div>
                    <div class="metas-body">
                        <h2 class="title">
                            <?php echo $__ARCHIVES__['title']; ?>
                        </h2>
                        <div class="sns">
                            <span class="views-num">
                                <i class="fa fa-eye"></i><?php echo $__ARCHIVES__['views']; ?>
                            </span>
                            <span class="comment-num">
                                <i class="fa fa-comments"></i><?php echo $__ARCHIVES__['comments']; ?>
                            </span>
                            <span class="like-num">
                                <i class="fa fa-thumbs-o-up"></i><span class="js-like-num"><?php echo $__ARCHIVES__['likes']; ?></span>
                            </span>
                        </div>
                    </div>
                    <!-- E 标题区域 -->
                </div>        
                <div class="article-text">
                    <!-- S 正文 -->
                    <p>
                        <?php echo $__ARCHIVES__['content']; ?>
                    </p>
                    <!-- E 正文 -->
                </div>

                <div class="product-like-wrapper">
                    <!-- S 赞踩 -->
                    <a class="product-like" data-action="vote" data-type="like" data-id="<?php echo $__ARCHIVES__['id']; ?>" href="javascript:;" title="赞"><i class="fa fa-thumbs-up"></i></a>
                    <div class="like-bar-wrapper" data-likes="<?php echo $__ARCHIVES__['likes']; ?>" data-dislikes="<?php echo $__ARCHIVES__['dislikes']; ?>">
                        <div class="bar"><span style="width: <?php echo $__ARCHIVES__['likeratio']; ?>%;"></span></div>
                        <div class="num"><i><?php echo $__ARCHIVES__['likes']; ?></i> : <span><?php echo $__ARCHIVES__['dislikes']; ?></span></div>
                    </div>
                    <a class="product-dislike" data-action="vote" data-type="dislike" data-id="<?php echo $__ARCHIVES__['id']; ?>" href="javascript:;" title="踩"><i class="fa fa-thumbs-down"></i></a>
                    <!-- E 赞踩 -->
                </div>

                <div class="entry-meta">
                    <ul>
                        <!-- S 归档 -->
                        <li><?php echo __('Article category'); ?>：<a href="<?php echo $__CHANNEL__['url']; ?>"><?php echo $__CHANNEL__['name']; ?></a></li>
                        <li><?php echo __('Article tags'); ?>：<?php if(is_array($__ARCHIVES__['tagslist']) || $__ARCHIVES__['tagslist'] instanceof \think\Collection || $__ARCHIVES__['tagslist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $__ARCHIVES__['tagslist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="<?php echo $tag['url']; ?>" rel="tag"><?php echo $tag['name']; ?></a><?php if(isset($__LIST__[$i])): ?>,<?php endif; endforeach; endif; else: echo "" ;endif; ?></li>
                        <li><?php echo __('Article views'); ?>：<span id="post_view_count"><?php echo $__ARCHIVES__['views']; ?></span> 次浏览</li>
                        <li><?php echo __('Post date'); ?>：<?php echo datetime($__ARCHIVES__['createtime']); ?></li>
                        <li><?php echo __('Article url'); ?>：<a href="<?php echo $__ARCHIVES__['fullurl']; ?>"><?php echo $__ARCHIVES__['fullurl']; ?></a></li>
                        <!-- S 归档 -->
                    </ul>
                    <ul class="entry-relate-links">
                        <!-- S 上一篇下一篇 -->
                        <?php $prev = \addons\cms\model\Archives::getPrevNext("prev", $__ARCHIVES__['id'], $__CHANNEL__['id']);if($prev): ?>
                        <li>
                            <span><?php echo __('Prev'); ?> &gt;：</span>
                            <a href="<?php echo $prev['url']; ?>"><?php echo $prev['title']; ?></a>
                        </li>
                        <?php endif;$next = \addons\cms\model\Archives::getPrevNext("next", $__ARCHIVES__['id'], $__CHANNEL__['id']);if($next): ?>
                        <li>
                            <span><?php echo __('Next'); ?> &gt;：</span>
                            <a href="<?php echo $next['url']; ?>"><?php echo $next['title']; ?></a>
                        </li>
                        <?php endif;?>
                        <!-- E 上一篇下一篇 -->
                    </ul>
                </div>

                <div class="product-action-btn">
                    <div class="pull-left">
                        <a href="javascript:void(0);" name="anchor" id="anchor"></a>
                        <!-- S 收藏 -->
                        <a class="product-favorite addbookbark" href="javascript:;">
                            <i class="fa fa-heart"></i> <?php echo __('Favourite'); ?>
                        </a>
                        <!-- E 收藏 -->
                        <!-- S 分享 -->
                        <span class="bdsharebuttonbox share-box bdshare-button-style0-16">
                            <a class="bds_more share-box-a" data-cmd="more">
                                <i class="fa fa-share"></i> <?php echo __('Share'); ?>
                            </a>
                        </span>
                        <!-- E 分享 -->
                    </div>
                    <div class="pull-right">
                        <!-- S 举报 -->
                        <div class="report-wrapper">
                            <a href="javascript:;"><?php echo __('Report'); ?></a>
                            <span>|</span>
                            <a href="javascript:;"><?php echo __('Error report'); ?></a>
                        </div>
                        <!-- E 举报 -->
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="related-article">
                    <div class="row">
                        <!-- S 相关文章 -->
                        <?php $__LIST__ = \addons\cms\model\Archives::getArchivesList(["id"=>"relate","tags"=>$__ARCHIVES__['tags'],"row"=>"3"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$relate): $mod = ($i % 2 );++$i;?>
                        <a class="col-sm-4" href="<?php echo $relate['url']; ?>">
                            <div class="related-item">
                                <div class="title">
                                    <?php echo $relate['title']; ?>
                                </div>
                                <img class="img-responsive" src="<?php echo $relate['image']; ?>" alt="<?php echo $relate['title']; ?>">
                                <div class="image-overlay"></div>
                            </div>
                        </a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <!-- E 相关文章 -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </section>

            <div class="panel panel-default" id="comments">
                <div class="panel-heading">
                    <?php echo __('Comment list'); ?>(<?php echo $__ARCHIVES__['comments']; ?>)
                </div>
                <div class="panel-body">
                    <div id="comment-container">
    <!-- S 评论列表 -->
    <div id="commentlist">
        <?php $aid = $__ARCHIVES__['id']; $__COMMENTLIST__ = \addons\cms\model\Comment::getCommentList(["id"=>"comment","type"=>"archives","aid"=>"$aid","pagesize"=>"10"]); if(is_array($__COMMENTLIST__) || $__COMMENTLIST__ instanceof \think\Collection || $__COMMENTLIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__COMMENTLIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?>
        <dl id="comment-<?php echo $comment['id']; ?>">
            <dt><a href="javascript:;" rel="nofollow"><img alt='' src='<?php echo $comment['user']['avatar']; ?>' /></a></dt>
            <dd>
                <div class="parent">
                    <cite><a href='javascript:;' rel='external nofollow'><?php echo $comment['user']['nickname']; ?></a></cite>
                    <small> <?php echo human_date($comment['createtime']); ?> <a href="javascript:;" data-id="<?php echo $comment['id']; ?>" title="@<?php echo $comment['user']['nickname']; ?> " class="reply">回复TA</a></small>
                    <p><?php echo $comment['content']; ?></p>
                </div>
            </dd>
            <div class="clearfix"></div>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!-- E 评论列表 -->

    <!-- S 评论分页 -->
    <div id="commentpager" class="text-center">
        <?php echo $__COMMENTLIST__->render(["type"=>"full"]); ?>
    </div>
    <!-- E 评论分页 -->

    <!-- S 发表评论 -->
    <div id="postcomment">
        <h3>发表评论 <a href="javascript:;"><small>取消回复</small></a></h3>
        <form action="<?php echo addon_url('cms/comment/post'); ?>" method="post" id="postform">
            <?php echo token(); ?>
            <input type="hidden" name="type" value="archives" />
            <input type="hidden" name="aid" value="<?php echo $__ARCHIVES__['id']; ?>" />
            <input type="hidden" name="pid" id="pid" value="0" />
            <div class="form-group">
                <textarea name="content" class="form-control" <?php if(!$user): ?>disabled placeholder="请登录后再发表评论" <?php endif; ?> id="commentcontent" cols="6" rows="5" tabindex="4"></textarea>
            </div>
            <?php if(!$user): ?>
            <div class="form-group">
            <a href="<?php echo url('index/user/login'); ?>" class="btn btn-primary">登录</a>
            <a href="<?php echo url('index/user/register'); ?>" class="btn btn-success">注册新账号</a>
            </div>
            <?php else: ?>
            <div class="form-group">
                <input name="submit" type="submit" id="submit"  tabindex="5" value="提交评论(Ctrl+回车)" class="btn btn-primary" />
                <span id="actiontips"></span>
            </div>
            <div class="checkbox">
                <label>
                    <input name="subscribe" type="checkbox" class="checkbox" tabindex="7" checked value="1" /> 有人回复时邮件通知我
                </label>
            </div>
            <?php endif; ?>
        </form>
    </div>
    <!-- E 发表评论 -->
</div>
                </div>
            </div>

        </div>

        <aside class="col-md-4 article-sidebar">
            <div class="panel panel-adimg">
                <a href="http://www.fastadmin.net"><img src="/assets/addons/cms/img/sidebar/1.jpg" class="img-responsive"/></a>
            </div>
            <!-- S 热门资讯 -->
<div class="panel panel-default hot-article">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo __('Hot news'); ?></h3>
    </div>
    <div class="panel-body">
        <?php $__LIST__ = \addons\cms\model\Archives::getArchivesList(["id"=>"hot","row"=>"10","orderby"=>"id","orderway"=>"asc"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?>
        <div class="media media-number">
            <div class="media-left">
                <span class="num"><?php echo $i; ?></span>
            </div>
            <div class="media-body">
                <a class="link-dark" href="<?php echo $hot['url']; ?>" title="<?php echo $hot['title']; ?>"><?php echo $hot['title']; ?></a>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<!-- E 热门资讯 -->

<!-- S 热门标签 -->
<div class="panel panel-default hot-tags">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo __('Hot tags'); ?></h3>
    </div>
    <div class="panel-body">
        <?php $__LIST__ = \addons\cms\model\Tags::getTagsList(["id"=>"tag","orderby"=>"rand","limit"=>"30"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
        <a href="<?php echo $tag['url']; ?>"> <span class="badge"><i class="fa fa-tags"></i> <?php echo $tag['name']; ?></span></a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<!-- E 热门标签 -->

<!-- S 推荐资讯 -->
<div class="panel panel-default recommend-article">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo __('Recommend news'); ?></h3>
    </div>
    <div class="panel-body">
        <?php $__LIST__ = \addons\cms\model\Archives::getArchivesList(["id"=>"hot","row"=>"10","flag"=>"recommend|new","orderby"=>"id","orderway"=>"asc"]); if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?>
        <div class="media media-number">
            <div class="media-left">
                <span class="num"><?php echo $i; ?></span>
            </div>
            <div class="media-body">
                <a class="link-dark" href="<?php echo $hot['url']; ?>" title="<?php echo $hot['title']; ?>"><?php echo $hot['title']; ?></a>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<!-- E 推荐资讯 -->
        </aside>
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
            <a id="feedback" class="hover" href="#comments">
                <i class="iconfont icon-feedback"></i>
            </a>
            <?php endif; ?>
            <a id="back-to-top" class="hover" href="javascript:;">
                <i class="iconfont icon-backtotop"></i>
            </a>
            <!-- E 浮动按钮 -->
        </div>

    </body>
</html>