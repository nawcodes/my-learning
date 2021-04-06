<?php

// \s 	karakter putih (spasi, tab, baris baru)
// \d 	angka digit (0-9)
// \w 	karkater huruf (a-z, A-Z, 0-9, _)
// [aeiou] 	pola yang terdiri dari set karakter di dalam kurung siku
// [^aeiou] 	pola yang tidak terdiri dari set karakter di dalam kurung siku
// (foo|bar|baz) 	pilihan dari kata yang didefinisikan

$description = "Dihimbau agar seluruh masyarakat waspada akan #virus2 #corona 
yang akhir-akhir ini mulai #menyebar";


function deteksiHashtag($input)
{
    // 1.  deteksi hanya #
    //  $regex = "/#/";
    // 2 . Deteksi #v 
    // $regex = "/#[a-z]/";
    // 3. Deteksi Semua Huruf Setelah #
    // $regex = "/#[a-z]+/";
    // 4. Deteksi Semua Huruf Setelah # Dengan angka
    // $regex = "/#[a-zA-Z0-9_]+/";
    // 5 . Deteksi #virus dan virus 2 arrays
    // 6. Menimpa #virus menjadi sebuah link  $1 = tanpa # $0 = dengan # (sesuai index) 
    $regex = "/#([a-zA-Z0-9_]+)/";
    $timpa = "<a href='https://twitter.com/hashtag/$1'>$0</a>";
    // 1- 5 $hasil = [];

    //1 - 5 preg_match_all($regex, $input, $hasil);
    return preg_replace($regex, $timpa, $input);
    # kembalikan data dalam bentuk json
    // 1- 5 return json_encode($hasil);
}



echo deteksiHashtag($description);


// ------------------------------------------------//

$description2 = "Pak @jokowi telah menyampaikan #pidato yang berisi 
#himbauan kepada masyarakat untuk tidak banyak 
beraktifitas di luar rumah demi mencegah 
tersebarnya #virus #korona.";

function deteksiUsername($username)
{
    $regex = "/@([a-zA-Z0-9_]+)/";
    $timpa = "<a href='https://twitter.com/$1'>$0</a>";
    return preg_replace($regex, $timpa, $username);
}



echo deteksiUsername('<br><br>  ' . $description2);
// 1. Penjelasan
// Pola yang kita definisikan adalah /#
// Pola tersebut hanya akan mencari tanda # yang ada pada variabel $input
// Hasil kembaliannya, kita mendapatkan ada dua tanda pagar yang dikembalikan

// 2. Penjelasan:

//     di dalam variabel $regex, kita mendefinisikan pola yang berisi 2 karakter.
//     karakter pertama adalah tanda pagar
//     dan karakter kedua adalah set huruf dari a sampai z
//     sehingga hasil yang kita dapatkan adalah #v dan #k.

// Pertanyaan: lalu bagaimana untuk mendeteksi semua karakter dalam satu kata yang ada?

// Jawabannya adalah: dengan menambahkan tanda + setelah kurung siku!


$nim    = 'La aa 4891108359231182 yaa BHFAL NURJAMIL'; //int 16 True
// problem
$nim2    = 'adwaadwa adwadwa 3 4891108359231182 adwad bcavwteva'; //int 17 first(3)
$nim3   = 'adwadwa aacmw 54891108359231182 adhwb ad 7'; // int 17  (end 7) 
$nim4   = 'adwadwa aacmw 4891108359231182 adhwb ad 7 adw 1'; // int 17  (end 7) 

// $newNim = [];
// for ($i = 0; $i < strlen($nim2); $i++) {
//     $ex = $nim2[$i]; 
//     if (is_numeric($ex)) {
//         $newNim[] = $ex;
//     }
// }

// var_dump(implode('', $newNim));


// regex

function nim($input)
{
    $regex = "/\d{16}/";

    preg_match($regex, $input, $newNim);
    // $ex = implode('', $newNim[0]);
    return $newNim;
}

var_dump(nim($nim4));

// $result = [];
// preg_match('\d{16}', $nim, $result);
// print_r($result[0]);
