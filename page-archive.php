<?php

/**
 * Template Page of Timeline Archives
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('component/header.php'); ?>

<div id="main" class="main" role="main">
    <div class="main-inner">
        <div class="content-wrap is-timeline">
            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
            <h1 class="timeline-meta"> <?php _e('发表了 ' . $stat->publishedPostsNum . ' 篇文章，有 ' . $stat->publishedCommentsNum . ' 条评论') ?></h1>
            <div class="timeline-wrap">
                <?php
                $this->widget('Widget_Contents_Post_Recent', 'pageSize=' . $stat->publishedPostsNum)->to($archives);
                $year = 0;
                $mon = 0;
                $i = 0;
                $j = 0;
                $f = false;
                $output = '';
                while ($archives->next()) {
                    $year_tmp = date('Y', $archives->created);
                    $mon_tmp = date('m', $archives->created);
                    $y = $year;
                    $m = $mon;

                    if ($year != $year_tmp || $mon != $mon_tmp) {
                        $year = $year_tmp;
                        $mon = $mon_tmp;
                        $output .= $f ? "</div>" : $output;
                        $output .= '<h1 class="archive-timeline-title" itemprop="name headline">'
                            . date('M Y', $archives->created) .
                            '</h1><div class="archive-timeline-group">';
                        $f = true;
                    }

                    $output .= '
                <li class="archive-post" itemtype="http://schema.org/BlogPosting">
                    <span class="post-meta"> ' . date('M j', $archives->created) . '</span>
                    <h2 class="archive-post-title"><a href="' . $archives->permalink . '">' . $archives->title . '</a></h2>
                </li>';
                }
                echo $output;
                ?>
            </div>
        </div>
    </div>
</div>

<?php $this->need('component/footer.php'); ?>