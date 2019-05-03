<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js" lang="Zh-CN">
<head>

    <meta charset="<?php $this->options->charset(); ?>" />


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <title><?php $this->archiveTitle(array(
                'category'  =>  _t('分类 %s 下的文章'),
                'search'    =>  _t('包含关键字 %s 的文章'),
                'tag'       =>  _t('标签 %s 下的文章'),
                'author'    =>  _t('%s 发布的文章')
            ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <meta name="author" content="<?php $this->author() ?>" />
    <?php $this->header('generator=&pingback=&xmlrpc=&wlw='); ?>
    <link rel="icon" href="<?php $this->options->fav() or $this->options->themeUrl('favicon.jpg'); ?>" />

    <!-- About IOS -->
    <meta name="format-detection" content="telephone=no">

    <!-- IOS Config -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="white" />
    <meta name="apple-mobile-web-app-title" content="<?php $this->options->title() ?>" />
    <meta name="theme-color" content="<?php $this->options->themeColor ? $this->options->themeColor() : _e('#fff') ?>" />
    <link rel="apple-touch-icon" sizes="32x32 58x58 72x72 96x96 114x114" href="<?php $this->options->IOSIcon(); ?>" />

    <!-- Disable Baidu transformation -->
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <!-- Disable Baidu snapshot -->
    <meta name="Baiduspider" content="noarchive" />


    <!-- OGP https://www.ogp.me/ -->
    <?php if ($this->is('post') || $this->is('page')) : ?>
        <meta property="og:url" content="<?php $this->permalink() ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php $this->title() ?>" />
        <meta property="og:author" content="<?php $this->author(); ?>" />
        <meta property="og:site_name" content="<?php $this->options->title() ?>" />
        <meta property="og:description" content=" <?php $this->description() ?>" />
        <meta property="og:locale:alternate" content="zh_CN" />
    <?php endif; ?>

    <!-- CSS Style -->
    <link async rel="stylesheet" href="<?php $this->options->themeUrl('./css/base.min.css'); ?>" />
    <link async rel="stylesheet" href="<?php $this->options->themeUrl('./css/index.min.css'); ?>" />
    <link async rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('./css/iconfont.min.css'); ?>" />

    <!-- Custom Style -->
    <?php _e($this->options->customCss) ?>

    <!-- Prism -->
    <?php if (!empty($this->options->feature) && in_array('codeHighlight', $this->options->feature)) : ?>
        <link href="<?php $this->options->themeUrl('./lib/prism/' . $this->options->codeHighlightTheme . '/prism.css'); ?>" rel="stylesheet" />
    <?php endif; ?>

    <!-- OwO emoji style -->
    <?php if (!empty($this->options->feature) && in_array('commentEmoji', $this->options->feature) && $this->allow('comment')) : ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('./lib/OwO/OwO.min.css'); ?>">
    <?php endif; ?>

    <?php if (empty($this->options->StyleSettings) || !in_array('Banner', $this->options->StyleSettings)) : ?>
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
    <?php endif; ?>
</head>

<body>
    <div id="root">
        <header id="header">
            <nav role="navigation" class="site-nav">
                <ul id='menu' class="menu">
                    <li class="menu-item">
                        <a <?php if ($this->is('index')) : ?> class="current" <?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('<i class="iconfont icon-Home"></i>Home'); ?></a>
                    </li>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while ($pages->next()) : ?>
                        <li class="menu-item">
                            <a <?php if ($this->is('page', $pages->slug)) : ?> class="current" <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>" rel="section"><i class="iconfont icon-<?php $pages->title(); ?>"></i><?php $pages->title(); ?></a>
                        </li>
                    <?php endwhile; ?>
                    <li class="menu-item search">
                        <a href="<?php $this->options->rewrite ?  $this->options->siteUrl('search.html') : $this->options->siteUrl('index.php/search.html') ?>"><i class="iconfont icon-search"></i></a>
                    </li>
                </ul>
            </nav>

            <div class="header-wrap">
                <?php if (!empty($this->options->StyleSettings) && in_array('Banner', $this->options->StyleSettings)) : ?>
                    <div class="site-config" style="background-image:url(<?php $this->options->backGroundImage ? $this->options->backGroundImage() : _e('https://i.loli.net/2018/10/05/5bb7144897e8c.jpg') ?>)">
                        <div class="site-meta">
                            <div class="site-title"><?php $this->options->title(); ?></div>
                            <div class="site-description"><?php $this->options->description(); ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>


        </header>