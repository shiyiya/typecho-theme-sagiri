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

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    ?>

    <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
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
                    <span class="comment-reply"><?php $comments->reply(); ?></span>
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


<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <div class="comments-header" id="<?php $this->respondId(); ?>">
        <?php if ($this->allow('comment')) : ?>
            <h3 class="comment-title"> 回复 <?php $comments->cancelReply('/ 取消回复'); ?></h3>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if ($this->user->hasLogin()) : ?>
                    <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                <?php else : ?>
                    <input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required placeholder="Name" />
                    <input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> placeholder="E-mail" />
                    <input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?> />
                <?php endif; ?>
                <textarea name="text" id="textarea" class="OwO-textarea textarea" required placeholder="Write here."><?php $this->remember('text'); ?></textarea>
                <div class="OwO"></div>
                <button type="submit" class="submit"><?php _e('提交'); ?></button>
            </form>
        <?php endif; ?>
    </div>

    <?php if ($comments->have()) : ?>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav('<i class="iconfont icon-prev-m"></i>', '<i class="iconfont icon-next-m"></i>'); ?>
    <?php endif; ?>

</div>

<!-- OwO emoji -->
<?php if (!empty($this->options->feature) && in_array('commentEmoji', $this->options->feature) && $this->allow('comment')) : ?>
    <script src="<?php $this->options->themeUrl('./lib/OwO/OwO.min.js'); ?>"></script>

    <script>
        var OwO_demo = new OwO({
            logo: 'OωO表情',
            container: document.getElementsByClassName('OwO')[0],
            target: document.getElementsByClassName('OwO-textarea')[0],
            api: '<?php $this->options->themeUrl('./lib/OwO/OwO.json'); ?>',
            position: 'down',
            width: '100%',
            maxHeight: '250px'
        })
    </script>
<?php endif; ?>