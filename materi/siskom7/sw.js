// Naikkan V setiap kali gambar/aset diganti agar cache lama dibuang
const V='cyber-b4-v1';
const put=(r,n)=>{if(n.ok){const c=n.clone();caches.open(V).then(x=>x.put(r,c))}return n};
self.addEventListener('install',()=>self.skipWaiting());
self.addEventListener('activate',e=>e.waitUntil(caches.keys().then(k=>Promise.all(k.filter(x=>x!==V).map(x=>caches.delete(x)))).then(()=>clients.claim())));
self.addEventListener('fetch',e=>{const r=e.request,u=new URL(r.url);if(r.method!=='GET'||u.origin!==location.origin)return;
 // gambar: cache-first (diunduh sekali saja); halaman: network-first dengan cadangan offline
 e.respondWith(/\/img\//.test(u.pathname)?caches.match(r).then(h=>h||fetch(r).then(n=>put(r,n))):fetch(r).then(n=>put(r,n)).catch(()=>caches.match(r)))});
