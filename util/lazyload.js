class LazyLoadImg {
  constructor(options) {
    const defaultOption = {
      selector: '.lazy-img',
      virtualSrc: '',
      callback: null
    }

    for (let k in defaultOption) {
      if (defaultOption.hasOwnProperty(k) && !options.hasOwnProperty(k)) {
        options[k] = defaultOption[k]
      }
    }

    this.options = options
    this.images = [].slice.call(document.querySelectorAll(options.selector))
    this.init()
  }

  init() {
    if (!window.IntersectionObserver) {
      this.LazyLoadImage()
      document.addEventListener('scroll', this.LazyLoadImage.bind(this))
      return
    }

    let observerConfig = {
      root: null,
      rootMargin: '0px',
      threshold: [0]
    }
    this.observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        //If intersectionRatio is 0, the target is out of view
        if (entry.intersectionRatio > 0) {
          this.observer.unobserve(entry.target)
          const image = entry.target
          this.loadImage(image)
        }
      })
    }, observerConfig)

    this.images.forEach(image => {
      this.observer.observe(image)
    })
  }

  LazyLoadImage() {
    const windowInnerHeight = window.innerHeight
    const windowInnerWidth = window.innerWidth

    this.images.forEach(image => {
      const { top, left } = image.getBoundingClientRect()
      if (top <= windowInnerHeight && left <= windowInnerWidth)
        this.loadImage(image)
    })
  }

  loadImages() {
    this.images.forEach(image => {
      this.loadImage(image)
    })
  }

  loadImage(image) {
    const src = image.getAttribute(this.options.virtualSrc)
    if (this.options.callback) {
      this.options.callback(image, src)
      return
    }

    if (image.tagName.toLowerCase() === 'img') {
      src && (image.src = src)
    } else {
      image.style.backgroundImage = `url(${src})`
    }
  }

  loadAndDestroy() {
    this.loadImages()
    this.destroy()
  }

  destroy() {
    this.observer.disconnect()
    document.removeEventListener('scroll', this.LazyLoadImage)
    this.settings = null
  }
}

new LazyLoadImg({
  selector: '.lazy-loader',
  virtualSrc: 'lazy-src',
  callback: function(image, src) {
    const img = new Image()
    img.src = src
    img.onload = function() {
      image.src = src
    }
    img.onerror = img.onabort = function() {
      image.remove()
    }
  }
})
