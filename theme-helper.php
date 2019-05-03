<?php

class Sagiri
{
    static $name = "Sagiri";
    static $version = "1.0.3";
    static $newVersion;
    static $err = false;

    static function geturl($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
        $res = curl_exec($curl);
        $err = curl_error($curl);
        $err && self::$err = true;
        curl_close($curl);
        return json_decode($res, true);
    }

    static function comment($url)
    {
        $headerArray = array("Content-type:application/x-www-form-urlencoded");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_REFERER, 'http://runtua.cn/62.html');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headerArray);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        // curl_setopt($curl, CURLOPT_HEADER, 1); 
        $res = curl_exec($curl);
        $http_code = curl_getinfo($curl)["http_code"];
        curl_close($curl);
        if (($http_code >= 200 && $http_code < 300) || $http_code === 304 || $http_code === 302) {
            return json_decode($res);
        } else {
            self::$err = true;
        };
    }

    public function update()
    {

        if (!function_exists('curl_init')) {
            self::$err = true;
            return;
        }

        $pkg = $this->geturl("https://raw.githubusercontent.com/shiyiya/typecho-theme-sagiri/master/package.json");

        if ($pkg["version"] > self::$version) {
            self::$newVersion = $pkg["version"];
        }

        echo "<style>.theme-info{ text-align:center; margin:1em 0; } .theme-info > *{ margin:0 0 1rem } .buttons a{ background:#467b96; color:#fff; border-radius:4px; padding:.5em .75em; display:inline-block }</style>";
        echo "<div class='theme-info'>  <h2>" . self::$name . "-" . self::$version . "</h2>";
        echo "<p>By: <a href='https://github.com/shiyiya/typecho-theme-sagiri'>Shiyiya</a></p>";
        !self::$err ? empty(self::$newVersion) ? print("It's the latest version.") : print("Found new version, <a href='https://github.com/shiyiya/typecho-theme-sagiri'>click to download</a>.") : print("Unable to check for updates.");
        echo "</div>";
    }

    public function ga()
    {
        if (!function_exists('curl_init')) {
            self::$err = true;
            return;
        }

        $config = Typecho_Widget::widget('Widget_Options');
        $title = $config->title;
        $description = $config->description;
        $siteUrl = $config->siteUrl;
        $this->comment("http://runtua.cn/62.html/comment?author=" . $title . "&mail=no@mail.com&url=https://github.com/shiyiya/typecho-theme-sagiri/&text=" . '[' . $title . '](' . $siteUrl  . '):  ' . $description);
    }
}

function showThumb($obj, $size = null, $link = false)
{

    $fieldThumb = $obj->fields->thumb;

    if (!empty($thumb) && risset($fieldThumb)) {
        return '<img src="' . $fieldThumb . '" alt="' . $obj->fields->thumbAlt . '" />';
    }

    preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?alt=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches);
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    $attach = $obj->attachments(1)->attachment;


    if (isset($attach->isImage) && $attach->isImage == 1) {
        $thumb = '<img src="' . $attach->url . '" alt="' . $attach->name . '" />';
    } elseif (isset($matches[1][0])) {
        $thumb = $matches[0][0];
    }

    if (empty($thumb)) {
        if (!empty($options->default_thumb)) {
            $thumb = '<img src="' . $options->default_thumb . '" />';
        }
    }
    if ($link) {
        return $thumb;
    }
}

