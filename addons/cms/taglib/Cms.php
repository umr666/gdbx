<?php

namespace addons\cms\taglib;

use think\template\TagLib;

class Cms extends TagLib
{

    /**
     * 定义标签列表
     */
    protected $tags = [
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'channel'     => ['attr' => 'name', 'close' => 0],
        'archives'    => ['attr' => 'name', 'close' => 0],
        'tags'        => ['attr' => 'name', 'close' => 0],
        'block'       => ['attr' => 'id,name', 'close' => 0],
        'config'      => ['attr' => 'name', 'close' => 0],
        'page'        => ['attr' => 'name', 'close' => 0],
        'nav'         => ['attr' => 'name,maxlevel,condition,cache', 'close' => 0],
        'prevnext'    => ['attr' => 'id,type,archives,channel', 'close' => 1],
        'blocklist'   => ['attr' => 'id,row,limit,empty,key,mod,cache,orderby,orderway,imgwidth,imgheight,condition,name', 'close' => 1],
        'commentlist' => ['attr' => 'id,row,limit,empty,key,mod,cache,orderby,orderway,condition,type,aid,pid,fragment', 'close' => 1],
        'breadcrumb'  => ['attr' => 'id,empty,key,mod', 'close' => 1],
        'channellist' => ['attr' => 'id,row,limit,empty,key,mod,cache,orderby,orderway,imgwidth,imgheight,condition,model,type,typeid,field', 'close' => 1],
        'arclist'     => ['attr' => 'id,row,limit,empty,key,mod,cache,orderby,orderway,imgwidth,imgheight,condition,model,type,field,flag,channel,tags,addon', 'close' => 1],
        'tagslist'    => ['attr' => 'id,row,limit,empty,key,mod,cache,orderby,orderway,condition,type', 'close' => 1],
        'pagefilter'  => ['attr' => 'id,empty,key,mod', 'close' => 1],
        'pageorder'   => ['attr' => 'id,empty,key,mod', 'close' => 1],
        'pagelist'    => ['attr' => 'id,empty,key,mod,imgwidth,imgheight', 'close' => 1],
        'pageinfo'    => ['attr' => 'type', 'close' => 0],
        'commentinfo' => ['attr' => 'type', 'close' => 0],
    ];

    public function tagBreadcrumb($tag, $content)
    {
        $id = isset($tag['id']) ? $tag['id'] : 0;
        $empty = isset($tag['empty']) ? $tag['empty'] : '';
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';
        $parse = '<?php ';
        $parse .= '$__LIST__ = \addons\cms\model\Channel::getBreadcrumb(isset($__CHANNEL__)?$__CHANNEL__:[], isset($__ARCHIVES__)?$__ARCHIVES__:[], isset($__TAGS__)?$__TAGS__:[], isset($__PAGE__)?$__PAGE__:[]);';
        $parse .= ' ?>';
        $parse .= '{volist name="$__LIST__" id="' . $id . '" empty="' . $empty . '" key="' . $key . '" mod="' . $mod . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }

