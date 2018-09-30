<?php
/**
 * 一款响应式 WebApp 主题，让你的站点拥有接近 Native 的体验。
 * A responsive WebApp theme that makes your blog look like an app.
 * 
 * @package Typecho Theme 
 * @author shiyi
 * @version 1.0
 * @link https://runtua.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

 

<div id="main" class="main" role="main">
	<div class="main-inner clearfix">
		<?php $this->need('sidebar.php'); ?>
		<div class="content-wrap">
			<section id="posts">
			<?php while($this->next()): ?>
				<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
					<header class="post-header">
						<h1 class="post-title" itemprop="name headline"><a class="post-title-link" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
						<div class="post-meta">
							<span><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
							<span><?php _e('• 分类: '); ?><?php $this->category(','); ?></span>
							<span itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('• 评论', '• 1 条评论', '• %d 条评论'); ?></a></span>
						</div>
					</header>
					<?php if (!empty($this->options->feature) && in_array('showThumb', $this->options->feature)): ?>
					<?php $thumb = showThumb($this,null,true); ?>
					<?php if(!empty($thumb)):?>
						<img src="<?php echo $thumb;?>" >
					<?php endif; ?>
					<? endif; ?>
					<!-- <?php if($this->attachments(1)->attachment and $this->attachments(1)->attachment->isImage): ?>
						<img src="<?php $this->attachments(1)->attachment->url(); ?>"/> 
					<?php endif; ?> -->
					<div class="post-content" itemprop="articleBody">
						<?php $this->excerpt(100); ?>
						<div text-center class="post-button">
							<a href="<?php $this->permalink() ?>">
								-   阅读全文   -
							</a>
						</div>
            		</div>
				</article>
			<?php endwhile; ?>
			</section>
			<?php $this->pageNav('<i class="iconfont icon-prev-m"></i>','<i class="iconfont icon-next-m"></i>','2','...'); ?>
		</div>
	</div>
</div>
    


<?php $this->need('footer.php'); ?>