function getBrowser($agent)
{
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $browserVersion = 'IE';
    } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Firefox/', $regs[0]);
        $FireFox_vern = explode('.', $str1[1]);
        $browserVersion = 'Firefox ' . $FireFox_vern[0];
    } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Maxthon/', $agent);
        $Maxthon_vern = explode('.', $str1[1]);
        $browserVersion = 'Maxthon ' . $Maxthon_vern[0];
    } else if (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $agent, $regs)) {
        $browserVersion = 'Sogo';
    } else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
        $browserVersion = '360';
    } else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Edge/', $regs[0]);
        $Edge_vern = explode('.', $str1[1]);
        $browserVersion = 'Edge ' . $Edge_vern[0];
    } else if (preg_match('/UC/i', $agent)) {
        $str1 = explode('rowser/', $agent);
        $UCBrowser_vern = explode('.', $str1[1]);
        $browserVersion = 'UC ' . $UCBrowser_vern[0];
    } else if (preg_match('/MicroMesseng/i', $agent, $regs)) {
        $browserVersion = 'Wechat';
    } else if (preg_match('/WeiBo/i', $agent, $regs)) {
        $browserVersion = 'Weibo';
    } else if (preg_match('/QQ/i', $agent, $regs) || preg_match('/QQBrowser\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('rowser/', $agent);
        $QQ_vern = explode('.', $str1[1]);
        $browserVersion = 'QQ ' . $QQ_vern[0];
    } else if (preg_match('/BIDU/i', $agent, $regs)) {
        $browserVersion = 'Baidu';
    } else if (preg_match('/LBBROWSER/i', $agent, $regs)) {
        $browserVersion = 'LieBao';
    } else if (preg_match('/TheWorld/i', $agent, $regs)) {
        $browserVersion = '世界之窗';
    } else if (preg_match('/XiaoMi/i', $agent, $regs)) {
        $browserVersion = 'Mi';
    } else if (preg_match('/UBrowser/i', $agent, $regs)) {
        $str1 = explode('rowser/', $agent);
        $UCBrowser_vern = explode('.', $str1[1]);
        $browserVersion = 'UC ' . $UCBrowser_vern[0];
    } else if (preg_match('/mailapp/i', $agent, $regs)) {
        $browserVersion = 'email内嵌';
    } else if (preg_match('/2345Explorer/i', $agent, $regs)) {
        $browserVersion = '2345';
    } else if (preg_match('/Sleipnir/i', $agent, $regs)) {
        $browserVersion = '神马';
    } else if (preg_match('/YaBrowser/i', $agent, $regs)) {
        $browserVersion = 'Yandex';
    } else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $browserVersion = 'Opera';
    } else if (preg_match('/MZBrowser/i', $agent, $regs)) {
        $browserVersion = '魅族';
    } else if (preg_match('/VivoBrowser/i', $agent, $regs)) {
        $browserVersion = 'vivo';
    } else if (preg_match('/Quark/i', $agent, $regs)) {
        $browserVersion = '夸克';
    } else if (preg_match('/mixia/i', $agent, $regs)) {
        $browserVersion = '米侠';
    } else if (preg_match('/fusion/i', $agent, $regs)) {
        $browserVersion = '客户端';
    } else if (preg_match('/CoolMarket/i', $agent, $regs)) {
        $browserVersion = '基安内置';
    } else if (preg_match('/Thunder/i', $agent, $regs)) {
        $browserVersion = '迅雷内置';
    } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Chrome/', $agent);
        $chrome_vern = explode('.', $str1[1]);
        $browserVersion = 'Chrome ' . $chrome_vern[0];
    } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Version/', $agent);
        $safari_vern = explode('.', $str1[1]);
        $browserVersion = 'Safari ' . $safari_vern[0];
    } else {
        $browserVersion = '404 Browser';
    }
    echo $browserVersion;
}

