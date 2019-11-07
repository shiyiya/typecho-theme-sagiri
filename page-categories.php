<?

/**
 * Template Page of Category
 *
 * @package custom
 */
?>
<? if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<? $this->need('component/header.php'); ?>

<div id="main" class="main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap">
            <? $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
            <? if ($categorys->have()) : ?>
                <? while ($categorys->next()) : ?>
                    <? if ($categorys->count) : ?>
                        <h1 class="category-title" itemprop="name headline">
                            <a class="category-title-link" itemprop="url" href="<? $categorys->permalink(); ?>"><? $categorys->name(); ?></a>
                            <span> ：<? $categorys->count(); ?></span>
                        </h1>
                    <? endif; ?>
                    <? $catlist = $this->widget('Widget_Archive@categorys_' . $categorys->mid, 'pageSize=10000&type=category', 'mid=' . $categorys->mid); ?>
                    <? if ($catlist->have()) : ?>
                        <div class="category-post-item clearfix">
                            <? while ($catlist->next()) : ?>
                                <div class="category-post-wrap ">
                                    <article class="category-post" text-center itemscope itemtype="http://schema.org/BlogPosting">
                                        <a href="<? $catlist->permalink() ?>">
                                            <h2 class="category-post-title"><? $catlist->title() ?></h2>
                                        </a>
                                        <? $catlist->date('M j, Y'); ?>
                                    </article>
                                </div>
                            <? endwhile; ?>
                        </div>
                    <? endif; ?>
                <? endwhile; ?>
            <? endif; ?>
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

<? $this->need('component/footer.php'); ?>