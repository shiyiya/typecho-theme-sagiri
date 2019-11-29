var main = document.querySelector('#main'),
  imgVIew = document.querySelector('.img-view'),
  viewImg = document.querySelector('.img-view > img')

main.addEventListener('click', function(e) {
  var el = e.target
  if (el.tagName.toLocaleUpperCase() === 'IMG') {
    viewImg.src = el.src
    viewImg.alt = el.alt
    if (imgVIew.style.display == 'block') {
      imgVIew.onclick()
    } else {
      imgVIew.style.display = 'block'
    }
  }
})

imgVIew.onclick = function() {
  this.classList.add('remove')
  setTimeout(() => {
    this.classList.remove('remove')
    this.style.display = 'none'
  }, 300)
}
