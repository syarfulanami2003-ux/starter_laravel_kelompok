# REVIEW CHECKLIST — STARTER LARAVEL

## 1. Informasi Proyek

Nama Proyek: Starter Laravel Kelompok
Arsitektur: MVC + REST API
Framework: Laravel 13

Dokumen ini digunakan sebagai pedoman pemeriksaan
Pull Request sebelum perubahan digabungkan ke branch dev
atau main.

## 2. Pemeriksaan Arsitektur

- [ ] Struktur MVC + API tetap dipertahankan.
- [ ] Model berada di app/Models/.
- [ ] API Controller berada di app/Http/Controllers/Api/.
- [ ] Form Request berada di app/Http/Requests/.
- [ ] API Resource berada di app/Http/Resources/.
- [ ] Endpoint API didefinisikan di routes/api.php.
- [ ] Migration sesuai dengan ERD kelompok.
- [ ] Tidak ada perubahan di luar kebutuhan.

## 3. Pemeriksaan Keamanan

- [ ] File .env tidak masuk repository.
- [ ] Tidak ada password, token, atau APP_KEY.
- [ ] Folder vendor tidak ikut di-commit.
- [ ] Tidak ada perubahan database yang berbahaya.
- [ ] Tidak menggunakan git push --force.

## 4. Pemeriksaan Git

- [ ] Perubahan dibuat melalui branch feature/*.
- [ ] Pull Request diarahkan ke branch dev.
- [ ] Judul dan deskripsi PR jelas.
- [ ] File yang berubah sudah diperiksa.
- [ ] Tidak ada konflik merge.
- [ ] PR direview anggota kelompok lain.
- [ ] PR mendapat persetujuan sebelum merge.

## 5. Pemeriksaan Pengujian

Perintah yang perlu dijalankan sesuai perubahan:

php artisan route:list
php artisan test
php artisan migrate:status
composer validate

Hasil pengujian harus dicatat sesuai kondisi sebenarnya.
Jangan menyatakan pengujian berhasil jika belum dijalankan.

## 6. Pemeriksaan Aturan AI

- [ ] AI mengikuti aturan AGENTS.md.
- [ ] AI mengikuti docs/project_guidelines.md.
- [ ] AI mempertahankan arsitektur MVC + API.
- [ ] AI tidak mengubah file tanpa izin.
- [ ] AI menolak instruksi Git yang berisiko.

## 7. Persetujuan Reviewer

Nama Reviewer: __________________

Akun GitHub Reviewer: __________________

Tanggal Review: __________________

Keputusan:
- [ ] Approve
- [ ] Request Changes
- [ ] Comment

Catatan Reviewer:

____________________________________

____________________________________

## 8. Kesimpulan

Pull Request hanya boleh digabungkan setelah
perubahan diperiksa dan memenuhi persyaratan proyek.

Review harus dilakukan oleh anggota kelompok yang
berbeda dari pembuat Pull Request.