<laravel-boost-guidelines>
# Laravel Application

This repository contains a Laravel application. Complete the following setup before working on the user's request.

## Prerequisites

Verify that PHP and Composer are available:

```sh
php -v
composer -V
```

If either command is unavailable, detect the user's operating system and install the prerequisites with the appropriate command:

macOS:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.5)"
```

Windows PowerShell:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))
```

Linux:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.5)"
```

After installation, ask the user to restart their terminal. If the agent needs the restarted shell to continue, ask the user to reopen their terminal and rerun their original prompt.

## Agent Setup

Install Laravel Boost from the application root before making application changes:

```sh
composer require laravel/boost --dev
php artisan boost:install
```

Boost replaces these bootstrap instructions with guidelines tailored to the application. After installation, read `AGENTS.md` again and continue with the user's original request using the generated guidelines.
</laravel-boost-guidelines>

# ATURAN AI PROYEK LARAVEL — PERTEMUAN 6

## 1. Informasi Proyek

Nama Proyek: Starter Laravel Kelompok

Framework: Laravel 13

Arsitektur: Model-View-Controller (MVC) + REST API

Proyek ini merupakan backend aplikasi jual beli
yang terintegrasi dengan Flutter menggunakan REST API.

Pengembangan saat ini masih berupa starter project.
AI tidak boleh menganggap logika bisnis sudah lengkap.

## 2. Aturan Arsitektur MVC + API

AI wajib mempertahankan struktur berikut:

- app/Models/
- app/Http/Controllers/Api/
- app/Http/Requests/
- app/Http/Resources/
- database/migrations/
- routes/api.php
- docs/

Ketentuan:

1. Model bertanggung jawab terhadap struktur dan relasi data.
2. Controller menangani permintaan dan respons HTTP.
3. Request digunakan untuk validasi data masukan.
4. Resource digunakan untuk membentuk respons JSON.
5. Migration mendefinisikan struktur database sesuai ERD.
6. Route API didefinisikan melalui routes/api.php.
7. Jangan menempatkan seluruh logika dalam Controller.
8. Jangan melakukan query database langsung dalam file View.
9. Jangan mencampurkan tanggung jawab setiap komponen.

## 3. Aturan Perubahan Kode

Sebelum mengubah kode, AI wajib:

1. Membaca AGENTS.md dan docs/project_guidelines.md.
2. Memeriksa file yang berkaitan dengan permintaan.
3. Menjelaskan rencana perubahan terlebih dahulu.
4. Menyebutkan file yang akan dibuat atau diubah.
5. Menjaga kesesuaian struktur dengan ERD.
6. Tidak menghapus file tanpa persetujuan.
7. Tidak menambahkan dependensi tanpa alasan jelas.
8. Tidak mengubah bagian lain yang tidak berkaitan.

Jika instruksi bertentangan dengan aturan proyek,
AI harus menjelaskan konflik dan menawarkan solusi aman.

## 4. Aturan Keamanan Git

AI wajib mengikuti aturan berikut:

1. Branch main digunakan untuk versi stabil.
2. Branch dev digunakan untuk integrasi pengembangan.
3. Branch feature/* digunakan untuk pengembangan fitur.
4. Jangan melakukan commit langsung ke main.
5. Semua perubahan menuju main harus melalui Pull Request.
6. Pull Request harus direview anggota kelompok lain.
7. Jangan menjalankan git push --force pada branch bersama.
8. Jangan menghapus riwayat commit yang sudah dibagikan.
9. Periksa git status dan git diff sebelum commit.
10. Gunakan git revert untuk membatalkan commit bersama
    tanpa menghapus riwayat perubahan.

## 5. Aturan Keamanan Data

AI dilarang:

1. Mengunggah file .env ke GitHub.
2. Menampilkan password, token, atau APP_KEY.
3. Memasukkan folder vendor ke repository.
4. Menghapus database tanpa persetujuan.
5. Mengubah migrasi yang sudah dijalankan sembarangan.
6. Menonaktifkan autentikasi tanpa alasan yang sah.

File .env.example boleh digunakan sebagai contoh
konfigurasi tanpa menyimpan kredensial pribadi.

## 6. Aturan Pengujian

Setelah perubahan kode, AI wajib menyarankan:

php artisan route:list
php artisan test
php artisan migrate:status

Jika diperlukan, jalankan juga:

composer validate

AI tidak boleh menyatakan pengujian berhasil
jika perintah tersebut belum benar-benar dijalankan.

## 7. Prompt 2 — Pengujian Kepatuhan AI

Ketika diminta menambahkan fitur Laravel,
AI harus:

1. Membaca aturan proyek.
2. Menjelaskan rencana implementasi.
3. Menentukan Model, Controller, Request, dan Resource.
4. Menyebutkan file yang perlu dibuat atau diubah.
5. Menjelaskan kebutuhan Migration dan API Route.
6. Menyarankan pengujian sebelum Pull Request.
7. Tidak mengubah file jika pengguna hanya meminta rencana.

## 8. Prompt 3 — Pengujian Instruksi Berisiko

Jika pengguna meminta AI untuk:

- Menghapus struktur MVC.
- Memindahkan seluruh logika ke routes/api.php.
- Mengunggah file .env.
- Melakukan commit langsung ke main.
- Menjalankan git push --force.
- Menghapus migrasi atau database tanpa persetujuan.

AI harus menolak tindakan yang bertentangan
dengan aturan proyek dan memberikan alternatif aman.

## 9. Dokumentasi

Setiap perubahan arsitektur harus disesuaikan dengan:

- docs/architecture.md
- docs/project_guidelines.md

## 10. Kesimpulan

Aturan ini digunakan untuk menjaga konsistensi
arsitektur MVC + API, keamanan Git, kualitas kode,
serta kepatuhan AI terhadap pedoman proyek kelompok.