function getOs($agent)
{
    if (preg_match('/win/i', $agent)) {
        if (preg_match('/nt 6.0/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> Vista';
        } else if (preg_match('/nt 6.1/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 7';
        } else if (preg_match('/nt 6.2/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 8';
        } else if (preg_match('/nt 6.3/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 8.1';
        } else if (preg_match('/nt 5.1/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> XP';
        } else if (preg_match('/nt 10.0/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 10';
        } else {
            $OSVersion = '<i class="iconfont icon-windows"></i>';
        }
    } else if (preg_match('/android/i', $agent)) {
        if (preg_match('/android 9/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> P';
        } else if (preg_match('/android 8/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> O';
        } else if (preg_match('/android 7/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> N';
        } else if (preg_match('/android 6/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> M';
        } else if (preg_match('/android 5/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> L';
        } else {
            $OSVersion = '<i class="iconfont icon-android"></i>';
        }
    } else if (preg_match('/ubuntu/i', $agent)) {
        $OSVersion = '<i class="iconfont icon-linux"></i>';
    } else if (preg_match('/linux/i', $agent)) {
        $OSVersion = '<i class="iconfont icon-linux"></i>';
    } else if (preg_match('/iPhone/i', $agent)) {
        if (preg_match('/iPhone OS 11/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-iphone"></i> 11';
        } else if (preg_match('/iPhone OS 12/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-iphone"></i> 12';
        } else {
            $OSVersion = '<i class="iconfont icon-iphone"></i> < 11';
        }
    } else if (preg_match('/mac/i', $agent)) {
        $OSVersion = '<i class="iconfont icon-mac"></i>';
    } else if (preg_match('/fusion/i', $agent)) {
        $OSVersion = '<i class="iconfont icon-android"></i>';
    } else {
        $OSVersion = '404 OS';
    }
    echo $OSVersion;
}

function getSiteViews()
{
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $pom = $db->fetchAll("SELECT SUM(VIEWS) FROM `" . $prefix . "contents` WHERE `type`='page' or `type`='post'");
        $num = number_format($pom[0]['SUM(VIEWS)'], 0, '', '');
        return $num;
    } else {
        return 0;
    }
}

function getPostView($archive)
{
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views);
        }
    }
    echo $row['views'];
}

function getRandomPosts($limit = 5)
{
    $db = Typecho_Db::get();

    $adapterName = $db->getAdapterName();
    $rand = "RAND()";

    if ($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite') {
        $rand = 'RANDOM()';
    }

    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?', 'publish')
        ->where('type = ?', 'post')
        ->where('created <= ' . Helper::options()->gmtTime, 'post')
        ->limit($limit)
        ->order($rand));
    if ($result) {
        echo '<ul class="rand-archive list">';
        foreach ($result as $val) {
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<li><a href="' . $permalink . '" title="' . $post_title . '" >' . $post_title . '</a></li>';
        }
        echo '</ul>';
    }
}

function getTopView($limit = 5)
{
    $days = 99999999999999;
    $time = time() - (24 * 60 * 60 * $days);
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('created >= ?', $time)
        ->where('type = ?', 'post')
        ->where('status = ?', 'publish')
        ->where('created <= ?', time())
        ->limit($limit)
        ->order('views', Typecho_Db::SORT_DESC));
    if ($result) {
        echo '<ul class="top-view-archive list">';
        foreach ($result as $val) {
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<li><a href="' . $permalink . '" title="' . $val['views'] . '人看过">' . $post_title . '</a></li>';
        }
        echo '</ul>';
    }
}

function getTopCommentPosts($limit = 5)
{
    $days = 99999999999999;
    $time = time() - (24 * 60 * 60 * $days);
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('created >= ?', $time)
        ->where('type = ?', 'post')
        ->limit($limit)
        ->order('commentsNum', Typecho_Db::SORT_DESC));
    if ($result) {
        echo '<ul class="top-comment-archive list">';
        foreach ($result as $val) {
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<li><a href="' . $permalink . '" title="' . $val['commentsNum'] . '条评论">' . $post_title . '</a></li>';
        }
        echo '</ul>';
    }
}

function getRecentComments()
{ }

function thumbUp()
{ }

function replaceTag($content, $isLogin = false)
{
    $config = Typecho_Widget::widget('Widget_Options')->feature;
    if ($config !== null && in_array('lazyImg', $config)) {
        $content = preg_replace("/<[img|IMG].*?src=[\'|\"](?<src>.*?)[\'|\"].*?alt=[\'|\"](?<alt>.*?)[\'|\"].*?[\/|img|IMG]?>/sm", '<div class="lazy-loader" lazy-src="$1" data="$2"><span></span></div>', $content);
    }

    /* if($isLogin){
        $obj->content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'$1',$obj->content);
    }else{
    	$obj->content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2view">隐藏内容评论回复可见。</div>',$obj->content);
    } */

    /* $content = preg_replace("/\[button\s*(.*?)\](.*?)\[\/button\]/sm",'<button class="$1">$2</button>',$content);
    $content = preg_replace("/\[i-button\s*(.*?)\](.*?)\[\/i-button\]/sm",'<div class="$1">$2</div>', $content);
    $content = preg_replace("/\[tip\s*(.*?)\](.*?)\[\/tip\]/sm",'<div class="$1">$2</div>', $content); */

    echo $content;
}
