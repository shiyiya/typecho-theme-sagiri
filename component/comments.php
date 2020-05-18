<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    // $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

    <li id="li-<?php $comments->theId(); ?>" class="comment-body
    <?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
    ?>">
        <div id="<?php $comments->theId(); ?>">
            <div class="comment-inner">
                <div class="comment-author">
                    <?php $comments->gravatar('40', ''); ?>
                    <cite class="fn"><?php $comments->author(); ?></cite>
                    <div class="device-info">
                        <span><?php getBrowser($comments->agent); ?></span>
                        <span><?php getOs($comments->agent); ?></span>
                    </div>
                </div>
                <div class="comment-content">
                    <?php $comments->content(); ?>
                </div>
                <div class="comment-meta">
                    <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
                    <span class="comment-reply"><?php $comments->reply(_i18n('回复')); ?></span>
                </div>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <div class="comment-children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
    </li>
<?php } ?>

<!-- OwO emoji style -->
<?php if (!empty($this->options->feature) && in_array('commentEmoji', $this->options->feature) && $this->allow('comment')) : ?>
    <link rel="stylesheet" href="<?php CDNUrl('./js/lib/OwO/OwO.min.css'); ?>">
<?php endif; ?>

<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <div class="comments-header" id="<?php $this->respondId(); ?>">
        <?php if ($this->allow('comment')) : ?>
            <h3 class="comment-title">
                <?php i18n('评论');
                $comments->cancelReply(_i18n('/ 取消评论')); ?>
            </h3>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if ($this->user->hasLogin()) : ?>
                    <p><?php i18n('用户名'); ?>: <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php i18n('退出'); ?> &raquo;</a></p>
                <?php else : ?>
                    <input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required placeholder="<?php i18n('姓名或昵称') ?>" />
                    <input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> placeholder="<?php i18n('邮箱') ?>" />
                    <input type="url" name="url" id="url" class="text" placeholder="<?php i18n('网站或博客'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?> />
                <?php endif; ?>
                <textarea name="text" id="textarea" class="OwO-textarea textarea" required placeholder="<?php i18n('说点什么吧……') ?>"><?php $this->remember('text'); ?></textarea>
                <div class="OwO"></div>
                <p class="submit"><button class="sheen" type="submit" class="submit"><?php i18n('评论'); ?></button></p>
            </form>
        <?php endif; ?>
    </div>

    <?php if ($comments->have()) : ?>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav('<i class="iconfont icon-prev-m"></i>', '<i class="iconfont icon-next-m"></i>'); ?>
    <?php endif; ?>

</div>