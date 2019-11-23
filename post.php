<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('component/header.php'); ?>

<div id="main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap">
            <?php $this->need('component/post-card.php'); ?>
            <?php if ($this->options->WechatQR || $this->options->AlipayQR) : ?>
                <div class="free-reward">
                    <button class="btn btn-pay"><?php i18n('赞赏') ?></button>
                    <div class="qr" style="height:0">
                        <?php if ($this->options->WechatQR) : ?>
                            <div id="wechat">
                                <img id="wechat-qr" src="<?php $this->options->WechatQR() ?>" alt="<?php i18n('微信支付') ?>" data-action="zoom">
                                <p><?php i18n('微信支付') ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->options->AlipayQR) : ?>
                            <div id="alipay">
                                <img id="qq-alipay" src="<?php $this->options->AlipayQR() ?>" alt="<?php i18n('支付宝支付') ?>" data-action="zoom">
                                <p><?php i18n('支付宝支付') ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div itemprop="keywords" class="tags"><?php $this->tags('', true, ''); ?></div>
            <footer class="post-footer">
                <div class="post-nav-next post-nav-item"><i class="iconfont icon-prev-m"></i><?php $this->thePrev('%s', _i18n('没有了')); ?></div>
                <div class="post-nav-prev post-nav-item"><?php $this->theNext('%s', _i18n('没有了')); ?><i class="iconfont icon-next-m"></i></div>
            </footer>
            </article>
            <?php $this->need('component/comments.php'); ?>
        </div>
        <?php if (isPc()) $this->need('component/sidebar.php'); ?>
    </div>
</div>

<?php $this->need('component/footer.php'); ?>