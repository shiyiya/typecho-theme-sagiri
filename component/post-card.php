<? if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>



<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
  <div class="post-badge">
    <span itemprop="about" itemscope="" itemtype="http://schema.org/Thing">
      <? if ($this->category) $this->category(',');
      else _e('o_o ....') ?>
    </span>
  </div>
  <header class="post-header">
    <h1 class="post-title" itemprop="name headline"><a class="post-title-link" itemprop="url" href="<? $this->permalink() ?>"><? $this->title() ?></a></h1>
    <div class="post-meta">
      <span><? _e('<i class="iconfont icon-time"></i> '); ?><time datetime="<? $this->date('c'); ?>" itemprop="datePublished"><? $this->date(); ?></time></span>
      <span>
        <i class="iconfont icon-view"></i>
        <?
        i18n('浏览量 ');
        getPostView($this);
        ?></span>
      <span itemprop="interactionCount">
        <a itemprop="discussionUrl" href="<? $this->permalink() ?>#comments">
          <i class="iconfont icon-Comments"></i>
          <? $this->commentsNum(_i18n('暂无评论'), _i18n('评论数 1'), _i18n('%d 条评论')); ?>
        </a>
      </span>
    </div>
  </header>

  <? if ($this->is('post')) : ?>

    <div class="post-content" itemprop="articleBody">
      <? replaceTag($this->content, $this->options->themeUrl); ?>
    </div>

  <? else : ?>

    <? if (!empty($this->options->feature) && in_array('showThumb', $this->options->feature)) : ?>
      <? showThumb($this, $this->options->themeUrl); ?>
    <? endif; ?>
    <div class="post-content" itemprop="articleBody">
      <p><? replaceTag($this->content()) ?></p>
      <div text-center class="post-button">
        <a href="<? $this->permalink() ?>" class="sheen">
          <? _e('- ' . _i18n('阅读全文') . ' -'); ?>
        </a>
      </div>
    </div>
</article>

<? endif; ?>