<?php
/**
 * Template Page of Timeline Archives
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" class="main" role="main">
    <div class="main-inner clearfix">
        <div class="content-wrap timeline-archives">
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
                /*  if ($year > $year_tmp || $mon > $mon_tmp) {
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

    .content-wrap::after {
        content: " ";
        position: absolute;
        top: -10px;
        left: 0;
        margin-left: -2px;
        width: 4px;
        height: 105%;
        background: #3a3f51;
        z-index: -1;
    }

    .archive-timeline-title {
        margin-left: 10px;
    }

    .archive-post {
        margin: 30px 0 0 4px;
    }

    .archive-post-header {
        position: relative;
        display: block;
        border-bottom: 1px dashed #ccc;
    }

    .archive-post-header::before {
        position: absolute;
        content: '';
        top: 12px;
        width: 6px;
        height: 6px;
        margin-left: -10px;
        border: 4px solid #292c38;
        background: #fff;
        border-radius: 50%;
    }

    .archive-post-title {
        margin-left: 100px;
        font-size: 16px;
        font-weight: 400;
        line-height: inherit;
    }

    .post-meta {
        position: absolute;
        font-size: 12px;
        left: 20px;
        top: 5px;
    }
</style>

<?php $this->need('footer.php'); ?>