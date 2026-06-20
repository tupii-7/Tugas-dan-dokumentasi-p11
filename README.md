| Keterangan | Data |
|------------|------|
| Nama | [Said Fachri Ariza] |
| NIM | [60324023] |

# Ringkasan Implementasi

## Modul Dashboard

Pengembangan halaman utama sistem perpustakaan yang berfungsi menampilkan ringkasan informasi dan statistik data.

### Berkas Terkait

- `DashboardController.php`
- `dashboard.blade.php`
- `web.php`

---

## Komponen Reusable Kartu Buku

Pembuatan Blade Component untuk menampilkan informasi buku dalam format kartu sehingga dapat digunakan kembali pada berbagai halaman.

### Berkas Terkait

- `app/View/Components/BukuCard.php`
- `resources/views/components/buku-card.blade.php`

---

## Pencarian dan Penyaringan Data Buku

Penambahan fitur pencarian serta filter data buku berdasarkan kriteria tertentu untuk memudahkan proses penelusuran koleksi.

### Berkas Terkait

- `BukuController.php`
- `resources/views/perpustakaan/buku/index.blade.php`
- `web.php`

---

## Lokasi Implementasi

```text
app
├── Http
│   └── Controllers
│       ├── DashboardController.php
│       └── BukuController.php
│
└── View
    └── Components
        └── BukuCard.php

resources
└── views
    ├── components
    │   └── buku-card.blade.php
    │
    └── perpustakaan
        ├── dashboard.blade.php
        └── buku
            └── index.blade.php

routes
└── web.php
```
---
# Screenshot
<img width="1303" height="702" alt="Screenshot 2026-06-20 112206" src="https://github.com/user-attachments/assets/93e69ae2-497b-4a84-ba0c-e6e276129944" />
tampilan dashboard awal

<img width="1297" height="688" alt="Screenshot 2026-06-20 112238" src="https://github.com/user-attachments/assets/7919699c-9fb2-4828-a589-1fea099fd6f5" />
tampilan dashboard utama lengkap

<img width="1306" height="180" alt="Screenshot 2026-06-20 112248" src="https://github.com/user-attachments/assets/faf727db-ae85-4a06-996e-dab08dfd6c64" />
quick actions

<img width="1302" height="698" alt="Screenshot 2026-06-20 112304" src="https://github.com/user-attachments/assets/b2007860-3240-4854-8218-523ad1142f0c" />
kelola buku

<img width="1312" height="710" alt="Screenshot 2026-06-20 112318" src="https://github.com/user-attachments/assets/3a1dde2b-374f-40da-b556-898028b42933" />
kelola anggota

<img width="1333" height="705" alt="Screenshot 2026-06-20 112523" src="https://github.com/user-attachments/assets/47734bca-cd61-4848-b155-a3f43c547f88" />
filter anggota

<img width="1328" height="709" alt="Screenshot 2026-06-20 112541" src="https://github.com/user-attachments/assets/e60cf813-3989-4c59-8fef-27141976b16f" />
filter buku
