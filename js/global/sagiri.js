import utils from './utils'
import ribbons from './ribbons'
import liveTime from './livetime'
import postScroll from './postscroll'

class Sagiri {
  constructor() {
    this.util = utils
    this.version = '__VERSION__'
    this.hasBanner =
      !!document.querySelector('.site-config') ||
      (document.querySelector('.header-wrap').style.display !== 'none' &&
        document.querySelector('.header-wrap').style.display !== '')
    this.hasSidebar = !!document.getElementById('sidebar')

    this.F = { ribbons, liveTime, postScroll } // theme Feature GLOBAL F

    document.addEventListener('DOMContentLoaded', () => {
      // copy-right
      //DO NOT DELETE !
      console.info(
        `%c Sagiri ${this.version} %c https://github.com/shiyiya/typecho-theme-sagiri `,
        'background: #ed143d7d; padding:5px 0; color: #fff;',
        'background: #40b3ec; padding:5px 5px 5px 0; color: #000;'
      )
      console.info(
        `%cTime used: ${Math.round(performance.now() * 100) / 100} ms | ${
          performance.memory
            ? `Memory used ${
                Math.round((performance.memory.usedJSHeapSize / 1024) * 100) /
                100
              } K`
            : ''
        }`,
        'background: #40b3ec; color: #fff; padding:5px ;'
      )
    })
  }
}

module.exports = new Sagiri()
