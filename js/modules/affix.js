// change site-nav bgcolor when scrolled into post.
var sider = document.querySelector('.sidebar-inner')
var siteNav = document.querySelector('.site-nav')
var isMobile = Sagiri.util.isMobile

function affix(scrollTop) {
  if (Sagiri.hasBanner) {
    if (!isMobile && scrollTop >= 320) {
      siteNav?.classList.add('affix')
      Sagiri.hasSidebar && sider.classList.add('affix')
    } else if (isMobile && scrollTop >= 200) {
      siteNav?.classList.add('affix')
    } else {
      !isMobile && Sagiri.hasSidebar && sider.classList.remove('affix')
      siteNav?.classList.remove('affix')
    }
  }
}

var scrollTop = document.body.scrollTop || document.documentElement.scrollTop

affix(scrollTop)

document.addEventListener(
  'scroll',
  function (e) {
    var scrollTop =
      e.target.body.scrollTop || e.target.documentElement.scrollTop
    affix(scrollTop)
  },
  { passive: true }
)
