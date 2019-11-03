import utils from './utils'
import ribbons from './ribbons'
import liveTime from './livetime'
import postScroll from './postscroll'

const F = { ribbons, liveTime, postScroll }

class Sagiri {
  constructor() {
    this.util = utils
    this.version = '__VERSION__'
    this.hasBanner =
      !!document.querySelector('.site-config') ||
      (document.querySelector('.header-wrap').style.display !== 'none' &&
        document.querySelector('.header-wrap').style.display !== '')
    this.hasSidebar = !!document.getElementById('sidebar')

    this.F = F // theme Feature GLOBAL F

    // copy-right
    //DO NOT DELETE !
    console.info(
      `%c Sagiri ${this.version} %c https://github.com/shiyiya/typecho-theme-sagiri `,
      'background: #ed143d7d; padding:5px 0; color: #fff;',
      'background: #40b3ec; padding:5px 5px 5px 0; color: #000;'
    )

    document.addEventListener('DOMContentLoaded', function() {
      console.info(
        `%cTime used: ${Math.round(performance.now() * 100) / 100} ms | ${
          performance.memory
            ? `Memory used ${Math.round(
                (performance.memory.usedJSHeapSize / 1024) * 100
              ) / 100} K`
            : ''
        }`,
        'background: #40b3ec; color: #fff; padding:5px ;'
      )
    })
  }
}

module.exports = new Sagiri()
