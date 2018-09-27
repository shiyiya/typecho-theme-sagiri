;(function() {
  var siteNnav = document.querySelector('.site-nav')
  var toolBar = document.querySelector('.tool-bar')
  var agent = navigator.userAgent
  if (/.*Firefox.*/.test(agent)) {
    document.addEventListener('DOMMouseScroll', function(e) {
      e = e || window.event
      var detail = e.detail
      if (detail > 0) {
        siteNnav.style.transform = 'translateY(-100%)'
        toolBar.style.transform = 'translateY(100%)'
        console.log('firefox ↓')
      } else {
        siteNnav.style.transform = 'translateY(0%)'
        toolBar.style.transform = 'translateY(0%)'
        console.warn('firef ↑')
      }
    })
  } else {
    document.onmousewheel = function(e) {
      e = e || window.event
      var wheelDelta = e.wheelDelta
      if (wheelDelta > 0) {
        siteNnav.style.transform = 'translateY(0%)'
        toolBar.style.transform = 'translateY(0%)'
        console.warn('↑')
      } else {
        siteNnav.style.transform = 'translateY(-100%)'
        toolBar.style.transform = 'translateY(100%)'
        console.warn('↓')
      }
    }
  }

  var sider = document.querySelector('.sidebar-inner')
  if (sider) {
    document.addEventListener('scroll', function(e) {
      if (
        e.target.body.scrollTop >= 500 ||
        e.target.documentElement.scrollTop >= 500
      ) {
        sider.classList.add('affix')
      } else {
        sider.classList.remove('affix')
      }
    })
  }

  var btnPay = document.querySelector('.btn-pay')

  if (btnPay) {
    btnPay.addEventListener('click', function(e) {
      var qr = document.querySelector('.qr')
      if (qr.style.height == '0px') {
        qr.style.height = 'auto'
      } else {
        qr.style.height = 0
      }
    })
  }

  console.info(
    ' %c Theme in development %c please wait ',
    'background: #ed143d7d; padding:5px 0;',
    'background: #40b3ec;padding:5px 5px 5px 0;'
  )

  console.info(
    ' %c 主题开发中  %c 敬请期待',
    ' background: #ed143d7d; padding:5px 0;',
    'background: #40b3ec;padding:5px 5px 5px 0;'
  )
})()
