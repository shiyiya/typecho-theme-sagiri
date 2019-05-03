<?php
/**
 * Sagiri - Lovely theme for Typecho.
 * 
 * @package Sagiri
 * @author shiyi
 * @version 1.0.3
 * @link https://github.com/shiyiya/typecho-theme-sagiri
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('header.php'); ?>

<div id="main" class="main" role="main">
	<div class="main-inner clearfix">
		<div class="content-wrap">
			<section id="posts">
				<?php while ($this->next()) : ?>
					<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
						<div class="post-badge">
							<span itemprop="about" itemscope="" itemtype="http://schema.org/Thing">
								<?php $this->category(','); ?>
							</span>
						</div>
						<header class="post-header">
							<h1 class="post-title" itemprop="name headline"><a class="post-title-link" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
							<div class="post-meta">
								<span><?php _e('<i class="iconfont icon-time"></i>  '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
								<span><?php _e('<i class="iconfont icon-eye"></i> 浏览 ');
										getPostView($this); ?></span>
								<span itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('<i class="iconfont icon-Comments"></i> 没有评论', '<i class="iconfont icon-Comments"></i> 评论数 1', '<i class="iconfont icon-Comments"></i> 评论数 %d'); ?></a></span>
							</div>
						</header>
						<?php if (!empty($this->options->feature) && in_array('showThumb', $this->options->feature)) : ?>
							<?php $thumb = showThumb($this, null, true); ?>
							<?php if (!empty($thumb)) : ?>
								<?php echo $thumb; ?>
							<?php endif; ?>
						<?php endif; ?>
						<div class="post-content" itemprop="articleBody">
							<?php replaceTag($this->excerpt(100)); ?>
							<div text-center class="post-button">
								<a href="<?php $this->permalink() ?>">
									<?php _e('-   阅读全文   -'); ?>
								</a>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</section>
			<div class="loading-more-post" style="display:none">加载中···</div>
			<?php if (!empty($this->options->feature) && in_array('loadNextPagePost', $this->options->feature)) : ?>
				<?php $this->pageLink('下一页', 'next', 'hidden'); ?>
			<?php endif; ?>
			<?php $this->pageNav('<i class="iconfont icon-prev-m"></i>', '<i class="iconfont icon-next-m"></i>', '2', '...'); ?>
		</div>
		<?php $this->need('sidebar.php'); ?>
	</div>
</div>

<?php if (!empty($this->options->feature) && in_array('loadNextPagePost', $this->options->feature)) : ?>
	<style>
		.page-navigator,
		.next {
			display: none
		}
	</style>
<?php endif; ?>

<?php $this->need('footer.php'); ?>