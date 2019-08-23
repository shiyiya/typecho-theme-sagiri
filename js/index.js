var __ribbonsrc__ = {
  z: -1,
  alpha: 0.9,
  size: 120
}

var c = document.createElement('canvas'),
  c2d = c.getContext('2d'),
  pr = window.devicePixelRatio || 1,
  width = window.innerWidth,
  height = window.innerHeight,
  s = __ribbonsrc__.size,
  q,
  m = Math,
  r = 0,
  pi = m.PI * 2,
  cos = m.cos,
  randoMath = m.random

c.width = width * pr
c.height = height * pr
c.style.cssText =
  'opacity: ' +
  __ribbonsrc__.alpha +
  ';position:fixed;top:0;left:0;z-index: ' +
  __ribbonsrc__.z +
  ';width:100%;height:100%;pointer-events:none;'

c2d.scale(pr, pr)
c2d.globalAlpha = __ribbonsrc__.alpha

document.getElementsByTagName('body')[0].appendChild(c)

function redraw() {
  c2d.clearRect(0, 0, width, height)
  q = [{ x: 0, y: height * 0.7 + s }, { x: 0, y: height * 0.7 - s }]
  while (q[1].x < width + s) draw(q[0], q[1])
}
function draw(i, j) {
  c2d.beginPath()
  c2d.moveTo(i.x, i.y)
  c2d.lineTo(j.x, j.y)
  var k = j.x + (randoMath() * 2 - 0.25) * s,
    n = line(j.y)
  c2d.lineTo(k, n)
  c2d.closePath()
  r -= pi / -50
  c2d.fillStyle =
    '#' +
    (
      ((cos(r) * 127 + 128) << 16) |
      ((cos(r + pi / 3) * 127 + 128) << 8) |
      (cos(r + (pi / 3) * 2) * 127 + 128)
    ).toString(16)
  c2d.fill()
  q[0] = q[1]
  q[1] = { x: k, y: n }
}
function line(p) {
  var t = p + (randoMath() * 2 - 1.1) * s
  return t > height || t < 0 ? line(p) : t
}

function ribbons() {
  document.onclick = redraw
  document.ontouchstart = redraw
  redraw()
}

var isMobile = (function() {
  var Agents = navigator.userAgent,
    mobileAgents = [
      'Android',
      'iPhone',
      'SymbianOS',
      'Windows Phone',
      'iPad',
      'iPod'
    ]
  for (var agents of mobileAgents) {
    while (Agents.indexOf(agents) != -1) {
      return true
    }
  }
  return false
})()

var hasBanner = !!document.querySelector('.site-config')

function liveTime(time) {
  if (!time) {
    throw Error('未指定日期！')
  }
  var time = new Date(time)
  var live = Math.floor(new Date().getTime() - time.getTime()),
    m = 24 * 60 * 60 * 1000

  var liveDay = live / m,
    mliveDay = Math.floor(liveDay),
    liveHour = (liveDay - mliveDay) * 24,
    mliveHour = Math.floor(liveHour),
    liveMin = (liveHour - mliveHour) * 60,
    mliveMin = Math.floor((liveHour - mliveHour) * 60),
    liveSec = Math.floor((liveMin - mliveMin) * 60)

  // prettier-ignore
  document.querySelector('#live-time').innerText ="( •̀ ω •́ ) 被续 " + mliveDay +' 天 ' + mliveHour +' 小时 ' + mliveMin +' 分 ' + liveSec +' 秒'
}

function request(method, url, param, callback) {
  var xhr = new XMLHttpRequest()
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4) {
      if ((xhr.status >= 200 && xhr.status < 300) || xhr.status === 304) {
        callback(xhr.responseText)
      } else {
        callback(xhr.responseText)
      }
    }
  }
  if (method.toLocaleUpperCase === 'POST') {
    if (param && Object.keys(param).length > 0) {
      var temp = ''
      for (var key in param) {
        temp += '&' + key + '=' + param[key]
      }
      param = '?' + temp.slice(1)
    }

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
  }
  xhr.open(method, url, true)
  xhr.send(param)
}

function postScroll() {
  // ie11 fail ?????????
  /*  if (document.body.scrollIntoView) {
    setTimeout(function() {
      document
        .querySelector('.content-wrap')
        .scrollIntoView({
          behavior: 'smooth',
          block: 'start',
          inline: 'nearest'
        })
    }, 500)
    return void 0
  } */

  var timer = null,
    speed = 10,
    needScroll = isMobile ? 180 : 500

  function scroll() {
    /* prettier-ignore */
    var scrollTop = document.body.scrollTop || document.documentElement.scrollTop
    var clientHeight = document.body.clientHeight || document.documentElement.clientHeight
    var scrollHeight = document.body.scrollHeight || document.documentElement.scrollHeight

    if (document.body.scrollTop < 500) {
      document.body.scrollTop += speed
    }
    if (document.documentElement.scrollTop < 500) {
      document.documentElement.scrollTop += speed
    }

    if (scrollTop >= needScroll || scrollTop + clientHeight >= scrollHeight) {
      clearInterval(timer)
    }
  }

  timer = setInterval(scroll, 10)
}

var __isMoving = false
function backToTop() {
  if (__isMoving) return
  const start = window.pageYOffset
  let i = 0
  __isMoving = true
  var interval = setInterval(() => {
    const next = Math.floor(easeInOutQuad(10 * i, start, -start, 100))
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

function easeInOutQuad(t, b, c, d) {
  if ((t /= d / 2) < 1) return (c / 2) * t * t + b
  return (-c / 2) * (--t * (t - 2) - 1) + b
}

;(function() {
  // site-nav animation. for pc
  var siteNav = document.querySelector('.site-nav')
  var sider = document.querySelector('.sidebar-inner')
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

  // change site-nav bgcolor when scrolled into post.
  document.addEventListener(
    'scroll',
    function(e) {
      var scrollTop =
        e.target.body.scrollTop || e.target.documentElement.scrollTop

      if (hasBanner) {
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

  // Donate button control.
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

  // click to view img.
  var main = document.querySelector('#main'),
    imgVIew = document.querySelector('.img-view'),
    viewImg = document.querySelector('.img-view > img')

  main.addEventListener('click', function(e) {
    var el = e.target
    if (el.tagName.toLocaleUpperCase() === 'IMG') {
      viewImg.src = el.src
      viewImg.alt = el.alt
      if (imgVIew.style.display == 'block') {
        imgVIew.onclick()
      } else {
        imgVIew.style.display = 'block'
      }
    }
  })

  imgVIew.onclick = function() {
    this.classList.add('remove')
    setTimeout(() => {
      this.classList.remove('remove')
      this.style.display = 'none'
    }, 300)
  }

  // copy-right
  console.clear()
  console.info(
    ' %c Sagiri %c https://github.com/shiyiya/typecho-theme-sagiri ',
    'background: #ed143d7d; padding:5px 0;',
    'background: #40b3ec;padding:5px 5px 5px 0;'
  )
})()
