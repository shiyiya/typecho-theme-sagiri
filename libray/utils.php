<? if (!defined('__TYPECHO_ROOT_DIR__')) exit;

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
