<?php
/**
 * Template Page of Link
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('header.php'); ?>

<div id="main" class="main" role="main">
  <div class="main-inner clearfix">
    <?php $this->need('sidebar.php'); ?>
    <div class="content-wrap">
      <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a class="post-title-link" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <div id="link" class="post-content" itemprop="articleBody">
          <?php $this->content(); ?>
        </div>
      </article>
      <?php $this->need('comments.php'); ?>
    </div>
  </div>
</div>


<?php $this->need('footer.php'); ?>

<script>
  var warp = document.getElementById('link'),
    br = [...warp.getElementsByTagName('BR')],
    itemLink = [...document.querySelectorAll('#link ul li')]

  br.forEach((v, k) => {
    v.parentElement.removeChild(v)
  })
  itemLink.forEach((v, k) => {
    if (!!!v.querySelector('img')) {
      v.style.paddingTop = '10px'
    }
  })
</script>