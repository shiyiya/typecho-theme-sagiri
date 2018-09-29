<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


<div class="tool-bar">
    <div class="tool-bar-inner">
        <!-- <div class="social-share">
        </div> -->
        <div class="site-action">
            <span class="action-item"><a href="javascript:history.back(-1)">←</a></span>
            <span class="action-item"><a href="javascript:history.forward(1)">→</a></span>
            <span class="action-item"><a href="#footer">↓</a></span>
            <span class="action-item"><a href="#">↑</a></span>
        </div>
    </div>
</div>
<footer id="footer" role="contentinfo">
    <p>
        已经续 xxx 天 xx 小时
    </p>
    <p>
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
        <?php _e('Power By  <a href="http://www.typecho.org">Typecho</a> '); ?>.
        <?php _e('<a href="https://github.com/shiyiya/typecho-theme-sagiri/tree/dev" rel="external nofollow">Theme</a> by <a href="https://runtua.cn">Shiyi</a>'); ?>
    </p>
</footer>

</div><!-- End root -->

<?php $this->footer(); ?>

<script src="<?php $this->options->themeUrl('js/index.js'); ?>"></script>

</body>

</html>