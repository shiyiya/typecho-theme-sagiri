<? if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer id="footer" role="contentinfo">
    <p><i class="iconfont icon-view"></i><? echo _i18n('浏览量') . ' : ' . getSiteViews(); ?></p>
    <p id="live-time"></p>
    <p>
        &copy; <? echo date('Y'); ?> <a href="<? $this->options->siteUrl(); ?>"><? $this->options->title(); ?></a>.
        <? _e('Power By  <a href="http://www.typecho.org">Typecho</a> '); ?>.
        <? _e('<a href="https://github.com/shiyiya/typecho-theme-sagiri" rel="external nofollow">Theme</a> by <a href="http://runtua.cn">Shiyi</a>'); ?>
    </p>
</footer>

<? if ($this->options->PWA == 'able') : ?>
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
<? endif; ?>


<div id="back-actions">
    <span class="back-top back"><i class="iconfont icon-prev-m"></i></span>
    <!-- <span class="back-bottom back"><i class="iconfont icon-next-m"></i></span> -->
</div>

<div class="img-view">
    <img src="<? $this->options->backGroundImage() ?>" alt="This is just a placeholder img.">
</div>


<canvas id="ribbons"></canvas>

<!-- <canvas id="live2d" class="live2d" width="140" height="250"></canvas> -->

<? if (!empty($this->options->feature) && in_array('pjax', $this->options->feature)) : ?>
    <script src="<? $this->options->themeUrl('util/pjax.mini.js'); ?>"></script>

    <script>
        new miniPjax({
            target: 'a',
            body: '#root',
            container: ['.content-wrap', '#sidebar']
        })
    </script>
<? endif; ?>

<script src="<? $this->options->themeUrl('js/sagiri.min.js'); ?>"></script>
<script src="<? $this->options->themeUrl('js/index.min.js'); ?>"></script>

<!-- type -->
<? if (!empty($this->options->StyleSettings) || in_array('Banner', $this->options->StyleSettings)) : ?>
    <script src="<? $this->options->themeUrl('js/type.min.js'); ?>"></script>
<? endif; ?>

<!--  Lazy load images -->
<? if (!empty($this->options->feature) && in_array('lazyImg', $this->options->feature)) : ?>
    <script src="<? $this->options->themeUrl('util/lazyload.min.js'); ?>"></script>
<? endif; ?>

<!-- fastclick -->
<? if (!empty($this->options->feature) && in_array('fastclick', $this->options->feature)) : ?>
    <script src="https://cdn.jsdelivr.net/npm/fastclick@1.0.6/lib/fastclick.min.js"></script>
    <script>
        if ('addEventListener' in document) {
            document.addEventListener('DOMContentLoaded', function() {
                FastClick.attach(document.body);
            }, false);
        }
    </script>
<? endif; ?>


<!-- Code highlight -->
<? if (!empty($this->options->feature) && in_array('codeHighlight', $this->options->feature)) : ?>
    <script src="<? $this->options->themeUrl('./js/lib/prism/' . $this->options->codeHighlightTheme . '/prism.js'); ?>"></script>
<? endif; ?>

<script>
    // Scroll to article area
    <? if (!empty($this->options->StyleSettings) && in_array('Banner', $this->options->StyleSettings) && $this->is('post')) : ?>
        Sagiri.F.postScroll()
    <? endif; ?>

    // Background like ribbon
    <? if (!empty($this->options->feature) && in_array('ribbons', $this->options->feature)) : ?>
        Sagiri.F.ribbons()
    <? endif; ?>

    // How long has the website been alive ?
    <? if ($this->options->liveTime) : ?>
        setInterval(function() {
            Sagiri.F.liveTime('<? strval($this->options->liveTime()); ?>')
        }, 1000)
    <? endif; ?>

    // Custom Javascript
    <? _e($this->options->customScript) ?>

    // server worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.min.js')
            .then(function(reg) {
                console.log('%c Sagiri serviceWorker is working ! ', 'background: #000; color:#f6f93e; padding:5px 0;', );
            })
            .catch(function(error) {
                console.log('serviceWorker failed with ' + error);
            });
    }
</script>

</div><!-- End root -->

<? $this->footer(); ?>

</body>

</html>