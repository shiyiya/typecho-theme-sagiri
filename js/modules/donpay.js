var btnPay = document.querySelector('.btn-pay')
if (btnPay) {
  btnPay.addEventListener('click', function(e) {
    var qr = document.querySelector('.qr')
    if (qr.style.height == '0px') {
      qr.style.height = 'auto'
    } else {
      qr.style.height = 0
    }
  })
}
