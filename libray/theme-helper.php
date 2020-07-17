<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function isPc()
{
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
        return false;
    }
    return true;
}

function showThumb($obj)
{

    $Widget_Options = Typecho_Widget::widget('Widget_Options');
    $themeUrl = $Widget_Options->themeUrl;
    $config = $Widget_Options->feature;

    $src = '';
    $alt = '';
    $title = '';
    $lazySrc = ' src="' . $themeUrl . '/assert/img/loader.gif' . '" class="lazy-loader" ';

    $fieldThumb = $obj->fields->thumb;
    if (!empty($fieldThumb) && isset($fieldThumb)) { // typecho custom field
        $src = $fieldThumb;
        $alt = $obj->fields->thumbAlt;
        goto to;
    }

    // uploaded image of post content
    $attach = $obj->attachments(1)->attachment;
    if (isset($attach->isImage) && $attach->isImage == 1) {
        $src = $attach->url;
        $alt = $attach->name;
        goto to;
    }

    // image of post content
    preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?alt=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches);
    if (isset($matches[1][0])) {
        $src = $matches[1][0];
        $alt = $matches[2][0];
        goto to;
    }

    // https://s0.xinger.ink/acgimg/acgurl.php
    // random image
    $default_thumb = Typecho_Widget::widget('Widget_Options')->default_thumb;
    if (!empty($default_thumb)) {
        $url = parse_url($default_thumb);

        if (empty($url['query']))
            $src = $default_thumb . '?_te_sagiri_t=' . time();
        else
            $src = $default_thumb . '&_te_sagiri_t=' . time();
        goto to;
    }

    to: {
        if (empty($src)) return;
        if (empty($title) && !empty($alt)) $title = $alt;

        if ($config !== null && in_array('lazyImg', $config)) {
            echo '<img' . $lazySrc . 'lazy-src="' . $src .  (empty($alt) ? '' : ('" alt="' . $alt)) . (empty($title) ? '' : ('" title="' . $title)) . '" />';
        } else
            echo '<img src="' . $src . (empty($alt) ? '' : ('" alt="' . $alt)) . (empty($title) ? '' : ('" title="' . $title)) . '" />';
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
        $browserVersion = 'Email APP';
    } else if (preg_match('/2345Explorer/i', $agent, $regs)) {
        $browserVersion = '2345 Explorer';
    } else if (preg_match('/Sleipnir/i', $agent, $regs)) {
        $browserVersion = '神马';
    } else if (preg_match('/YaBrowser/i', $agent, $regs)) {
        $browserVersion = 'Yandex';
    } else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $browserVersion = 'Opera';
    } else if (preg_match('/MZBrowser/i', $agent, $regs)) {
        $browserVersion = 'MZ Browser';
    } else if (preg_match('/VivoBrowser/i', $agent, $regs)) {
        $browserVersion = 'vivo';
    } else if (preg_match('/Quark/i', $agent, $regs)) {
        $browserVersion = 'Quark';
    } else if (preg_match('/mixia/i', $agent, $regs)) {
        $browserVersion = '米侠';
    } else if (preg_match('/fusion/i', $agent, $regs)) {
        $browserVersion = '客户端';
    } else if (preg_match('/CoolMarket/i', $agent, $regs)) {
        $browserVersion = '基安内置';
    } else if (preg_match('/Thunder/i', $agent, $regs)) {
        $browserVersion = 'Thunder APP';
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
        $OSVersion = '<i class="iconfont icon-windows"></i>';
    } else if (preg_match('/android/i', $agent)) {
        $OSVersion = '<i class="iconfont icon-android"></i>';
    } else if (preg_match('/ubuntu/i', $agent)) {
        $OSVersion = '<i class="iconfont icon-linux"></i>';
    } else if (preg_match('/linux/i', $agent)) {
        $OSVersion = '<i class="iconfont icon-linux"></i>';
    } else if (preg_match('/iPhone/i', $agent)) {
        $OSVersion = '<i class="iconfont icon-iphone"></i> < 11';
    } else if (preg_match('/mac/i', $agent)) {
        $OSVersion = '<i class="iconfont icon-mac"></i>';
    } else if (preg_match('/fusion/i', $agent)) {
        $OSVersion = '<i class="iconfont icon-android"></i>';
    } else {
        $OSVersion = '404 OS';
    }
    echo $OSVersion;
}

function getRandomPosts($limit = 5)
{
    $db = Typecho_Db::get();

    $adapterName = $db->getAdapterName();
    $rand = "RAND()";

    if ($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite')
        $rand = 'RANDOM()';

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
{
}

function thumbUp()
{
}
