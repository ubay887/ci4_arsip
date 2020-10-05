# Sistem Elektronik Arsip CI4

## Apa itu CI4_Arsip?

Sistem Elektronik Arsip berbasis web merupakan aplikasi untuk menyimpan arsip file dalam administrasi sebuah instansi/organisasi. Aplikasi ini bisa diterapkan di Organisasi dan Instansi. Sistem dapat mengelola pengarsipan file dan menyimpan file di website dengan cepat,aman dan nyaman sehingga memudahkan dalam filtering maupun searching ketika file tersebut akan digunakan kembali oleh pengguna. [Demo Aplikasi](http://ci4_arsip.acengawahid.my.id).

## Cara Install
## Clone Git
1. Buka CMD/Shell/Terminal, CD path direktori yang diinginkan. (htdocs for xampp or www for laragon)
2. Lakukan perintah :
`git clone https://github.com/acengawahid/ci4_arsip.git`
3. Lakukan perintah :
`composer update --no-dev`
Untuk menjalankan aplikasi, silahkan baca **User Guide CI4** [disini](http://codeigniter.com).

## Setting Env
4. Atur konfigurasi file .env sesuai konfigurasi server & database masing-masing :

## Migrate Database
5. Pada CMD/Shell/Terminal, Lakukan perintah :
`php spark migrate`

## Jalankan Aplikasi
5. Pada CMD/Shell/Terminal, Lakukan perintah :
`php spark server`

5. Buka browser, masukkan url :
`http://localhost:8080`

## CRUD Aplikasi
1. Login user :
level : admin
level : kabid
level : staff

## Server Requirements
PHP version 7.2 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
# ci4_arsip
