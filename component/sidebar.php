<? if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<aside id="sidebar" class="sidebar">
    <div class="sidebar-inner <? if (empty($this->options->StyleSettings) || !in_array('Banner', $this->options->StyleSettings)) _e('affix'); ?>">
        <div class="sider-item">
            <ul class="sidebar-nav" text-center>
                <? if ($this->is('post')) : ?>
                    <li class="sidebar-nav-toc sidebar-nav-active"><? i18n('文章目录') ?></li>
                <? endif; ?>
                <li class="sidebar-nav-overview <? if ($this->is('index') || $this->is('page'))  _e('sidebar-nav-active'); ?>">
                    <? i18n('站点概览') ?>
                </li>
            </ul>
            <? if ($this->is('post')) : ?>
                <section class="post-toc-wrap sidebar-section-active">
                    <ul class="toc-list"></ul>
                </section>
            <? endif; ?>
            <section class="site-overview-wrap <? if ($this->is('index') || $this->is('page'))  _e('sidebar-section-active'); ?>" text-center>
                <div class="site-author" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                    <img src="<? $this->options->authorImage ? $this->options->authorImage() : CDNUrl('assert/img/author.jpg'); ?>" alt="author" class="site-author-image" itemprop="image">
                    <p class="site-author-name"><? $this->user->screenName(); ?></p>
                </div>
                <div class="author-social">
                    <ul class="author-social-links">
                        <? if ($this->options->GitHubLink) : ?>
                            <li>
                                <a href="<? $this->options->GitHubLink(); ?>" title="Github" alt="Github" aria-label="Github">
                                    <i class="iconfont icon-github jello-horizontal"></i>
                                </a>
                            </li>
                        <? endif; ?>
                        <? if ($this->options->TwitterLink) : ?>
                            <li>
                                <a href="<? $this->options->TwitterLink(); ?>" title="Twitter" alt="Twitter" aria-label="Twitter">
                                    <i class="iconfont jello-horizontal icon-twitter"></i>
                                </a>
                            </li>
                        <? endif; ?>
                        <? if ($this->options->QQLink) : ?>
                            <li>
                                <a href="<? $this->options->QQLink(); ?>" title="QQ" alt="QQ" aria-label="QQ">
                                    <i class="iconfont jello-horizontal icon-qq"></i>
                                </a>
                            </li>
                        <? endif; ?>
                        <li>
                            <a href="<? $this->options->feedUrl(); ?>" title="RSS" alt="RSS" aria-label="RSS">
                                <i class="iconfont jello-horizontal icon-rss"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="site-status">
                    <div class="site-status-posts site-status-item">
                        <a href="<? $this->options->rewrite ? $this->options->siteUrl('archive.html') : $this->options->siteUrl('index.php/archive.html') ?>">
                            <? Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                            <span class="site-state-item-count"><? $stat->publishedPostsNum() ?></span>
                            <span class="site-state-item-name"><? i18n('日志') ?></span>
                        </a>
                    </div>
                    <div class="site-status-categories site-status-item">
                        <a href="<? $this->options->rewrite ? $this->options->siteUrl('category.html') : $this->options->siteUrl('index.php/category.html') ?>">
                            <span class="site-state-item-count"><? $stat->categoriesNum() ?></span>
                            <span class="site-state-item-name"><? i18n('分类') ?></span>
                        </a>
                    </div>
                </div>
                <div class="cc-license" itemprop="license">
                    <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" class="cc-opacity" target="_blank" rel="noopener"><img src="<? $this->options->themeUrl('./assert/img/cc-by-nc-sa.png'); ?>" alt="Creative Commons"></a>
                </div>
            </section>
        </div>
        <? if (!empty($this->options->siderbarOption)) : ?>
            <div class="sider-item sider-other">
                <ul class="sidebar-nav" text-center>
                    <? if (in_array('TopViewPost', $this->options->siderbarOption)) : ?>
                        <li class="sidebar-nav-topview"><? i18n('热门文章') ?></li>
                    <? endif; ?>
                    <? if (in_array('topComnentPost', $this->options->siderbarOption)) : ?>
                        <li class="sidebar-nav-random"><? i18n('热评文章') ?></li>
                    <? endif; ?>
                    <? if (in_array('randomPost', $this->options->siderbarOption)) : ?>
                        <li class="sidebar-nav-random"><? i18n('随机文章') ?></li>
                    <? endif; ?>
                    <? if (in_array('recentComment', $this->options->siderbarOption)) : ?>
                        <? $this->widget('Widget_Comments_Recent', 'ignoreAuthor=true')->to($comments); ?>
                    <? endif; ?>
                </ul>
                <? if (in_array('TopViewPost', $this->options->siderbarOption)) : ?>
                    <section class="topview-post-wrap sidebar-section-active">
                        <? getTopView(); ?>
                    </section>
                <? endif; ?>
                <? if (in_array('topComnentPost', $this->options->siderbarOption)) : ?>
                    <section class="topcomment-post-wrap">
                        <? getTopCommentPosts(); ?>
                    </section>
                <? endif; ?>
                <? if (in_array('randomPost', $this->options->siderbarOption)) : ?>
                    <section class="random-post-wrap">
                        <? getRandomPosts(); ?>
                    </section>
                <? endif; ?>
            </div>
        <? endif; ?>
    </div>
</aside>