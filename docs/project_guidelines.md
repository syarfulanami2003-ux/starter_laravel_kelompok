# PROJECT GUIDELINES — STARTER LARAVEL

## 1. Informasi Proyek

**Nama Proyek:** Starter Laravel Kelompok  
**Framework:** Laravel 13  
**Bahasa Pemrograman:** PHP  
**Arsitektur:** Model-View-Controller (MVC) + REST API  
**Database Pengembangan:** SQLite

Proyek ini merupakan backend sistem jual beli yang dikembangkan untuk Tugas Proyek Pertemuan 6 tentang Manajemen Konteks dan Alur Kerja Git.

Dokumen ini menjadi pedoman bagi seluruh anggota kelompok dan AI coding assistant dalam melakukan pengembangan, pengujian, dan pengelolaan kode.

## 2. Struktur Arsitektur Laravel

Struktur utama proyek:

```text
starter_laravel_kelompok/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Api/
│   │   ├── Requests/
│   │   └── Resources/
│   └── Models/
├── database/
│   └── migrations/
├── docs/
│   ├── architecture.md
│   └── project_guidelines.md
├── routes/
│   ├── api.php
│   └── web.php
├── AGENTS.md
├── .gitignore
└── composer.json
```

### Pembagian Tanggung Jawab

**Model:** Merepresentasikan tabel dan relasi database melalui Eloquent ORM.

**Controller:** Menerima permintaan HTTP dan mengoordinasikan proses aplikasi.

**Request:** Memvalidasi data masukan sebelum diproses.

**Resource:** Mengatur format respons JSON yang dikirim ke Flutter.

**Migration:** Mendefinisikan struktur database berdasarkan ERD.

**Route:** Menentukan endpoint API dan menghubungkannya dengan Controller.

Setiap komponen harus memiliki tanggung jawab yang jelas dan tidak tumpang tindih.

## 3. Kesesuaian dengan ERD

Proyek menggunakan rancangan sembilan tabel utama:

| No. | Tabel | Fungsi |
|---|---|---|
| 1 | users | Data pengguna |
| 2 | products | Data produk |
| 3 | carts | Keranjang belanja |
| 4 | cart_items | Detail keranjang |
| 5 | orders | Data pesanan |
| 6 | order_items | Detail pesanan |
| 7 | payments | Data pembayaran |
| 8 | reviews | Ulasan produk |
| 9 | notifications | Notifikasi pengguna |

Model, Controller, dan Migration harus mengikuti kebutuhan tabel serta hubungan yang terdapat dalam ERD kelompok.

Pengembangan masih berada pada tahap starter. Logika bisnis lengkap belum menjadi ruang lingkup tugas ini.

## 4. Standar Penulisan Kode

Seluruh anggota kelompok wajib:

1. Menggunakan penamaan class `PascalCase`.
2. Menggunakan penamaan method dan variabel `camelCase`.
3. Mengikuti konvensi penamaan Laravel.
4. Memisahkan validasi dari Controller menggunakan Form Request.
5. Menggunakan API Resource untuk membentuk respons JSON.
6. Tidak menempatkan seluruh logika aplikasi dalam Controller atau Route.
7. Menghindari perubahan file yang tidak berkaitan dengan tugas.
8. Menambahkan komentar seperlunya agar kode mudah dipahami.
9. Menjaga kesesuaian struktur aplikasi dengan ERD.

## 5. Aturan Penggunaan AI

Sebelum melakukan perubahan, AI wajib membaca:

- `AGENTS.md`
- `docs/project_guidelines.md`
- `docs/architecture.md`

AI harus menjelaskan rencana perubahan, menyebutkan file yang terdampak, dan mempertahankan arsitektur MVC + API.

AI tidak diperbolehkan menghapus file, mengubah database, menambahkan dependensi, atau melakukan tindakan Git yang berisiko tanpa persetujuan yang sesuai.

Jika instruksi bertentangan dengan aturan proyek, AI harus menjelaskan konflik dan menawarkan alternatif yang aman.

## 6. Strategi Branch Git

Proyek menerapkan tiga jenis branch:

| Branch | Fungsi |
|---|---|
| `main` | Menyimpan versi aplikasi yang stabil |
| `dev` | Mengintegrasikan pekerjaan pengembangan |
| `feature/*` | Mengembangkan fitur atau perubahan tertentu |

