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
      ` %c Sagiri ${this.version} %c https://github.com/shiyiya/typecho-theme-sagiri `,
      'background: #ed143d7d; padding:5px 0;',
      'background: #40b3ec;padding:5px 5px 5px 0;'
    )
  }
}

module.exports = new Sagiri()
