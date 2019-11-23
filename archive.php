<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('component/header.php'); ?>

<div id="main" class="main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap">
            <h3 class="archive-title">
                <?php $this->archiveTitle(array(
                    'category' => _i18n('分类 %s 下的文章'),
                    'search' => _i18n('包含关键字 %s 的文章'),
                    'tag' => _i18n('标签 %s 下的文章'),
                    'author' => _i18n('%s 发布的文章')
                ), '', ''); ?>
            </h3>
            <?php if ($this->have()) : ?>
                <?php while ($this->next()) : ?>
                    <?php $this->need('component/post-card.php'); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <article class="post">
                    <h2 class="post-title"><?php i18n('没有相关文章'); ?></h2>
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

<?php $this->need('component/footer.php'); ?>