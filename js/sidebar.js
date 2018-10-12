document.addEventListener('DOMContentLoaded', function() {
  var rootToc = document.querySelector('.toc-nav')

  function deepTree(node = document) {
    var tagLevel = 1,
      rootToc = [
        ...node.querySelectorAll(
          getFristTitle(document.querySelector('.post-content').firstChild)
        )
      ],
      TOC = {}

    TOC = rootToc.map((i, k) => {
      return {
        root: i,
        children: SmallerSiblingTagElems(i)
      }
    })

    return TOC
  }
  /**
   *
   *
   * @param {Element} elem h1 ~ h6
   * @returns
   */
  function SmallerSiblingTagElems(elem) {
    var nodes = [],
      tagLevel = elem.tagName.slice(-1) || 2

    while ((elem = elem.nextSibling)) {
      if (elem.nodeType == 1) {
        elemTagLevel = Number(elem.tagName.slice(-1))
        if (elemTagLevel > tagLevel) {
          nodes.push(elem)
        }
        if (elemTagLevel <= tagLevel) {
          return nodes
        }
      }
    }

    return nodes
  }

  function getFristTitle(elem) {
    var elemTag
    while ((elem = elem.nextSibling)) {
      if (elem.nodeType == 1) {
        elemTag = elem.tagName.slice(0, 1)
        console.log(elem)
        if (elemTag == 'H') {
          return elem.tagName
        }
      }
    }
  }
  getFristTitle(document.querySelector('.post-content').firstChild)

  var Toc = deepTree(document.querySelector('.post-content'))

  Toc.forEach(v => {
    var li = document.createElement('li'),
      a = document.createElement('a')
    a.href = '#' + v.root.innerText
    a.innerText = v.root.id = v.root.innerText
    li.appendChild(a)
    if (v.children.length > 0) {
      li.appendChild(createTocFragment(v.children))
    }
    li.classList.add('toc-subnav')
    rootToc.appendChild(li)
  })

  function createTocFragment(children) {
    var ul = document.createElement('ul')
    children.forEach(v => {
      var li = document.createElement('li'),
        a = document.createElement('a')
      a.href = '#' + v.innerHTML
      v.id = a.innerHTML = v.innerHTML
      li.appendChild(a)
      ul.appendChild(li)
    })
    return ul
  }

  var sidebarOverview = document.querySelector('.sidebar-nav-overview')
  var sidebarToc = document.querySelector('.sidebar-nav-toc ')
  var postToc = document.querySelector('.post-toc-wrap')
  var siteOverview = document.querySelector('.site-overview-wrap ')

  if (sidebarToc) {
    var sidebarNav = [sidebarOverview, sidebarToc]

    sidebarOverview.onclick = function() {
      this.classList.add('sidebar-nav-active')
      var _this = this
      sidebarNav
        .filter(i => i !== _this)[0]
        .classList.remove('sidebar-nav-active')
      siteOverview.classList.add('sidebar-section-active')
      postToc.classList.remove('sidebar-section-active')
    }

    sidebarToc.onclick = function() {
      this.classList.add('sidebar-nav-active')
      var _this = this
      sidebarNav
        .filter(i => i !== _this)[0]
        .classList.remove('sidebar-nav-active')
      postToc.classList.add('sidebar-section-active')
      siteOverview.classList.remove('sidebar-section-active')
    }
  }
})
