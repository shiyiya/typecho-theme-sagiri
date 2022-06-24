<h1 align="center">Sagiri</h1>
<h3 align="center">As lovely as sagiri</h3>

<p align="center">
  <a href="">Preview</a> |
  <a href="https://github.com/shiyiya/typecho-theme-sagiri/releases">Download</a> |
  <a href="./doc/README-CN.md">中文文档</a>
  <br />
  <br />
  <a href="https://github.com/shiyiya/typecho-theme-sagiri/tree/pjax">PJAX Version</a> |
  <a href="./doc/changelog.md">Change Log</a> |
  <a href="#donate">Donate</a>
  <br />
  <br />
  <b>As lovely as sagiri, based on <a href="https://github.com/DIYgod/hexo-theme-sagiri">hexo-theme-sagiri</a></b>

</p>

## @bylin/typecho-theme-sagiri

[![npm](https://flat.badgen.net/npm/v/@bylin/typecho-theme-sagiri/?color=fb3e44)](https://www.npmjs.com/package/@bylin/typecho-theme-sagiri)
[![jsdelivr](https://data.jsdelivr.com/v1/package/npm/@bylin/typecho-theme-sagiri/badge)](https://www.jsdelivr.com/package/npm/@bylin/typecho-theme-sagiri)
[![license](https://img.shields.io/badge/license-GPL%203-blue.svg?style=flat-square)](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/LICENSE) [![donate](https://img.shields.io/badge/$-donate-ff69b4.svg?style=flat-square)](https://github.com/shiyiya/typecho-theme-sagiri#donate)

## ~~typecho-theme-sagiri~~ - deprecated

[![npm](https://flat.badgen.net/npm/v/typecho-theme-sagiri/?color=fb3e44)](https://www.npmjs.com/package/typecho-theme-sagiri)
[![jsdelivr](https://data.jsdelivr.com/v1/package/npm/typecho-theme-sagiri/badge)](https://www.jsdelivr.com/package/npm/typecho-theme-sagiri)

## Demo

![shot](https://cdn.jsdelivr.net/npm/typecho-theme-sagiri@1.1.4/screenshot.png)

- https://blog.imlazy.ink:233
- https://mianao.info
- ···

## Installation

1. Download from `build.tgz` of [releases](https://github.com/shiyiya/typecho-theme-sagiri/releases) to your blog's theme folder.
2. Enable it in the background management, if an error occurs, rename the folder to sagiri

- If you need to update the theme, download the latest version, then overwrite the original file to complete the update, some new features need to be enabled in the background to take effect.

```shell
git clone https://github.com/shiyiya/typecho-theme-sagiri.git
```

## Configuration

Most of Feature was off, turn on by yourself.

- [ ] Instantclick
- [x] Code Highlight
- [ ] Lazy load Image
- [x] Short Code
- [ ] OwO (Comment Emoji)

### Code Highlight

Using [Prism.js](https://prismjs.com/) as code highlighting.

<table>
  <tr>
    <td><img src="https://i.loli.net/2019/10/18/4qOlZUzcpF6Lo7P.png"></td>
    <td><img src="https://i.loli.net/2019/10/18/keoYfqXAdcyTS3I.png"></td>
    <td><img src="https://i.loli.net/2019/10/18/GDqMJtTC9EYykAm.png"></td>
  </tr>
</table>

### Multi-language

- Need more language support, Welcome contribution. ([How to PR](#Contribute))
- Add a translation
  - [en](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/en.php)
  - [Japan](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/ja.php)
  - [zh_tw](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/zh_TW.php)
  - [zh_CN](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/zh_CN.php)

### Short Code

- video Short Code

  ```markdown
  - bilibili video
    [bplayer](https://www.bilibili.com/video/av68718423)

  - local video
    [lplayer](/usr/uploads/2019/11/330578098.mp4)

  - youtube video
    [yplayer](https://www.youtube.com/watch?v=wv1bHjMGUBY)
  ```

- ...

## Others

- Index Post Card
  Home Article Overview The default maximum output is **Infinity** characters, you can manually add the truncation `<!-- more -->` control output.

  ```markdown
  ## hello world

  <!--more-->

  **I will not show it on the single page**
  ~~Can you find me?~~
  ```

- Article thumbnail
  weight of the thumbnail: Article field -> The first Upload Image of Article -> Image link in the article -> Random Image

## Link

Create a template before this, the content format is as follows

```markdown
- ![avatar descript](avatar href)[href descript](href)<hr> descript
- [title](href) <hr> descript
- [title](href)
```

## Comment Emoji

How to import custom Emoji ?

- [OwO](https://github.com/DIYgod/OwO)

## Author

**typecho-theme-sagiri** © [shiyi](https://github.com/shiyiya), Released under the [GPL-3.0](./LICENSE) License.<br>
Authored and maintained by DIYgod with help from contributors ([list](https://github.com/shiyiya/typecho-theme-sagiri/contributors)).

> · GitHub [@shiyi](https://github.com/shiyiya)

## Donate

Thank you for your support :-)

- [Donate via Paypal](https://paypal.me/ShiYiYa)

## Contribute

If you feel like to help us build a better Sagiri, you can

- Write a plugin
- [Submit a tutorial](https://github.com/shiyiya/typecho-theme-sagiri/tree/gh-pages)
- [Report a bug | Feature request](https://github.com/shiyiya/typecho-theme-sagiri/issues/new/choose)
- Add a translation
  - [en](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/en.php)
  - [Japan](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/ja.php)
  - [zh_tw](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/zh_TW.php)
  - [zh_CN](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/libray/i18n/lang/zh_CN.php)

## License

The All Html,CSS,JavaScript,and PHP files are licensed under the GNU General Public License v3:

http://www.gnu.org/licenses/gpl-3.0.html
