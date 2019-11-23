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
    <div class="main-inner clearfix">
        <div class="content-wrap timeline-wrap">
            <?php
            $stat = Typecho_Widget::widget('Widget_Stat');
            $this->widget('Widget_Contents_Post_Recent', 'pageSize=' . $stat->publishedPostsNum)->to($archives);
            $year = 0;
            $mon = 0;
            $i = 0;
            $j = 0;
            $output = '';
            while ($archives->next()) {
                $year_tmp = date('Y', $archives->created);
                $mon_tmp = date('m', $archives->created);
                $y = $year;
                $m = $mon;
                /* if ($year > $year_tmp || $mon > $mon_tmp) {
            $output .= '<h1 class="archive-timeline-title" itemprop="name headline">'.date('M Y',$archives->created).'</h1>';
            } */
                if ($year != $year_tmp || $mon != $mon_tmp) {
                    $year = $year_tmp;
                    $mon = $mon_tmp;
                    $output .= '<h1 class="archive-timeline-title" itemprop="name headline">' . date('M Y', $archives->created) . '</h1>';
                }
                $output .= '
            <article class="archive-post" itemtype="http://schema.org/BlogPosting">
                <header class="archive-post-header">
                    <h2 class="archive-post-title"><a href="' . $archives->permalink . '">' . $archives->title . '</a></h2>
                    <div class="post-meta"> ' . date('M j, Y', $archives->created) . '</div>
                </header>
            </article>';
            }
            echo $output;
            ?>
        </div>
    </div>
</div>

<style>
    @media (max-width: 991px) {
        .main-inner {
            padding: 20px 30px;
        }
    }

    .content-wrap {
        float: none;
        position: relative
    }
</style>

<?php $this->need('component/footer.php'); ?>