Contoh:

```text
main
dev
feature/product-api
feature/update-documentation
feature/payment-validation
```

Alur pengembangan:

```text
main
  |
  v
dev
  |
  v
feature/*
  |
  v
Pull Request ke dev
  |
  v
Review anggota lain
  |
  v
Merge ke dev
  |
  v
Pull Request ke main
  |
  v
Review dan pengujian
  |
  v
Merge ke main
```

Branch `main` harus dilindungi menggunakan pengaturan GitHub agar perubahan wajib melewati Pull Request.

## 7. Aturan Pull Request

Setiap Pull Request harus memenuhi ketentuan:

1. Memiliki judul yang menjelaskan perubahan.
2. Menyebutkan tujuan pengembangan.
3. Menjelaskan file yang dibuat atau diubah.
4. Menyertakan hasil pengujian.
5. Direview oleh anggota kelompok lain.
6. Tidak di-merge jika terdapat masalah penting yang belum diperbaiki.
7. Menggunakan mekanisme merge GitHub setelah persetujuan reviewer.

Anggota tidak diperbolehkan menggabungkan PR sendiri tanpa review yang dipersyaratkan.

## 8. Pengujian Laravel

Sebelum melakukan Pull Request, jalankan:

```bash
php artisan route:list
php artisan test
php artisan migrate:status
composer validate
```

Jika ada perubahan struktur database, migrasi perlu diperiksa dengan hati-hati.

Pengujian hanya boleh dinyatakan berhasil apabila perintah tersebut benar-benar dijalankan dan menunjukkan hasil yang sesuai.

## 9. Git Safety Net dan Rollback

Git digunakan untuk mencatat perubahan dan memulihkan kondisi proyek apabila terjadi kesalahan.

Prosedur rollback:

1. Identifikasi perubahan atau commit bermasalah.
2. Periksa riwayat menggunakan `git log`.
3. Periksa perbedaan menggunakan `git diff`.
4. Untuk perubahan yang sudah dibagikan, gunakan `git revert`.
5. Jalankan kembali pengujian.
6. Masukkan perbaikan melalui Pull Request.

Perintah `git push --force` dilarang digunakan pada branch bersama.

Perintah yang dapat menghilangkan perubahan lokal, seperti `git reset --hard`, hanya digunakan setelah memastikan perubahan penting sudah diamankan.

## 10. Keamanan Repository

File berikut tidak boleh diunggah ke GitHub:

- `.env` yang berisi konfigurasi rahasia.
- Folder `vendor`.
- Folder `node_modules`.
- File hasil build.
- File cache dan log.
- Token, password, atau kredensial pribadi.
- Database lokal yang memuat data sensitif.

File `.env.example` boleh disertakan sebagai panduan konfigurasi tanpa informasi rahasia.

Sebelum commit, anggota wajib memeriksa:

```bash
git status
git diff
```

## 11. Pengujian Kepatuhan AI

Pengujian dilakukan menggunakan Prompt 2 dan Prompt 3 berdasarkan modul perkuliahan.

**Prompt 2 — Pengujian Kepatuhan**

AI diuji untuk memastikan bahwa responsnya mengikuti arsitektur MVC + API, menjelaskan rencana perubahan, dan menyebutkan file yang diperlukan.

**Prompt 3 — Pengujian Instruksi Jebakan**

AI diuji menggunakan instruksi yang bertentangan dengan aturan proyek, misalnya menghapus struktur MVC atau melakukan `git push --force`.

Hasil pengujian harus dicatat berdasarkan respons AI yang benar-benar diperoleh.

Log audit AI dibuat dalam bentuk PDF satu halaman.

## 12. Dokumentasi Perubahan

Setiap perubahan penting harus dicatat dalam dokumentasi proyek.

Jika arsitektur berubah, perbarui `docs/architecture.md`.

Jika prosedur kerja berubah, perbarui `docs/project_guidelines.md`.

Perubahan dokumentasi tetap harus mengikuti alur branch dan Pull Request.

## 13. Kesimpulan

Dokumen ini menjadi pedoman pengembangan Starter Laravel Kelompok dengan menerapkan arsitektur MVC + REST API.

Penggunaan aturan AI, strategi branching, Pull Request, review, pengujian, dan rollback bertujuan menjaga kualitas kode serta keamanan proyek selama proses pengembangan.