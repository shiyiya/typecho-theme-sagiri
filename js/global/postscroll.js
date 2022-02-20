export default function postScroll() {
  var timer = null,
    speed = 10,
    needScroll = Sagiri.util.isMobile ? 130 : 300

  function scroll() {
    var scrollTop =
      document.body.scrollTop || document.documentElement.scrollTop
    var clientHeight =
      document.body.clientHeight || document.documentElement.clientHeight
    var scrollHeight =
      document.body.scrollHeight || document.documentElement.scrollHeight

    if (document.body.scrollTop < needScroll) {
      document.body.scrollTop += speed
    }
    if (document.documentElement.scrollTop < needScroll) {
      document.documentElement.scrollTop += speed
    }

    if (scrollTop >= needScroll || scrollTop + clientHeight >= scrollHeight) {
      clearInterval(timer)
    }
  }

  timer = setInterval(scroll, 10)
}
