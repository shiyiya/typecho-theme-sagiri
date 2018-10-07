<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {   

    $fav = new Typecho_Widget_Helper_Form_Element_Text('fav', NULL, NULL, _t('IOS 图标'), _t('请填入完整链接，作为网站图标，手机建议大小 114x114，适用 IOS 全系列'));
    $form->addInput($fav);
    $IOSIcon = new Typecho_Widget_Helper_Form_Element_Text('IOSIcon', NULL, NULL, _t('IOS 图标'), _t('请填入完整链接，作为网站图标，手机建议大小 114x114，适用 IOS 全系列'));
    $form->addInput($IOSIcon);
    $themeColor = new Typecho_Widget_Helper_Form_Element_Text('themeColor', NULL, NULL, _t('网站基础色调，用于浏览器搜索头部颜色显示'), _t('请填入完整 RGB（rgb(255, 255, 255)） 色值或者十六进制颜色代码（#fff）'));
    $form->addInput($themeColor);


    $author = new Typecho_Widget_Helper_Form_Element_Text('author', NULL, NULL, _t('网站概要头像'), _t('请填入完整链接，作为网站头像，不填则为默认，建议为方形'));
    $form->addInput($author);
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

    $WechatQR = new Typecho_Widget_Helper_Form_Element_Text('WechatQR', NULL, NULL, _t('微信二维码'), _t('请填入完整二维码图片链接'));
    $form->addInput($WechatQR);
    $AlipayQR = new Typecho_Widget_Helper_Form_Element_Text('AlipayQR', NULL, NULL, _t('支付宝二维码'), _t('请填入完整二维码图片链接'));
    $form->addInput($AlipayQR);


    $customCss = new Typecho_Widget_Helper_Form_Element_Textarea('customCss', NULL, NULL, _t('自定义 CSS 代码'), _t('填写你的 CSS 代码，需要 `style` 标签'));
    $form->addInput($customCss);
    $customScript = new Typecho_Widget_Helper_Form_Element_Textarea('customScript', NULL, NULL, _t('自定义 JavaScript 代码'), _t('填写你 JavaScript 代码，需要 `script` 标签'));
    $form->addInput($customScript);
    $GoogleAnalytics = new Typecho_Widget_Helper_Form_Element_Textarea('GoogleAnalytics', NULL, NULL, _t('Google Analytics 代码'), _t('填写你从 Google Analytics 获取到的 Universal Analytics 跟踪代码，需要 script 标签'));
    $form->addInput($GoogleAnalytics);


    /* Theme feature */
    $feature = new Typecho_Widget_Helper_Form_Element_Checkbox('feature', 
    array('showThumb' => _t('显示文章题图设置'),
    'codeHighlight' => _t('启用代码高亮')),
    array('showThumb'), _t('额外功能设置'));
    
    $form->addInput($feature->multiMode());

    $PWA = new Typecho_Widget_Helper_Form_Element_Radio('PWA',
    array('able' => _t('启用'),
        'disable' => _t('禁用'),
    ),
    'disable', _t('桌面级支持'), _t('需升级 Pro 版'));
    $form->addInput($PWA);
}

function showThumb($obj,$size=null,$link=false){
    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    $attach = $obj->attachments(1)->attachment;
    if (isset($attach->isImage) && $attach->isImage == 1){
        $thumb = $attach->url;
        if(!empty($options->src_add) && !empty($options->cdn_add)){
            $thumb = str_ireplace($options->src_add,$options->cdn_add,$thumb);
        }
    }elseif(isset($matches[1][0])){
        $thumb = $matches[1][0];
        if(!empty($options->src_add) && !empty($options->cdn_add)){
            $thumb = str_ireplace($options->src_add,$options->cdn_add,$thumb);
        }
    }
    if(empty($thumb) && empty($options->default_thumb)){
        return '';
    }else{
        $thumb = empty($thumb) ? $options->default_thumb : $thumb;
    }
    if($link){
        return $thumb;
    }
}

