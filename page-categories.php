<?php

/**
 * Template Page of Category
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('component/header.php'); ?>

<div id="main" class="main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap">
            <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
            <?php if ($categorys->have()) : ?>
                <?php while ($categorys->next()) : ?>
                    <?php if ($categorys->count) : ?>
                        <h1 class="category-title" itemprop="name headline">
                            <a class="category-title-link" itemprop="url" href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a>
                            <span> ：<?php $categorys->count(); ?></span>
                        </h1>
                    <?php endif; ?>
                    <?php $catlist = $this->widget('Widget_Archive@categorys_' . $categorys->mid, 'pageSize=10000&type=category', 'mid=' . $categorys->mid); ?>
                    <?php if ($catlist->have()) : ?>
                        <div class="category-post-item clearfix">
                            <?php while ($catlist->next()) : ?>
                                <div class="category-post-wrap ">
                                    <article class="category-post" text-center itemscope itemtype="http://schema.org/BlogPosting">
                                        <a href="<?php $catlist->permalink() ?>">
                                            <h2 class="category-post-title"><?php $catlist->title() ?></h2>
                                        </a>
                                        <?php $catlist->date('M j, Y'); ?>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .content-wrap a {
        border: none
    }

    .content-wrap {
        float: none
    }
</style>

<?php $this->need('component/footer.php'); ?>