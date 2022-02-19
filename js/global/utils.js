const isMobile =
  /iPad|iPhone|Android|Opera Mini|BlackBerry|webOS|UCWEB|Blazer|PSP|IEMobile|Symbian/g.test(
    window.navigator.userAgent
  ) && window.screen.width < 767

function easeInOutQuad(t, b, c, d) {
  if ((t /= d / 2) < 1) return (c / 2) * t * t + b
  return (-c / 2) * (--t * (t - 2) - 1) + b
}

function request(method, url, param, callback) {
  var xhr = new XMLHttpRequest()
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4) {
      if ((xhr.status >= 200 && xhr.status < 300) || xhr.status === 304) {
        callback(xhr.responseText)
      } else {
        callback(xhr.responseText)
      }
    }
  }
  if (method.toLocaleUpperCase === 'POST') {
    if (param && Object.keys(param).length > 0) {
      var temp = ''
      for (var key in param) {
        temp += '&' + key + '=' + param[key]
      }
      param = '?' + temp.slice(1)
    }

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
  }
  xhr.open(method, url, true)
  xhr.send(param)
}

export default { isMobile, easeInOutQuad, request }
