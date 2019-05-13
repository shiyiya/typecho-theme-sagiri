<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class Lang_en {

    /**
    * @return string 返回语言名称
    */
    public function name(){
        return "English";
    }

    /**
    * @return array 返回包含翻译文本的数组
    */
    public function translated(){
        return array(

            '首页' => 'Home',
            '搜索…' => 'Search',
            '分类' => 'Categories',

            '登录' => 'Login',
            '退出' => 'Logout',
            '注册' => 'registered',
            '用户名' => 'username',
            '密码' => 'password',

            '详情' => 'details',
            '文章RSS' => 'Articles RSS',
            '评论RSS' => 'Comment RSS',


            '文章目录' => 'Article Directory',
            '热门文章' => 'Popular articles',
            '最新评论' => 'Latest comments',
            '随机文章' => 'Random articles',

            '设置' => 'Setting',
            '重置' => 'Reset',


            '导航' => 'Navigation',
            '组成' => 'Components',
            '页面' => 'Pages',
            '友链' => 'Links',
            '后台管理' => 'Management',

            /** Post */
            '阅读全文' => 'Read More',
            '浏览量' => 'Read ',
            '暂无评论' => ' No comments',
            '评论数 1' => ' One comment',
            '%d 条评论' => ' %d comments',
            '条评论' => ' comments',
            
            
            /*评论 Comments*/
            '阅读: %d' => 'Read: %d',
            '次浏览' => 'views',
            '在这里输入你的评论...（Ctrl/Control + Enter 快捷提交）' => 'Enter your comments here ... (Ctrl / Control + Enter)',
            '发表评论' => 'Leave a Comment',
            '评论' => 'Comment',
            
            '名称' => 'Name',
            '邮箱' => 'Email',
            '网址' => 'Website',
            '姓名或昵称' => 'Name or nickname',
            '网站或博客' => 'Website or blog',
            '提交中' => 'submitting',
            '此处评论已关闭' => 'Comment here is closed',
            '说点什么吧……' => 'say something…',
            '评论通知' => 'Commentary notice',
            '登录通知' => 'Login notification',

            '微博' => 'Weibo',
            '用户名或电子邮箱' => 'User name or e-mail address',
            '地址' => 'Site',
            '邮箱 (必填,将保密)' => 'E-mail (required)',
            '表情' => 'Emoji',

            /*文章页面 post/page.php */
            '如果觉得我的文章对你有用，请随意赞赏' => 'If you think my article is useful to you, please feel free to appreciate',
            '最后修改时间为' => 'The last modification time is',
            '最后修改' => 'Last modification',
            '著作权归作者所有' => 'The copyright belongs to the author',
            '转载请联系作者获得授权，并注明转载地址' => 'Please contact the author to obtain authorization, and indicate the reprint address',
            '赞赏作者' => 'Appreciate the author',
            '赞赏' => 'Support',
            '扫一扫支付' => 'Sweeping payments',
            '上一篇' => 'Previous',
            '下一篇' => 'Next',
            '回复' => 'Reply',
            '取消回复' => 'Cancel reply',
            '支付宝支付' => 'Pay by AliPay',
            '微信支付' => 'Pay by WeChat',
            '评论审核中' => 'Review',
            '空白占位符' => 'Placeholder',
            '图片占位符' => 'Placeholder',
            '分类 %s 下的文章' => 'Articles in the category of %s',
            '包含关键字 %s 的文章' => 'Articles containing the keywords of %s',
            '标签 %s 下的文章' => 'Articles under the label of %s',
            '%s 发布的文章' =>'Articles published by %s',
            '此处内容需要评论回复后方可阅读。' => 'The contents of this review need to be reviewed before reading.',
            '作者' => 'Author',
            '返回首页' => 'Return to Home',
            '没有找到搜索结果，请尝试更换关键词。' => 'Can not find the search results, please try to replace the keyword.',
            '正文' => "Text",

            /*登录退出提交 */
            '必须填写用户名' => 'Must fill in the user name',
            '必须填写昵称或姓名' => 'Must fill in nickname or name',
            '必须填写电子邮箱地址' => 'E-mail address must be filled in',
            '邮箱地址不合法' => 'E-mail address is not legal',
            '必须填写评论内容' => 'Must fill in the comments',
            '提交失败，请重试！' => 'Submit failed, please try again!',
            '提交失败,您的输入内容不符合规则！' => 'Submission failed, your input does not match the rules!',
            '请填写密码' => 'Please fill in the password',
            '登录失败，请重新登录' => 'Login failed, please log in again',
            '用户名或者密码错误，请重试' => 'Username or password is wrong, please try again',
            '登录成功' => 'Login successful',
            '退出成功，正在刷新当前页面' => 'The exit is successful and the current page is being refreshed',
            '退出失败，请重试' => 'Exit failed, please try again',
            '退出成功' => 'Exit successful',
            '密码错误，请重试' => 'Password is wrong, please try again',

            /*其他*/
            '返回顶部' => 'Top',
            '作者' => 'Author',
            '用户' => 'User',

            /*独立页面*/
            '好! 目前共计 %d 篇日志。 继续努力。' => 'Ok! At present,% d articles of diary. keep it up.'


        );
    }

    /**
    * @return string 返回日期的格式化字符串
    */
    public function dateFormat(){
        return "F j, Y";
    }
}
