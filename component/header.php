<? if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!DOCTYPE HTML>
<html class="no-js" lang="<? i18nLang() ?>">

<head>

    <meta charset="<? $this->options->charset(); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, shrink-to-fit=no" />
    <title><? $this->archiveTitle(array(
                'category' => _i18n('分类 %s 下的文章'),
                'search' => _i18n('包含关键字 %s 的文章'),
                'tag' => _i18n('标签 %s 下的文章'),
                'author' => _i18n('%s 发布的文章')
            ), '', ' - '); ?><? $this->options->title(); ?></title>

    <meta name="author" content="<? $this->author() ?>" />
    <? $this->header('generator=&pingback=&xmlrpc=&wlw='); ?>
    <link rel="icon" href="<? $this->options->fav ? $this->options->fav() : CDNUrl('assert/img/favicon.jpg'); ?>" />
    <link rel="manifest" href="<? CDNUrl('util/sw/manifest.json') ?>" />

    <!-- About IOS -->
    <meta name="format-detection" content="telephone=no">

    <!-- IOS Config -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="white" />
    <meta name="apple-mobile-web-app-title" content="<? $this->options->title() ?>" />
    <meta name="theme-color" content="<? $this->options->themeColor ? $this->options->themeColor() : _e('#fff') ?>" />
    <link rel="apple-touch-icon" sizes="32x32 58x58 72x72 96x96 114x114" href="<? $this->options->IOSIcon(); ?>" />

    <!-- Disable Baidu transformation -->
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <!-- OGP https://www.ogp.me/ -->
    <? if ($this->is('post') || $this->is('page')) : ?>
        <meta property="og:url" content="<? $this->permalink() ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<? $this->title() ?>" />
        <meta property="og:author" content="<? $this->author(); ?>" />
        <meta property="og:site_name" content="<? $this->options->title() ?>" />
        <meta property="og:description" content=" <? $this->description() ?>" />
        <meta property="og:locale:alternate" content="zh_CN" />
    <? endif; ?>

    <!-- CSS Style -->
    <link async rel="stylesheet" href="<? CDNUrl('./css/mix.min.css'); ?>" />
    <link async rel="stylesheet" type="text/css" href="<? CDNUrl('./css/iconfont.min.css'); ?>" />

    <!-- Prism -->
    <? if (!empty($this->options->feature) && in_array('codeHighlight', $this->options->feature)) : ?>
        <link href="<? CDNUrl('./js/lib/prism/' . $this->options->codeHighlightTheme . '/prism.css'); ?>" rel="stylesheet" />
    <? endif; ?>

    <!-- OwO emoji style -->
    <? if (!empty($this->options->feature) && in_array('commentEmoji', $this->options->feature) && $this->allow('comment')) : ?>
        <link rel="stylesheet" href="<? CDNUrl('./js/lib/OwO/OwO.min.css'); ?>">
    <? endif; ?>

    <? if (empty($this->options->StyleSettings) || !in_array('Banner', $this->options->StyleSettings)) : ?>
        <style>
            .header-wrap {
                height: 70px;
            }

            .site-nav {
                background: rgba(255, 255, 255, .8);
                box-shadow: 0 0 2px 2px rgba(172, 172, 172, .4);
            }

            .sidebar-inner.affix {
                top: 70px;
            }

            @media (max-width: 991px) {
                .content-wrap {
                    min-height: 720px;
                }
            }
        </style>
    <? endif; ?>

    <!-- Custom Style -->
    <? _e($this->options->customCss) ?>
</head>

<body>
    <div id="root">
        <header id="header">
            <nav role="navigation" class="site-nav">
                <ul id='menu' class="menu">
                    <li class="menu-item">
                        <a <? if ($this->is('index')) : ?> class="current" <? endif; ?> href="<? $this->options->siteUrl(); ?>">
                            <? _e('<i class="iconfont icon-Home"></i>');
                            i18n('首页');
                            ?>
                        </a>
                    </li>
                    <? $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <? while ($pages->next()) : ?>
                        <li class="menu-item">
                            <a <? if ($this->is('page', $pages->slug)) : ?> class="current" <? endif; ?> href="<? $pages->permalink(); ?>" title="<? $pages->title(); ?>" rel="section"><i class="iconfont icon-<? $pages->title(); ?>"></i>
                                <? i18n($pages->title); ?>
                            </a>
                        </li>
                    <? endwhile; ?>
                    <li class="menu-item search">
                        <a href="<? $this->options->rewrite ?  $this->options->siteUrl('search.html') : $this->options->siteUrl('index.php/search.html') ?>" alt="<? i18n(搜索) ?>" aria-label="Search"><i class="iconfont icon-search"></i></a>
                    </li>
                </ul>
            </nav>

            <div class="header-wrap">
                <? if (!empty($this->options->StyleSettings) && in_array('Banner', $this->options->StyleSettings)) : ?>
                    <div class="site-config" style="background-image:url(<? $this->options->backGroundImage ? $this->options->backGroundImage() : CDNUrl('assert/img/banner.jpg') ?>)">
                        <div class="site-config-wrap">
                            <div class="animated">
                                <h2 class="site-title"><? $this->options->title() ?></h2>
                                <span class="site-meta"><?php $this->options->description() ?></span>
                            </div>
                        </div>
                    </div>
                <? endif; ?>
            </div>
        </header>