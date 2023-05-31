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
                    <img src="<?php $this->options->authorImage ? $this->options->authorImage() : CDNUrl('assets/img/author.jpg'); ?>" alt="author" class="site-author-image" itemprop="image">
                    <p class="site-author-name"><?php $this->user->screenName(); ?></p>
                </div>
                <div class="author-social">
                    <ul class="author-social-links">
                        <?php if ($this->options->GitHubLink) : ?>
                            <li>
                                <a href="<?php $this->options->GitHubLink(); ?>" title="Github" alt="Github" aria-label="Github">
                                    <svg viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.976 0A7.977 7.977 0 0 0 0 7.976c0 3.522 2.3 6.507 5.431 7.584c.392.049.538-.196.538-.392v-1.37c-2.201.49-2.69-1.076-2.69-1.076c-.343-.93-.881-1.175-.881-1.175c-.734-.489.048-.489.048-.489c.783.049 1.224.832 1.224.832c.734 1.223 1.859.88 2.3.685c.048-.538.293-.88.489-1.076c-1.762-.196-3.621-.881-3.621-3.964c0-.88.293-1.566.832-2.153c-.05-.147-.343-.978.098-2.055c0 0 .685-.196 2.201.832c.636-.196 1.322-.245 2.007-.245s1.37.098 2.006.245c1.517-1.027 2.202-.832 2.202-.832c.44 1.077.146 1.908.097 2.104a3.16 3.16 0 0 1 .832 2.153c0 3.083-1.86 3.719-3.62 3.915c.293.244.538.733.538 1.467v2.202c0 .196.146.44.538.392A7.984 7.984 0 0 0 16 7.976C15.951 3.572 12.38 0 7.976 0z" clip-rule="evenodd"></path></svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->options->TwitterLink) : ?>
                            <li>
                                <a href="<?php $this->options->TwitterLink(); ?>" title="Twitter" alt="Twitter" aria-label="Twitter">
                                    <svg viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23Z"></path></svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->options->QQLink) : ?>
                            <li>
                                <a href="<?php $this->options->QQLink(); ?>" title="QQ" alt="QQ" aria-label="QQ">
                                    <svg viewBox="0 0 48 48"><g><path d="M23.794 44.518c-3.659 0-7.017-1.225-9.179-3.053c-1.098.328-2.502.855-3.389 1.51c-.759.56-.664 1.13-.527 1.361c.6 1.013 10.296.647 13.095.332v-.15Zm0 0c3.659 0 7.016-1.225 9.179-3.053c1.097.328 2.502.855 3.389 1.51c.758.56.663 1.13.526 1.361c-.6 1.013-10.295.647-13.094.332v-.15Z"></path><path d="M23.814 22.591c6.042-.04 10.884-1.21 12.525-1.658c.39-.107.6-.3.6-.3c.001-.055.025-.983.025-1.462c0-8.066-3.808-16.17-13.172-16.171c-9.364 0-13.171 8.105-13.171 16.171c0 .48.023 1.407.025 1.462c0 0 .17.18.481.267c1.515.421 6.448 1.65 12.643 1.691h.044Zm16.418 6.72c-.375-1.206-.886-2.61-1.404-3.96c0 0-.297-.037-.448.006c-4.645 1.35-10.275 2.21-14.566 2.158h-.044c-4.267.05-9.858-.8-14.488-2.136c-.177-.05-.526-.029-.526-.029c-.518 1.35-1.029 2.756-1.403 3.96c-1.786 5.748-1.208 8.126-.767 8.18c.945.114 3.68-4.327 3.68-4.327c0 4.513 4.073 11.441 13.403 11.505h.247c9.329-.064 13.403-6.992 13.403-11.505c0 0 2.734 4.44 3.68 4.327c.44-.054 1.019-2.432-.767-8.18Z"></path><path d="M20.46 14.916c-1.27.057-2.355-1.39-2.423-3.23c-.07-1.84.904-3.378 2.174-3.436c1.27-.057 2.354 1.39 2.423 3.23c.07 1.84-.904 3.38-2.174 3.436Zm9.088-3.23c-.068 1.84-1.153 3.287-2.424 3.23c-1.27-.057-2.242-1.595-2.173-3.436c.069-1.84 1.154-3.286 2.423-3.23c1.27.058 2.243 1.596 2.174 3.437Zm2.257 5.828c-.34-.751-3.758-1.59-7.99-1.59h-.046c-4.232 0-7.65.839-7.99 1.59a.253.253 0 0 0-.025.108c0 .052.017.102.047.145c.286.416 4.082 2.477 7.968 2.477h.046c3.886 0 7.682-2.06 7.968-2.477a.256.256 0 0 0 .047-.146a.25.25 0 0 0-.025-.106"></path><path d="M22.022 11.714c.058.727-.34 1.373-.89 1.443c-.549.07-1.04-.461-1.1-1.188c-.057-.727.341-1.373.89-1.443c.55-.071 1.042.461 1.1 1.188Zm3.49.243c.112-.201.877-1.259 2.46-.874c.415.102.608.25.648.309c.06.086.077.21.016.375c-.12.329-.369.32-.506.256c-.09-.042-1.192-.777-2.208.32c-.07.075-.195.1-.313.012c-.119-.09-.167-.272-.097-.398ZM23.814 27.25h-.045c-2.918.035-6.455-.351-9.882-1.027c-.293 1.699-.47 3.834-.318 6.38c.384 6.433 4.205 10.478 10.104 10.536h.24c5.898-.058 9.718-4.103 10.103-10.537c.152-2.546-.025-4.68-.319-6.379c-3.426.676-6.965 1.063-9.883 1.027"></path><path d="M15.504 26.712v6.332s2.9.585 5.807.18v-5.841a53.39 53.39 0 0 1-5.807-.671Z"></path><path d="M36.938 20.634s-5.642 1.78-13.124 1.831h-.044c-7.47-.05-13.105-1.825-13.124-1.831l-1.89 4.716c4.726 1.425 10.584 2.343 15.014 2.29h.044c4.43.053 10.287-.865 15.014-2.29l-1.89-4.716Z"></path></g></svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php $this->options->feedUrl(); ?>" title="RSS" alt="RSS" aria-label="RSS">
                                <svg viewBox="-4 -4 24 24"><path d="M1.996 15.97a1.996 1.996 0 1 1 0-3.992a1.996 1.996 0 0 1 0 3.992zM1.12 7.977a.998.998 0 0 1-.247-1.98a8.103 8.103 0 0 1 9.108 8.04v.935a.998.998 0 1 1-1.996 0v-.934a6.108 6.108 0 0 0-6.865-6.06zM0 1.065A.998.998 0 0 1 .93.002C8.717-.517 15.448 5.374 15.967 13.16c.042.626.042 1.254 0 1.88a.998.998 0 1 1-1.992-.133c.036-.538.036-1.077 0-1.614C13.53 6.607 7.75 1.548 1.065 1.994A.998.998 0 0 1 0 1.064z"></path></svg>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" title="mode" alt="mode" aria-label="mode">
                                <svg><use href="<?php $this->options->themeUrl('assets/icons.svg#moon'); ?>"></svg>
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
                    <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" class="cc-opacity" target="_blank" rel="noopener"><img src="<?php $this->options->themeUrl('./assets/img/cc-by-nc-sa.png'); ?>" alt="Creative Commons"></a>
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
