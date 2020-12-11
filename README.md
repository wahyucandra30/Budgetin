# Budgetin
Aplikasi keuangan berbasis web

PANDUAN CARA MENJALANKAN:
1. Copy-paste konten di dalam folder "app" pada berkas ini ke folder "~/XAMPP/htdocs/Budgetin"
2. Buka XAMPP Control Panel lalu start Apache dan MySQL
3. Buka phpmyadmin pada localhost
4. Buat database baru dengan nama "budgetin" dengan huruf kecil semua tanpa tanda petik
5. Import budgetin.sql yang terdapat di dalam folder "sql" pada berkas ini ke database yang telah dibuat pada tahap 4
6. Pastikan tabel "users" dan "transactions" telah ter-import dengan sukses
7. Buka "Landing.html" pada localhost


Daftar halaman sementara:
- Landing Page: Halaman pertama yang ditampilkan saat belum log in
- Log In Page: Halaman log in
- Sign Up Page: Halaman sign up
- Dashboard: Menampilkan daftar transaksi yang dimiliki user
- Transaction: Menambah transaksi baru ke database
- Account: Menampilkan dan bisa menyunting data user

Daftar fungsionalitas sementara:
- Simpan data registrasi akun ke database
- Validasi log in dengan mencari apakah username yang dimasukkan ada di database dan password yang dimasukkan benar
- Menambah transaksi pada halaman Transaction ke tabel database daftar transaksi yang dihubungkan ke tabel database daftar user dengan foreign key id user.
- Menampilkan pie chart berdasarkan data dari tabel database daftar transaksi
- Menambah elemen baru pada halaman Dashboard berdasarkan tabel database daftar transaksi
- Menampilkan data user dari tabel database daftar user
- Mengedit data user pada tabel database daftar user
