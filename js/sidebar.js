!isMobile() &&
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
          a.innerHTML = _.id = _.innerText
          /* a.onclick = e => {
            e.preventDefault()
            animateScrollTo(_)
            return false
          } */
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
    }

    var siderOther = document.querySelector('.sider-other'),
      siderOtherNavs = [].slice.call(
        siderOther.querySelectorAll('.sidebar-nav > li')
      ),
      siderOtherSections = [].slice.call(siderOther.querySelectorAll('section'))

    if (siderOther.childElementCount > 1) {
      siderOtherNavs[0].classList.add('sidebar-nav-active')
      siderOtherSections[0].classList.add('sidebar-section-active')

      siderOtherNavs.forEach((nav, key) => {
        nav.onclick = function() {
          this.classList.add('sidebar-nav-active')
          Array.from(this.parentElement.children).map(_ => {
            if (_ !== this) _.classList.remove('sidebar-nav-active')
          })
          siderOtherSections[key].classList.add('sidebar-section-active')
          siderOtherSections
            .filter(_ => _ != siderOtherSections[key])
            .forEach(_ => {
              _.classList.remove('sidebar-section-active')
            })
        }
      })
    }
  })()
