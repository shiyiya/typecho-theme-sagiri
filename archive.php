<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" class="main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap">
            <h3 class="archive-title">
                <?php $this->archiveTitle(array(
                    'category'  =>  _t('分类 %s 下的文章'),
                    'search'    =>  _t('包含关键字 %s 的文章'),
                    'tag'       =>  _t('标签 %s 下的文章'),
                    'author'    =>  _t('%s 发布的文章')
                ), '', ''); ?>
            </h3>
            <?php if ($this->have()) : ?>
                <?php while ($this->next()) : ?>
                    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                        <div class="post-badge">
                            <span itemprop="about" itemscope="" itemtype="http://schema.org/Thing">
                                <?php $this->category(','); ?>
                            </span>
                        </div>
                        <header class="post-header">
                            <h2 class="post-title" itemprop="name headline"><a class="post-title-link" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                            <div class="post-meta">
                                <span><?php _e('<i class="iconfont icon-time"></i> 发表于 '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
                                <span><?php _e('<i class="iconfont icon-eye"></i> 浏览量 ');
                                        getPostView($this); ?></span>
                                <span itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('<i class="iconfont icon-Comments"></i> 没有评论', '<i class="iconfont icon-Comments"></i> 评论数 1', '<i class="iconfont icon-Comments"></i> 评论数 %d'); ?></a></span>
                            </div>
                        </header>
                        <?php if (!empty($this->options->feature) && in_array('showThumb', $this->options->feature)) : ?>
                            <?php $thumb = showThumb($this, null, true); ?>
                            <?php if (!empty($thumb)) : ?>
                                <?php echo $thumb; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php replaceTag($this->excerpt(100)); ?>
                        <div class="post-content" itemprop="articleBody">
                            <?php $this->excerpt(100); ?>
                            <div text-center class="post-button">
                                <a href="<?php $this->permalink() ?>">
                                    - 阅读全文 -
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <article class="post">
                    <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
                </article>
            <?php endif; ?>

            <?php $this->pageNav('<i class="iconfont icon-prev-m"></i>', '<i class="iconfont icon-next-m"></i>', '2', '...'); ?>
        </div>
    </div>
</div>

<style>
    .content-wrap {
        float: none
    }
</style>

<?php $this->need('footer.php'); ?>