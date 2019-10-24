;(() => {
  class miniPjax {
    constructor(option) {
      const defaultOption = {
        target: 'a',
        container: 'body'
      }
      for (let k in defaultOption) {
        if (defaultOption.hasOwnProperty(k) && !option.hasOwnProperty(k)) {
          option[k] = defaultOption[k]
        }
      }
      this.option = option
      this.init(option)
    }

    init(option) {
      const targetDom = [...document.querySelectorAll(option.target)],
        _this = this

      targetDom.forEach(i => {
        const url = i.href,
          theUrl = document.location.origin,
          index = url.lastIndexOf('/'),
          hash = url.substring(index + 1, url.length)

        // 非当前域和锚点跳转
        if (!url.match(theUrl) || /#/.test(hash)) return null

        i.onclick = async function (e) {
          const event = e || window.event

          event.preventDefault()

          let realDom
          const domString = await _this.fetchData(url)

          realDom = _this.parseHtml(domString.data, option.body)
          _this.replaceHeader(realDom.head)
          _this.replaceContainer(option.container, realDom.container)
          _this.appendScriptTobodyEnd(realDom.scriptWrap)
          _this.pushState(null, null, url)

          return void 0
        }
      })
      window.addEventListener('popstate', async function (e) {
        //重新挂载 点击事件
        const url = e.target.location.href,
          domString = await _this.fetchData(url),
          realDom = _this.parseHtml(domString.data, option.body)

        _this.replaceHeader(realDom.head)
        _this.replaceContainer(option.container, realDom.container)
      })
    }

    async fetchData(url) {
      let data, err

      await fetch(url)
        .then(res => (data = res.text()))
        .then(res => {
          data = res
        })
        .catch(err => {
          err = err
        })

      return { data, err }
    }

    parseHtml(domString, body) {
      // prettier-ignore
      const tmpEl = document.implementation.createHTMLDocument()
      const headReg = new RegExp('(?<=<head>).*|[\\s\\S]*(?=</head>)'),
        headWrap = document.createElement('div'),
        allwrap = document.createElement('div')

      allwrap.innerHTML = domString

      const container = allwrap.querySelector(body)

      //尾部 script
      const scriptWrap = container.querySelectorAll('script')
      ;[...scriptWrap].forEach(v => {
        container.contains(v) && v.parentElement.removeChild(v)
      })

      headWrap.innerHTML = [...domString.match(headReg)].join()

      return { head: headWrap, container, scriptWrap }
    }

    replaceHeader(dom) {
      // 需要提取头部 script
      const head = [...dom.children]
      document.head.innerHTML = null
      head.map((v, k) => {
        document.head.append(v)
      })
    }

    replaceContainer(container, dom) {
      if (typeof container === 'string') {
        const containerDom = document.querySelector(container),
          needcloneAttrs = this.getDomAttr(containerDom),
          needReplaceDom = dom.querySelector(container)

        needcloneAttrs.map(v => {
          const key = Object.keys(v)[0]
          v[key] == 'class'
            ? (needReplaceDom.className = v[key])
            : (dom[key] = v[key])
        })
        containerDom.parentElement.replaceChild(needReplaceDom, containerDom)
      }

      //获取被替换节点 & 属性
      if (Array.isArray(container)) {
        let containerDom = [],
          needcloneAttrs = [],
          needReplaceDom = []

        container.forEach(v => {
          const vDom = document.querySelector(v)

          containerDom.push(vDom)
          needcloneAttrs.push(this.getDomAttr(vDom))
          needReplaceDom.push(dom.querySelector(v))
        })

        needcloneAttrs.forEach((v, k) => {
          v.forEach(v => {
            const key = Object.keys(v)[0]
            v[key] == 'class'
              ? (needReplaceDom[k].className = v[key])
              : (needReplaceDom[k][key] = v[key])
          })
        })

        containerDom.forEach((v, k) => {
          v.parentElement.replaceChild(needReplaceDom[k], v)
        })
      }
    }

    // el.innerhtml don't run script
    appendScriptTobodyEnd(scriptDom) {
      const docuScriptDom = document
        .querySelector(this.option.body)
        .querySelectorAll('script')

      docuScriptDom.forEach(v => {
        v.parentElement.removeChild(v)
      })

      const oldScript = document.body.querySelectorAll('script')

      oldScript.forEach(v => {
        v.parentElement.removeChild(v)
      })

      document.body.removeChild
      ;[...scriptDom].forEach(v => {
        let script = document.createElement('script')

        v.getAttribute('src') ? (script.src = v.src) : (script.text = v.text)

        document.body.append(script)
      })
    }

    pushState(state, title, url) {
      history.pushState(state, title, url)
    }

    getDomAttr(elem) {
      let i,
        len,
        result = [],
        attrs = elem.attributes

      for (i = 0, len = attrs.length; i < len; i++) {
        if (attrs[i]['specified']) {
          result.push({ [attrs[i]['nodeName']]: attrs[i]['nodeValue'] })
        }
      }

      return result
    }
  }

  if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
    module.exports = miniPjax
  } else {
    window.miniPjax = miniPjax
  }
})()
