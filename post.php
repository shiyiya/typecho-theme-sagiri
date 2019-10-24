<? if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<? $this->need('component/header.php'); ?>

<div id="main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap">
            <? $this->need('component/post-card.php'); ?>
            <? if ($this->options->WechatQR || $this->options->AlipayQR) : ?>
                <div class="free-reward">
                    <button class="btn btn-pay"><? i18n('赞赏') ?></button>
                    <div class="qr" style="height:0">
                        <? if ($this->options->WechatQR) : ?>
                            <div id="wechat">
                                <img id="wechat-qr" src="<? $this->options->WechatQR() ?>" alt="<? i18n('微信支付') ?>" data-action="zoom">
                                <p><? i18n('微信支付') ?></p>
                            </div>
                        <? endif; ?>
                        <? if ($this->options->AlipayQR) : ?>
                            <div id="alipay">
                                <img id="qq-alipay" src="<? $this->options->AlipayQR() ?>" alt="<? i18n('支付宝支付') ?>" data-action="zoom">
                                <p><? i18n('支付宝支付') ?></p>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            <? endif; ?>
            <div itemprop="keywords" class="tags"><? $this->tags('', true, ''); ?></div>
            <footer class="post-footer">
                <div class="post-nav-next post-nav-item"><i class="iconfont icon-prev-m"></i><? $this->thePrev('%s', _i18n('没有了')); ?></div>
                <div class="post-nav-prev post-nav-item"><? $this->theNext('%s', _i18n('没有了')); ?><i class="iconfont icon-next-m"></i></div>
            </footer>
            </article>
            <? $this->need('component/comments.php'); ?>
        </div>
        <? if (isPc()) $this->need('component/sidebar.php'); ?>
    </div>
</div>

<? $this->need('component/footer.php'); ?>