<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
  <?php if ($this->category): ?>
    <div class="post-badge">
      <span itemprop="about" itemscope="" itemtype="http://schema.org/Thing">
        <?php $this->category(','); ?>
      </span>
    </div>
  <?php endif; ?>
  <header class="post-header">
    <h1 class="post-title" itemprop="name headline"><a class="post-title-link" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
    <div class="post-meta">
      <span>
        <svg width="1em" height="1em" viewBox="0 0 24 24"><path d="M12 20c4.4 0 8-3.6 8-8s-3.6-8-8-8s-8 3.6-8 8s3.6 8 8 8m0-18c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2m5 9.5V13h-6V7h1.5v4.5H17Z"></path></svg>
        <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
      </span>
      <span>
        <svg width="1em" height="1em" viewBox="0 0 256 256"><path d="M224 48h-64a40 40 0 0 0-32 16a40 40 0 0 0-32-16H32a16 16 0 0 0-16 16v128a16 16 0 0 0 16 16h64a24.1 24.1 0 0 1 24 24a8 8 0 0 0 16 0a24.1 24.1 0 0 1 24-24h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16ZM96 192H32V64h64a24.1 24.1 0 0 1 24 24v112a40 40 0 0 0-24-8Zm128 0h-64a40 40 0 0 0-24 8V88a24.1 24.1 0 0 1 24-24h64Z"></path></svg>
        <?php i18n('浏览量 '); getPostView($this);?>
      </span>
      <span itemprop="interactionCount">
        <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments">
          <svg viewBox="0 0 1024 1024" width="1em" height="1em"><path d="M842 182H182c-66 0-120 54-120 120v420c0 66 54 120 120 120h660c66 0 120-54 120-120V302c0-66-54-120-120-120z m30 510c0 33-27 60-60 60H212c-33 0-60-27-60-60V332c0-33 27-60 60-60h600c33 0 60 27 60 60v360z"></path><path d="M302 512m-60 0a60 60 0 1 0 120 0 60 60 0 1 0-120 0Z"></path><path d="M512 512m-60 0a60 60 0 1 0 120 0 60 60 0 1 0-120 0Z"></path><path d="M722 512m-60 0a60 60 0 1 0 120 0 60 60 0 1 0-120 0Z"></path></svg>
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
