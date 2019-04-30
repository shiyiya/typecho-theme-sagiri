<?php
/**
 * Template Page of Search
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" class="main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap">
            <article class="post search-post" text-center itemscope itemtype="http://schema.org/BlogPosting">
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                    <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" required />
                    <button type="submit" class="submit"><i class="iconfont icon-search"></i></button>
                </form>
                <div class="search-placeholder">
                    <hr title="categories" />
                    <h4>分类</h4>
                    <ul class="categories-list">
                        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                        <?php while ($category->next()) : ?>
                            <li><a class="tag-link" class="category-level-<?php if ($category->isParent()) : ?>0 category-parent<?php else : ?>1 category-child category-level-odd<?php endif; ?>" href="<?php $category->permalink(); ?>"><?php $category->name(); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                    <hr title="tags" />
                    <h4>标签</h4>
                    <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
                    <ul class="tags-list">
                        <?php while ($tags->next()) : ?>
                            <li><a class="tag-link" href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'># <?php $tags->name(); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </article>
        </div>
    </div>
</div>

<style>
    #main {
        padding-top: 80px;
    }

    .header-wrap {
        display: none
    }

    .content-wrap {
        float: none
    }
</style>

<?php $this->need('footer.php'); ?>