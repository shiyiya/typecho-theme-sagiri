<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer id="footer" role="contentinfo">
    <p><?php echo _i18n('浏览量') . ' : ' . siteViewer(); ?></p>
    <p id="live-time"></p>
    <p>
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
        <?php _e('Power By  <a href="http://www.typecho.org" target="_blank">Typecho</a> '); ?>.
        <?php _e('<a href="https://github.com/shiyiya/typecho-theme-sagiri" rel="external nofollow" target="_blank">Theme</a> by <a href="https://github.com/shiyiya" target="_blank">Shiyi</a>'); ?>
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
    <span class="back">
        <svg width="1em" height="1em" viewBox="0 0 24 24"><path d="M6 4h12v2H6zm5 10v6h2v-6h5l-6-6l-6 6z" fill="currentColor"></path></svg>
    </span>
</div>

<div class="img-view">
    <img src="<?php $this->options->backGroundImage() ?>" alt="This is just a placeholder img.">
</div>

</div><!-- End root -->

<?php $this->footer(); ?>

<?php if (!empty($this->options->feature) && in_array('pjax', $this->options->feature)) : ?>
    <script src="<?php CDNUrl('js/lib/instantclick.min.js') ?>" data-no-instant></script>
    <script data-no-instant>
        InstantClick.init(50);
    </script>
<?php endif; ?>

<script src="<?php CDNUrl('js/sagiri.min.js'); ?>"></script>
<script src="<?php CDNUrl('js/index.min.js'); ?>"></script>


<!--  Lazy load images -->
<?php if (!empty($this->options->feature) && in_array('lazyImg', $this->options->feature)) : ?>
    <script src="<?php CDNUrl('util/lazyload.min.js'); ?>"></script>
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
    <script src="<?php CDNUrl('./js/lib/prism/prism.js'); ?>"></script>
<?php endif; ?>

<!-- OwO emoji -->
<?php if (!empty($this->options->feature) && in_array('commentEmoji', $this->options->feature) && $this->allow('comment')) : ?>
    <script src="<?php CDNUrl('js/lib/OwO/OwO.min.js'); ?>"></script>

    <script>
        new OwO({
            logo: 'OωO',
            container: document.getElementsByClassName('OwO')[0],
            target: document.getElementsByClassName('OwO-textarea')[0],
            api: '<?php CDNUrl('js/lib/OwO/OwO.json '); ?>',
            position: 'down',
            width: '100%',
            maxHeight: '250px'
        })
    </script>
<?php endif; ?>

<script>
    // Scroll to article area
    <?php if (!empty($this->options->StyleSettings) && in_array('Banner', $this->options->StyleSettings) && $this->is('post')) : ?>
        Sagiri.F.postScroll()
    <?php endif; ?>

    // Background like ribbon
    <?php if (!empty($this->options->feature) && in_array('ribbons', $this->options->feature)) : ?>
        Sagiri.F.ribbons()
    <?php endif; ?>

    // How long has the website been alive ?
    <?php if ($this->options->liveTime) : ?>
        setInterval(function() {
            Sagiri.F.liveTime('<?php strval($this->options->liveTime()); ?>')
        }, 1000)
    <?php endif; ?>

    // Custom Javascript
    <?php if (!empty($this->options->customScript)): ?>
        <?php _e($this->options->customScript) ?>
    <?php endif; ?>

    // server worker
    // if ('serviceWorker' in navigator) {
    //     navigator.serviceWorker.register('/sw.min.js')
    //         .then(function(reg) {
    //             console.log('%c Sagiri serviceWorker is working ! ', 'background: #000; color:#f6f93e; padding:5px 0;');
    //         })
    //         .catch(function(error) {
    //             console.log('serviceWorker failed with ' + error);
    //         });
    // }
</script>

</body>

</html>
