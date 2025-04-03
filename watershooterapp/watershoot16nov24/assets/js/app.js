self.addEventListener('install', (e) => {
	e.waitUntil(
		caches.open('404.php').then((cache) => cache.addAll([
			'/'
		])),
	);
});

self.addEventListener('fetch', (e) => {
	e.respondWith(
		caches.match(e.request).then(function (response) {
			return response || fetch(e.request);
		})
	);
});