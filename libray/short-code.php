<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;


function replaceTag($content)
{
  $Widget_Options = Typecho_Widget::widget('Widget_Options');
  $themeUrl = $Widget_Options->themeUrl;

  $themeFeature = $Widget_Options->feature;
  if ($themeFeature !== null && in_array('lazyImg', $themeFeature)) {
    $content = imgToLay($content, $themeUrl);
  }

  $content = videoTagToHtml($content);

  echo $content;
}


function imgToLay($content, $themeUrl)
{
  $REG = '<img class="lazy-loader" lazy-src="$1" src="' . $themeUrl . '/assert/img/loader.gif' . '" alt="$2" title="$3" />';
  $content = preg_replace(
    "/<[img|IMG].*?src=[\'|\"](?<src>.*?)[\'|\"].*?alt=[\'|\"](?<alt>.*?)[\'|\"].*?title=[\'|\"](?<title>.*?)[\'|\"][\/|img|IMG]?>/sm",
    $REG,
    $content
  );
  return $content;
}

function videoTagToHtml($content)
{
  $replaceVMap =  array(
    array(
      'from' => '/<a href="(?:https?:\/\/)?(?:www\.)?(?:bilibili|b23)\.(?:tv|com)(?:\/video)?\/av(\d+).*?">bplayer<\/a>/',
      'to' =>
      '<div class="sagiri-video-wrapper bilibili embed-responsive embed-responsive-16by9">
        <iframe src="//player.bilibili.com/player.html?aid=$1&cid=126106723&page=1" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true"></iframe>
      </div>'

    ),
    array(
      'from' => '/<a href="(?:https?:\/\/)?(?:www\.)?(?:bilibili|b23)\.(?:tv|com)(?:\/video)?\/(.*)?">bplayer<\/a>/',
      'to' =>
      '<div class="sagiri-video-wrapper bilibili embed-responsive embed-responsive-16by9">
        <iframe src="//player.bilibili.com/player.html?bvid=$1&cid=126106723&page=1" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true"></iframe>
      </div>'

    ),
    array(
      'from' => '/<a href="\/(:*.*.(mp4|ogv|mov|webm))">lplayer<\/a>/',
      'to' =>
      '<div class="sagiri-video-wrapper local">
        <video controls preload  autobuffer>
          <source src="/$1" />
        </video>
      </div>'
    ),
    array(
      'from' => '/<a href="(?:https?:\/\/)?(?:www\.)?(?:youtube\/.com\/watch\?(?:\S*?&?v\=)|youtu\.be\/)([a-zA-Z0-9_-]{6,11})">yplayer<\/a>/',
      'to' =>
      '<div class="sagiri-video-wrapper youtube">
        <iframe src="https://www.youtube.com/embed/$1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>'
    ),
  );

  foreach ($replaceVMap as $_ => $value) {
    $content =   preg_replace(
      $value['from'],
      $value['to'],
      $content
    );
  }

  return $content;
}


function login2view($hasLogin = true, $content)
{
  if ($hasLogin) {
    $content = preg_replace("/\[lhide\](.*?)\[\/lhide\]/sm", '$1', $content);
  } else {
    $content = preg_replace("/\[lhide\](.*?)\[\/lhide\]/sm", '<div class="login2view">隐藏内容登陆可见。</div>', $content);
  }
  return $content;
}

function reply2view($content) // 伪
{
  $content = preg_replace("/\[rhide\](.*?)\[\/rhide\]/sm", '$1', $content);
  $content = preg_replace("/\[rhide\](.*?)\[\/rhide\]/sm", '<div class="reply2view">隐藏内容回复可见。</div>', $content);

  return $content;
}


function shortTag($content)
{
  $content = preg_replace("/\[button\s*(.*?)\](.*?)\[\/button\]/sm", '<button class="$1">$2</button>', $content);
  $content = preg_replace("/\[i-button\s*(.*?)\](.*?)\[\/i-button\]/sm", '<div class="$1">$2</div>', $content);
  $content = preg_replace("/\[tip\s*(.*?)\](.*?)\[\/tip\]/sm", '<div class="$1">$2</div>', $content);

  return $content;
}
