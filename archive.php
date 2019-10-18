<? if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<? $this->need('component/header.php'); ?>

<div id="main" class="main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap">
            <h3 class="archive-title">
                <? $this->archiveTitle(array(
                    'category' => _t('分类 %s 下的文章'),
                    'search' => _t('包含关键字 %s 的文章'),
                    'tag' => _t('标签 %s 下的文章'),
                    'author' => _t('%s 发布的文章')
                ), '', ''); ?>
            </h3>
            <? if ($this->have()) : ?>
                <? while ($this->next()) : ?>
                    <? $this->need('component/post-card.php'); ?>
                <? endwhile; ?>
            <? else : ?>
                <article class="post">
                    <h2 class="post-title"><? _e('没有找到内容'); ?></h2>
                </article>
            <? endif; ?>

            <? $this->pageNav('<i class="iconfont icon-prev-m"></i>', '<i class="iconfont icon-next-m"></i>', '2', '...'); ?>
        </div>
    </div>
</div>

<style>
    .content-wrap {
        float: none
    }
</style>

<? $this->need('component/footer.php'); ?>