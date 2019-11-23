<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function CDNUrl($path)
{
  $type = Typecho_Widget::widget('Widget_Options')->CDN;

  $CDN = [
    'local' => Typecho_Widget::widget('Widget_Options')->themeUrl,
    'jsdelivr' =>  'https://cdn.jsdelivr.net/npm/typecho-theme-sagiri@' . __THEME_VERSION__,
  ];

  echo $CDN[$type] . '/' . $path;
};
