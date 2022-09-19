const cacheName = "cache-v1"
const assets = ['/','/nos_produits' ,'/register', '/ad/','/ad/new','/agence','/agence-users/user','/home','/dev-web','/commande','/account/mes-commandes','/commande/mon-panier','/css/ecommerce.css','/css/bootstrap.min.css', '/css/carousel.css','/admin','/index.php',];
//mise en caher de nos données de nagigateur
self.addEventListener('install', (e) => {
    e.waitUntil(
        caches.open(cacheName).then((cache) => {
            cache.addAll(assets);
        })
    );
});
self.addEventListener('fetch', (e) => {
    //console.log(e.request);
    e.respondWith(
        caches.match(e.request).then((cache) => {
            return cache || fetch(e.request)
        })
    );
});
