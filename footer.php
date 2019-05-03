<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!-- 
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
-->

<footer id="footer" role="contentinfo">
    <p><i class="iconfont icon-eye"></i>访问人数 : <?php echo getSiteViews(); ?></p>
    <p id="live-time"></p>
    <p>
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
        <?php _e('Power By  <a href="http://www.typecho.org">Typecho</a> '); ?>.
        <?php _e('<a href="https://github.com/shiyiya/typecho-theme-sagiri" rel="external nofollow">Theme</a> by <a href="https://runtua.cn">Shiyi</a>'); ?>
    </p>
</footer>

<!-- <div id="back-actions">
    <span class="back-top back"><i class="iconfont icon-prev-m"></i></span>
    <span class="back-bottom back"><i class="iconfont icon-next-m"></i></span>
</div> -->

<div class="img-view">
    <img src="<?php $this->options->backGroundImage() ?>" alt="This is just a placeholder img.">
</div>


<canvas id="ribbons"></canvas>

<!-- <canvas id="live2d" class="live2d" width="140" height="250"></canvas> -->

<?php if (!empty($this->options->feature) && in_array('pjax', $this->options->feature)) : ?>
    <script src="<?php $this->options->themeUrl('util/pjax.mini.js'); ?>"></script>

    <script>
        new miniPjax({
            target: 'a',
            body: '#root',
            container: ['.content-wrap', '#sidebar']
        })
    </script>
<?php endif; ?>

<script src="<?php $this->options->themeUrl('js/index.min.js'); ?>"></script>

<!--  Lazy load images -->
<?php if (!empty($this->options->feature) && in_array('lazyImg', $this->options->feature)) : ?>
    <script src="<?php $this->options->themeUrl('util/lazyload.min.js'); ?>"></script>
<?php endif; ?>

<!-- fastclick -->
<?php if (!empty($this->options->feature) && in_array('fastclick', $this->options->feature)) : ?>
    <script src="https://cdn.jsdelivr.net/npm/fastclick@1.0.6/lib/fastclick.min.js"></script>
    <script>
        if ('addEventListener' in document) {
            document.addEventListener('DOMContentLoaded', function() {
                FastClick.attach(document.body);
            }, false);
        }
    </script>
<?php endif; ?>


<!-- Code highlight -->
<?php if (!empty($this->options->feature) && in_array('codeHighlight', $this->options->feature)) : ?>
    <script src="<?php $this->options->themeUrl('./lib/prism/' . $this->options->codeHighlightTheme . '/prism.js'); ?>"></script>
<?php endif; ?>

<script>
    // Scroll to article area
    <?php if (!empty($this->options->StyleSettings) && in_array('Banner', $this->options->StyleSettings) && $this->is('post')) : ?>
        var postScrolltimer = setInterval(postScroll, 10)
    <?php endif; ?>

    // Background like ribbon
    <?php if (!empty($this->options->feature) && in_array('ribbons', $this->options->feature)) : ?>
        ribbons()
    <?php endif; ?>

    // How long has the website been alive ?
    <?php if ($this->options->liveTime) : ?>
        var liveTimeer = setInterval(function() {
            liveTime('<?php strval($this->options->liveTime()); ?>')
        }, 1000)
    <?php endif; ?>

    // Custom Javascript
    <?php _e($this->options->customScript) ?>
</script>

</div><!-- End root -->

<?php $this->footer(); ?>

</body>

</html>