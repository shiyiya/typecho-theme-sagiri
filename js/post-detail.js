document.addEventListener('DOMContentLoaded', function() {
  var rootToc = document.querySelector('.toc-nav'),
    h2Title = [
      ...document.querySelector('.post-content').querySelectorAll('h2')
    ]
  if (h2Title.length > 0) {
    h2Title.forEach((i, k) => {
      var li = document.createElement('li')
      var a = document.createElement('a')
      i.id = (Math.random() + '').replace(/\D/, '')
      a.href = '#' + i.id
      a.innerText = i.innerText
      li.appendChild(a)
      li.classList.add('toc-subnav')
      rootToc.appendChild(li)
    })
  } else {
    document.querySelector('.post-toc-wrap').style.display = 'none'
    document.querySelector('.sidebar-nav-toc').style.display = 'none'
    document
      .querySelector('.site-overview-wrap')
      .classList.add('sidebar-section-active')
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
