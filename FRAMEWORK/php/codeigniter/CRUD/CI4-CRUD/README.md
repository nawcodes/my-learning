# CI4-CRUD
## It's CRUD APP WITH Framework Codeigniter 4

## DOKUMENTASI STEP PENGERJAAN DARI AWAL
# SESI 1 "KEBUTUHAN"
    - CODEGNITER 4
    - XAMPP, WAMP / LAMP
# SESI 2 "PENGINSTALAN FRAMEWORK"
    * Install Framework CI-4
        * Install Lewat Git / CMD : 
            1. BUKA CMD dan lokasikan penempatan install project. (contoh ketik pada terminal: cd C:\xampp\htdocs ) 
            2. lalu ketik pada CMD = composer create-project codeigniter4/appstarter nama_aplikasi --no-dev 
            3. CATATAN! : harus terinstall COMPOSER : https://getcomposer.org/download/
# SESI 3 "KONFIGURASI AWAL"
    1. edit env menjadi .env
        - mohon di baca pada .env pada CI4-CRUD dan di pahami!.
        - catatan: DILARANG COPY PASTE! KECUALI SUDAH PAHAM!
    2. jalankan xamp/ lamp/ wamp
    3. ketik pada terminal vscode / cmd / git bash : php spark serve   
        - perintah ini untuk menjalankan aplikasi kita pada web
# SESI 4 "KONFIGURASI DATABASE"
    1. buat database melalui : pilih salah satu
        a. membuat database manual di localhost/phpmyadmin
        b. membuat database dengan fitur CI 
            1. ketik pada terminal 
                - php spark db:create nama_database
                - boleh di check di phpmyadmin bila sudah menjalankan perintah tsb.
            2. membuat migration untuk setiap table pada database yang sudah di buat.
                - php spark make:migration nama_tabel 
                - boleh dilihat pada CI4-CRUD pada folder App/Database/Migrations/tanggal_nama_tabel
                - lihat fungsi up dan pahami
                - lihat fungsi down dan pahami
    2. Jalankan perintah untuk membuat tabel tersebut.
        - php spark migration     
        - boleh dicheck pada phpmyadmin namaDb/namaTabel  
    3. Mohon Baca .gitKeep untuk melihat pengertian fungsi setiap folder di folder migration
    4. TAMBAHAN: BILA INGIN MENGGUNAKAN SEED UNTUK MEMBUAT RATUSAN DATA SEKALIGUS BOLEH MENGIKUTI LANGKAH INI
        - pastikan terminal sudah dilokasi aplikasi anda berada
        - dan ketik pada terminal : composer require --dev fakerphp/faker | seed lebih mudah dengan aplikasi pihak ketiga
        - setelah terdownload selanjutnya, ketik perintah pada terminal : php spark make:seed nama_seed
        - boleh di check pada folder app/database/migration/seeds
        - boleh dilihat scriptnya dan pahami, untuk lebih lanjutnya silahkan baca dokumentasi faker : https://github.com/fzaninotto/Faker
        - kasusnya saya menggunakan model untuk menginsert data , bila tidak memakai seed boleh langsung query SQL native / query bawaan codeigniter, untuk modelnya silahkan di check pada App/Model/poeples dan pahami
        -Untuk memasukan data lebih dari 100 tsb, ketik perintah pada terminal : php spark db:seed nama_seed 
        - pastikan tidak ada error dan check pada database 
# SESI 5 "" 