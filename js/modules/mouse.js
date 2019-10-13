// site-nav animation. for pc
var siteNav = document.querySelector('.site-nav')
var agent = navigator.userAgent
if (/.*Firefox.*/.test(agent)) {
  document.addEventListener(
    'DOMMouseScroll',
    function(e) {
      e = e || window.event
      var detail = e.detail
      if (detail > 0) {
        siteNav.style.transform = 'translateY(-100%)'
      } else {
        siteNav.style.transform = 'translateY(0%)'
      }
    },
    { passive: true }
  )
} else {
  document.onmousewheel = function(e) {
    e = e || window.event
    var wheelDelta = e.wheelDelta
    if (wheelDelta > 0) {
      siteNav.style.transform = 'translateY(0%)'
    } else {
      siteNav.style.transform = 'translateY(-100%)'
    }
  }
}
