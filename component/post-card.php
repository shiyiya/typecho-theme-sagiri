<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>



<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
  <div class="post-badge">
    <span itemprop="about" itemscope="" itemtype="http://schema.org/Thing">
      <?php if ($this->category) $this->category(',');
      else _e('o_o ....') ?>
    </span>
  </div>
  <header class="post-header">
    <h1 class="post-title" itemprop="name headline"><a class="post-title-link" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
    <div class="post-meta">
      <span><?php _e('<i class="iconfont icon-time"></i> '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
      <span>
        <i class="iconfont icon-view"></i>
        <?php
        i18n('浏览量 ');
        getPostView($this);
        ?></span>
      <span itemprop="interactionCount">
        <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments">
          <i class="iconfont icon-Comments"></i>
          <?php $this->commentsNum(_i18n('暂无评论'), _i18n('评论数 1'), _i18n('%d 条评论')); ?>
        </a>
      </span>
    </div>
  </header>

  <?php if ($this->is('post')) : ?>

    <div class="post-content" itemprop="articleBody">
      <?php replaceTag($this->content); ?>
    </div>

  <?php else : ?>

    <?php if (!empty($this->options->feature) && in_array('showThumb', $this->options->feature)) : ?>
      <?php showThumb($this); ?>
    <?php endif; ?>
    <div class="post-content" itemprop="articleBody">
      <p><?php replaceTag($this->excerpt) ?></p>
      <div text-center class="post-button">
        <a href="<?php $this->permalink() ?>" class="sheen">
          <?php _e('- ' . _i18n('阅读全文') . ' -'); ?>
        </a>
      </div>
    </div>
</article>

<?php endif; ?>