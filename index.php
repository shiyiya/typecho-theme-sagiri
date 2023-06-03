<?php

/**
 * Sagiri - Lovely theme for Typecho.
 *
 * @package Sagiri
 * @author shiyi
 * @version 1.3.8-unreleased
 * @link https://github.com/shiyiya/typecho-theme-sagiri
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('component/header.php'); ?>

<div id="main" class="main" role="main">
	<div class="main-inner clearfix">
		<div class="content-wrap">
			<section id="posts">
				<?php while ($this->next()) : ?>
					<?php $this->need('component/post-card.php'); ?>
				<?php endwhile; ?>
			</section>
			<?php $this->pageNav('<svg r180><use xlink:href="#previous" /></svg>', '<svg><use xlink:href="#previous" /></svg>', '2', '...'); ?>
		</div>
		<?php if (isPc()) $this->need('component/sidebar.php'); ?>
	</div>
</div>

<?php $this->need('component/footer.php'); ?>
