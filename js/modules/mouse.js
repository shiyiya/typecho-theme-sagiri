// site-nav animation. for pc
var siteNav = document.querySelector('.site-nav')
var agent = navigator.userAgent

function flag() {
  var scrollHeight =
    document.body.scrollHeight || document.documentElement.scrollHeight
  var clientHeight = window.innerHeight
  var canScrollTop = scrollHeight - clientHeight
  return canScrollTop > clientHeight / 2
}

if (/.*Firefox.*/.test(agent)) {
  document.addEventListener(
    'DOMMouseScroll',
    function (e) {
      if (flag()) {
        e = e || window.event
        var detail = e.detail
        if (detail > 0) {
          siteNav?.classList.add('hidden')
        } else {
          siteNav?.classList.remove('hidden')
        }
      }
    },
    { passive: true }
  )
} else {
  document.onmousewheel = function (e) {
    if (flag()) {
      e = e || window.event
      var wheelDelta = e.wheelDelta
      if (wheelDelta > 0) {
        siteNav?.classList.remove('hidden')
      } else {
        siteNav?.classList.add('hidden')
      }
    }
  }
}
