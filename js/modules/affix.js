// change site-nav bgcolor when scrolled into post.
var isMobile = Sagiri.util.isMobile
var pinTop = isMobile ? 200 : 320
var sidebar = document.querySelector('.sidebar-inner')
var siteNav = document.querySelector('.site-nav')
var scrollTop = document.body.scrollTop || document.documentElement.scrollTop
var toTop = document.querySelector('#back-actions')

affix(scrollTop)

function affix(scrollTop) {
  if (Sagiri.hasBanner) {
    if (scrollTop >= pinTop) {
      siteNav?.classList.add('affix')
      sidebar?.classList.add('affix')
    } else {
      siteNav?.classList.remove('affix')
      sidebar?.classList.remove('affix')
    }
  }

  if (scrollTop >= pinTop) {
    toTop?.classList.add('affix')
  } else {
    toTop?.classList.remove('affix')
  }
}

document.addEventListener(
  'scroll',
  function (e) {
    var scrollTop =
      e.target.body.scrollTop || e.target.documentElement.scrollTop
    affix(scrollTop)
  },
  { passive: true }
)
