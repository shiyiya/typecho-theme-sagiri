require('jquery-pjax')
const NProgress = require('nprogress')

NProgress.configure({
  showSpinner: false,
  easing: 'ease-out',
  speed: 1000
})

$(document).pjax('a', '#main', {
  scrollTo:
    document.location.pathname !== '/' && Sagiri.hasBanner
      ? $('.main').position().top - 60
      : 0,
  fragment: '#main',
  timeout: 5000
})

$(document).on('pjax:start', function() {
  NProgress.start()
  if (document.location.pathname !== '/' && Sagiri.hasBanner) {
    $('html, body').animate(
      {
        scrollTop: $('.main').position().top - 60
      },
      500
    )
  } else {
    $('html, body').animate(
      {
        scrollTop: 0
      },
      500
    )
  }
})

$(document).on('pjax:end', function() {
  require('./sidebar')()
  require('./affix')()
  require('./mouse')
  require('./totop')
  require('./donpay')()
  require('./imgview')

  Sagiri.F.ribbons()

  window.Prism && Prism.highlightAll()

  NProgress.done()
})
