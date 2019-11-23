<?php

/**
 * Template Page of Link
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('component/header.php'); ?>

<div id="main" class="main" role="main">
  <div class="main-inner clearfix">
    <?php if (isPc()) $this->need('component/sidebar.php'); ?>
    <div class="content-wrap">
      <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a class="post-title-link" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <div id="link" class="post-content" itemprop="articleBody">
          <?php $this->content(); ?>
        </div>
      </article>
      <?php $this->need('component/comments.php'); ?>
    </div>
  </div>
</div>


<?php $this->need('component/footer.php'); ?>