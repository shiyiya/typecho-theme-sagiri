<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer id="footer" role="contentinfo">
    <p><i class="iconfont icon-eye"></i>访问人数 : <?php echo getSiteViews(); ?></p>
    <p id="live-time"></p>
    <p>
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
        <?php _e('Power By  <a href="http://www.typecho.org">Typecho</a> '); ?>.
        <?php _e('<a href="https://github.com/shiyiya/typecho-theme-sagiri" rel="external nofollow">Theme</a> by <a href="http://runtua.cn">Shiyi</a>'); ?>
    </p>
</footer>

<?php if ($this->options->PWA == 'able') : ?>
    <div class="tool-bar">
        <div class="tool-bar-inner">
            <div class="social-share">
            </div>
            <div class="site-action">
                <span class="action-item"><a href="javascript:history.back(-1)">←</a></span>
                <span class="action-item"><a href="javascript:history.forward(1)">→</a></span>
                <span class="action-item"><a href="#footer">↓</a></span>
                <span class="action-item"><a href="#">↑</a></span>
            </div>
        </div>
    </div>
<?php endif; ?>


<div id="back-actions">
    <span class="back-top back"><i class="iconfont icon-prev-m"></i></span>
    <!-- <span class="back-bottom back"><i class="iconfont icon-next-m"></i></span> -->
</div>

<div class="img-view">
    <img src="<?php $this->options->backGroundImage() ?>" alt="This is just a placeholder img.">
</div>


<canvas id="ribbons"></canvas>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

<script src="<?php $this->options->themeUrl('js/sagiri.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/index.min.js'); ?>"></script>

<!-- type -->
<?php if (!empty($this->options->StyleSettings) || in_array('Banner', $this->options->StyleSettings)) : ?>
    <script src="<?php $this->options->themeUrl('js/type.min.js'); ?>"></script>
<?php endif; ?>

<!-- Code highlight -->
<?php if (!empty($this->options->feature) && in_array('codeHighlight', $this->options->feature)) : ?>
    <script src="<?php $this->options->themeUrl('./lib/prism/' . $this->options->codeHighlightTheme . '/prism.js'); ?>"></script>
<?php endif; ?>

<!-- OwO emoji -->
<?php if (!empty($this->options->feature) && in_array('commentEmoji', $this->options->feature) && $this->allow('comment')) : ?>
    <script src="<?php $this->options->themeUrl('./lib/OwO/OwO.min.js'); ?>"></script>

    <script>
        new OwO({
            logo: 'OωO表情',
            container: document.getElementsByClassName('OwO')[0],
            target: document.getElementsByClassName('OwO-textarea')[0],
            api: '<?php $this->options->themeUrl('./lib/OwO/OwO.json'); ?>',
            position: 'down',
            width: '100%',
            maxHeight: '250px'
        })
    </script>
<?php endif; ?>

<script>
    // How long has the website been alive ?
    <?php if ($this->options->liveTime) : ?>
        setInterval(function() {
            Sagiri.F.liveTime('<?php strval($this->options->liveTime()); ?>')
        }, 1000)
    <?php endif; ?>

    // Custom Javascript
    <?php _e($this->options->customScript) ?>
</script>

</div><!-- End root -->

<?php $this->footer(); ?>

</body>

</html>