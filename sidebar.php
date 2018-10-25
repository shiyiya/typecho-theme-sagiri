<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<aside id="sidebar" class="sidebar" >
    <div class="sidebar-inner">
        <ul class="sidebar-nav" text-center>
            <?php if($this->is('post')) :?>
            <li class="sidebar-nav-toc sidebar-nav-active">文章目录</li>
            <?php endif; ?>
            <li class="sidebar-nav-overview <?php  if($this->is('index') || $this->is('page'))  _e('sidebar-nav-active'); ?>">站点概览</li>
        </ul>
        <?php if($this->is('post')) :?>
        <section class="post-toc-wrap sidebar-section-active">
            <ol class="toc-nav"></ol>
        </section>
         <?php endif; ?>
        <section class="site-overview-wrap <?php  if($this->is('index') || $this->is('page'))  _e('sidebar-section-active'); ?>" text-center>
            <div class="site-author" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                <img src="<?php $this->options->authorImage ? $this->options->authorImage() : $this->options->themeUrl('./img/author.jpg'); ?>" alt="author" class="site-author-image" itemprop="image" >
                <p class="site-author-name"><?php $this->user->screenName(); ?></p>
            </div>
            <div class="author-social">
                    <ul class="author-social-links">
                        <li>
                            <a href="<?php $this->options->GitHubLink(); ?>" title="Github">
                                <i class="iconfont icon-github"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php $this->options->TwitterLink(); ?>" title="Twitter">
                                <i class="iconfont icon-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php $this->options->QQLink(); ?>" title="QQ">
                                <i class="iconfont icon-qq"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php $this->options->feedUrl(); ?>" title="RSS">
                                <i class="iconfont icon-rss"></i>
                            </a>
                        </li>
                        </ul>
                </div>
                <div class="site-status">
                    <div class="site-status-posts site-status-item">
                        <a href="<?php $this->options->isRewrite == 'able' ? $this->options->siteUrl('archive.html') : $this->options->siteUrl('index.php/archive.html') ?>">
                            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                            <span class="site-state-item-count"><?php $stat->publishedPostsNum() ?></span>
                            <span class="site-state-item-name">日志</span>
                        </a>
                    </div>
                    <div class="site-status-categories site-status-item">
                        <a href="<?php $this->options->isRewrite == 'able' ? $this->options->siteUrl('category.html') : $this->options->siteUrl('index.php/category.html') ?>">
                            <span class="site-state-item-count"><?php $stat->categoriesNum() ?></span>
                            <span class="site-state-item-name">分类</span>
                        </a>
                    </div>
                </div>
            <div class="cc-license" itemprop="license">
                <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" class="cc-opacity" target="_blank" rel="noopener"><img src="<?php $this->options->themeUrl('./img/cc-by-nc-sa.png'); ?>" alt="Creative Commons"></a>
            </div>
        </section>
    </div>
    <!-- <div class="sidebar-inner"> 
        <span class="siderbar-item-nav">浏览排行</span>
    </div> -->
</aside>

<?php if($this->is('post') || $this->is('page')): ?>
<script defer src="<?php $this->options->themeUrl('js/sidebar.js'); ?>"></script>
<?php endif; ?>
