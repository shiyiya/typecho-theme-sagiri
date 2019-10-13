import TweenLite from 'gsap/TweenLite'
import CSSPlugin from 'gsap/CSSPlugin'

const Power3EaseOut = {
  _func: null,
  _type: 1,
  _power: 3,
  _params: [0, 0, 1, 1]
}
const BackEaseOut = { _p1: 1.70158, _p2: 2.5949095 }

const animatedText = document.getElementById('animate')
const guideText = document.getElementById('guide')

// select the spans in in the guide
const guideSpans = guideText.getElementsByTagName('span')

// select the spans in in the guide
const animatedSpans = animatedText.getElementsByTagName('span')

const textLength = guideSpans.length

const placeSpans = () => {
  // for each span in the guide
  for (var i = 0; i < textLength; i++) {
    let guide = guideSpans[i]
    let animated = animatedSpans[i]
    // get the guide client rect
    let rect = guide.getBoundingClientRect()
    // set the left property of the animate
    // span to rect.left
    animated.style.left = rect.left + 'px'
  }
}

const animateLetterIn = i => {
  setTimeout(() => {
    TweenLite.fromTo(
      animatedSpans[i],
      0.4,
      { opacity: 0, y: 40 },
      {
        opacity: 1,
        y: 0,
        ease: Power3EaseOut
      }
    )
    TweenLite.fromTo(
      animatedSpans[i],
      0.4,
      { scale: 0 },
      { scale: 1, ease: BackEaseOut }
    )
  }, i * 200)

  // if (i === textLength - 1) {
  //   setTimeout(() => {
  //     animateOut();
  //   }, (textLength + 3) * 200);
  // }
}

const animateIn = () => {
  for (var i = 0; i < textLength; i++) {
    animateLetterIn(i)
  }
}

// just to make sure the text will fit the window width
const resizeText = (text, fontSize) => {
  text.style.fontSize = fontSize + 'px'
  text.style.height = fontSize + 'px'
  text.style.lineHeight = fontSize + 'px'
}

const resize = () => {
  let fontSize = window.innerWidth / 9
  if (fontSize > 100) fontSize = 100
  fontSize * -0.5 + 'px'
  resizeText(animatedText, fontSize)
  resizeText(guideText, fontSize)
  placeSpans()
}

setTimeout(() => {
  resize()
  animateIn()
  window.addEventListener('resize', resize)
}, 100)
