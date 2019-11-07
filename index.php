<?

/**
 * Sagiri - Lovely theme for Typecho.
 *
 * @package Sagiri
 * @author shiyi
 * @version 1.1.5
 * @link https://github.com/shiyiya/typecho-theme-sagiri
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<? $this->need('component/header.php'); ?>

<div id="main" class="main" role="main">
	<div class="main-inner clearfix">
		<div class="content-wrap">
			<section id="posts">
				<? while ($this->next()) : ?>
					<? $this->need('component/post-card.php'); ?>
				<? endwhile; ?>
			</section>
			<? $this->pageNav('<i class="iconfont icon-prev-m" aria-label="prev"></i>', '<i class="iconfont icon-next-m" aria-label="next"></i>', '2', '...'); ?>
		</div>
		<? if (isPc()) $this->need('component/sidebar.php'); ?>
	</div>
</div>

<? $this->need('component/footer.php'); ?>