<h1 align="center">Sagiri</h1>

> 如 ‘你’ 般可爱，简单纯粹。

[![](https://img.shields.io/badge/license-GPL%203-blue.svg?style=flat-square)](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/LICENSE)

[![donate](https://img.shields.io/badge/$-donate-ff69b4.svg?style=flat-square)](https://github.com/shiyiya/typecho-theme-sagiri#donate)

## 介绍

[The English Version](./doc/README-EN.md)

Sagiri ，简洁可爱的 `typecho` 主题。
主题样式基于 [hexo-theme-sagiri](https://github.com/DIYgod/hexo-theme-sagiri) 上修改与添加。

如果有相关问题 / 想知道更多？
Tencent Group: [861379856](https://jq.qq.com/?_wv=1027&k=5kACJ6v)

- [change log](./doc/changelog.md)

- 轻量级，无 JQery，仅使用 Prism 作为代码高亮
- 支持代码高亮，5 主题，支持主流代码，使用 Prism
- 响应式，适用于移动端与桌面端，桌面端 > 移动端
- 支持首页文章缩略图、~~随机图~~
- 支持文章目录树、相关文章与~~数学公式渲染~~
- 独立页面支持归档、分类、友链
- ~~全站无刷新 miniPjax~~、图片懒加载支持
- ~~国际化支持（i18N）~~

## 预览

[![overview](./doc/shot.png)](https://runtua.cn)

## 演示站点

> 如果介意联系我将其撤下，想留在这儿请留言或者直接 `PR`。

- https://konoha.moe/

## 主题使用

点击“Download ZIP”下载，解压后将文件夹改名（不改名 typecho 会报文件夹名过长的错误（500））为 Sagiri 后上传到 /usr/themes，并启用主题

如果需要更新主题，则先下载最新文件，然后覆盖原文件即可完成更新，部分新增加的功能需要到后台开启才会生效

## 相关设置

- 缩略图

  - 文章缩略图为附件第一张图片 -> 文章内第一张图片。
  - 缩略图支持 Markdown 格式, HTML 格式以及附件形式, Markdown 格式为 `![图片描述](图片链接)` 。
  - 如果想要自定义某篇文章的缩略图, 但是不想让该图片在文章中出现, 则可上传附件而不使用。

- 首页文章概览默认最大输出 100 个字符, 可手动添加截断符 `<!-- more -->` 控制输出。

- 如何创建归档 & 搜索 & 分类
  - 归档 :
    新建独立页面 -> 选择模板 -> page-archive -> 设置 url 为 archive -> 高级选项 -> 隐藏
  - 搜索 :  
    新建独立页面 -> 选择模板 -> page-search -> 设置 url 为 search -> 高级选项 -> 隐藏
  - 分类 :
    新建独立页面 -> 选择模板 -> page-categories-> 设置 url 为 categorie -> 高级选项 -> 隐藏
  - 示例：
    ![how-to-create-archive-page](https://runtua.cn/usr/uploads/2018/10/3336908615.png)

### 头部个性化标徽

独立页面文字需为：

- Home <-> 主页
- Comments <-> 留言
- About <-> 关于
- Link <-> 友链
  暂定以上四个

## 图片懒加载

```
// 写法
![宽::高::描述](图片地址)

//例如
![300::100::这是一只歪脖子鸟？？.jpg](http://localhost/typecho/usr/themes/typecho-theme-sagiri/img/author.jpg)
```

## 友情链接

```markdown
- ![头像描述](头像链接)[链接描述](链接)<hr> 一个有趣的站点
- [链接描述](链接) <hr> 另一个有趣的站点
- [链接描述](链接)
```

## 备份

由于浏览量是新增字段故迁移时需要新建一个字段

```sql
-- mysql
ALTER TABLE `typecho_contents` ADD `views` INT(10) NULL DEFAULT '0' AFTER `parent`;
```

## Author

**typecho-theme-sagiri** © [shiyi](https://github.com/shiyiya), Released under the [GPL-3.0](./LICENSE) License.<br>
Authored and maintained by DIYgod with help from contributors ([list](https://github.com/shiyiya/typecho-theme-sagiri/contributors)).

> Blog [@OZOO](https://www.runtua.cn) · GitHub [@shiyi](https://github.com/shiyiya) · Twitter [@shiyi](https://twitter.com/)

## 贡献

欢迎各种形式的贡献，包括但不限于优化，添加功能，文档 & 代码的改进，问题和 bugs 的报告。

### 贡献方式：
- clone / clone master/dev
- checkout dev => do something / \\
- update changelog
- pr -> dev / pr

## 许可证

Open sourced under the GPL V3.0 license.
根据 GPL V3.0 许可证开源。
