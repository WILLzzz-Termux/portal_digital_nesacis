<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CyberKomputer – Bab 4 Sistem Komputer</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<style>
:root{--bg:#070b1a;--card:rgba(255,255,255,.06);--bd:rgba(255,255,255,.12);--tx:#e8f1ff;--mu:#9fb3d1;--c1:#00f2fe;--c2:#4facfe;--ok:#2ee59d;--no:#ff5d7a}
*{box-sizing:border-box;margin:0}
body{font-family:'Segoe UI',system-ui,sans-serif;background:radial-gradient(circle at 15% 0,#12285a 0,transparent 45%),radial-gradient(circle at 90% 100%,#0b3a5a 0,transparent 40%),var(--bg);color:var(--tx);min-height:100vh;display:flex}
img{max-width:100%}
#side{width:250px;position:fixed;inset:0 auto 0 0;padding:18px 14px;background:rgba(7,11,26,.85);backdrop-filter:blur(14px);border-right:1px solid var(--bd);z-index:20;transition:transform .3s;display:flex;flex-direction:column;gap:6px}
.logo{font-weight:800;font-size:1.15rem;background:linear-gradient(90deg,var(--c1),var(--c2));-webkit-background-clip:text;background-clip:text;color:transparent;margin-bottom:12px}
.nav{background:none;border:0;color:var(--mu);text-align:left;padding:11px 14px;border-radius:12px;cursor:pointer;font-size:.95rem;transition:.2s}
.nav:hover,.nav.on{background:linear-gradient(90deg,rgba(0,242,254,.18),rgba(79,172,254,.12));color:#fff;box-shadow:inset 3px 0 var(--c1)}
#burger{display:none;position:fixed;top:10px;left:10px;z-index:30;background:var(--c2);border:0;color:#fff;font-size:1.3rem;border-radius:10px;padding:6px 12px}
main{margin-left:250px;padding:28px;width:calc(100% - 250px);max-width:1200px}
section{display:none;animation:in .45s}section.on{display:block}
@keyframes in{from{opacity:0;transform:translateY(14px)}to{opacity:1}}
h1{font-size:clamp(1.6rem,4vw,2.6rem);margin-bottom:8px}h2{margin:6px 0 14px}h3{margin-bottom:6px}
.grad{background:linear-gradient(90deg,var(--c1),var(--c2));-webkit-background-clip:text;background-clip:text;color:transparent}
.glass{background:var(--card);border:1px solid var(--bd);border-radius:18px;padding:18px;backdrop-filter:blur(10px)}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(190px,1fr));gap:14px}
.g2{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px}
.btn{background:linear-gradient(90deg,var(--c1),var(--c2));color:#021024;border:0;font-weight:700;padding:10px 18px;border-radius:12px;cursor:pointer;transition:.2s}
.btn:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(0,242,254,.35)}
.btn.o{background:transparent;color:var(--c1);border:1px solid var(--c1)}
.mu{color:var(--mu)}
.tabs{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:16px}
.tab{padding:8px 16px;border-radius:99px;border:1px solid var(--bd);background:var(--card);color:var(--mu);cursor:pointer}
.tab.on{background:var(--c1);color:#021024;font-weight:700}
.card{cursor:pointer;text-align:center;transition:.25s}.card:hover{transform:translateY(-5px);border-color:var(--c1);box-shadow:0 8px 24px rgba(0,242,254,.2)}
.card .im{height:110px;display:flex;align-items:center;justify-content:center;font-size:3rem;margin-bottom:8px}
.card img{max-height:110px;object-fit:contain}
#modal{position:fixed;inset:0;background:rgba(0,0,0,.7);display:none;align-items:center;justify-content:center;z-index:50;padding:16px}
#modal.on{display:flex}
#mb{max-width:560px;width:100%;max-height:90vh;overflow:auto;background:#0e1730;border:1px solid var(--c1);border-radius:20px;padding:22px;animation:in .3s}
#mb img{max-height:190px;display:block;margin:0 auto 12px;border-radius:10px}
.cmap{position:relative;min-height:340px;display:flex;flex-wrap:wrap;gap:12px;justify-content:center;align-items:center}
.node{padding:12px 18px;border-radius:99px;border:1px solid var(--c2);background:rgba(79,172,254,.12);cursor:pointer;transition:.2s}
.node:hover{background:var(--c1);color:#021024}
.node.core{font-size:1.2rem;font-weight:800;background:linear-gradient(90deg,var(--c1),var(--c2));color:#021024;width:100%;text-align:center;border-radius:18px}
.slots{display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:12px;margin:14px 0}
.slot{min-height:90px;border:2px dashed var(--c2);border-radius:14px;padding:8px;text-align:center;font-size:.85rem;color:var(--mu);transition:.2s}
.slot.ok{border-style:solid;border-color:var(--ok);color:var(--ok)}.slot.bad{border-color:var(--no);animation:sh .3s}
@keyframes sh{25%{transform:translateX(-6px)}75%{transform:translateX(6px)}}
.chips{display:flex;flex-wrap:wrap;gap:10px}
.chip{padding:8px 14px;border-radius:12px;background:var(--card);border:1px solid var(--bd);cursor:grab;user-select:none}
.chip.sel{border-color:var(--c1);box-shadow:0 0 12px var(--c1)}
.bits{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin:16px 0}
.bit{width:78px;height:104px;border-radius:14px;border:2px solid var(--bd);background:#101a35;color:var(--mu);cursor:pointer;display:flex;flex-direction:column;align-items:center;justify-content:center;font-size:1.5rem;font-weight:800;transition:.25s}
.bit small{font-size:.75rem;font-weight:400}
.bit.on{background:linear-gradient(160deg,var(--c1),var(--c2));color:#021024;box-shadow:0 0 22px rgba(0,242,254,.5);transform:translateY(-4px)}
.big{font-size:2.4rem;font-weight:800;color:var(--c1)}
.opt{display:block;width:100%;text-align:left;margin:8px 0;padding:12px 14px;border-radius:12px;border:1px solid var(--bd);background:var(--card);color:var(--tx);cursor:pointer}
.opt:hover{border-color:var(--c1)}.opt.ok{background:rgba(46,229,157,.2);border-color:var(--ok)}.opt.no{background:rgba(255,93,122,.2);border-color:var(--no)}
.bar{height:8px;background:var(--bd);border-radius:9px;overflow:hidden;margin:10px 0}.bar i{display:block;height:100%;background:linear-gradient(90deg,var(--c1),var(--c2));width:0;transition:.4s}
input,textarea,select{width:100%;padding:10px 12px;border-radius:10px;border:1px solid var(--bd);background:#0c152c;color:var(--tx);font:inherit;margin:4px 0 12px}
label{font-size:.9rem;color:var(--mu)}
.emo{display:flex;gap:10px;margin-bottom:12px;flex-wrap:wrap}.emo button{font-size:1.8rem;background:var(--card);border:2px solid var(--bd);border-radius:14px;padding:6px 12px;cursor:pointer}.emo button.on{border-color:var(--c1);transform:scale(1.12)}
.fb{margin-top:10px;padding:10px 12px;border-left:3px solid var(--c1);background:rgba(0,242,254,.08);border-radius:8px;font-size:.92rem}
@media(max-width:860px){#side{transform:translateX(-100%)}#side.open{transform:none}#burger{display:block}main{margin:0;width:100%;padding:60px 14px 24px}}
.part{display:flex;flex-direction:column;align-items:center;gap:6px;width:118px;padding:8px;border-radius:12px;border:2px solid var(--bd);background:var(--card);color:var(--tx);font:inherit;font-size:.78rem;text-align:center;cursor:pointer;transition:.2s}
.part:hover{border-color:var(--c1)}.part.sel{border-color:var(--ok);box-shadow:0 0 14px rgba(46,229,157,.4);background:rgba(46,229,157,.12)}
.pimg{width:100%;height:60px;background:#fff;border-radius:8px;display:flex;align-items:center;justify-content:center}.pimg img{max-height:54px;max-width:100%;object-fit:contain}
.part-case{background:#fff;border-radius:12px;padding:8px;max-width:220px}.part-case img{max-height:180px;display:block;margin:auto}
.row{border-top:1px dashed var(--bd);padding:10px 0}
.t-ok{color:var(--ok);font-weight:700}.t-no{color:var(--no);font-weight:700}
.box{margin:8px 0 12px;padding:10px 14px;border:1px solid var(--bd);border-radius:12px;background:rgba(255,255,255,.04);line-height:1.7;min-height:44px}
#lab-b .bits{justify-content:flex-start}
#toast{position:fixed;bottom:22px;left:50%;transform:translate(-50%,30px);background:#0e1730;border:1px solid var(--c1);padding:10px 18px;border-radius:99px;opacity:0;pointer-events:none;transition:.3s;z-index:90}
#toast.on{opacity:1;transform:translate(-50%,0)}
.crow{display:grid;grid-template-columns:1fr 1fr;gap:10px;align-items:center;border-top:1px dashed var(--bd);padding:4px 0}.crow select{margin:4px 0}
.mcl{display:flex;align-items:center;gap:8px;padding:6px 0;cursor:pointer}.mcl input{width:auto;margin:0}
</style>
</head>
<body>
<button id="burger" onclick="document.getElementById('side').classList.toggle('open')">☰</button>
<nav id="side">
  <div class="logo">⚡ CyberKomputer<br><small style="font-weight:400;color:var(--mu)">Informatika SMP Kelas VII</small></div>
  <button class="nav on" data-p="home">🏠 Beranda</button>
  <button class="nav" data-p="materi">📚 Modul Materi</button>
  <button class="nav" data-p="lab">🧪 Virtual Lab</button>
  <button class="nav" data-p="kuis">🎯 Kuis HOTS</button>
  <button class="nav" data-p="refleksi">📝 Refleksi & Jurnal</button>
  <div id="xpb" class="glass" style="margin-top:auto;padding:12px;text-align:center"></div>
</nav>
<main>
<section id="home" class="on">
  <h1>Bab 4: <span class="grad">Sistem Komputer</span></h1>
  <p class="mu">Media pembelajaran interaktif Informatika SMP Kelas VII</p><br>
  <div class="g2">
    <div class="glass"><h3>🤔 Pertanyaan Pemantik</h3><p>Pada era digital, banyak kegiatan kita bergantung pada komputer. Tahukah kalian bahwa komputer bisa membantu kita karena adanya <b>sistem komputer</b>? Bagaimana cara kerja sistem komputer?</p><br><p class="mu"><i>Analogi: perangkat keras adalah gitar, perangkat lunak adalah lagu yang dimainkan.</i></p></div>
    <div class="glass"><h3>🎓 Capaian Pembelajaran</h3><ul style="padding-left:18px;line-height:1.8">
      <li>Menjelaskan bagian-bagian sistem komputer</li><li>Menjelaskan cara kerja sistem komputer</li><li>Menjelaskan cara data dikodifikasi (biner)</li><li>Memilih spesifikasi perangkat sesuai kebutuhan</li></ul></div>
  </div><br>
  <div class="glass"><h3>🗺️ Peta Konsep (klik simpul untuk belajar)</h3><div class="cmap" id="cmap"></div></div>
</section>

<section id="materi">
  <h2>📚 Modul Materi Interaktif</h2>
  <div class="tabs" id="tabs"></div>
  <div id="mbody"></div>
</section>

<section id="lab">
  <h2>🧪 Virtual Lab</h2>
  <div class="tabs"><button class="tab on" id="lt-a" onclick="labTab('a')">A · Rakit PC Virtual</button><button class="tab" id="lt-b" onclick="labTab('b')">B · Lab Biner</button></div>
  <div class="glass" id="lab-a"></div>
  <div class="glass" id="lab-b" style="display:none"></div>
</section>

<section id="kuis">
  <h2>🎯 Kuis Evaluasi HOTS</h2>
  <div class="glass" id="quiz"></div>
</section>

<section id="refleksi">
  <h2>📝 Refleksi Siswa & Jurnal Belajar</h2>
  <div class="glass">
    <div class="g2"><div><label>Nama Siswa</label><input id="rn" placeholder="Nama lengkap"></div><div><label>Kelas</label><input id="rk" value="VII"></div></div>
    <label>Bagaimana perasaan/pemahamanmu hari ini?</label>
    <div class="emo" id="emo"></div>
    <label>1. Apakah kamu sudah mengerti kegunaan perangkat keras dan perangkat lunak?</label><textarea id="r1" rows="2"></textarea>
    <label>2. Jika membeli komputer baru, apakah kamu bisa menentukan hardware & software yang dibutuhkan?</label><textarea id="r2" rows="2"></textarea>
    <label>3. Setelah belajar biner, apakah kamu tertarik pengkodean lain (oktal, heksadesimal)?</label><textarea id="r3" rows="2"></textarea>
    <label>Catatan jurnal belajar</label><textarea id="rj" rows="4" placeholder="Hal baru yang kupelajari…"></textarea>
    <button class="btn" onclick="exportPDF()">📄 Unduh Jurnal (PDF)</button>
  </div>
</section>
</main>
<div id="toast"></div>
<div id="modal" onclick="if(event.target===this)closeM()"><div id="mb"></div></div>

<script>
// ===== DATA MATERI =====
const M={
Hardware:[
{t:"Mouse",i:"mouse.png",d:"Menggerakkan kursor di layar. Cara operasi: Point (tunjuk), Klik kiri (sekali tekan), Klik ganda (dua kali cepat), Klik kanan (menampilkan menu), Drag/seret (memindahkan objek)."},
{t:"Keyboard",i:"keyboard.png",d:"Memasukkan huruf, angka, dan simbol. Kelompok tombol: Typewriter, Function (F1–F12), Numeric Keypad, Cursor control, System, Application, Enter, Other. Jenis: QWERTY, Dvorak, Klockenberg, Maltron, Virtual. Cara kerja: tombol menekan karet, chip mengirim sinyal kode biner, CPU menerjemahkan dengan acuan ROM, lalu tampil di monitor."},
{t:"Scanner",i:"scanner.png",d:"Memindai dan menyalin data dari kertas (grafik, foto, tulisan) menggunakan optical data reader. Objek diletakkan di atas kaca scanner."},
{t:"Joystick",i:"joystik.png",d:"Pelengkap bermain game video dengan lebih dari satu tombol; menggerakkan kursor pada layar permainan. Elemen: stick, base, trigger, tombol ekstra, autofire, throttle, POV hat, cangkir penyedot."},
{t:"Microphone",i:"microphone.png",d:"Mengubah suara menjadi sinyal elektrik untuk dimasukkan ke komputer, direkam sebagai perintah, atau diteruskan melalui komunikasi antarkomputer."},
{t:"Barcode Reader",i:"barcode-scanner.png",d:"Pemindai optis yang membaca barcode tercetak, mengubahnya menjadi data elektrik, lalu mengirimkannya ke komputer."},
{t:"CPU / Prosesor",i:"prosesor.jpg",d:"Otak komputer. Tiga komponen utama: Register, Control Unit (CU) yang mengambil & menerjemahkan instruksi, dan Arithmetic-Logic Unit (ALU) yang menghitung (+ − × ÷) dan operasi logika. Kecepatan diukur dengan clock dalam Hertz (MHz/GHz)."},
{t:"RAM",i:"RAM.png",d:"Memori sangat cepat yang menyimpan data sementara saat komputer memproses. Bersifat volatile: data hilang saat listrik mati. Data dapat diakses secara acak."},
{t:"ROM",i:"ROM.png",d:"Menyimpan instruksi dari produsen untuk proses booting (firmware, misalnya BIOS). Data tidak dapat dihapus dan tetap ada walau listrik mati (non-volatile)."},
{t:"Monitor",i:"MONITOR.png",d:"Menampilkan hasil pengolahan data (teks, gambar, grafik). Jenis: CRT, LCD, dan LED."},
{t:"Printer",i:"PRINTER.png",d:"Mencetak gambar, foto, dan dokumen ke kertas. Jenis: dot matrix, inkjet, laserjet, dan plotter."},
{t:"Speaker",i:"SPEAKER.webp",d:"Menghasilkan suara dari komputer: musik, percakapan film, efek suara."},
{t:"Hard Disk (HDD)",i:"HARDDISK.png",d:"Menyimpan data pada lapisan magnet di piringan (platter) dengan head baca-tulis. Kapasitas 256 GB hingga 18 TB. Non-volatile."},
{t:"SSD",i:"SSD.png",d:"Penyimpan berbasis flash memory tanpa bagian berputar. Lebih tahan guncangan, senyap, akses lebih cepat, latensi lebih rendah daripada HDD."},
{t:"Flash Drive",i:"FLASHDISK.png",d:"Penyimpan data portabel berantarmuka USB. Cocok untuk back-up dan memindahkan data antarkomputer."},
{t:"Compact Disc",i:"CD.png",d:"Cakram optik digital (Philips & Sony, 1982). Format: CD-ROM, CD-R (sekali tulis), CD-RW (dapat ditulis ulang), VCD, dll. Kapasitas ±700 MB."},
{t:"SD / MicroSD Card",i:"SDCARD.png",d:"Kartu memori untuk perangkat portabel (smartphone, kamera, tablet). Punya fitur Write-Protect. MicroSD adalah yang paling tipis dan ringan."},
{t:"Cloud Storage",e:"☁️",d:"Penyimpanan data di server penyedia layanan internet; perlu koneksi internet. Keunggulan: diakses dari perangkat mana pun, mudah berbagi, ada jaminan keamanan. Contoh: Google Drive, Dropbox, OneDrive, pCloud."},
{t:"Motherboard",i:"motherboard-ddr4.png",d:"Papan sirkuit utama yang menghubungkan semua peranti: tempat memasang prosesor, memori, hard disk, dan komponen lain."},
{t:"Casing",i:"CASING.png",d:"Rumah pelindung komponen komputer seperti motherboard, prosesor, RAM, dan penyimpan."},
{t:"PSU (Power Supply)",i:"PSU.png",d:"Mengubah listrik dari sumber menjadi tegangan yang dibutuhkan komponen komputer."},
{t:"VGA Card",i:"VGA-CARD-MID.png",d:"Memproses keluaran dari CPU untuk ditampilkan ke layar monitor."},
{t:"GPU",i:"GPU.png",d:"Sirkuit khusus untuk mempercepat pembuatan gambar. Strukturnya sangat paralel sehingga efisien untuk grafik dan pemrosesan gambar."},
{t:"Sound Card",i:"SOUNDCARD.png",d:"Mengubah sinyal digital menjadi sinyal suara ke speaker."},
{t:"LAN Card",i:"LANCARD.png",d:"Kartu jaringan yang menghubungkan komputer ke jaringan (kabel LAN)."}],
Software:[
{t:"Sistem Operasi",i:"Sistem-Operasi.PNG",d:"Perangkat lunak utama yang pertama berjalan saat komputer menyala. Fungsi: manajemen proses, manajemen sumber daya, dan manajemen data. Bagian kode layanan utamanya disebut kernel. Contoh: Windows, macOS, Linux, Android, iOS."},
{t:"iOS",i:"ios.PNG",d:"Sistem operasi seluler dari Apple untuk iPhone dan iPad (closed source)."},
{t:"Ubuntu (Linux)",i:"ubuntu.PNG",d:"Distribusi Linux yang bersifat open source dan gratis; banyak dipakai di server dan superkomputer."},
{t:"Freeware",e:"🆓",d:"Gratis tanpa batas jumlah dan waktu pakai, tetapi source code tidak boleh dimodifikasi. Contoh: Skype, Avira, CCleaner, Smadav, Winamp."},
{t:"Shareware",e:"⏳",d:"Dapat dicoba sementara (misal trial 30 hari atau fitur terbatas), lalu harus membeli. Contoh: CorelDraw, Microsoft Office, IDM, Filmora."},
{t:"Adware",e:"📢",d:"Gratis, tetapi menampilkan iklan saat dijalankan."},
{t:"Commercial / Proprietary",i:"kaspersky.PNG",d:"Dibuat untuk dijual; tidak boleh disebarluaskan atau dimodifikasi tanpa izin, dilindungi hak cipta. Contoh: Windows, Photoshop, Kaspersky."},
{t:"Open Source",i:"open-office.PNG",d:"Source code dibuka ke publik sehingga dapat dimodifikasi dan didistribusikan dengan syarat tertentu. Contoh: OpenOffice, Linux, Audacity, Notepad++, Android."},
{t:"Closed Source",i:"ms-office.png",d:"Tersedia untuk publik tanpa source code. Contoh: Microsoft Windows/Office, Adobe Photoshop, CorelDraw."},
{t:"Pengolah Presentasi",i:"ms-power-point.PNG",d:"Aplikasi (closed source) untuk membuat presentasi slide."},
{t:"Pengolah Grafis",i:"adobe-photoshop.PNG",d:"Mengedit foto, layout, dan membuat ilustrasi. Contoh: Photoshop, GIMP, CorelDraw, Inkscape."},
{t:"Multimedia",i:"vlc-media-player.PNG",d:"Memutar audio, video, animasi. Contoh: VLC (open source), Windows Media Player."},
{t:"Browser (Layanan Internet)",i:"safari.PNG",d:"Mengakses layanan internet seperti web. Contoh: Safari, Chrome."},
{t:"Social Media",i:"snapchat.PNG",d:"Aplikasi seluler untuk berkomunikasi. Contoh: Snapchat, Instagram, TikTok, Facebook."}],
"Interaksi Perangkat":[
{t:"Bluetooth",e:"📶",d:"Standar nirkabel untuk bertukar data jarak dekat memakai gelombang radio UHF 2,402–2,480 GHz; membangun jaringan area pribadi (PAN). Menghubungkan laptop-ponsel, ponsel-headphone, dll."},
{t:"Tethering / Hotspot",e:"📱",d:"Berbagi koneksi internet dari ponsel ke komputer lain (phone-as-modem) melalui Wi-Fi (WLAN), Bluetooth, atau kabel USB. Hotspot dapat dilindungi PIN/kata sandi dan ponsel berfungsi sebagai router portabel."},
{t:"CCTV",i:"cctv.PNG",d:"Closed-Circuit Television: kamera video yang mengirim gambar ke monitor pengawas dan dapat merekamnya otomatis, lengkap dengan data waktu. Dapat dikendalikan jarak jauh lewat internet."}],
"Permasalahan Hardware":[
{t:"Perangkat Tidak Mau Menyala",e:"🔌",d:"Kemungkinan: kabel/adaptor/PSU bermasalah, baterai habis atau rusak, RAM/komponen longgar, atau kerusakan motherboard."},
{t:"Komputer Hang",e:"🥶",d:"Tiba-tiba diam dan tidak merespons. Solusi: tunggu sebentar, tutup aplikasi (Task Manager), restart, kurangi aplikasi terbuka. Kata kunci pencarian: \"cara mengatasi laptop hang\"."},
{t:"Baterai Menggelembung",e:"⚠️",d:"Berbahaya! Akibat panas berlebih, usia baterai, atau pengisian tidak tepat. Hentikan pemakaian dan ganti di layanan resmi."},
{t:"Memilih Spesifikasi",e:"🛒",d:"Sesuaikan dengan kebutuhan: editor video/arsitek butuh prosesor kuat, RAM besar, penyimpanan besar, VGA bagus & layar beresolusi tinggi. Bandingkan harga dengan anggaran."},
{t:"Back-up Data",e:"💾",d:"Simpan salinan data di flashdisk, hard disk eksternal, atau cloud agar aman jika perangkat rusak."}],
"Bilangan Biner":[
{t:"Konsep Biner",e:"0️⃣1️⃣",d:"Komputer hanya mengenal dua digit: 0 dan 1 (basis 2). Setiap 0 atau 1 disebut bit (binary digit). Diwakili oleh transistor hidup/mati atau kapasitor terisi/kosong."},
{t:"Kartu Biner",e:"🃏",d:"Lima kartu bernilai 16, 8, 4, 2, 1. Kartu tampil = 1, tertutup = 0. Contoh 01001 = 0+8+0+0+1 = 9."},
{t:"Bit & Byte",e:"🧮",d:"8 bit = 1 byte (nilai 0–255). Satu tangan bisa menghitung 0–31 (32 angka), dua tangan 0–1023."},
{t:"Kode ASCII",e:"🔤",d:"American Standard Code Information Interchange: kode biner untuk huruf, angka, dan simbol pada komputer."},
{t:"Menambah 0 di Kanan",e:"➡️",d:"Pada desimal, menambah 0 di kanan mengalikan 10. Pada biner mengalikan 2: 1001 (9) → 10010 (18)."}]
};
const $=s=>document.querySelector(s),$$=s=>[...document.querySelectorAll(s)];
// ===== NAVIGASI =====
function go(p){$$('section').forEach(s=>s.classList.toggle('on',s.id===p));$$('.nav').forEach(n=>n.classList.toggle('on',n.dataset.p===p));$('#side').classList.remove('open');scrollTo(0,0)}
$$('.nav').forEach(n=>n.onclick=()=>go(n.dataset.p));
// ===== PETA KONSEP =====
$('#cmap').innerHTML='<div class="node core">Sistem Komputer</div>'+[["🖥️ Perangkat Keras · Input","Hardware"],["⚙️ Prosesor","Hardware"],["🖨️ Output","Hardware"],["💾 Storage","Hardware"],["🧩 Perangkat Lunak","Software"],["🔗 Interaksi Antar Perangkat","Interaksi Perangkat"],["🛠️ Permasalahan & Spesifikasi","Permasalahan Hardware"],["🔢 Sistem Biner","Bilangan Biner"]].map(([a,b])=>`<div class="node" onclick="openCat('${b}')">${a}</div>`).join('');
function openCat(c){go('materi');cat(c)}
// ===== MATERI + XP + TANTANGAN =====
const GRP={
Hardware:{"⌨️ Input":["Mouse","Keyboard","Scanner","Joystick","Microphone","Barcode Reader"],"⚙️ Proses":["CPU / Prosesor","RAM","ROM"],"🖥️ Output":["Monitor","Printer","Speaker"],"💾 Storage":["Hard Disk (HDD)","SSD","Flash Drive","Compact Disc","SD / MicroSD Card","Cloud Storage"],"🧩 Peranti Lainnya":["Motherboard","Casing","PSU (Power Supply)","VGA Card","GPU","Sound Card","LAN Card"]},
Software:{"📜 Lisensi":["Freeware","Shareware","Adware","Commercial / Proprietary","Open Source","Closed Source"],"🖧 Sistem Operasi":["Sistem Operasi","iOS","Ubuntu (Linux)"],"📱 Aplikasi Lainnya":["Pengolah Presentasi","Pengolah Grafis","Multimedia","Browser (Layanan Internet)","Social Media"]}};
// soal pilihan ganda: [pertanyaan, [jawaban benar, pengecoh...]]
const CQ={
Hardware:[["Data yang hilang saat listrik padam disimpan di…",["RAM","ROM","SSD","Hard Disk"]],["Instruksi booting (firmware/BIOS) yang tidak bisa dihapus disimpan di…",["ROM","RAM","Flash Drive","VGA Card"]],["Sinyal yang dikirim keyboard ke komputer berupa…",["kode biner","suara","cahaya","tinta"]],["Klik kanan pada mouse berfungsi untuk…",["menampilkan menu tertentu","memindahkan objek","menunjuk objek","membuka dua kali"]],["Dibandingkan HDD, SSD…",["lebih tahan guncangan dan aksesnya lebih cepat","memiliki piringan magnet","selalu lebih lambat","kehilangan data saat listrik mati"]],["Bagian CPU yang melakukan operasi hitung dan logika adalah…",["ALU","CU","Register","ROM"]]],
Software:[["Software gratis tanpa batas waktu, tetapi source code tidak boleh dimodifikasi, disebut…",["Freeware","Shareware","Open Source","Adware"]],["Software yang hanya bisa dicoba (misal trial 30 hari) lalu harus dibeli adalah…",["Shareware","Freeware","Adware","Linux"]],["Bagian sistem operasi yang melakukan layanan utama disebut…",["Kernel","BIOS","Driver","Register"]],["Perangkat lunak yang kode sumbernya dibuka ke publik adalah…",["Open Source","Closed Source","Commercial","Adware"]],["Fungsi utama sistem operasi: manajemen proses, sumber daya, dan…",["data","iklan","lisensi","grafis"]]],
"Interaksi Perangkat":[["Bluetooth bertukar data memakai…",["gelombang radio UHF 2,4 GHz","kabel USB","sinar laser","gelombang suara"]],["Bluetooth dapat membangun jaringan…",["area pribadi (PAN)","area luas (WAN)","telepon kabel","satelit"]],["Berbagi internet dari ponsel ke komputer lain disebut…",["tethering","scanning","booting","rendering"]],["Ponsel menjadi router portabel saat tethering melalui…",["WLAN/Wi-Fi (hotspot)","CD-ROM","printer","ROM"]],["CCTV disebut sistem rangkaian tertutup karena…",["sinyalnya tidak disiarkan secara terbuka","dipasang di ruang tertutup","kameranya tertutup","tidak bisa merekam"]],["Manfaat CCTV pada jalan kota:",["merekam otomatis lengkap dengan waktu kejadian","mencetak dokumen","menyimpan BIOS","mengubah suara"]]],
"Permasalahan Hardware":[["Perangkat tidak mau menyala, yang pertama diperiksa…",["kabel/adaptor, PSU, dan baterai","warna wallpaper","ukuran font","volume speaker"]],["Komputer hang, langkah yang tepat…",["menutup aplikasi (Task Manager) atau restart","membongkar motherboard","membuang baterai","menambah printer"]],["Baterai ponsel menggelembung, sebaiknya…",["dihentikan pemakaiannya dan diganti di layanan resmi","tetap dipakai","ditusuk","dijemur"]],["Editor video sebaiknya memilih komputer dengan…",["prosesor kuat, RAM besar, SSD/VGA bagus","RAM 2 GB saja","monitor CRT","speaker besar"]],["Tujuan back-up data…",["punya salinan agar data aman jika perangkat rusak","mempercepat RAM","menghapus virus","mengisi daya"]],["Cara memilih spesifikasi komputer yang tepat…",["sesuaikan kebutuhan dan anggaran","pilih yang termurah","pilih yang termahal","pilih warna favorit"]]],
"Bilangan Biner":[["Komputer hanya mengenal digit…",["0 dan 1","0 sampai 9","1 sampai 10","A sampai F"]],["Nilai kelima kartu biner adalah…",["16, 8, 4, 2, 1","1, 2, 3, 4, 5","10, 100, 1000","2, 4, 6, 8"]],["Biner 01001 sama dengan desimal…",["9","8","10","1"]],["Biner 10110 sama dengan desimal…",["22","26","11","14"]],["Desimal 17 dalam biner 5 bit adalah…",["10001","10010","01111","11000"]],["1 byte terdiri dari…",["8 bit","4 bit","16 bit","2 bit"]],["Menambah angka 0 di kanan biner 1001 (9) menghasilkan…",["18 (dikali 2)","90","10","19"]],["Kode ASCII adalah…",["kode biner untuk huruf, angka, dan simbol","jenis RAM","jenis printer","sistem operasi"]]]};
const MODS=Object.keys(M),PASS=75,LVN=[[0,'Pemula'],[100,'Penjelajah'],[250,'Teknisi'],[450,'Master Komputer']];
let ST={xp:0,read:{},done:{}};try{ST=Object.assign(ST,JSON.parse(localStorage.getItem('cyberB4')))}catch(e){}
const sv=()=>{try{localStorage.setItem('cyberB4',JSON.stringify(ST))}catch(e){}};
const lvl=()=>LVN.filter(l=>ST.xp>=l[0]).pop()[1];
const shuf=a=>[...a].sort(()=>Math.random()-.5);
function toast(t){const e=$('#toast');e.textContent=t;e.classList.add('on');clearTimeout(toast.t);toast.t=setTimeout(()=>e.classList.remove('on'),2600)}
function xpUI(){$('#xpb').innerHTML=`⭐ <b>${ST.xp} XP</b><br><small>Level: ${lvl()}</small>`}
function addXP(n,why){ST.xp+=n;sv();xpUI();toast(`+${n} XP · ${why}`)}
const unlocked=c=>{const i=MODS.indexOf(c);return i==0||ST.done[MODS[i-1]]!=null};
let cur='Hardware',chq=null;
function cat(c){if(!unlocked(c)){toast('🔒 Selesaikan tantangan modul "'+MODS[MODS.indexOf(c)-1]+'" dulu');return}
 cur=c;chq=null;
 $('#tabs').innerHTML=MODS.map(k=>`<button class="tab ${k===c?'on':''}" style="${unlocked(k)?'':'opacity:.55'}" onclick="cat('${k}')">${unlocked(k)?(ST.done[k]!=null?'✅ ':''):'🔒 '}${k}</button>`).join('');
 const n=M[c].length,rd=M[c].filter(x=>ST.read[c+'|'+x.t]).length,ni=MODS[MODS.indexOf(c)+1],dn=ST.done[c]!=null;
 const card=i=>{const x=M[c][i];return `<div class="glass card" onclick="openM(${i})"><div class="im">${x.i?`<img src="${x.i}" alt="${x.t}" onerror="this.outerHTML='🖼️'">`:x.e}</div><b>${x.t}</b>${ST.read[c+'|'+x.t]?'<div class="t-ok" style="font-size:.8rem">✔ dibaca</div>':''}</div>`};
 const g=GRP[c],body=g?Object.entries(g).map(([k,l])=>`<h3 style="margin:20px 0 10px" class="grad">${k}</h3><div class="grid">${l.map(t=>card(M[c].findIndex(x=>x.t===t))).join('')}</div>`).join(''):`<div class="grid">${M[c].map((_,i)=>card(i)).join('')}</div>`;
 $('#mbody').innerHTML=`<div class="glass" style="margin-bottom:6px;display:flex;gap:12px;flex-wrap:wrap;align-items:center"><div style="flex:1;min-width:200px">Kartu dibaca: <b>${rd}/${n}</b> (+5 XP per kartu)<div class="bar"><i style="width:${rd/n*100}%"></i></div>${dn?`<span class="t-ok">✅ Tantangan selesai (skor ${ST.done[c]}%)</span>`:'<span class="mu">Selesaikan tantangan untuk membuka modul berikutnya.</span>'}</div><button class="btn" onclick="chStart()">🎯 ${dn?'Ulangi':'Mulai'} Tantangan</button>${dn&&ni?`<button class="btn o" onclick="cat('${ni}')">Lanjut: ${ni} →</button>`:''}<button class="btn o" onclick="exportPDF()">📄 Jurnal PDF</button></div>`+body}
function openM(i){const x=M[cur][i],k=cur+'|'+x.t;$('#mb').innerHTML=`${x.i?`<img src="${x.i}" alt="${x.t}" onerror="this.remove()">`:`<div style="font-size:4rem;text-align:center">${x.e}</div>`}<h3 class="grad">${x.t}</h3><p style="line-height:1.7">${x.d}</p><br><button class="btn" onclick="speak(${i})">🔊 Dengarkan</button> <button class="btn o" onclick="closeM()">Tutup</button>`;$('#modal').classList.add('on');
 if(!ST.read[k]){ST.read[k]=1;addXP(5,'membaca '+x.t);cat(cur)}}
function closeM(){speechSynthesis.cancel();$('#modal').classList.remove('on')}
function speak(i){if(!('speechSynthesis' in window))return alert('Browser tidak mendukung suara.');speechSynthesis.cancel();const x=M[cur][i],u=new SpeechSynthesisUtterance(x.t+'. '+x.d);u.lang='id-ID';speechSynthesis.speak(u)}
// ---- Tantangan ----
function chStart(){const c=cur,g=GRP[c]?Object.keys(GRP[c]):null;
 chq={c,g,items:g?shuf(M[c].map(x=>x.t)):[],mc:CQ[c].map(q=>({q:q[0],o:shuf(q[1].map((t,i)=>({t,ok:i===0})))}))};
 const{items,mc}=chq;$('#mbody').innerHTML=`<div class="glass"><h3>🎯 Tantangan: ${c}</h3><p class="mu">Total ${items.length+mc.length} soal mencakup seluruh kartu modul. Nilai minimal ${PASS}% untuk lulus.</p>
 ${g?`<h3 style="margin-top:14px">A. Kelompokkan setiap kartu</h3>${items.map((t,i)=>`<div class="crow"><span>${t}</span><select id="s${i}"><option value="">— pilih —</option>${g.map(x=>`<option>${x}</option>`).join('')}</select></div>`).join('')}`:''}
 <h3 style="margin-top:14px">${g?'B. ':''}Pilihan ganda</h3>${mc.map((m,i)=>`<div class="row"><p>${i+1}. ${m.q}</p>${m.o.map((o,j)=>`<label class="mcl"><input type="radio" name="m${i}" value="${j}"> ${o.t}</label>`).join('')}</div>`).join('')}
 <button class="btn" onclick="chGrade()">✔ Periksa Jawaban</button> <button class="btn o" onclick="cat(cur)">← Kembali ke materi</button><div id="chr" style="margin-top:12px"></div></div>`}
function chGrade(){const{c,g,items,mc}=chq;let ok=0,bad=[];
 for(let i=0;i<items.length;i++){const v=$('#s'+i).value;if(!v)return toast('Lengkapi semua jawaban dulu');const r=g.find(k=>GRP[c][k].includes(items[i]));v===r?ok++:bad.push(`❌ ${items[i]} → seharusnya ${r}`)}
 for(let i=0;i<mc.length;i++){const r=document.querySelector(`input[name=m${i}]:checked`);if(!r)return toast('Lengkapi semua jawaban dulu');mc[i].o[+r.value].ok?ok++:bad.push(`❌ Soal ${i+1}: jawaban benar "${mc[i].o.find(o=>o.ok).t}"`)}
 const tot=items.length+mc.length,pct=Math.round(ok/tot*100),pass=pct>=PASS,first=ST.done[c]==null,ni=MODS[MODS.indexOf(c)+1];
 if(pass){ST.done[c]=first?pct:Math.max(ST.done[c],pct);sv();if(first)addXP(50+(pct==100?20:0),'tantangan '+c+' selesai')}
 $('#chr').innerHTML=`<div class="fb"><b>Skor ${pct}% (${ok}/${tot})</b> — ${pass?'🎉 Lulus!'+(ni?' Modul "'+ni+'" terbuka.':' Semua modul selesai!'):'belum lulus, ayo coba lagi.'}</div>${bad.length?`<p class="mu" style="margin-top:10px">Perlu diperbaiki:</p>${bad.map(b=>`<div class="t-no">${b}</div>`).join('')}`:''}<br>${pass&&ni?`<button class="btn" onclick="cat('${ni}')">Lanjut: ${ni} →</button> `:''}${pass?'<button class="btn o" onclick="cat(cur)">Kembali ke materi</button>':'<button class="btn" onclick="chStart()">↺ Coba lagi</button>'}`;
 $('#chr').scrollIntoView({behavior:'smooth'})}
xpUI();cat('Hardware');
// ===== VIRTUAL LAB =====
function labTab(t){['a','b'].forEach(k=>{$('#lab-'+k).style.display=k===t?'block':'none';$('#lt-'+k).classList.toggle('on',k===t)})}
// ---- Lab A: Rakit PC Virtual ----  [gambar, nama, watt, poin biaya, (watt PSU)]
const RO={mb:['motherboard-ddr5.png','Motherboard AM5 DDR5',50,4],ryzen:['prosesor.jpg','AMD Ryzen (AM5)',105,4],intel:['prosesor.jpg','Intel (LGA)',95,4],ram5:['RAM.png','RAM DDR5',5,2],ram4:['RAM.png','RAM DDR4',5,1],ssd:['SSD.png','SSD',5,2],hdd:['HARDDISK.png','Harddisk',10,1],vga:['VGA-CARD-MID.png','VGA Card',150,5],snd:['SOUNDCARD.png','Sound card',10,1],lan:['LANCARD.png','LAN card',5,1],p3:['PSU.png','PSU 300 W',0,1,300],p5:['PSU.png','PSU 500 W',0,2,500],p7:['PSU.png','PSU 750 W',0,3,750],mon:['MONITOR.png','Monitor',30,2]};
const RS=[['mb','Motherboard',['mb']],['cpu','Prosesor',['ryzen','intel']],['ram','RAM',['ram5','ram4']],['sto','Penyimpanan',['ssd','hdd']],['vga','VGA Card (opsional)',['vga']],['ext','Kartu tambahan (opsional)',['snd','lan']],['psu','Power Supply',['p3','p5','p7']],['mon','Monitor',['mon']]];
const RW=['mb','cpu','ram','sto','psu','mon'];
const RM=[{n:'PC Tugas Sekolah',d:'Bu Guru butuh PC untuk mengetik dan internet.',r:RW},{n:'PC Desain & Edit Video',d:'Kakak kelas ingin edit video lancar. Wajib SSD, VGA card, dan PSU minimal 500 W.',r:[...RW,'vga'],ssd:1,pm:500},{n:'Hemat Anggaran',d:'Perpustakaan punya batas biaya 15 poin. Tetap harus bisa menyala!',r:RW,b:15}];
const RIMG=f=>`<img src="${f}" alt="" onerror="this.style.visibility='hidden'">`;
let RA={m:0,p:{},t:0},RB=[0,0,0];
function labA(){const m=RM[RA.m],c=Object.values(RA.p).reduce((t,k)=>t+RO[k][3],0),inst=Object.values(RA.p).map(k=>RO[k][1]);
 $('#lab-a').innerHTML=`<div class="tabs">${RM.map((x,i)=>`<button class="tab ${i==RA.m?'on':''}" onclick="RA={m:${i},p:{},t:0};labA()">Misi ${i+1}${RB[i]?' '+'⭐'.repeat(RB[i]):''}</button>`).join('')}</div>
 <h3>${m.n}</h3><p>${m.d}</p>
 <div class="g2" style="align-items:center;margin:10px 0"><div class="part-case">${RIMG('CASING.png')}</div><div><p class="mu">Terpasang di casing:</p><p>${inst.length?inst.join(' · '):'<i class="mu">(masih kosong)</i>'}</p></div></div>
 <p class="mu">Ketuk komponen untuk memasang (ketuk lagi untuk melepas).</p>
 ${RS.map(s=>`<div class="row"><b>${s[1]}</b><div class="chips" style="margin-top:6px">${s[2].map(k=>`<button class="part ${RA.p[s[0]]==k?'sel':''}" onclick="pk('${s[0]}','${k}')"><span class="pimg">${RIMG(RO[k][0])}</span>${RO[k][1]}</button>`).join('')}</div></div>`).join('')}
 <p class="mu" style="margin:10px 0">Biaya: ${c} poin${m.b?' / batas '+m.b:''}</p>
 <button class="btn" onclick="pw()">⏻ POWER</button><div id="res" style="margin-top:10px"></div>`}
function pk(s,k){RA.p[s]==k?delete RA.p[s]:RA.p[s]=k;labA()}
function cek(){const m=RM[RA.m],p=RA.p,r=[],N={mb:'motherboard',cpu:'prosesor',ram:'RAM',sto:'penyimpanan',psu:'PSU',mon:'monitor',vga:'VGA card'},ms=m.r.filter(s=>!p[s]);
 r.push([!ms.length,ms.length?'Belum terpasang: '+ms.map(s=>N[s]).join(', '):'Semua komponen wajib terpasang']);
 if(p.cpu)r.push([p.cpu=='ryzen','Soket prosesor cocok (motherboard AM5 hanya menerima AMD Ryzen)']);
 if(p.ram)r.push([p.ram=='ram5','Jenis RAM cocok (slot motherboard bertipe DDR5)']);
 const w=Object.values(p).reduce((t,k)=>t+RO[k][2],0);if(p.psu)r.push([RO[p.psu][4]>=w,`Daya cukup (butuh ${w} W, PSU ${RO[p.psu][4]} W)`]);
 if(m.ssd)r.push([p.sto=='ssd','Memakai SSD agar proyek video cepat dibuka']);
 if(m.pm)r.push([!!p.psu&&RO[p.psu][4]>=m.pm,'PSU minimal '+m.pm+' W']);
 if(m.b){const c=Object.values(p).reduce((t,k)=>t+RO[k][3],0);r.push([c<=m.b,`Biaya ${c} dari batas ${m.b}`])}return r}
function pw(){RA.t++;const r=cek(),e=$('#res'),mi=RA.m;e.innerHTML='<p class="mu">Uji nyala…</p>';
 r.forEach((x,i)=>setTimeout(()=>{if(RA.m!==mi||!$('#res'))return;e.innerHTML+=`<div class="${x[0]?'t-ok':'t-no'}">${x[0]?'✅':'❌'} ${x[1]}</div>`;
  if(i==r.length-1){const ok=r.every(y=>y[0]),st=Math.max(1,4-RA.t);e.innerHTML+=ok?`<p class="t-ok">🎉 PC menyala! ${'⭐'.repeat(st)}</p>`:'<p class="mu">Periksa pesan merah, lalu coba lagi.</p>';if(ok&&RB[mi]<st)RB[mi]=st}},450*i))}
// ---- Lab B: Lab Biner ----
let kv=[0,0,0,0,0],gv=1,gs=0,gn=1,sw='';
const f5=x=>x.toString(2).padStart(5,'0');
function labB(){$('#lab-b').innerHTML=`<h3>1. Kartu Biner</h3><div class="bits" id="kc"></div><div class="box" id="ko"></div><button class="btn o" onclick="kr()">Reset</button>
<h3 style="margin-top:20px">2. Biner → Desimal</h3><input id="bi" placeholder="mis. 01001" aria-label="Bilangan biner"><button class="btn" onclick="b2d()">Hitung</button><div class="box" id="bo"></div>
<h3 style="margin-top:20px">3. Desimal → Biner</h3><input id="di" placeholder="mis. 17" inputmode="numeric" aria-label="Bilangan desimal"><button class="btn" onclick="d2b()">Ubah</button><div class="box" id="dout"></div>
<h3 style="margin-top:20px">4. Tebak Bilangan Biner</h3><select id="lv" onchange="gv=+this.value;ng()"><option value="1">Mudah (1–7)</option><option value="2">Sedang (1–15)</option><option value="3">Sulit (1–31)</option></select><p>Skor: <b id="gsc">0</b></p><div class="bits" id="gq2"></div><input id="ga" inputmode="numeric" aria-label="Tebakan desimal"><button class="btn" onclick="gc()">Cek</button> <button class="btn o" onclick="ng()">Soal baru</button> <button class="btn o" onclick="gs=0;ng()">Coba lagi (skor 0)</button><div id="gf"></div>
<h3 style="margin-top:20px">5. Pesan Rahasia</h3><p class="mu">Latihan konsep representasi data (A=1 … Z=26 dalam 5 bit), bukan sistem universal pengodean kata.</p><input id="sm" placeholder="Ketik huruf A–Z" maxlength="12"><button class="btn" onclick="enc()">Jadikan biner</button><div class="box" id="so"></div><div class="box" id="sc2"></div><input id="sa" placeholder="Tebak katanya" aria-label="Tebak kata"><button class="btn" onclick="decSecret()">Cek</button> <span id="sf"></span>`;kr();ng();nw()}
function kr(){kv=[0,0,0,0,0];kd()}
function kt(i){kv[i]^=1;kd()}
function kd(){$('#kc').innerHTML=kv.map((v,i)=>`<div class="bit ${v?'on':''}" role="button" aria-pressed="${!!v}" onclick="kt(${i})"><small>${16>>i}</small><span>${v}</span></div>`).join('');const s=kv.reduce((a,v,i)=>a+v*(16>>i),0);
 $('#ko').innerHTML=`Biner: <b>${kv.join('')}</b><br>${kv.map((v,i)=>`${v} × ${16>>i}`).join(' + ')} = <b>${s}</b>`+(s>=1&&s<=26?`<br>Huruf ke-${s} = <b>${String.fromCharCode(64+s)}</b> · ASCII ${String.fromCharCode(64+s)} = ${64+s} = ${(64+s).toString(2).padStart(8,'0')}`:'')}
function b2d(){const v=$('#bi').value.trim(),o=$('#bo');if(!/^[01]+$/.test(v)||v.length>16){o.innerHTML='⚠️ Masukkan hanya angka 0 dan 1 (maksimal 16 digit).';return}const n=v.length,s=parseInt(v,2);o.innerHTML=[...v].map((c,i)=>`${c} × 2<sup>${n-1-i}</sup> = ${c*Math.pow(2,n-1-i)}`).join('<br>')+`<br><b>${v} (biner) = ${s} (desimal)</b>`}
function d2b(){const v=$('#di').value.trim(),o=$('#dout');if(!/^\d+$/.test(v)||+v>65535){o.innerHTML='⚠️ Masukkan bilangan bulat nonnegatif (0–65535).';return}let n=+v,st=[];if(n==0)st.push('0 ÷ 2 = 0 sisa 0');for(let x=n;x>0;x=x>>1)st.push(`${x} ÷ 2 = ${x>>1} sisa ${x&1}`);const b=n.toString(2).padStart(5,'0');o.innerHTML=st.join('<br>')+`<br>Baca sisa dari bawah ke atas.<br>Nilai tempat: ${[...b].map((c,i)=>Math.pow(2,b.length-1-i)).join(', ')}<br><b>${n} (desimal) = ${b} (biner)</b>`}
function ng(){const m=[7,15,31][gv-1];gn=1+Math.random()*m|0;const b=f5(gn);$('#gq2').innerHTML=[...b].map((c,i)=>`<div class="bit ${c==1?'on':''}" style="cursor:default;transform:none"><small>${16>>i}</small><span>${c}</span></div>`).join('');$('#ga').value='';$('#gf').innerHTML='';$('#gsc').textContent=gs}
function gc(){const v=$('#ga').value.trim();if(!/^\d+$/.test(v))return;const ok=+v==gn;if(ok)gs+=gv;$('#gsc').textContent=gs;$('#gf').innerHTML=`<div class="fb ${ok?'t-ok':'t-no'}">${ok?'✅ Benar, jawabanmu tepat! +'+gv:'❌ Belum tepat. Jumlahkan kartu yang menyala: '+f5(gn)+' = '+gn}</div>`}
function enc(){const w=$('#sm').value.toUpperCase().replace(/[^A-Z]/g,'');$('#so').innerHTML=w?[...w].map(c=>`${c} = ${f5(c.charCodeAt(0)-64)}`).join('<br>'):'Ketik huruf A–Z.'}
function nw(){sw=['KODE','BIT','DATA','CPU','RAM'][Math.random()*5|0];$('#sc2').innerHTML='Tantangan: baca kode ini → '+[...sw].map(c=>f5(c.charCodeAt(0)-64)).join(' ')}
function decSecret(){const ok=$('#sa').value.trim().toUpperCase()==sw;$('#sf').innerHTML=ok?'✅ Benar, jawabanmu tepat!':'❌ Belum tepat, coba hitung tiap pola 5 bit.';if(ok)setTimeout(()=>{nw();$('#sa').value='';$('#sf').innerHTML=''},1200)}
labA();labB();
// ===== KUIS =====
const Q=[
{q:"Joko editor video, uang Rp5.500.000, ingin prosesor Core i3. Toko A, B (RAM 4GB, HD 500GB) dan Toko C, D (RAM 2GB, HD 500GB) menawarkan spesifikasi lain yang sama. Harga: A Rp5,299jt, B Rp5,395jt, C Rp5,099jt, D Rp5,199jt. Pilihan paling tepat?",o:["Toko A: RAM 4GB (kebutuhan editing) dan lebih murah daripada B","Toko B: karena paling mahal pasti terbaik","Toko C: termurah sehingga hemat","Toko D: RAM 2GB cukup untuk rendering"],a:0,f:"Editing & rendering video butuh RAM besar. A dan B sama-sama 4GB, tetapi A lebih murah dan masih di bawah anggaran."},
{q:"Santi sering mengerjakan tugas di laptop ayah dan kakak dan butuh memindahkan file serta back-up. Penyimpan yang paling praktis, tahan guncangan, dan portabel?",o:["CD-R karena murah","Flash Drive berantarmuka USB","Hard disk di dalam laptop","RAM tambahan"],a:1,f:"Flash drive portabel, memakai flash memory (tanpa bagian bergerak), dan dicolok ke port USB. CD-R rentan tergores & sekali tulis; RAM bersifat volatile."},
{q:"Laptop Dina melambat dan hang saat membuka banyak aplikasi sekaligus, padahal ruang hard disk masih lapang. Analisis penyebab paling mungkin?",o:["Kapasitas storage terlalu besar","Kapasitas RAM tidak mencukupi untuk menampung data proses","ROM terhapus","Keyboard rusak"],a:1,f:"RAM menyimpan data sementara saat memproses. Banyak aplikasi menghabiskan RAM sehingga sistem lambat/hang meski storage lapang."},
{q:"Pak Budi (arsitek) memakai software berukuran besar dan butuh tampilan beresolusi tinggi. Rekomendasi terbaik?",o:["Prosesor kuat, RAM besar, SSD kapasitas besar, VGA/GPU bagus, monitor resolusi tinggi","RAM 2GB dan monitor CRT","Hanya menambah speaker","Sound card dan printer saja"],a:0,f:"Software besar → penyimpanan & RAM besar; grafis/gambar teknis → GPU/VGA dan monitor resolusi tinggi; SSD mempercepat akses."},
{q:"Rani ingin laptopnya online memakai kuota ponsel tanpa kabel dan aman dari orang lain. Cara yang tepat?",o:["Aktifkan hotspot (tethering Wi-Fi) di ponsel dengan kata sandi","Colok flashdisk ke ponsel","Gunakan CCTV","Pasang printer"],a:0,f:"Tethering via WLAN membuat ponsel berfungsi sebagai router portabel; hotspot dapat diamankan PIN/kata sandi."},
{q:"Kartu biner 16-8-4-2-1 pada sebuah kue ulang tahun menunjukkan 10110. Berapa umur orang tersebut dan manakah penjelasan yang benar?",o:["22, karena 16+4+2","26, karena 16+8+2","11, karena ada 3 kartu menyala","14, karena 8+4+2"],a:0,f:"10110 = 1×16 + 0×8 + 1×4 + 1×2 + 0×1 = 22."}];
let qi=0,sc=0,tm=null,sec=0,ans=false,qScore=null;
function qStart(){qi=0;sc=0;sec=0;clearInterval(tm);tm=setInterval(()=>{sec++;const t=$('#tm');if(t)t.textContent=`⏱ ${String(sec/60|0).padStart(2,'0')}:${String(sec%60).padStart(2,'0')}`},1000);qShow()}
function qShow(){ans=false;const x=Q[qi];$('#quiz').innerHTML=`<div style="display:flex;justify-content:space-between"><b>Soal ${qi+1}/${Q.length}</b><span id="tm">⏱ 00:00</span></div><div class="bar"><i style="width:${qi/Q.length*100}%"></i></div><p style="line-height:1.7;margin:12px 0">${x.q}</p>${x.o.map((o,i)=>`<button class="opt" onclick="qAns(${i})">${'ABCD'[i]}. ${o}</button>`).join('')}<div id="fb"></div>`}
function qAns(i){if(ans)return;ans=true;const x=Q[qi],b=$$('.opt');b[x.a].classList.add('ok');if(i===x.a)sc++;else b[i].classList.add('no');
 $('#fb').innerHTML=`<div class="fb">${i===x.a?'✅ Benar! ':'❌ Kurang tepat. '}${x.f}</div><br><button class="btn" onclick="qNext()">${qi==Q.length-1?'Lihat Hasil':'Lanjut →'}</button>`}
function qNext(){qi++;if(qi<Q.length)return qShow();clearInterval(tm);qScore=Math.round(sc/Q.length*100);
 $('#quiz').innerHTML=`<div style="text-align:center"><div class="big">${qScore}</div><p>Benar ${sc} dari ${Q.length} · Waktu ${sec} detik</p><p class="mu">${qScore>=80?'Luar biasa! 🏆':qScore>=60?'Bagus, terus berlatih! 👍':'Ayo pelajari modul lagi 📚'}</p><br><button class="btn" onclick="qStart()">↺ Ulangi</button></div>`}
qStart();
// ===== REFLEKSI =====
let emo='';const EM=[["😄","Paham sekali"],["🙂","Cukup paham"],["😐","Masih ragu"],["😕","Perlu belajar lagi"]];
$('#emo').innerHTML=EM.map(([e,t],i)=>`<button title="${t}" onclick="emo='${e} ${t}';$$('#emo button').forEach((b,k)=>b.classList.toggle('on',k==${i}))">${e}</button>`).join('');
function exportPDF(){const J=window.jspdf;if(!J)return alert('Library jsPDF belum termuat (butuh internet).');
 const d=new J.jsPDF(),L=[];let y=18;const w=(t,s=11,b=false)=>{d.setFontSize(s);d.setFont('helvetica',b?'bold':'normal');d.splitTextToSize(t,175).forEach(l=>{if(y>280){d.addPage();y=18}d.text(l,18,y);y+=s*.5+2})};
 w('JURNAL HASIL BELAJAR - Bab 4 Sistem Komputer',15,true);y+=3;
 w('Nama: '+($('#rn').value||'-'));w('Kelas: '+($('#rk').value||'-'));w('Tanggal: '+new Date().toLocaleDateString('id-ID'));
 w('Skor Kuis HOTS: '+(qScore===null?'belum mengerjakan':qScore+' / 100 (benar '+sc+' dari '+Q.length+')'));
 w('Pemahaman: '+(emo.replace(/[^\x20-\x7E]/g,'').trim()||'-'));y+=4;
 w('Total XP: '+ST.xp+' ('+lvl()+')');w('Hasil Tantangan Modul',12,true);MODS.forEach(k=>w('- '+k+': '+(ST.done[k]!=null?'Selesai, skor '+ST.done[k]+'%':'Belum selesai')+' | kartu dibaca '+M[k].filter(x=>ST.read[k+'|'+x.t]).length+'/'+M[k].length));y+=4;w('Jawaban Refleksi',12,true);
 ['1. Kegunaan hardware & software: ','2. Menentukan hardware/software saat membeli: ','3. Ketertarikan pengkodean oktal/heksadesimal: '].forEach((t,i)=>w(t+($('#r'+(i+1)).value||'-')));
 w('Catatan Jurnal: '+($('#rj').value||'-'));y+=4;
 w('Rangkuman Capaian Pembelajaran',12,true);
 ['Sistem komputer = perangkat keras + perangkat lunak.','Hardware: input, pemroses (CPU, RAM, ROM), output, storage.','Software: sistem operasi dan program aplikasi; lisensi freeware, shareware, adware, komersial, open/closed source.','Interaksi perangkat: Bluetooth, tethering, CCTV.','Komputer menyimpan data dalam biner (bit, byte, ASCII).'].forEach(t=>w('- '+t));
 d.save('Jurnal-Sistem-Komputer-'+($('#rn').value||'siswa')+'.pdf')}
</script>
</body>
</html>
