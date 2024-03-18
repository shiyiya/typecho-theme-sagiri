<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function CDNUrl($path)
{
  $type = Typecho_Widget::widget('Widget_Options')->CDN;

  $CDN = [
    'local' => Typecho_Widget::widget('Widget_Options')->themeUrl,
    'jsdelivr' =>  'https://cdn.jsdelivr.net/npm/@bylin/typecho-theme-sagiri@' . __THEME_VERSION__,
    //  'sourcegcdn' =>  'https://npm.sourcegcdn.com/@bylin/typecho-theme-sagiri@' . __THEME_VERSION__,
    'sourcegcdn' =>  'https://gh.sourcegcdn.com/shiyiya/typecho-theme-sagiri/v' . __THEME_VERSION__,
    'fivecdn' => 'https://mecdn.mcserverx.com/npm/@bylin/typecho-theme-sagiri@' . __THEME_VERSION__,
  ];

  echo $CDN[$type] . '/' . $path;
};