function getBrowser($agent){
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $browserVersion = 'IE';
    } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Firefox/', $regs[0]);
        $FireFox_vern = explode('.', $str1[1]);
        $browserVersion = 'Firefox '. $FireFox_vern[0];
    } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Maxthon/', $agent);
        $Maxthon_vern = explode('.', $str1[1]);
        $browserVersion = 'Maxthon '.$Maxthon_vern[0];
    } else if (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $agent, $regs)) {
        $browserVersion = 'Sogo';
    } else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
        $browserVersion = '360';
    } else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Edge/', $regs[0]);
        $Edge_vern = explode('.', $str1[1]);
        $browserVersion = 'Edge '.$Edge_vern[0];
    } else if (preg_match('/UC/i', $agent)) {
        $str1 = explode('rowser/',  $agent);
        $UCBrowser_vern = explode('.', $str1[1]);
        $browserVersion = 'UC '.$UCBrowser_vern[0];
    } else if (preg_match('/MicroMesseng/i', $agent, $regs)) {
        $browserVersion = 'Wechat';
    }  else if (preg_match('/WeiBo/i', $agent, $regs)) {
        $browserVersion = 'Weibo';
    }  else if (preg_match('/QQ/i', $agent, $regs)||preg_match('/QQBrowser\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('rowser/',  $agent);
        $QQ_vern = explode('.', $str1[1]);
        $browserVersion = 'QQ '.$QQ_vern[0];
    } else if (preg_match('/BIDU/i', $agent, $regs)) {
        $browserVersion = 'Baidu';
    } else if (preg_match('/LBBROWSER/i', $agent, $regs)) {
        $browserVersion = 'LieBao';
    } else if (preg_match('/TheWorld/i', $agent, $regs)) {
        $browserVersion = '世界之窗';
    } else if (preg_match('/XiaoMi/i', $agent, $regs)) {
        $browserVersion = 'Mi';
    } else if (preg_match('/UBrowser/i', $agent, $regs)) {
        $str1 = explode('rowser/',  $agent);
        $UCBrowser_vern = explode('.', $str1[1]);
        $browserVersion = 'UC '.$UCBrowser_vern[0];
    } else if (preg_match('/mailapp/i', $agent, $regs)) {
        $browserVersion = 'email内嵌';
    } else if (preg_match('/2345Explorer/i', $agent, $regs)) {
        $browserVersion = '2345';
    } else if (preg_match('/Sleipnir/i', $agent, $regs)) {
        $browserVersion = '神马';
    } else if (preg_match('/YaBrowser/i', $agent, $regs)) {
        $browserVersion = 'Yandex';
    }  else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $browserVersion = 'Opera';
    } else if (preg_match('/MZBrowser/i', $agent, $regs)) {
        $browserVersion = '魅族';
    } else if (preg_match('/VivoBrowser/i', $agent, $regs)) {
        $browserVersion = 'vivo';
    } else if (preg_match('/Quark/i', $agent, $regs)) {
        $browserVersion = '夸克';
    } else if (preg_match('/mixia/i', $agent, $regs)) {
        $browserVersion = '米侠';
    }else if (preg_match('/fusion/i', $agent, $regs)) {
        $browserVersion = '客户端';
    } else if (preg_match('/CoolMarket/i', $agent, $regs)) {
        $browserVersion = '基安内置';
    } else if (preg_match('/Thunder/i', $agent, $regs)) {
        $browserVersion = '迅雷内置';
    } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Chrome/', $agent);
        $chrome_vern = explode('.', $str1[1]);
        $browserVersion = 'Chrome '.$chrome_vern[0];
    } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
         $str1 = explode('Version/',  $agent);
        $safari_vern = explode('.', $str1[1]);
        $browserVersion = 'Safari '.$safari_vern[0];
    } else{
        $browserVersion = '?';
    }
    echo $browserVersion;
}
function getOs($agent){
    if (preg_match('/win/i', $agent)) {
        if (preg_match('/nt 6.0/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> Vista';
        } else if (preg_match('/nt 6.1/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 7';
        } else if (preg_match('/nt 6.2/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 8';
        } else if(preg_match('/nt 6.3/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 8.1';
        } else if(preg_match('/nt 5.1/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> XP';
        } else if (preg_match('/nt 10.0/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 10';
        } else{
            $OSVersion = '<i class="iconfont icon-windows"></i>';
        }
    } else if (preg_match('/android/i', $agent)) {
        if (preg_match('/android 9/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> P';
        }
        else if (preg_match('/android 8/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> O';
        }
        else if (preg_match('/android 7/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> N';
        }
        else if (preg_match('/android 6/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> M';
        }
        else if (preg_match('/android 5/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> L';
        }
        else{
            $OSVersion = '<i class="iconfont icon-android"></i>';
        }
    } else if (preg_match('/ubuntu/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-linux"></i>';
        } else if (preg_match('/linux/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-linux"></i>';
        }else if (preg_match('/iPhone/i', $agent)) {
            if(preg_match('/iPhone OS 11/i', $agent)){
                $OSVersion = '<i class="iconfont icon-iphone"></i> 11';
            }else if(preg_match('/iPhone OS 12/i', $agent)){
                $OSVersion = '<i class="iconfont icon-iphone"></i> 12';
            }else{
                $OSVersion = '<i class="iconfont icon-iphone"></i> < 11';
            }
        } else if (preg_match('/mac/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-mac"></i>';
        }else if (preg_match('/fusion/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i>';
        } else {
            $OSVersion = '?系统';
        }
    echo $OSVersion;
}


function themeFields($layout) {
    $viewsNum = new Typecho_Widget_Helper_Form_Element_Text('viewsNum', NULL, 0, _t('文章浏览数'), _t('文章浏览数统计'));
    $layout->addItem($viewsNum);
}
function themeInit($archive){
    if($archive->is('single')){
        viewCounter($archive);
    }
}
function viewCounter($archive){
    $cid = $archive->cid;
    $views = Typecho_Cookie::get('__typecho_views');
    $views = !empty($views) ? explode(',', $views) : array();
    if(!in_array($cid,$views)){
        $db = Typecho_Db::get();
        $field = $db->fetchRow($db->select()->from('table.fields')->where('cid = ? AND name = ?', $cid , 'viewsNum'));
        if(empty($field)){
            $db->query($db->insert('table.fields')
            ->rows(array('cid' => $cid, 'name' => 'viewsNum', 'type' => 'str', 'str_value' => 1, 'int_value' => 0, 'float_value' => 0)));
        }else{
            $db->query($db->update('table.fields')->expression('str_value', 'str_value + 1')->where('cid = ? AND name = ?', $cid , 'viewsNum'));
        }
        array_push($views, $cid);
        $views = implode(',', $views);
        Typecho_Cookie::set('__typecho_views', $views); //记录到cookie
    }
}
