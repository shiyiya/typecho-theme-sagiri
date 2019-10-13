// change site-nav bgcolor when scrolled into post.
var sider = document.querySelector('.sidebar-inner')
var siteNav = document.querySelector('.site-nav')
var isMobile = Sagiri.util.isMobile

document.addEventListener(
  'scroll',
  function(e) {
    var scrollTop =
      e.target.body.scrollTop || e.target.documentElement.scrollTop

    if (Sagiri.hasBanner) {
      if (!isMobile && scrollTop >= 500) {
        siteNav.style.background = 'rgba(255,255,255,.8)'
        siteNav.style.boxShadow = '0 0 2px 2px rgba(172,172,172,.4)'
        sider.classList.add('affix')
      } else if (isMobile && scrollTop >= 200) {
        siteNav.style.background = 'rgba(255,255,255,.8)'
        siteNav.style.boxShadow = '0 0 2px 2px rgba(172,172,172,.4)'
      } else {
        siteNav.style.background = 'rgba(255, 255, 255, 0.1)'
        siteNav.style.boxShadow = 'none'
        !isMobile && sider.classList.remove('affix')
      }
    }
  },
  { passive: true }
)
