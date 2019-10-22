<? if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


<? function threadedComments($comments, $options)
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

    <li id="li-<? $comments->theId(); ?>" class="comment-body<?
                                                                    if ($comments->levels > 0) {
                                                                        echo ' comment-child';
                                                                        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
                                                                    } else {
                                                                        echo ' comment-parent';
                                                                    }
                                                                    $comments->alt(' comment-odd', ' comment-even');
                                                                    echo $commentClass;
                                                                    ?>">
        <div id="<? $comments->theId(); ?>">
            <div class="comment-inner">
                <div class="comment-author">
                    <? $comments->gravatar('40', ''); ?>
                    <cite class="fn"><? $comments->author(); ?></cite>
                    <div class="device-info">
                        <span><? getBrowser($comments->agent); ?></span>
                        <span><? getOs($comments->agent); ?></span>
                    </div>
                </div>
                <div class="comment-content">
                    <? $comments->content(); ?>
                </div>
                <div class="comment-meta">
                    <a href="<? $comments->permalink(); ?>"><? $comments->date('Y-m-d H:i'); ?></a>
                    <span class="comment-reply"><? $comments->reply(_i18n('回复')); ?></span>
                </div>
            </div>
        </div>
        <? if ($comments->children) { ?>
            <div class="comment-children">
                <? $comments->threadedComments($options); ?>
            </div>
        <? } ?>
    </li>
<? } ?>


<div id="comments">
    <? $this->comments()->to($comments); ?>
    <div class="comments-header" id="<? $this->respondId(); ?>">
        <? if ($this->allow('comment')) : ?>
            <h3 class="comment-title">
                <? i18n('评论');
                    $comments->cancelReply(_i18n('/ 取消评论')); ?>
            </h3>
            <form method="post" action="<? $this->commentUrl() ?>" id="comment-form" role="form">
                <? if ($this->user->hasLogin()) : ?>
                    <p><? i18n('用户名'); ?>: <a href="<? $this->options->profileUrl(); ?>"><? $this->user->screenName(); ?></a>. <a href="<? $this->options->logoutUrl(); ?>" title="Logout"><? i18n('退出'); ?> &raquo;</a></p>
                <? else : ?>
                    <input type="text" name="author" id="author" class="text" value="<? $this->remember('author'); ?>" required placeholder="<? i18n('名称') ?>" />
                    <input type="email" name="mail" id="mail" class="text" value="<? $this->remember('mail'); ?>" <? if ($this->options->commentsRequireMail) : ?> required<? endif; ?> placeholder="<? i18n('邮箱') ?>" />
                    <input type="url" name="url" id="url" class="text" placeholder="<? i18n('网址'); ?>" value="<? $this->remember('url'); ?>" <? if ($this->options->commentsRequireURL) : ?> required<? endif; ?> />
                <? endif; ?>
                <textarea name="text" id="textarea" class="OwO-textarea textarea" required placeholder="<? i18n('在这里输入你的评论...（Ctrl/Control + Enter 快捷提交）') ?>"><? $this->remember('text'); ?></textarea>
                <div class="OwO"></div>
                <button class="sheen" type="submit" class="submit"><? i18n('评论'); ?></button>
            </form>
        <? endif; ?>
    </div>

    <? if ($comments->have()) : ?>
        <? $comments->listComments(); ?>
        <? $comments->pageNav('<i class="iconfont icon-prev-m"></i>', '<i class="iconfont icon-next-m"></i>'); ?>
    <? endif; ?>

</div>

<!-- OwO emoji -->
<? if (!empty($this->options->feature) && in_array('commentEmoji', $this->options->feature) && $this->allow('comment')) : ?>
    <script src="<? $this->options->themeUrl('./js/lib/OwO/OwO.min.js'); ?>"></script>

    <script>
        new OwO({
            logo: 'OωO',
            container: document.getElementsByClassName('OwO')[0],
            target: document.getElementsByClassName('OwO-textarea')[0],
            api: '<? $this->options->themeUrl('./js/lib/OwO/OwO.json '); ?>',
            position: 'down',
            width: '100%',
            maxHeight: '250px'
        })
    </script>
<? endif; ?>