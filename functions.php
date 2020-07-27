<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    include_once 'libray/i18n/index.php';
    include_once 'libray/update.php';

    Update::valid();

    $fav = new Typecho_Widget_Helper_Form_Element_Text('fav', NULL, NULL, _t('Favicon'), _i18n('请填入完整链接，作为网站标签页图标，手机建议大小 114x114'));
    $form->addInput($fav);
    $default_thumb = new Typecho_Widget_Helper_Form_Element_Text('default_thumb', NULL, NULL, _i18n('文章默认、随机头图'), _i18n('若文章内未抓取到图片则默认使用此地址作为图片'));
    $form->addInput($default_thumb);

    $backGroundImage = new Typecho_Widget_Helper_Form_Element_Text('backGroundImage', NULL, NULL, _i18n('网站 Banner 背景图'), _i18n('请填入完整链接'));
    $form->addInput($backGroundImage);
    $authorImage = new Typecho_Widget_Helper_Form_Element_Text('authorImage', NULL, NULL, _i18n('网站概要头像'), _i18n('请填入完整链接，作为网站头像，不填则为默认，建议为方形'));
    $form->addInput($authorImage);
    $liveTime = new Typecho_Widget_Helper_Form_Element_Text('liveTime', NULL, NULL, _i18n('建站日期'), _i18n('格式：2017/11/02 11:31:29'));
    $form->addInput($liveTime);

    /* Social account */
    $GitHubLink = new Typecho_Widget_Helper_Form_Element_Text('GitHubLink', NULL, NULL, _t('GitHub'), _i18n('请填入完整链接'));
    $form->addInput($GitHubLink);
    $TwitterLink = new Typecho_Widget_Helper_Form_Element_Text('TwitterLink', NULL, NULL, _t('twitter'), _i18n('请填入完整链接'));
    $form->addInput($TwitterLink);
    $QQLink = new Typecho_Widget_Helper_Form_Element_Text('QQLink', NULL, NULL, _t('QQ'), _i18n('请填入完整链接'));
    $form->addInput($QQLink);

    $WechatQR = new Typecho_Widget_Helper_Form_Element_Text('WechatQR', NULL, NULL, _i18n('微信二维码'), _i18n('请填入完整二维码图片链接'));
    $form->addInput($WechatQR);
    $AlipayQR = new Typecho_Widget_Helper_Form_Element_Text('AlipayQR', NULL, NULL, _i18n('支付宝二维码'), _i18n('请填入完整二维码图片链接'));
    $form->addInput($AlipayQR);

    $customCss = new Typecho_Widget_Helper_Form_Element_Textarea('customCss', NULL, NULL, _t('Custom CSS Code'), _i18n('需要 `style` 标签'));
    $form->addInput($customCss);
    $customScript = new Typecho_Widget_Helper_Form_Element_Textarea('customScript', NULL, NULL, _t('Custom JS Code ( eg：Google Analytics Code ) '), _i18n('不需要 `script` 标签'));
    $form->addInput($customScript);

    $StyleSettings = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'StyleSettings',
        array(
            'Banner' => _i18n('是否显示 Banner'),
        ),
        array('Banner'),
        _i18n('主题样式设置')
    );
    $form->addInput($StyleSettings->multiMode());


    /* Theme feature */
    $feature = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'feature',
        array(
            'showThumb' => _i18n('文章缩略图'),
            'ribbons' => _i18n('彩带背景'),
            'codeHighlight' => _i18n('代码高亮'),
            'commentEmoji' => _i18n('评论表情'),
            'lazyImg' => _i18n('文章内图片懒加载'),
            'pjax' => _i18n('instantclick 支持'),
        ),
        array(''),
        _i18n('额外功能设置')
    );
    $form->addInput($feature->multiMode());


    $siderbarOption = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'siderbarOption',
        array(
            'TopViewPost' => _i18n('热门文章'),
            'topComnentPost' => _i18n('热评文章'),
            'randomPost' => _i18n('随机文章'),
        ),
        array(''),
        _i18n('侧栏相关设置')
    );
    $form->addInput($siderbarOption->multiMode());

    $CDN = new Typecho_Widget_Helper_Form_Element_Radio(
        'CDN',
        array(
            'local' => _i18n('local'),
            'jsdelivr' => _i18n('jsdelivr'),
        ),
        'local',
        _i18n('CDN setting'),
        _i18n('CDN setting')
    );
    $form->addInput($CDN);

    $codeHighlightTheme = new Typecho_Widget_Helper_Form_Element_Radio(
        'codeHighlightTheme',
        array(
            'default' => _i18n('Default'),
            'okaidia' => _i18n('Okaidia'),
            'coy' => _i18n('COY'),
            'Solarized-Light' => _i18n('Solarized Light'),
            'Tomorrow-Night' => _i18n('Tomorrow Night'),
        ),
        'default',
        _i18n('代码高亮'),
        _i18n('代码高亮')
    );
    $form->addInput($codeHighlightTheme);


    /* $PWA = new Typecho_Widget_Helper_Form_Element_Radio(
    'PWA',
    array(
      'able' => _t('启用'),
      'disable' => _t('禁用'),
    ),
    'disable',
    _t('桌面支持'),
    _t('默认禁止')
  );
  $form->addInput($PWA); */
}

function themeInit($widget)
{
    require_once 'libray/update.php';
    define('__THEME_VERSION__',  Update::getLocalVersion());

    require_once 'libray/i18n/index.php';
    require_once 'libray/theme-helper.php';
    require_once 'libray/field.php';
    require_once 'libray/short-code.php';
    require_once 'libray/cdn.php';
}


function themeFields(Typecho_Widget_Helper_Layout $layout)
{
    require_once 'libray/i18n/index.php';

    $thumb = new Typecho_Widget_Helper_Form_Element_Text('thumb', NULL, NULL, _t('头图地址(thumb)'), _t('输入图片URL，则优先使用该图片作为头图。'));
    $layout->addItem($thumb);

    $thumbAlt = new Typecho_Widget_Helper_Form_Element_Text('thumbAlt', NULL, NULL, _t('头图描述(alt)'), _t('输入图片的描述。'));
    $layout->addItem($thumbAlt);

    $views = new Typecho_Widget_Helper_Form_Element_Text('views', NULL, 0, _i18n('文章浏览数'), _i18n('文章浏览数统计'));
    $layout->addItem($views);
}
