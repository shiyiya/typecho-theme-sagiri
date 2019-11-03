<? if (!defined('__TYPECHO_ROOT_DIR__')) exit;

require_once 'utils.php';


function replaceTag($content, $themeUrl = '')
{
  $config = Typecho_Widget::widget('Widget_Options')->feature;

  if ($config !== null && in_array('lazyImg', $config)) {
    $content = imgToLay($content, $themeUrl);
  }

  // TODO ADD short code
  /* $replaceVMap =  array(
        array(
            'from' => '/<a href="(?:https?:\/\/)?(?:www\.)?(?:bilibili|b23)\.(?:tv|com)(?:\/video)?\/av(\d+).*?">bplayer<\/a>/sm',
            'to' =>      '<div class="video-plugin-container bilibili embed-responsive embed-responsive-16by9">' +
                '<iframe src="//player.bilibili.com/player.html?aid=$1&cid=105486090&page=1" scrolling="no" border="0" frameborder="no" framespacing="0"></iframe>' +
                '</div>'
        ),
        array(
            'from' => '/<a href="\/(:*.*.(mp4|ogv|mov|webm))">lplayer<\/a>/',
            'to' =>       '<div class="video-plugin-container local">' +
                '<video controls preload  autobuffer>' +
                '<source src="/$1" />' +
                '</video>' +
                '</div>'
        ),
        array(
            'from' => '/<a href="(?:https?:\/\/)?(?:www\.)?(?:youtube\/.com\/watch\?(?:\S*?&?v\=)|youtu\.be\/)([a-zA-Z0-9_-]{6,11})">yplayer<\/a>/',
            'to' =>       '<div class="video-plugin-container local">' +
                '<iframe src="https://www.youtube.com/embed/$1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' +
                '</div>'
        ),
    );

    foreach ($replaceVMap as $_ => $value) {
        echo $value['from'];
        $content =   preg_replace(
            $value['from'],
            $value['to'],
            $content
        );
    } */


  /*  echo preg_replace( '/<a href="(?:https?:\/\/)?(?:www\.)?(?:bilibili|b23)\.(?:tv|com)(?:\/video)?\/av(\d+).*?">bplayer<\/a>/',
 '<div class="video-plugin-container bilibili embed-responsive embed-responsive-16by9">' .
 '<iframe src="//player.bilibili.com/player.html?aid=$1&cid=105486090&page=1" scrolling="no" border="0" frameborder="no" framespacing="0"></iframe>' .
 '</div>','<a href="https://b23.tv/av60602300">bplayer</a>')
; */
  /*     if ($hasLogin) {
        $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm", '$1', $content);
    } else {
        $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm", '<div class="reply2view">隐藏内容评论回复可见。</div>', $content);
    } */
  /* $content = preg_replace("/\[button\s*(.*?)\](.*?)\[\/button\]/sm",'<button class="$1">$2</button>',$content);
    $content = preg_replace("/\[i-button\s*(.*?)\](.*?)\[\/i-button\]/sm",'<div class="$1">$2</div>', $content);
    $content = preg_replace("/\[tip\s*(.*?)\](.*?)\[\/tip\]/sm",'<div class="$1">$2</div>', $content); */

  echo $content;
}
