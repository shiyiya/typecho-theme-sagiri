<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap">
            <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                <div class="post-badge">
                    <span itemprop="about" itemscope="" itemtype="http://schema.org/Thing">
                        <?php $this->category(','); ?>
                    </span>
                </div>
                <header class="post-header">
                    <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
                    <div class="post-meta">
                        <span><?php _e('<i class="iconfont icon-time"></i> 发表于 '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
                        <span><?php _e('<i class="iconfont icon-eye"></i> 浏览量 ');
                                getPostView($this); ?></span>
                        <span itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('<i class="iconfont icon-Comments"></i> 没有评论', '<i class="iconfont icon-Comments"></i> 评论数 1', '<i class="iconfont icon-Comments"></i> 评论数 %d'); ?></a></span>
                    </div>
                </header>
                <div class="post-content" itemprop="articleBody">
                    <?php replaceTag($this->content); ?>
                </div>
                <?php if ($this->options->WechatQR || $this->options->AlipayQR) : ?>
                    <div class="free-reward">
                        <button class="btn btn-pay">赞赏</button>
                        <div class="qr" style="height:0">
                            <?php if ($this->options->WechatQR) : ?>
                                <div id="wechat">
                                    <img id="wechat-qr" src="<?php $this->options->WechatQR() ?>" alt="微信扫一扫，向我赞赏" data-action="zoom">
                                    <p>微信扫一扫，向我赞赏</p>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->options->AlipayQR) : ?>
                                <div id="alipay">
                                    <img id="qq-alipay" src="<?php $this->options->AlipayQR() ?>" alt="微信扫一扫，向我赞赏" data-action="zoom">
                                    <p>支付宝扫一扫，向我赞赏</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div itemprop="keywords" class="tags"><?php $this->tags('', true, ''); ?></div>
                <footer class="post-footer">
                    <div class="post-nav-next post-nav-item"><i class="iconfont icon-prev-m"></i><?php $this->thePrev('%s', '没有了'); ?></div>
                    <div class="post-nav-prev post-nav-item"><?php $this->theNext('%s', '没有了'); ?><i class="iconfont icon-next-m"></i></div>
                </footer>
            </article>
            <?php $this->need('comments.php'); ?>
        </div>
        <?php $this->need('sidebar.php'); ?>
    </div>
</div>

<?php $this->need('footer.php'); ?>