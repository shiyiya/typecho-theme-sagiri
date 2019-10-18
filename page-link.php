<?

/**
 * Template Page of Link
 *
 * @package custom
 */
?>
<? if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<? $this->need('component/header.php'); ?>

<div id="main" class="main" role="main">
  <div class="main-inner clearfix">
    <? if (isPc()) $this->need('component/sidebar.php'); ?>
    <div class="content-wrap">
      <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a class="post-title-link" itemprop="url" href="<? $this->permalink() ?>"><? $this->title() ?></a></h1>
        <div id="link" class="post-content" itemprop="articleBody">
          <? $this->content(); ?>
        </div>
      </article>
      <? $this->need('component/comment.php'); ?>
    </div>
  </div>
</div>


<? $this->need('component/footer.php'); ?>

<script>
  var warp = document.getElementById('link'),
    br = [].slice.call(warp.getElementsByTagName('BR'))
  itemLink = [].slice.call(document.querySelectorAll('#link ul li'))

  br.forEach((v, k) => {
    v.parentElement.removeChild(v)
  })
  itemLink.forEach((v, k) => {
    if (!!!v.querySelector('img')) {
      v.style.paddingTop = '10px'
    }
  })
</script>