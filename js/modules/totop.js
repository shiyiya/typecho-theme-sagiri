const backToTop = function() {
  var __isMoving = false
  return function() {
    if (__isMoving) return
    const start = window.pageYOffset
    let i = 0
    __isMoving = true
    var interval = setInterval(() => {
      const next = Math.floor(
        Sagiri.util.easeInOutQuad(10 * i, start, -start, 100)
      )
      if (next <= 0) {
        window.scrollTo(0, 0)
        clearInterval(interval)
        __isMoving = false
      } else {
        window.scrollTo(0, next)
      }
      i++
    }, 16.7)
  }
}

Sagiri.hasSidebar &&
  document
    .querySelector('.site-author-name')
    .addEventListener('click', backToTop())

document.querySelector('#back-actions').addEventListener('click', backToTop())
