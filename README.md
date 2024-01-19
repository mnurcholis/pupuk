## PHP

Aplikasi di bangun dengan menggunakan PHP 8.1 ke atas
Di bangun dengan menggunakan Framework Laravel versi 10.10
Di untuk penyimpan menggunakan mysqi yang diljalankan di xampp

## Setting di .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Sesuaikannamadatabasenya
DB_USERNAME=root
DB_PASSWORD=root
```

## Learning Laravel

import database pupuk.sql ke database yang anda buat

## email dan password login

Admin

```bash
email : admin@app.com
password : password
```

Karyawan

```bash
email : user@app.com
password : password
```

## clear database

```bash
php artisan migrate:fresh --seed
```

## agar php bisa baca storage

```bash
php artisan storage:link
```
