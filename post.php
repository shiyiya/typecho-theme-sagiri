<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" role="main">
    <div class="main-inner clearfix">
        <?php $this->need('sidebar.php'); ?>
        <div class="content-wrap">
            <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                <header class="post-header">
                <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
                <div class="post-meta">
				    <span><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
				    <span><?php _e('• 分类: '); ?><?php $this->category(','); ?></span>
				    <span itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('• 评论', '• 1 条评论', '• %d 条评论'); ?></a></span>
                </div>
                </header>
                <div class="post-content" itemprop="articleBody">
                    <?php $this->content(); ?>
                </div>
                <?php if ($this->options->WechatQR || $this->options->AlipayQR): ?>
                <div class="free-reward">
                    <button class="btn btn-pay">赞赏</button>
                    <div class="qr" style="height:0">
                        <?php if ($this->options->WechatQR): ?>
                        <div id="wechat">
                            <img id="wechat-qr" src="<?php $this->options->WechatQR() ?>" alt="微信扫一扫，向我赞赏" data-action="zoom">
                            <p>微信扫一扫，向我赞赏</p>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->options->AlipayQR): ?>
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
                    <div class="post-nav-next post-nav-item"><i class="iconfont icon-prev-m"></i><?php $this->thePrev('%s','没有了'); ?></div>
                    <div class="post-nav-prev post-nav-item"><?php $this->theNext('%s','没有了'); ?><i class="iconfont icon-next-m"></i></div>
                 </footer>
        </article>
        <?php $this->need('comments.php'); ?>
     </div>
</div>
    


<?php $this->need('footer.php'); ?>
