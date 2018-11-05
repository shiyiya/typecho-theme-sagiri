var fs = require('fs')

var url = 'https://runtua.cn/sticker/arup/',
  stickername = 'ARUP',
  stickers = {
    type: 'image',
    container: []
  }

fs.readdir('../img/sticker/arup', function(err, files) {
  files.forEach((v, k) => {
    stickers.container.push({
      icon: `<img alt="sticker" src="${url + v}">`,
      text: stickername + k
    })
  })

  console.log(stickers.container.length)
  fs.writeFileSync(
    `../img/sticker/${stickername}.json`,
    JSON.stringify(stickers)
  )
})
