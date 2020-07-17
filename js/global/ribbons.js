
const wrap = (function (params) {
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

  c.className = 'sagiri-ribbons'
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


  return {
    redraw() {
      const _el = document.getElementsByClassName('sagiri-ribbons')[0];
      if (_el) {
        c2d = _el.getContext('2d')
      }
      c2d.clearRect(0, 0, width, height)
      q = [{ x: 0, y: height * 0.7 + s }, { x: 0, y: height * 0.7 - s }]
      while (q[1].x < width + s) draw(q[0], q[1])
    }
  }
})()

function ribbons() {
  document.onclick = wrap.redraw
  document.ontouchstart = wrap.redraw
  wrap.redraw()
}

export default ribbons
