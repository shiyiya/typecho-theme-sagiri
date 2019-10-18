<?

/**
 * Template Page of Search
 *
 * @package custom
 */
?>
<? if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<? $this->need('component/header.php'); ?>

<div id="main" class="main search-main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap">
            <article class="post search-post" text-center itemscope itemtype="http://schema.org/BlogPosting">
                <form id="search" method="post" action="<? $this->options->siteUrl(); ?>" role="search">
                    <input type="text" id="s" name="s" class="text" placeholder="<? _e('输入关键字搜索'); ?>" required />
                    <button type="submit" class="submit"><i class="iconfont icon-search"></i></button>
                </form>
                <div class="search-placeholder">
                    <hr title="categories" />
                    <h4><? i18n('分类') ?></h4>
                    <ul class="categories-list">
                        <? $this->widget('Widget_Metas_Category_List')->to($category); ?>
                        <? while ($category->next()) : ?>
                            <li><a class="tag-link" class="category-level-<? if ($category->isParent()) : ?>0 category-parent<? else : ?>1 category-child category-level-odd<? endif; ?>" href="<? $category->permalink(); ?>"><? $category->name(); ?></a></li>
                        <? endwhile; ?>
                    </ul>
                    <hr title="tags" />
                    <h4><? i18n('标签') ?></h4>
                    <? $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
                    <ul class="tags-list">
                        <? while ($tags->next()) : ?>
                            <li><a class="tag-link" href="<? $tags->permalink(); ?>" title='<? $tags->name(); ?>'># <? $tags->name(); ?></a></li>
                        <? endwhile; ?>
                    </ul>
                </div>
            </article>
        </div>
    </div>
</div>

<style>
    .content-wrap {
        float: none
    }
</style>

<? $this->need('component/footer.php'); ?>