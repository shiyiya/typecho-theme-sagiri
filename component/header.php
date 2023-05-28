<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!DOCTYPE HTML>
<html class="no-js" lang="<?php i18nLang() ?>">

<head>

    <meta charset="<?php $this->options->charset(); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, shrink-to-fit=no" />
    <title><?php $this->archiveTitle(array(
                'category' => _i18n('分类 %s 下的文章'),
                'search' => _i18n('包含关键字 %s 的文章'),
                'tag' => _i18n('标签 %s 下的文章'),
                'author' => _i18n('%s 发布的文章')
            ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <meta name="author" content="<?php $this->author() ?>" />
    <?php $this->header('generator=&pingback=&xmlrpc=&wlw='); ?>
    <link rel="icon" href="<?php $this->options->fav ? $this->options->fav() : CDNUrl('assets/img/favicon.jpg'); ?>" />
    <link rel="manifest" href="<?php $this->options->themeUrl('util/sw/manifest.json'); ?>" />

    <!-- About IOS -->
    <meta name="format-detection" content="telephone=no">

    <!-- IOS Config -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="white" />
    <meta name="apple-mobile-web-app-title" content="<?php $this->options->title() ?>" />
    <meta name="theme-color" content="#40b3ec" />
    <link rel="apple-touch-icon" sizes="57x57 72x72 114x114 144x144" href="<?php $this->options->fav ? $this->options->fav() : CDNUrl('assets/img/favicon.jpg'); ?>" />

    <!-- Disable Baidu transformation -->
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

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

    <!-- QQ Share -->
    <meta itemprop="name" content="<?php $this->options->title() ?>" />
    <meta itemprop="description" name="description" content=" <?php $this->description() ?>" />
    <meta itemprop="image" content="<?php $this->options->authorImage ? $this->options->authorImage() : CDNUrl('assets/img/author.jpg'); ?>" />

    <!-- CSS Style -->
    <link async rel="stylesheet" href="<?php CDNUrl('css/mix.min.css'); ?>" />

    <!-- Prism -->
    <?php if (!empty($this->options->feature) && in_array('codeHighlight', $this->options->feature)) : ?>
        <link href="<?php CDNUrl('js/lib/prism/prism-' . $this->options->codeHighlightTheme . '.css'); ?>" rel="stylesheet" />
        <link href="<?php CDNUrl('js/lib/prism/prism-toolbar.css'); ?>" rel="stylesheet" />
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

    <svg style="display:none">
        <defs>
            <g id="start-page"><svg viewBox="0 0 1024 1024"><path d="M512 165c191.6 0 347 155.3 347 347S703.6 859 512 859 165 703.6 165 512s155.4-347 347-347m0-100.4C265.3 64.6 64.6 265.3 64.6 512S265.3 959.4 512 959.4 959.4 758.7 959.4 512 758.7 64.6 512 64.6z"></path><path d="M512 709.1c-34.4 0-66.7-10.2-90.7-28.6-22-16.9-26.2-48.4-9.3-70.4 16.9-22 48.5-26.1 70.4-9.3 5 3.8 15.4 7.9 29.6 7.9 14.2 0 24.6-4.1 29.6-7.9 22-16.9 53.5-12.7 70.4 9.3 16.9 22 12.7 53.5-9.3 70.4-24.1 18.4-56.3 28.6-90.7 28.6z"></path><path d="M346.8 352.3c-27.7 0-50.2 22.5-50.2 50.2v47.2c0 27.7 22.5 50.2 50.2 50.2s50.2-22.5 50.2-50.2v-47.2c0.1-27.7-22.4-50.2-50.2-50.2zM677.2 352.3c-27.7 0-50.2 22.5-50.2 50.2v47.2c0 27.7 22.5 50.2 50.2 50.2s50.2-22.5 50.2-50.2v-47.2c0-27.7-22.5-50.2-50.2-50.2z"></path></svg></g>
            <g id="关于"><use xlink:href="#start-page" /></g>
            <g id="archive"><svg viewBox="0 0 22 22"><path fill="currentColor" d="M6 6h11.17l1 1l-1 1H6V6zm12 10H6.83l-1-1l1-1H18v2z" opacity=".3"></path><path fill="currentColor" d="M13 10h5l3-3l-3-3h-5V2h-2v2H4v6h7v2H6l-3 3l3 3h5v4h2v-4h7v-6h-7v-2zM6 6h11.17l1 1l-1 1H6V6zm12 10H6.83l-1-1l1-1H18v2z"></path></svg></g>
            <g id="时间轴"><use xlink:href="#archive" /></g>
            <g id="category"><svg viewBox="0 0 22 22"><path fill="currentColor" d="M6 22a3 3 0 0 1-3-3c0-.6.18-1.16.5-1.63L9 7.81V6a1 1 0 0 1-1-1V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1v1.81l5.5 9.56c.32.47.5 1.03.5 1.63a3 3 0 0 1-3 3H6m-1-3a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1c0-.21-.07-.41-.18-.57l-2.29-3.96L14 17l-5.07-5.07l-3.75 6.5c-.11.16-.18.36-.18.57m8-9a1 1 0 0 0-1 1a1 1 0 0 0 1 1a1 1 0 0 0 1-1a1 1 0 0 0-1-1Z"></path></svg></g>
            <g id="分类"><use xlink:href="#category" /></g>
            <g id="search"><svg viewBox="0 0 1024 1024"><path d="M469.333333 768c-166.4 0-298.666667-132.266667-298.666666-298.666667s132.266667-298.666667 298.666666-298.666666 298.666667 132.266667 298.666667 298.666666-132.266667 298.666667-298.666667 298.666667z m0-85.333333c119.466667 0 213.333333-93.866667 213.333334-213.333334s-93.866667-213.333333-213.333334-213.333333-213.333333 93.866667-213.333333 213.333333 93.866667 213.333333 213.333333 213.333334z m251.733334 0l119.466666 119.466666-59.733333 59.733334-119.466667-119.466667 59.733334-59.733333z"></path></svg></g>
            <g id="搜索"><use xlink:href="#search" /></g>
        </defs>
    </svg>

    <!-- Custom Style -->
    <?php if (!empty($this->options->customCss)) : ?>
        <?php _e($this->options->customCss) ?>
    <?php endif; ?>
</head>

<body>
    <div id="root">
        <header id="header">
            <nav role="navigation" class="site-nav">
                <ul id='menu' class="menu">
                    <li class="menu-item">
                        <a <?php if ($this->is('index')) : ?> class="current" <?php endif; ?> href="<?php $this->options->siteUrl(); ?>">
                            <svg width="1em" height="1em" viewBox="0 0 512 512" class="inline"><path fill="currentColor" d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"></path></svg>
                            <?php i18n('首页'); ?>
                        </a>
                    </li>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while ($pages->next()) : ?>
                        <li class="menu-item">
                            <a <?php if ($this->is('page', $pages->slug)) : ?> class="current" <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>" rel="section">
                                <?php if(in_array($pages->title, array('关于', 'about' , '时间轴', 'archive', '分类', 'category','search','搜索'))) : ?>
                                    <svg width="1em" height="1em">
                                        <use xlink:href="#<?php $pages->title(); ?>" />
                                    </svg>
                                <?php endif; ?>
                                <?php i18n($pages->title); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    <li class="menu-item search">
                        <a href="<?php $this->options->rewrite ?  $this->options->siteUrl('search.html') : $this->options->siteUrl('index.php/search.html') ?>" alt="<?php i18n('搜索') ?>" aria-label="<?php i18n('搜索') ?>">
                            <svg width="1em" height="1em">
                                <use xlink:href="#<?php $pages->title(); ?>" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="header-wrap">
                <?php if (!empty($this->options->StyleSettings) && in_array('Banner', $this->options->StyleSettings)) : ?>
                    <div class="site-config" style="background-image:url(<?php $this->options->backGroundImage ? $this->options->backGroundImage() : CDNUrl('assets/img/banner.jpg') ?>)">
                        <div class="site-config-wrap">
                            <div class="animated">
                                <h2 class="site-title"><?php $this->options->title() ?></h2>
                                <span class="site-meta"><?php $this->options->description() ?></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </header>
