// ambil dulu semua element video
// jikalau result nya node list
// ubah dulu menjadi array
const videos = Array.from(document.querySelectorAll('[data-duration]'));







// pilih yang js NEXT


let jsNext = videos.filter(video => video.textContent.includes('NEXT'))
// ambil durasi masing masing
// chain atas
.map(item => item.dataset.duration)
// chainatas
// ubah durasi menjadi INT , ubah menit menjadi detik
.map(waktu => {
    // 10:30 -> [10,30] split
    const explode = waktu.split(':').map(part => parseFloat(part) );

    console.log(explode);
    
    return (explode[0] * 60) + explode[1];

})

// jumlahkan semua detik
.reduce((total,detik) => total + detik, 0);

// ubah formatnya jadi jam menti detik

const jam   = Math.floor(jsNext / 3600); //2x3600 = 7200 = 120 menit
// ambil sisa menit dari hasil jam(8088) - jam
jsNext = jsNext - jam * 3600;
// hitung menit
const menit = Math.floor(jsNext / 60);
const detik = jsNext - menit * 60;



// simpan di DOM

const durasi = document.querySelector('.total-durasi');

durasi.textContent = `${jam} Jam, ${menit} Menit, ${detik} detik`;

// jumlah Video
const jmlVideo = videos.filter(video => video.textContent.includes('NEXT')).length;
const pJmlVideo = document.querySelector('.jumlah-video');
pJmlVideo.textContent = `${jmlVideo}`;




