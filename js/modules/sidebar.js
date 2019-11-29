!Sagiri.util.isMobile &&
  Sagiri.hasSidebar &&
  (function() {
    var sidebarNavToc = document.querySelector('.sidebar-nav-toc ')
    if (sidebarNavToc) {
      var tocList = document.querySelector('.toc-list'),
        sidebarOverview = document.querySelector('.sidebar-nav-overview'),
        tocWrap = document.querySelector('.post-toc-wrap'),
        siteOverview = document.querySelector('.site-overview-wrap '),
        postWrap = document.querySelector('.post-content'),
        tocTitleList = [].slice.call(
          postWrap.querySelectorAll('h1, h2, h3, h4, h5, h6')
        )

      sidebarOverview.onclick = function() {
        this.classList.add('sidebar-nav-active')
        ;[].slice.call(this.parentElement.children).map(_ => {
          if (_ !== this) _.classList.remove('sidebar-nav-active')
        })
        siteOverview.classList.add('sidebar-section-active')
        tocWrap.classList.remove('sidebar-section-active')
      }

      sidebarNavToc.onclick = function() {
        this.classList.add('sidebar-nav-active')
        ;[].slice.call(this.parentElement.children).map(_ => {
          if (_ !== this) _.classList.remove('sidebar-nav-active')
        })
        tocWrap.classList.add('sidebar-section-active')
        siteOverview.classList.remove('sidebar-section-active')
      }
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
        li.innerText = 'NO TOC っ°Д°;)っ'
        tocList.appendChild(li)
      }
    }

    var siderOther = document.querySelector('.sider-other')
    if (siderOther) {
      var siderOtherNavs = [].slice.call(
          siderOther.querySelectorAll('.sidebar-nav > li')
        ),
        siderOtherSections = [].slice.call(
          siderOther.querySelectorAll('section')
        )

      if (siderOther.childElementCount > 1) {
        siderOtherNavs[0].classList.add('sidebar-nav-active')
        siderOtherSections[0].classList.add('sidebar-section-active')

        siderOtherNavs.forEach((nav, key) => {
          nav.onclick = function() {
            this.classList.add('sidebar-nav-active')

            var children = this.parentElement.children
            for (var i = 0; i < children.length; i++) {
              if (children[i] !== this)
                children[i].classList.remove('sidebar-nav-active')
            }

            siderOtherSections[key].classList.add('sidebar-section-active')
            siderOtherSections
              .filter(_ => _ != siderOtherSections[key])
              .forEach(_ => {
                _.classList.remove('sidebar-section-active')
              })
          }
        })
      }
    }
  })()
