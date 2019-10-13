export default function postScroll() {
  // ie11 fail ?????????
  // if (document.body.scrollIntoView) {
  //   setTimeout(function() {
  //     document.querySelector('.content-wrap').scrollIntoView({
  //       behavior: 'smooth',
  //       block: 'start',
  //       inline: 'nearest'
  //     })
  //   }, 500)
  //   return void 0
  // }

  var timer = null,
    speed = 10,
    needScroll = Sagiri.util.isMobile ? 180 : 500

  function scroll() {
    /* prettier-ignore */
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

    if (scrollTop >= needScroll || scrollTop + clientHeight >= scrollHeight) {
      clearInterval(timer)
    }
  }

  timer = setInterval(scroll, 10)
}
