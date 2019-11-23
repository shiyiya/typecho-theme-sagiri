<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<aside id="sidebar" class="sidebar">
    <div class="sidebar-inner <?php if (empty($this->options->StyleSettings) || !in_array('Banner', $this->options->StyleSettings)) _e('affix'); ?>">
        <div class="sider-item">
            <ul class="sidebar-nav" text-center>
                <?php if ($this->is('post')) : ?>
                    <li class="sidebar-nav-toc sidebar-nav-active"><?php i18n('文章目录') ?></li>
                <?php endif; ?>
                <li class="sidebar-nav-overview <?php if ($this->is('index') || $this->is('page'))  _e('sidebar-nav-active'); ?>">
                    <?php i18n('站点概览') ?>
                </li>
            </ul>
            <?php if ($this->is('post')) : ?>
                <section class="post-toc-wrap sidebar-section-active">
                    <ul class="toc-list"></ul>
                </section>
            <?php endif; ?>
            <section class="site-overview-wrap <?php if ($this->is('index') || $this->is('page'))  _e('sidebar-section-active'); ?>" text-center>
                <div class="site-author" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                    <img src="<?php $this->options->authorImage ? $this->options->authorImage() : CDNUrl('assert/img/author.jpg'); ?>" alt="author" class="site-author-image" itemprop="image">
                    <p class="site-author-name"><?php $this->user->screenName(); ?></p>
                </div>
                <div class="author-social">
                    <ul class="author-social-links">
                        <?php if ($this->options->GitHubLink) : ?>
                            <li>
                                <a href="<?php $this->options->GitHubLink(); ?>" title="Github" alt="Github" aria-label="Github">
                                    <i class="iconfont icon-github jello-horizontal"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->options->TwitterLink) : ?>
                            <li>
                                <a href="<?php $this->options->TwitterLink(); ?>" title="Twitter" alt="Twitter" aria-label="Twitter">
                                    <i class="iconfont jello-horizontal icon-twitter"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->options->QQLink) : ?>
                            <li>
                                <a href="<?php $this->options->QQLink(); ?>" title="QQ" alt="QQ" aria-label="QQ">
                                    <i class="iconfont jello-horizontal icon-qq"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php $this->options->feedUrl(); ?>" title="RSS" alt="RSS" aria-label="RSS">
                                <i class="iconfont jello-horizontal icon-rss"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="site-status">
                    <div class="site-status-posts site-status-item">
                        <a href="<?php $this->options->rewrite ? $this->options->siteUrl('archive.html') : $this->options->siteUrl('index.php/archive.html') ?>">
                            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                            <span class="site-state-item-count"><?php $stat->publishedPostsNum() ?></span>
                            <span class="site-state-item-name"><?php i18n('日志') ?></span>
                        </a>
                    </div>
                    <div class="site-status-categories site-status-item">
                        <a href="<?php $this->options->rewrite ? $this->options->siteUrl('category.html') : $this->options->siteUrl('index.php/category.html') ?>">
                            <span class="site-state-item-count"><?php $stat->categoriesNum() ?></span>
                            <span class="site-state-item-name"><?php i18n('分类') ?></span>
                        </a>
                    </div>
                </div>
                <div class="cc-license" itemprop="license">
                    <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" class="cc-opacity" target="_blank" rel="noopener"><img src="<?php $this->options->themeUrl('./assert/img/cc-by-nc-sa.png'); ?>" alt="Creative Commons"></a>
                </div>
            </section>
        </div>
        <?php if (!empty($this->options->siderbarOption)) : ?>
            <div class="sider-item sider-other">
                <ul class="sidebar-nav" text-center>
                    <?php if (in_array('TopViewPost', $this->options->siderbarOption)) : ?>
                        <li class="sidebar-nav-topview"><?php i18n('热门文章') ?></li>
                    <?php endif; ?>
                    <?php if (in_array('topComnentPost', $this->options->siderbarOption)) : ?>
                        <li class="sidebar-nav-random"><?php i18n('热评文章') ?></li>
                    <?php endif; ?>
                    <?php if (in_array('randomPost', $this->options->siderbarOption)) : ?>
                        <li class="sidebar-nav-random"><?php i18n('随机文章') ?></li>
                    <?php endif; ?>
                    <?php if (in_array('recentComment', $this->options->siderbarOption)) : ?>
                        <?php $this->widget('Widget_Comments_Recent', 'ignoreAuthor=true')->to($comments); ?>
                    <?php endif; ?>
                </ul>
                <?php if (in_array('TopViewPost', $this->options->siderbarOption)) : ?>
                    <section class="topview-post-wrap sidebar-section-active">
                        <?php getTopView(); ?>
                    </section>
                <?php endif; ?>
                <?php if (in_array('topComnentPost', $this->options->siderbarOption)) : ?>
                    <section class="topcomment-post-wrap">
                        <?php getTopCommentPosts(); ?>
                    </section>
                <?php endif; ?>
                <?php if (in_array('randomPost', $this->options->siderbarOption)) : ?>
                    <section class="random-post-wrap">
                        <?php getRandomPosts(); ?>
                    </section>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</aside>