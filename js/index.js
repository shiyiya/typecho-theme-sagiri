;(function() {
  new miniPjax({
    target: 'a',
    body: '#root',
    container: ['.content-wrap', '#sidebar']
  })

  var siteNnav = document.querySelector('.site-nav')
  //var toolBar = document.querySelector('.tool-bar')
  var agent = navigator.userAgent
  if (/.*Firefox.*/.test(agent)) {
    document.addEventListener(
      'DOMMouseScroll',
      function(e) {
        e = e || window.event
        var detail = e.detail
        if (detail > 0) {
          siteNnav.style.transform = 'translateY(-100%)'
          //toolBar.style.transform = 'translateY(100%)'
          console.log('firefox ↓')
        } else {
          siteNnav.style.transform = 'translateY(0%)'
          //toolBar.style.transform = 'translateY(0%)'
          console.warn('firef ↑')
        }
      },
      { passive: true }
    )
  } else {
    document.onmousewheel = function(e) {
      e = e || window.event
      var wheelDelta = e.wheelDelta
      if (wheelDelta > 0) {
        siteNnav.style.transform = 'translateY(0%)'
        //toolBar.style.transform = 'translateY(0%)'
        console.warn('↑')
      } else {
        siteNnav.style.transform = 'translateY(-100%)'
        //toolBar.style.transform = 'translateY(100%)'
        console.warn('↓')
      }
    }
  }

  var sider = document.querySelector('.sidebar-inner')
  if (sider) {
    document.addEventListener(
      'scroll',
      function(e) {
        var scrollTop =
            e.target.body.scrollTop || e.target.documentElement.scrollTop,
          siteNav = document.querySelector('.site-nav')
        if (scrollTop >= 500) {
          siteNav.style.background = 'rgba(255,255,255,.8)'
          siteNav.style.boxShadow = '0 0 2px 2px rgba(172,172,172,.4)'
        } else {
          siteNav.style.background = 'rgba(255, 255, 255, 0.1)'
          siteNav.style.boxShadow = 'none'
        }
        if (
          e.target.body.scrollTop >= 500 ||
          e.target.documentElement.scrollTop >= 500
        ) {
          sider.classList.add('affix')
        } else {
          sider.classList.remove('affix')
        }
      },
      { passive: true }
    )
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

  //!isMobile() && (document.querySelector('.tool-bar').style.display = 'none')

  var img = document.querySelectorAll('img'),
    imgVIew = document.querySelector('.img-view'),
    viewImg = document.querySelector('.img-view > img')
  Array.from(img).forEach(v => {
    v.onclick = function() {
      viewImg.src = this.src
      viewImg.alt = this.alt

      if (imgVIew.style.display == 'block') {
        imgVIew.style.display = 'none'
        document.body.style.overflow = 'auto'
      } else {
        imgVIew.style.display = 'block'
        document.body.style.overflow = 'hidden'
      }
    }
  })

  /*  console.info(
    ' %c Theme in development %c please wait ',
    'background: #ed143d7d; padding:5px 0;',
    'background: #40b3ec;padding:5px 5px 5px 0;'
  )

  console.info(
    ' %c 主题开发中  %c 敬请期待',
    ' background: #ed143d7d; padding:5px 0;',
    'background: #40b3ec;padding:5px 5px 5px 0;'
  ) */
})()

function postScroll() {
  var needScroll,
    speed = 10
  isMobile() ? (needScroll = 180) : (needScroll = 500)

  var scrollTop = document.body.scrollTop || document.documentElement.scrollTop
  var clientHeight =
    document.body.clientHeight || document.documentElement.clientHeight
  var scrollHeight =
    document.body.scrollHeight || document.documentElement.scrollHeight
  if (document.body.scrollTop < 500) {
    document.body.scrollTop += speed
  }
  if (document.documentElement.scrollTop < 500) {
    document.documentElement.scrollTop += speed
  }
  if (scrollTop >= needScroll || clientHeight + scrollTop >= scrollHeight - 1) {
    clearInterval(postScrolltimer)
  }
}

function isMobile() {
  const Agents = navigator.userAgent,
    mobileAgents = [
      'Android',
      'iPhone',
      'SymbianOS',
      'Windows Phone',
      'iPad',
      'iPod'
    ]
  for (let agents of mobileAgents) {
    while (Agents.includes(agents)) {
      return true
    }
  }
}

/* eslint-disable */
// prettier-ignore
{
  function i(){for(x.clearRect(0,0,w,h),q=[{x:0,y:.7*h+f},{x:0,y:.7*h-f}];q[1].x<w+f;)d(q[0],q[1])}function d(e,t){x.beginPath(),x.moveTo(e.x,e.y),x.lineTo(t.x,t.y);var i=t.x+(2*z()-.25)*f,n=y(t.y);x.lineTo(i,n),x.closePath(),r-=u/-50,x.fillStyle="#"+(127*v(r)+128<<16|127*v(r+u/3)+128<<8|127*v(r+u/3*2)+128).toString(16),x.fill(),q[0]=q[1],q[1]={x:i,y:n}}function y(e){var t=e+(2*z()-1.1)*f;return t>h||t<0?y(e):t}var c=document.getElementById("ribbons"),x=c.getContext("2d"),pr=window.devicePixelRatio||1,w=window.innerWidth,h=window.innerHeight,f=90,q,m=Math,r=0,u=2*m.PI,v=m.cos,z=m.random;c.width=w*pr,c.height=h*pr,x.scale(pr,pr),x.globalAlpha=.6;
  /**
   * ribbons func
   * @return {void}
   */
  (function ribbons() {
    document.onclick = i
    document.ontouchstart = i
    i()
  })()
}
/* eslint-disable */

function liveTime(time) {
  if (!time) {
    throw Error('未指定日期！')
    return void 0
  }
  var time = new Date(time)
  const live = Math.floor(new Date().getTime() - time.getTime()),
    m = 24 * 60 * 60 * 1000

  let liveDay = live / m,
    mliveDay = Math.floor(liveDay),
    liveHour = (liveDay - mliveDay) * 24,
    mliveHour = Math.floor(liveHour),
    liveMin = (liveHour - mliveHour) * 60,
    mliveMin = Math.floor((liveHour - mliveHour) * 60),
    liveSec = Math.floor((liveMin - mliveMin) * 60)

  // prettier-ignore
  document.querySelector('#live-time').innerText ="( •̀ ω •́ ) 被续 " + mliveDay +' 天 ' + mliveHour +' 小时 ' + mliveMin +' 分 ' + liveSec +' 秒'
}
