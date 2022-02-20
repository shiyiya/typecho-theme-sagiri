export default function liveTime(time) {
  if (!time) {
    throw Error('invalid time')
  }
  time = new Date(time)
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
  document.querySelector('#live-time').innerText = '( •̀ ω •́ ) ' + mliveDay + ' Day ' + mliveHour + ' Hour ' + mliveMin + ' Minute ' + liveSec + ' Second'
}
