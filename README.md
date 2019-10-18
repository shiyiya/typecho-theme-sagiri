<p align="center">
  <h1>Sagiri</h1>
  <h3>As lovely as sagiri</h3>
  <a href="">Preview</a> |
  <a href="https://shiyiya.github.io/typecho-theme-sagiri">Documentation</a> |
  <a href="https://github.com/shiyiya/typecho-theme-sagiri/archive/master.zip">Download</a>
  <br/>
  <a href="https://github.com/shiyiya/typecho-theme-sagiri/tree/dev">Develop Version</a> |
  <a href="https://github.com/shiyiya/typecho-theme-sagiri/tree/pjax">PJAX Version</a> |
  <a href="https://github.com/shiyiya/typecho-theme-sagiri/releases">Releases</a>
  <a href="./doc/changelog.md">Change Log</a>
  <br/>
  <blockquote>
    As lovely as sagiri, based on <a href="https://github.com/DIYgod/hexo-theme-sagiri">hexo-theme-sagiri</a>
  </blockquote>
</p>

[![](https://img.shields.io/badge/license-GPL%203-blue.svg?style=flat-square)](https://github.com/shiyiya/typecho-theme-sagiri/blob/master/LICENSE)

[![donate](https://img.shields.io/badge/$-donate-ff69b4.svg?style=flat-square)](https://github.com/shiyiya/typecho-theme-sagiri#donate)

## Installation

1. Download & git clone from GitHub to your blog's theme folder.
2. Enable it in the background management, if an error occurs, rename the folder to sagiri

- If you need to update the theme, download the latest version, then overwrite the original file to complete the update, some new features need to be enabled in the background to take effect.

```shell
git clone https://github.com/shiyiya/typecho-theme-sagiri.git
```

## Demo

The content is healthy, there must be no plagiarism or excessive reprinting; at least not a few months can not be accessed & change the theme, and that's it!
If you think you meet the above conditions, please submit the relevant `PR` ([How to PR](#Contribute))

- https://blog.imlazy.ink:233
- https://mianao.info
- ···

## Features

### Rich Code Highlight Theme Choices

Using Prism.js as code highlighting. sagiri default comes with 5 themes & 32 language, if you need more, just go [here](https://prismjs.com/) to download.

<table>
  <tr>
    <td><img src="https://i.loli.net/2019/10/18/4qOlZUzcpF6Lo7P.png"></td>
    <td><img src="https://i.loli.net/2019/10/18/keoYfqXAdcyTS3I.png"></td>
    <td><img src="https://i.loli.net/2019/10/18/GDqMJtTC9EYykAm.png"></td>
  </tr>
  <tr>markup+css+clike+javascript+c+csharp+cpp+ruby+docker+markup-templating+flow+git+go+haskell+java+json+kotlin+markdown+lisp+lua+php+sql+powershell+python+typescript+rust+scala+scheme+pug+swift+yaml+vi</tr>
</table>

### Special Page

- todo
  <tr>
     <td><img src="https://sm.ms/image/kC5uPUYEdlSca1J"></td>
     <td><img src="https://sm.ms/image/MGRDZzT7ABSswyU"></td>
   </tr>
  <tr>
     <td><img src=""></td>
     <td><img src=""></td>
     <td><img src=""></td>
   </tr>

Tencent Group: [861379856](https://jq.qq.com/?_wv=1027&k=5kACJ6v)

### Multi-language Support

- Need more language support, Welcome contribution. ([How to PR](#Contribute))

## Other

## BackUp

```sql
-- mysql
ALTER TABLE `typecho_contents` ADD `views` INT(10) NULL DEFAULT '0' AFTER `parent`;
```

## Author

**typecho-theme-sagiri** © [shiyi](https://github.com/shiyiya), Released under the [GPL-3.0](./LICENSE) License.<br>
Authored and maintained by DIYgod with help from contributors ([list](https://github.com/shiyiya/typecho-theme-sagiri/contributors)).

> Blog [@OZOO](http://www.runtua.cn) · GitHub [@shiyi](https://github.com/shiyiya) · Twitter [@shiyi](https://twitter.com/)

## Contribute

If you feel like to help us build a better Sagiri, you can

Write a plugin | Submit a tutorial | Report a bug | Add a translation

## License

Open sourced under the GPL V3.0 license.
