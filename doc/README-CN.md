<h1 align="center">Sagiri</h1>
<h3 align="center">As lovely as sagiri</h3>

<p align="center">
  <a href="">预览</a> |
  <a href="https://shiyiya.github.io/typecho-theme-sagiri">文档</a> |
  <a href="https://github.com/shiyiya/typecho-theme-sagiri/releases">下载</a> |
  <a href="../README.md">英文文档（EN Documentation）</a>
  <br />
  <br />
  <a href="https://github.com/shiyiya/typecho-theme-sagiri/tree/pjax">PJAX 版本</a> |
  <a href="./doc/changelog.md">更新日志</a> |
  <a href="#donate">捐赠支持</a>
  <br />
  <br />
  <b>As lovely as sagiri, based on <a href="https://github.com/DIYgod/hexo-theme-sagiri">hexo-theme-sagiri</a></b>

</p>

[![stars](https://flat.badgen.net/github/stars/shiyiya/typecho-theme-sagiri?icon=github)](https://github.com/shiyiya/typecho-theme-sagiri)
[![npm](https://flat.badgen.net/npm/v/typecho-theme-sagiri/?color=fb3e44)](https://www.npmjs.com/package/typecho-theme-sagiri)
[![jsdelivr](https://data.jsdelivr.com/v1/package/npm/typecho-theme-sagiri/badge)](https://www.jsdelivr.com/package/npm/typecho-theme-sagiri)
[![license](https://img.shields.io/badge/license-GPL%203-blue.svg?style=flat-square)](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/LICENSE) [![donate](https://img.shields.io/badge/$-donate-ff69b4.svg?style=flat-square)](https://github.com/shiyiya/typecho-theme-sagiri#donate)

## 预览

![shot](https://cdn.jsdelivr.net/npm/typecho-theme-sagiri@1.1.4/screenshot.png)

- https://blog.imlazy.ink:233
- https://mianao.info
- ···

如果你想（不想）展示在这里，可以提交相关 `PR`；不过呢，需要满足一些小小的条件：

- 网站可稳定访问（至少不会几个月就无法访问）
- 内容健康，和谐。（你懂的）
- 更换模板（至少不会几个月就更换模板）

当然最好：

- 跟进主题更新
- DIY 能力强

## 特性

- Instantclick
- [代码高亮](#代码高亮)
- [独立页面](#独立页面)
- [多语言国际化](#多语言)
- [图片懒加载](图片懒加载)
- [短代码支持](短代码支持)

**仅支持 IE9+ 浏览器**

## 安装

1. 从 [releases](https://github.com/shiyiya/typecho-theme-sagiri/releases) 页面下载最新发布版本，将主题文件夹移动到你的主题文件夹。
2. 在后台启用本主题，如果遇到错误，请先尝试将文件夹重命名为 `sagiri`。

- 如果后台检测有更新，点击对应的链接去下载最新版本，重复以上步骤，并选择直接覆盖对应文件；新的功能可能需要重新启用主题方可生效。

### 代码高亮

自带的高亮主题：COY，default，okaidia，Solarized Light，Tomorrow Night

<table>
  <tr>
    <td><img src="https://i.loli.net/2019/10/18/4qOlZUzcpF6Lo7P.png"></td>
    <td><img src="https://i.loli.net/2019/10/18/keoYfqXAdcyTS3I.png"></td>
    <td><img src="https://i.loli.net/2019/10/18/GDqMJtTC9EYykAm.png"></td>
  </tr>
</table>

默认支持的语言：markup+css+clike+javascript+c+csharp+cpp+ruby+docker+markup-templating+flow+git+go+haskell+java+json+kotlin+markdown+lisp+lua+php+sql+powershell+python+typescript+rust+scala+scheme+pug+swift+yaml+vi

**更多主题和语言支持请自行到 [Prism.js 官网](https://prismjs.com/) 下载。**

### 独立页面

- 预览

  <table>
    <tr>
       <td><img style="width:20%" src="https://i.loli.net/2019/10/18/vhp6BCEgjRwXa3O.png"></td>
       <td><img style="width:20%" src="https://i.loli.net/2019/10/18/YbMNLlRIfxASFOT.png"></td>
       <td><img style="width:20%" src="https://i.loli.net/2019/10/18/gk7YqFKSBsZAzQL.png"></td>
       <td><img style="width:20%" src="https://i.loli.net/2019/10/18/ltpdW326brZ94UB.png"></td>
    </tr>
    <tr>
       <td><b>search.html</b></td>
       <td><b>Without restriction</b></td>
       <td><b>archive.html</b></td>
       <td><b>category.html</b></td>
     </tr>
  </table>

- 如何创建对应的独立页面？

  在后台 管理->独立页面->新增 添加独立页面，选择你想创建的模板，并按要求填写 url，点击创建即可。

- 友链页面写法

```markdown
- ![avatar descript](avatar href)[href descript](href)<hr> descript
- [title](href) <hr> descript
- [title](href)
```

### 多语言

目前仅有 简体中文、英文（机翻） 两种语言，如果你想要其他语言支持，欢迎贡献 :smile:。

- [en](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/en.php)
- [Japan](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/ja.php)
- [zh_tw](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/zh_TW.php)
- [zh_CN](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/zh_CN.php)

### 图片懒加载

文章内直接正常编写即可。

```markdown
![Image Descript](image URL)

//example
![how-to-create-archive](https://website-href-/your/path/file.png)
```

或者

```html
<img
  class="lazy-loader"
  lazy-src="https://your.pic.url"
  src="占位图片"
  alt="图片描述"
  title="图片加载出错占位"
/>'
```

### 短代码支持

- 视频短代码

  ```markdown
  - B 站视频写法（[bplayer]为必须）：
    [bplayer](https://www.bilibili.com/video/av68718423)
    [bplayer](B 站视频链接)

  - 本低上传视频（[lplayer]为必须）：
    [lplayer](/usr/uploads/2019/11/330578098.mp4)
    [lplayer](本站视频链接不需要前缀)

  - Youtube（[yplayer]为必须）：
    [yplayer](https://www.youtube.com/watch?v=wv1bHjMGUBY)
    [bplayer](Youtube 视频链接)
  ```

- 将会渲染成：
  ![video shot](https://i.loli.net/2019/11/04/VQgOJcIUi8t2MwN.png)

- todo

## 其他事项

- 首页文章卡片

  默认输出全部文章内容，请手动在文章内添加 `<!-- more -->` 截断输出

  ⬇ ⬇ ⬇ 如下 (文章内容)

  ```markdown
  ## 你好

  我被抓到啦！

  <!--more-->

  **这里将不会在文章卡片显示**
  ~~Can you find me?~~
  ```

- 文章缩略图
  优先级：文章自定义字段 -> 第一个上传的图片 -> 文章内图片链接 -> 预设的随机图地址

## 评论表情

How to import custom Emoji ?

- [OwO](https://github.com/DIYgod/OwO)
- [Emjio Util](./util/emjioUtil.min.js)

## Author

**typecho-theme-sagiri** © [shiyi](https://github.com/shiyiya), Released under the [GPL-3.0](./LICENSE) License.<br>
Authored and maintained by DIYgod with help from contributors ([list](https://github.com/shiyiya/typecho-theme-sagiri/contributors)).

> Blog [@OZOO](http://www.runtua.cn) · GitHub [@shiyi](https://github.com/shiyiya) · Twitter [@shiyi](https://twitter.com/)

## 捐赠

你的支持就是我的动力~ :-)

- [Paypal](https://paypal.me/)
- [微信](https://i.loli.net/2019/10/27/n5fAVZyRlN63EH4.png)
- [支付宝]()

## 贡献

如果你想 Sagiri 更加完善，你可以为它：

- 编写插件（JS、PHP）
- [编写教程](https://github.com/shiyiya/typecho-theme-sagiri/tree/gh-pages)
- [提出 BUG | 新功能申请](https://github.com/shiyiya/typecho-theme-sagiri/issues/new/choose)
- 添加/改进 翻译
  - [en](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/en.php)
  - [Japan](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/ja.php)
  - [zh_tw](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/zh_TW.php)
  - [zh_CN](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/zh_CN.php)

## License

本项目全部遵循 GPL V3 开源许可，如需更改，使用相关代码请保留署名 / 相关链接。
http://www.gnu.org/licenses/gpl-3.0.html
