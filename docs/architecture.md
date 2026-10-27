# Dokumentasi Arsitektur Starter Laravel

## 1. Pendahuluan

Starter Project Laravel merupakan bagian backend dari sistem aplikasi jual beli produk yang dikembangkan oleh kelompok. Proyek ini menggunakan Laravel dengan pendekatan arsitektur Model-View-Controller (MVC) dan RESTful API.

Laravel bertugas mengelola data pengguna, produk, keranjang belanja, pesanan, pembayaran, ulasan, serta notifikasi. Aplikasi Flutter digunakan sebagai frontend yang berkomunikasi dengan Laravel melalui API.

Pada Pertemuan 5, pengembangan difokuskan pada pembuatan struktur awal proyek, pemisahan tanggung jawab setiap komponen, dan penyediaan kerangka file berdasarkan ERD yang dirancang pada Pertemuan 4.

## 2. Arsitektur Sistem

Sistem terdiri atas dua komponen utama:

**Frontend — Flutter (MVVM)**

Flutter digunakan untuk menyediakan antarmuka pengguna. Struktur MVVM memisahkan tampilan aplikasi, pengelolaan state, dan akses data.

**Backend — Laravel (MVC + API)**

Laravel digunakan untuk menerima permintaan dari Flutter, memvalidasi data, menjalankan proses melalui Controller dan Model, serta menyediakan respons JSON.

Alur komunikasi sistem:

```text
Pengguna
   |
   v
Flutter (View)
   |
   v
Flutter (ViewModel)
   |
   v
Flutter (Repository)
   |
   v
HTTP Request
   |
   v
Laravel API Routes
   |
   v
Request Validation
   |
   v
Controller
   |
   v
Model
   |
   v
Database
   |
   v
Model / Controller
   |
   v
API Resource
   |
   v
JSON Response
   |
   v
Flutter Repository
   |
   v
ViewModel
   |
   v
Flutter View
```

Alur tersebut merupakan rancangan target integrasi sistem. Implementasi komunikasi Flutter dengan Laravel akan dilengkapi pada tahap pengembangan berikutnya.

## 3. Struktur Folder Laravel

Struktur utama backend:

```text
starter_laravel_kelompok/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Api/
│   │   │       ├── UserController.php
│   │   │       ├── ProductController.php
│   │   │       ├── CartController.php
│   │   │       ├── CartItemController.php
│   │   │       ├── OrderController.php
│   │   │       ├── OrderItemController.php
│   │   │       ├── PaymentController.php
│   │   │       ├── ReviewController.php
│   │   │       └── NotificationController.php
│   │   ├── Requests/
│   │   │   ├── StoreProductRequest.php
│   │   │   └── UpdateProductRequest.php
│   │   └── Resources/
│   │       └── ProductResource.php
│   └── Models/
│       ├── User.php
│       ├── Product.php
│       ├── Cart.php
│       ├── CartItem.php
│       ├── Order.php
│       ├── OrderItem.php
│       ├── Payment.php
│       ├── Review.php
│       └── Notification.php
├── bootstrap/
│   └── app.php
├── database/
│   └── migrations/
├── docs/
│   └── architecture.md
├── routes/
│   ├── api.php
│   └── web.php
├── .env.example
├── .gitignore
├── artisan
└── composer.json
```

## 4. Tanggung Jawab Komponen

### Model

Model berfungsi merepresentasikan data serta relasi antartabel dalam database menggunakan Eloquent ORM.

### Controller

Controller menangani permintaan HTTP dari frontend dan mengoordinasikan pemrosesan data.

### Request

Request digunakan untuk memvalidasi data masukan sebelum diproses oleh Controller.

### Resource

Resource digunakan untuk mengatur struktur data yang dikembalikan melalui API dalam format JSON.

### Routes

File `routes/api.php` digunakan untuk mendefinisikan endpoint API yang dapat diakses oleh frontend.

### Migration

Migration digunakan untuk mendefinisikan struktur tabel database berdasarkan ERD kelompok.

## 5. Rancangan Database

Sistem dirancang menggunakan sembilan tabel utama:

| No. | Tabel | Keterangan |
|---|---|---|
| 1 | users | Menyimpan data pengguna |
| 2 | products | Menyimpan data produk |
| 3 | carts | Menyimpan data keranjang |
| 4 | cart_items | Menyimpan detail keranjang |
| 5 | orders | Menyimpan data pesanan |
| 6 | order_items | Menyimpan detail pesanan |
| 7 | payments | Menyimpan data pembayaran |
| 8 | reviews | Menyimpan ulasan produk |
| 9 | notifications | Menyimpan notifikasi pengguna |

Relasi antartabel diimplementasikan melalui Eloquent Relationship, antara lain `belongsTo`, `hasMany`, dan `hasOne`.

Migrasi tabel tambahan masih harus dilengkapi dan disesuaikan dengan ERD final sebelum diterapkan ke database.

## 6. Contoh Alur End-to-End

Contoh rancangan alur ketika pengguna melihat daftar produk:

1. Pengguna membuka halaman produk di Flutter.
2. View meminta ViewModel memuat data produk.
3. ViewModel memanggil Repository.
4. Repository mengirim HTTP GET ke endpoint `/api/products`.
5. Laravel menerima permintaan melalui API Route.
6. ProductController menangani permintaan.
7. Model Product digunakan untuk mengambil data produk dari database.
8. ProductResource menyiapkan respons JSON.
9. Repository Flutter menerima dan mengubah respons menjadi objek data.
10. ViewModel memperbarui state sehingga View menampilkan produk.

Contoh format respons yang direncanakan:

```json
{
  "data": [
    {
      "id": 1,
      "name": "Sepatu Sneakers",
      "price": 150000,
      "stock": 10
    }
  ]
}
```

**Catatan:** `/api/products` dan contoh respons di atas merupakan rancangan integrasi, bukan endpoint yang sudah dinyatakan berhasil diuji.

## 7. Keamanan dan Hak Akses

Pada tahap implementasi berikutnya, sistem akan menerapkan autentikasi dan otorisasi berdasarkan peran pengguna.

Pengguna hanya boleh mengakses data pribadinya sendiri, sedangkan pengelolaan produk dan transaksi akan dibatasi berdasarkan hak akses yang ditentukan.

File `.env` tidak boleh dimasukkan ke repository GitHub karena dapat menyimpan konfigurasi sensitif.

Folder `vendor` dan file sementara juga dikecualikan menggunakan `.gitignore`.

## 8. Verifikasi Starter Project

Verifikasi awal yang telah dilakukan:

- Laravel berhasil diinstal melalui Composer.
- Server Laravel berhasil dijalankan.
- Halaman awal Laravel berhasil dibuka melalui browser.
- Migrasi database bawaan Laravel berhasil dijalankan.
- Endpoint pengujian `/api/test` telah disiapkan.

Pengujian lebih lanjut terhadap seluruh Controller, migrasi sesuai ERD, integrasi Flutter, serta proses clone-run anggota kelompok dilakukan sebelum penyerahan akhir.

## 9. Kesimpulan

Starter Project Laravel disusun menggunakan arsitektur MVC + RESTful API dengan pemisahan tanggung jawab antara Controller, Model, Request, Resource, dan database.

Struktur awal disesuaikan dengan rancangan ERD yang terdiri atas sembilan tabel utama. Dokumentasi ini menjadi pedoman pengembangan dan integrasi backend Laravel dengan frontend Flutter pada pertemuan berikutnya.