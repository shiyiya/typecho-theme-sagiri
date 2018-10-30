<h1 align="center">Sagiri</h1>

> 如 ‘你’ 般可爱，简单纯粹。

[![Hex.pm](https://img.shields.io/hexpm/l/plug.svg?style=flat-square)](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/LICENSE)
[![donate](https://img.shields.io/badge/$-donate-ff69b4.svg?style=flat-square)](https://github.com/shiyiya/typecho-theme-sagiri#donate)

## 介绍

[EN](./doc/README-EN.md) [ZH-CN](./README.md)

Sagiri ，简洁可爱的 `typecho` 主题。
主题样式基于 [hexo-theme-sagiri](https://github.com/DIYgod/hexo-theme-sagiri) 上修改与添加。

- [change log](./doc/changelog.md)

- 轻量级，无 JQery，仅使用 Prism 作为代码高亮
- 支持代码高亮，5 主题，支持主流代码，使用 Prism
- 响应式，适用于移动端与桌面端，桌面端 > 移动端
- 支持首页文章缩略图、~~随机图~~
- 支持文章目录树、~~相关文章与数学公式渲染~~
- 独立页面支持归档、分类、友链
- ~~国际化支持（i18N）~~
- ~~全站无刷新 miniPjax 支持~~

## 预览

[![overview](https://runtua.cn/usr/uploads/2018/10/4100730242.png)](https://runtua.cn)

## 主题使用

点击“Download ZIP”下载，解压后将文件夹改名（不改名 typecho 会报文件夹名过长的错误（500））为 Sagiri 后上传到 /usr/themes，并启用主题

如果需要更新主题，则先下载最新文件，然后覆盖原文件即可完成更新，部分新增加的功能需要到后台开启才会生效

**注意事项**：由于`浏览量`是使用 typecho 自定义字段生成，而其在 **php7+ 上存在问题**，导致 php7+ 无法显示浏览量可将 function.php 添加以下代码：

```php
function getDbView($archive){

}
```

## 相关设置

- 缩略图

  - 文章缩略图为附件第一张图片 -> 文章内第一张图片。
  - 缩略图支持 Markdown 格式, HTML 格式以及附件形式, Markdown 格式为 ![图片描述](图片链接) 。
  - 如果想要自定义某篇文章的缩略图, 但是不想让该图片在文章中出现, 则可上传附件而不使用。

- 首页文章概览默认最大输出 100 个字符, 可手动添加截断符 <!-- more --> 控制输出。

- 如何创建归档 & 搜索 & 分类
  - 归档 :
    新建独立页面 -> 选择模板 -> page-archive -> 设置 url 为 archive -> 高级选项 -> 隐藏
  - 搜索 :  
    新建独立页面 -> 选择模板 -> page-search -> 设置 url 为 search -> 高级选项 -> 隐藏
  - 分类 :
    新建独立页面 -> 选择模板 -> page-categories-> 设置 url 为 categorie -> 高级选项 -> 隐藏
  - 示例：
    ![how-to-create-archive-page](https://runtua.cn/usr/uploads/2018/10/3336908615.png)

## Author

**typecho-theme-sagiri** © [shiyi](https://github.com/shiyiya), Released under the [GPL-3.0](./LICENSE) License.<br>
Authored and maintained by DIYgod with help from contributors ([list](https://github.com/shiyiya/typecho-theme-sagiri/contributors)).

> Blog [@OZOO](https://www.runtua.cn) · GitHub [@shiyi](https://github.com/shiyiya) · Twitter [@shiyi](https://twitter.com/)

## 贡献

欢迎各种形式的贡献，包括但不限于优化，添加功能，文档 & 代码的改进，问题和 bugs 的报告。

## 许可证

Open sourced under the GPL V3.0 license.
根据 GPL V3.0 许可证开源。
