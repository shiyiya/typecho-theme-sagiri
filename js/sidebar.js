!isMobile() &&
  (function() {
    var tocList = document.querySelector('.toc-list'),
      sidebarOverview = document.querySelector('.sidebar-nav-overview'),
      sidebarNavToc = document.querySelector('.sidebar-nav-toc '),
      tocWrap = document.querySelector('.post-toc-wrap'),
      siteOverview = document.querySelector('.site-overview-wrap '),
      postWrap = document.querySelector('.post-content'),
      tocTitleList = [...postWrap.querySelectorAll('h1, h2, h3, h4, h5, h6')]

    if (tocTitleList.length > 0) {
      tocTitleList.map(_ => {
        var li = document.createElement('li'),
          a = document.createElement('a')

        a.href = '#' + _.innerText
        a.innerText = _.id = _.innerText
        li.appendChild(a)
        tocList.appendChild(li)
      })
    } else {
      sidebarNavToc.classList.remove('sidebar-nav-active')
      tocWrap.classList.remove('sidebar-section-active')
      sidebarOverview.classList.add('sidebar-nav-active')
      siteOverview.classList.add('sidebar-section-active')
      var li = document.createElement('li')
      li.innerText = '居然没有目录'
      tocList.appendChild(li)
    }

    if (sidebarNavToc) {
      sidebarOverview.onclick = function() {
        this.classList.add('sidebar-nav-active')
        Array.from(this.parentElement.children).map(_ => {
          if (_ !== this) _.classList.remove('sidebar-nav-active')
        })
        siteOverview.classList.add('sidebar-section-active')
        tocWrap.classList.remove('sidebar-section-active')
      }

      sidebarNavToc.onclick = function() {
        this.classList.add('sidebar-nav-active')
        Array.from(this.parentElement.children).map(_ => {
          if (_ !== this) _.classList.remove('sidebar-nav-active')
        })
        tocWrap.classList.add('sidebar-section-active')
        siteOverview.classList.remove('sidebar-section-active')
      }
    }
  })()
