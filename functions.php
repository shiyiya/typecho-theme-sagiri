<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

require_once("theme-helper.php");

function themeConfig($form) {

    $sagiri = new Sagiri();
    $sagiri->update();
    $sagiri->ga();
    

    $fav = new Typecho_Widget_Helper_Form_Element_Text('fav', NULL, NULL, _t('通用图标'), _t('请填入完整链接，作为网站标签页图标，手机建议大小 114x114'));
    $form->addInput($fav);
    $IOSIcon = new Typecho_Widget_Helper_Form_Element_Text('IOSIcon', NULL, NULL, _t('IOS 图标'), _t('请填入完整链接，作为网站图标，手机建议大小 114x114，适用 IOS 全系列'));
    $form->addInput($IOSIcon);
    $themeColor = new Typecho_Widget_Helper_Form_Element_Text('themeColor', NULL, NULL, _t('网站基础色调，用于浏览器搜索头部颜色显示'), _t('请填入完整 RGB（rgb(255, 255, 255)） 色值或者十六进制颜色代码（#fff）'));
    $form->addInput($themeColor);


    $authorImage = new Typecho_Widget_Helper_Form_Element_Text('authorImage', NULL, NULL, _t('网站概要头像'), _t('请填入完整链接，作为网站头像，不填则为默认，建议为方形'));
    $form->addInput($authorImage);
    $liveTime = new Typecho_Widget_Helper_Form_Element_Text('liveTime', NULL, NULL, _t('建站日期'), _t('填写你的建站日期，格式：2017/11/02 11:31:29 '));
    $form->addInput($liveTime);

    /* Social account */
    $GitHubLink = new Typecho_Widget_Helper_Form_Element_Text('GitHubLink', NULL, NULL, _t('GitHub 链接'), _t('请填入完整链接'));
    $form->addInput($GitHubLink);
    $TwitterLink = new Typecho_Widget_Helper_Form_Element_Text('TwitterLink', NULL, NULL, _t('twitter 链接'), _t('请填入完整链接'));
    $form->addInput($TwitterLink);
    $QQLink = new Typecho_Widget_Helper_Form_Element_Text('QQLink', NULL, NULL, _t('QQ 链接'), _t('请填入完整链接'));
    $form->addInput($QQLink);

    $backGroundImage = new Typecho_Widget_Helper_Form_Element_Text('backGroundImage', NULL, NULL, _t('网站 Banner 背景图'), _t('请填入完整链接，作为网站背景，不填则为默认'));
    $form->addInput($backGroundImage);

    $WechatQR = new Typecho_Widget_Helper_Form_Element_Text('WechatQR', NULL, NULL, _t('微信二维码'), _t('请填入完整二维码图片链接，用于赞赏'));
    $form->addInput($WechatQR);
    $AlipayQR = new Typecho_Widget_Helper_Form_Element_Text('AlipayQR', NULL, NULL, _t('支付宝二维码'), _t('请填入完整二维码图片链接，用于赞赏'));
    $form->addInput($AlipayQR);


    $customCss = new Typecho_Widget_Helper_Form_Element_Textarea('customCss', NULL, NULL, _t('自定义 CSS 代码'), _t('填写你的 CSS 代码，需要 `style` 标签'));
    $form->addInput($customCss);
    $customScript = new Typecho_Widget_Helper_Form_Element_Textarea('customScript', NULL, NULL, _t('自定义 JavaScript 代码'), _t('填写你 JavaScript 代码，不需要 `script` 标签'));
    $form->addInput($customScript);
    $GoogleAnalytics = new Typecho_Widget_Helper_Form_Element_Textarea('GoogleAnalytics', NULL, NULL, _t('Google Analytics 代码'), _t('填写你从 Google Analytics 获取到的 Universal Analytics 跟踪代码，需要 script 标签'));
    $form->addInput($GoogleAnalytics);


    $StyleSettings = new Typecho_Widget_Helper_Form_Element_Checkbox('StyleSettings', 
        array('Banner' => _t('是否显示 Banner'),
        ),
        array(), _t('主题样式设置'));
    $form->addInput($StyleSettings->multiMode());


     /* Theme feature */
    $feature = new Typecho_Widget_Helper_Form_Element_Checkbox('feature', 
        array('showThumb' => _t('首页文章缩略图'),
        'loadNextPagePost' => _t('首页滚动加载'),
        'ribbons' => _t('类彩带背景'),
        'codeHighlight' => _t('代码高亮'),
        'commentEmoji' => _t('评论表情'),
        'fastclick' => _t('解决移动端300ms延迟'),
        /* 'pjax' => _t('mini-pjax'), */
        'lazyImg' => _t('文章内图片懒加载'),
        ),
        array('showThumb'), _t('额外功能设置'));
    $form->addInput($feature->multiMode());

    
    $siderbarOption = new Typecho_Widget_Helper_Form_Element_Checkbox('siderbarOption', 
        array('TopViewPost' => _t('热门文章'),
        'topComnentPost' => _t('热评文章'),
        'randomPost' => _t('随机文章'),),
        array('randomPost'), _t('侧栏相关设置'));
    $form->addInput($siderbarOption->multiMode());


    $codeHighlightTheme = new Typecho_Widget_Helper_Form_Element_Radio('codeHighlightTheme', 
        array('default' => _t('默认高亮，灰底'),
        'okaidia' => _t('sublime 默认配色，黑底'),
        'coy' => _t('MDN 配色，白底蓝边'),
        'Solarized-Light' => _t('淡黄底色'),
        'Tomorrow-Night' => _t('黑底色'),),
        'default',_t('代码高亮主题'), _t('代码高亮主题')
   );
   $form->addInput($codeHighlightTheme);
    

    /* $PWA = new Typecho_Widget_Helper_Form_Element_Radio('PWA',
        array('able' => _t('启用'),
        'disable' => _t('禁用'),),
        'disable',_t('桌面支持'), _t('默认禁止，Pro版可开启')
    );
    $form->addInput($PWA); */

};