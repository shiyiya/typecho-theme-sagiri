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

    .category-post-wrap {
        display: inline-block;
        width: 33.33%;
        box-sizing: border-box;
        float: left;
        padding: 10px;
    }

    @media (max-width: 991px) {
        .category-post-wrap {
            width: 50%;
        }
    }

    .category-post {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, .04);
    }

    .content-wrap {
        float: none
    }

    .category-post-title {
        font-weight: normal;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        font-size: 14px;
        margin: 0;
    }

    .category-title {
        margin: 10px;
        font-size: 14px;
    }

    .category-post-item {
        animation: fade-in-top .3s .3s backwards;
    }
</style>

<? $this->need('component/footer.php'); ?>