    public function tagPrevNext($tag, $content)
    {
        $id = isset($tag['id']) ? $tag['id'] : 'prevnext';
        $type = isset($tag['type']) ? $tag['type'] : 'prev';
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['archives', 'channel']))
            {
                $v = $this->autoBuildVar($v);
                $v = preg_match("/^\d+[0-9\,]+\d+$/i", $v) ? '"' . $v . '"' : $v;
            }
        }
        $archives = isset($tag['archives']) ? $tag['archives'] : 0;
        $channel = isset($tag['channel']) ? $tag['channel'] : '';
        $parse = '<?php ';
        $parse .= '$' . $id . ' = \addons\cms\model\Archives::getPrevNext("' . $type . '", ' . $archives . ', ' . $channel . ');';
        $parse .= 'if($' . $id . '):';
        $parse .= ' ?>';
        $parse .= $content;
        $parse .= '<?php endif;?>';
        return $parse;
    }

    public function tagChannel($tag)
    {
        return '{$__CHANNEL__.' . $tag['name'] . '}';
    }

    public function tagArchives($tag)
    {
        return '{$__ARCHIVES__.' . $tag['name'] . '}';
    }

    public function tagPage($tag)
    {
        return '{$__PAGE__.' . $tag['name'] . '}';
    }

    public function tagBlock($tag)
    {
        return \addons\cms\model\Block::getBlockContent($tag);
    }

    public function tagNav($tag)
    {
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['condition']))
            {
                $v = $this->autoBuildVar($v);
            }
            $v = '"' . $v . '"';
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '<?php ';
        $parse .= '$__LIST__ = \addons\cms\model\Channel::getNav(isset($__CHANNEL__)?$__CHANNEL__:[], [' . implode(',', $params) . ']);';
        $parse .= ' ?>';
        $parse .= '{$__LIST__}';
        return $parse;
    }

    public function tagBlocklist($tag, $content)
    {
        $id = $tag['id'];
        $empty = isset($tag['empty']) ? $tag['empty'] : '';
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['condition']))
            {
                $v = $this->autoBuildVar($v);
            }
            $v = '"' . $v . '"';
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '<?php ';
        $parse .= '$__LIST__ = \addons\cms\model\Block::getBlockList([' . implode(',', $params) . ']);';
        $parse .= ' ?>';
        $parse .= '{volist name="$__LIST__" id="' . $id . '" empty="' . $empty . '" key="' . $key . '" mod="' . $mod . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }

    public function tagTags($tag)
    {
        return '{$__TAGS__.' . $tag['name'] . '}';
    }

    public function tagPagefilter($tag, $content)
    {
        $id = $tag['id'];
        $empty = isset($tag['empty']) ? $tag['empty'] : '';
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['condition']))
            {
                $v = $this->autoBuildVar($v);
            }
            $v = '"' . $v . '"';
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '<?php ';
        $parse .= '$__LIST__ = \addons\cms\model\Archives::getPageFilter($__FILTERLIST__, [' . implode(',', $params) . ']);';
        $parse .= ' ?>';
        $parse .= '{volist name="$__LIST__" id="' . $id . '" empty="' . $empty . '" key="' . $key . '" mod="' . $mod . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }

    public function tagPageorder($tag, $content)
    {
        $id = $tag['id'];
        $empty = isset($tag['empty']) ? $tag['empty'] : '';
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['condition']))
            {
                $v = $this->autoBuildVar($v);
            }
            $v = '"' . $v . '"';
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '<?php ';
        $parse .= '$__LIST__ = \addons\cms\model\Archives::getPageOrder($__ORDERLIST__, [' . implode(',', $params) . ']);';
        $parse .= ' ?>';
        $parse .= '{volist name="$__LIST__" id="' . $id . '" empty="' . $empty . '" key="' . $key . '" mod="' . $mod . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }

    public function tagPagelist($tag, $content)
    {
        $id = $tag['id'];
        $empty = isset($tag['empty']) ? $tag['empty'] : '';
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';

        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['condition']))
            {
                $v = $this->autoBuildVar($v);
            }
            $v = '"' . $v . '"';
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '<?php ';
        $parse .= '$__LIST__ = \addons\cms\model\Archives::getPageList($__PAGELIST__, [' . implode(',', $params) . ']);';
        $parse .= ' ?>';
        $parse .= '{volist name="$__LIST__" id="' . $id . '" empty="' . $empty . '" key="' . $key . '" mod="' . $mod . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }

    public function tagPageinfo($tag, $content)
    {
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['condition']))
            {
                $v = $this->autoBuildVar($v);
            }
            $v = '"' . $v . '"';
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '{$__PAGELIST__->render([' . implode(',', $params) . '])}';
        return $parse;
    }

    /**
     * 标签列表
     * @param array $tag
     * @param string $content
     */
    public function tagTagslist($tag, $content)
    {
        $id = $tag['id'];
        $empty = isset($tag['empty']) ? $tag['empty'] : '';
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['condition']))
            {
                $v = $this->autoBuildVar($v);
            }
            $v = '"' . $v . '"';
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '<?php ';
        $parse .= '$__LIST__ = \addons\cms\model\Tags::getTagsList([' . implode(',', $params) . ']);';
        $parse .= ' ?>';
        $parse .= '{volist name="$__LIST__" id="' . $id . '" empty="' . $empty . '" key="' . $key . '" mod="' . $mod . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }

    /**
     * 评论列表
     * @param array $tag
     * @param string $content
     */
    public function tagCommentlist($tag, $content)
    {
        $id = $tag['id'];
        $empty = isset($tag['empty']) ? $tag['empty'] : '';
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['condition']))
            {
                $v = $this->autoBuildVar($v);
            }
            $v = '"' . $v . '"';
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '<?php ';
        $parse .= '$__COMMENTLIST__ = \addons\cms\model\Comment::getCommentList([' . implode(',', $params) . ']);';
        $parse .= ' ?>';
        $parse .= '{volist name="$__COMMENTLIST__" id="' . $id . '" empty="' . $empty . '" key="' . $key . '" mod="' . $mod . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }

    /**
     * 评论分页
     * @param array $tag
     * @param string $content
     * @return string
     */
    public function tagCommentinfo($tag, $content)
    {
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['condition']))
            {
                $v = $this->autoBuildVar($v);
            }
            $v = '"' . $v . '"';
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '{$__COMMENTLIST__->render([' . implode(',', $params) . '])}';
        return $parse;
    }

    /**
     * 栏目标签
     * @param array $tag
     * @param string $content
     */
    public function tagChannellist($tag, $content)
    {
        $id = $tag['id'];
        $empty = isset($tag['empty']) ? $tag['empty'] : '';
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['typeid', 'model', 'condition']))
            {
                $v = $this->autoBuildVar($v);
            }
            if (in_array($k, ['typeid', 'model']))
            {
                $v = preg_match("/^\d+[0-9\,]+\d+$/i", $v) ? '"' . $v . '"' : $v;
            }
            else
            {
                $v = '"' . $v . '"';
            }
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '<?php ';
        $parse .= '$__LIST__ = \addons\cms\model\Channel::getChannelList([' . implode(',', $params) . ']);';
        $parse .= ' ?>';
        $parse .= '{volist name="$__LIST__" id="' . $id . '" empty="' . $empty . '" key="' . $key . '" mod="' . $mod . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }

    public function tagArclist($tag, $content)
    {
        $id = $tag['id'];
        $empty = isset($tag['empty']) ? $tag['empty'] : '';
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';
        $params = [];
        foreach ($tag as $k => & $v)
        {
            if (in_array($k, ['channel', 'model', 'condition', 'tags']))
            {
                $v = $this->autoBuildVar($v);
            }
            if (in_array($k, ['channel', 'model', 'tags']))
            {
                $v = preg_match("/^\d+[0-9\,]+\d+$/i", $v) ? '"' . $v . '"' : $v;
            }
            else
            {
                $v = '"' . $v . '"';
            }
            $params[] = '"' . $k . '"=>' . $v;
        }
        $parse = '<?php ';
        $parse .= '$__LIST__ = \addons\cms\model\Archives::getArchivesList([' . implode(',', $params) . ']);';
        $parse .= ' ?>';
        $parse .= '{volist name="$__LIST__" id="' . $id . '" empty="' . $empty . '" key="' . $key . '" mod="' . $mod . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }

    public function tagConfig($tag)
    {
        $name = $tag['name'];
        $parse = '<?php ';
        $parse .= 'echo \think\Config::get("' . $name . '");';
        $parse .= ' ?>';
        return $parse;
    }

}
