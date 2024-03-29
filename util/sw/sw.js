'use strict'
var cacheVersion = 'sagiri-v1.1.3',
  staticeCacheName = 'static' + cacheVersion,
  cacheList = ['/']

self.addEventListener('install', function(e) {
  e.waitUntil(
    caches
      .open(staticeCacheName)
      .then(function(e) {
        return e.addAll(cacheList)
      })
      .then(function() {
        return self.skipWaiting()
      })
  )
})

self.addEventListener('activate', function(e) {
  e.waitUntil(
    caches.keys().then(function(e) {
      return Promise.all(
        e.map(function(e) {
          if (staticeCacheName.indexOf(e) === -1) return caches.delete(e)
        })
      )
    })
  )
})

self.addEventListener('fetch', function(n) {
  n.respondWith(
    caches
      .match(n.request)
      .then(function(e) {
        return (
          e ||
          fetch(n.request).then(function(t) {
            return caches.open('fetch').then(function(e) {
              return (
                n.request.url.indexOf('http') !== -1 &&
                  !n.request.method.indexOf('POST') === -1 &&
                  e.put(n.request, t.clone()),
                t
              )
            })
          })
        )
      })
      .catch(function() {
        return 0
      })
  )
})
