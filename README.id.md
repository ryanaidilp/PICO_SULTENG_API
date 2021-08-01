# PICO SulTeng API

[![License: MIT](https://img.shields.io/github/license/ryanaidilp/PICO_SULTENG_API?color=blue)](https://github.com/ryanaidilp/PICO_SULTENG_API/blob/master/LICENSE) 

![Commits/month](https://img.shields.io/github/commit-activity/m/ryanaidilp/PICO_SULTENG_API) ![Stars](https://img.shields.io/github/stars/ryanaidilp/PICO_SULTENG_API) [![Website: up](https://img.shields.io/website?url=https%3A%2F%2Fbanuacoders.com%2Fapi%2Fpico)](https://banuacoders.com/api/pico) ![Last Commit](https://img.shields.io/github/last-commit/ryanaidilp/PICO_SULTENG_API) [![Coverage](https://img.shields.io/badge/coverage-100%25-brightgreen)](https://github.com/ryanaidilp/PICO_SULTENG_API/tree/master/tests)

API untuk aplikasi [PICO](https://github.com/ryanaidilp/PICO_SULTENG_Android) (Pusat Informasi COVID-19) Provinsi Sulawesi Tengah.
Aplikasi ini dibangun menggunakan microframework [Lumen](https://lumen.laravel.com/).

[![PICO API](https://i.ibb.co/sHzXVXw/image.png)](https://banuacoders.com/api/pico)

## Daftar Isi

[![Lang : English](https://img.shields.io/badge/lang-en-yellow)](https://github.com/ryanaidilp/PICO_SULTENG_API/blob/master/README.md)

 > Kamu membaca versi Bahasa Indonesia dari README ini. Tekan badge untuk membaca README dalam bahasa yang berbeda.

* [Sumber Data](#sumber-data)
* [Informasi umum](#informasi-umum)
* [Dibangun Dengan](#dibangun-dengan)
* [Instalasi](#instalasi)
* [Contoh Respon](#contoh-respon)
* [Fitur](#fitur)
* [Lisensi](#lisensi)
* [Kontak](#kontak)

## Sumber Data

* **Data COVID-19 Sulawesi Tengah** :
  + [Website COVID-19 Provinsi Sulawesi Tengah](http://corona.sultengprov.go.id)
  + [Dinas Kesehatan Provinsi Sulawesi Tengah](https://dinkes.sultengprov.go.id)
  + [Detexi](https://corona.detexi.id)
* **Data COVID-19 Nasional** :
  + [Kawal Corona](https://kawalcorona.com/api) : Data kasus COVID-19 per Provinsi.
  + [INACOVID-19](https://bnpb-inacovid19.hub.arcgis.com/) : Data statistik situasi COVID-19 Nasional.

## Informasi Umum

API ini dibuat untuk menyediakan data terkini tentang situasi COVID-19 di Sulawesi Tengah. API ini dibuat karena data yang disediakan oleh pemerintah daerah masih berupa data statis sehingga datanya tidak dapat digunakan pada aplikasi saya (PICO).

Dengan membuat API ini, diharapkan pengembang/*developer* yang membutuhkan data situasi COVID-19 di Sulawesi Tengah dapat terbantu dan memanfaatkan API ini.

## Dibangun Dengan

* [Lumen](https://lumen.laravel.com/) - versi 7.0.2
* [PHP](https://www.php.net) - versi 7.3.13

## Instalasi

* ### **API**

  + Akses API nya melalui <https://banuacoders.com/api/pico> lalu tambahkan endpoint yang ingin di-hit. Contoh penggunaan endpoint pada url :
    | Data | Endpoint | URL |
    |------|----------|-----|
    | Posko | **/posko** | <https://banuacoders.com/api/pico/posko> |
    | Kabupaten | **/kabupaten** | <https://banuacoders.com/api/pico/kabupaten> |
    | Kabupaten berdasarkan no | **/kabupaten/:no** | <https://banuacoders.com/api/pico/kabupaten/6> |
    | Provinsi | **/provinsi** |  <https://banuacoders.com/api/pico/provinsi> |
    | Provinsi berdasarkan kode provinsi | **/provinsi/:kode** | <https://banuacoders.com/api/pico/provinsi/72> |
    | Rumah Sakit | **/rumahsakit** | <https://banuacoders.com/api/pico/rumahsakit> |
    | Rumah Sakit berdasarkan no | **/rumahsakit/:no** | <https://banuacoders.com/api/pico/rumahsakit/1> |
    | Statistik | **/statistik** | <https://banuacoders.com/api/pico/statistik> |
    | Statistik berdasarkan hari (*day*) | **/statistik/:day** | <https://banuacoders.com/api/pico/statistik/12> |

     >*) Catatan :

    - Setiap *endpoint* memiliki *rate limit* (maksimum *request*/menit) masing-masing, informasinya dapat dilihat pada ***header response*** :
      * **X-RateLimit-Limit : 20** (Jumlah *request* maksimum)
      * **X-RateLimit-Remaining: 0** (Sisa *request* yang bisa dilakukan)
      * **Retry-After: 80** (Waktu sampai anda bisa melakukan *request* selanjutnya)
    - *Rate limit* untuk setiap *endpoint* :
      * **provinsi** : 40 *request*/menit
      * **lainnya** : 20 *request*/menit

  &nbsp; 

* ### **Repository**

  + Clone repository ini ke local.
  + Buka terminal/CMD lalu masuk ke **root directory** hasil clone.
  + Jalankan perintah `cp .env.example .env`
  + Edit isi file **.env**  dan isikan sesuai dengan konfigurasi local  anda.
  + Agar ***Throttle Request/Rate Limiter*** berjalan dengan normal, ubah `CACHE_DRIVER` pada file `.env` menjadi `CACHE_DRIVER=file`.
  + Jalankan perintah `composer update` / `composer install` untuk meng-install  *dependency* yang dibutuhkan.
  + Setelah proses installasi dependency selesai, jalankan perintah `php artisan key:generate` untuk men-*generate* **APP_KEY**.
  + Jalankan perintah `php artisan migrate --seed` untuk melakukan migrasi database.
  + Pastikan komputer/laptop anda terhubung ke internet saat melakukan ***migration***, karena ***seeder*** menggunakan data dari internet untuk mengisi database lokal anda.
  + Setelah itu, jalankan perintah `php artisan serve` untuk menjalankan aplikasi.
  + Jika berhasil dan tidak terdapat kesalahan dalam konfigurasi, maka aplikasi akan berjalan dan dapat diakses melalui ***127.0.0.1:8000*** atau ***localhost:8000***.

## Contoh Respon

* ### **DATA POSKO GUGUS TUGAS**

  + Contoh json/{"objek_posko"} :

    

```json
    {
        "kabupaten":"Banggai Kepulauan",
        "kontak":
        [
            {
                "jenis_kontak":"Telepon",
                "kontak":"082292105885",
                "nama":"Arabia Tamrin",
                "label":"Telpon",
                "prefix":"tel:"
            }
        ]
    }
```

  + **GET /posko**
    >Mengembalikan data posko Gugus Tugas COVID-19 di semua Kabupaten di Sulawesi Tengah.

    - **URL Params**
      * None
    - **Data Params**
      * None
    - **Headers**
      * Content-Type: application/json
    - **Success Response :**
      * **Code :**   200
      * **Content :**
        

```json
        {
            "success": true,
            "errors": [],
            "data":
            [
                {"objek_posko"},
                {"objek_posko"},
                {"objek_posko"},
            ]
        }
```

* ### **DATA KABUPATEN**

  + Contoh json/{"objek_kabupaten"} :

    

```json
    {
        "no": 7205,
        "kabupaten": "Donggala",
        "ODP": 6,
        "PDP": 0,
        "positif": 0,
        "negatif": 0,
        "sembuh": 0,
        "meninggal": 0,
        "selesai_pengawasan": 0,
        "dalam_pengawasan": 6,
        "selesai_pemantauan": 0,
        "dalam_pemantauan": 0,
        "updated_at": "2020-04-29T17:00:00.000000Z"
    }
```

  + **GET /kabupaten**
    > Mengembalikan data kasus COVID-19 di semua Kabupaten/Kota di Sulawesi Tengah.

    - **URL Params**
      * None
    - **Data Params**
      * None
    - **Headers**
      * Content-Type : application/json
    - **Success Response :**
      * **Code :**   200
      * **Content :**
        

```json
        {
            "success": true,
            "errors": [],
            "data":
            [
                {"objek_kabupaten"},
                {"objek_kabupaten"},
                {"objek_kabupaten"},
            ]
        }
```

  + **GET /kabupaten/:no**
    >Mengembalikan data kasu COVID-19 di Kabupaten/Kota yang dipilih.

    - **URL Params**
      * *Required:* `no=[integer]`
    - **Data Params**
      * None
    - **Headers**
      * Content-Type : application/json
    - **Success Response:**
      * **Code :**  200
      * **Content :**
        

```json
        {
            "success": true,
            "errors": [],
            "data": {"objek_kabupaten"}
        }
```

  + **Error Response:**
    - **Code :** 404
    - **Content :**  
        

```json
        {
           "success": false,
            "errors" :
             {
                "code": 404,
                "message": "Ditrict not found!"
             },
             "data": []
        }
```

 

* ### **DATA PROVINSI**
    >Properti **"map_id"** digunakan pada [AnyChart-Android](https://github.com/AnyChart/AnyChart-Android) .

  + Contoh json/{"objek_provinsi"} :

    

```json
    {
        "kode_provinsi":31,
        "provinsi":"DKI Jakarta",
        "positif":515,
        "sembuh":46,
        "meninggal":25,
        "map_id":"ID.JR",
        "updated_at": "2020-04-29T17:00:00.000000Z"
    }
```

  + **GET /provinsi**
    >Mengembalikan data kasus COVID-19 di semua Provinsi di Seluruh Indonesia.

    - **URL Params**
      * None
    - **Data Params**
      * None
    - **Headers**
      * Content-Type: application/json
    - **Success Response :**
      * **Code :** 200
      * **Content :**
        

```json
        {
            "success": true,
            "errors": [],
            "data":
            [
                {"objek_provinsi"},
                {"objek_provinsi"},
                {"objek_provinsi"},
            ],
        }
```

  + **GET /provinsi/:kode**
    >Mengembalikan data kasus COVID-19 di Provinsi yang dipilih.

    - **URL Params**
      * *Required:* `kode=[integer]`
    - **Data Params**
      * None
    - **Headers**
      * Content-Type: application/json
    - **Success Response:**
      * **Code :**  200
      * **Content :**
        

```json
        {
            "success": true,
            "errors": [],
            "data": {"objek_provinsi"},
        }
```

  + **Error Response:**
    - **Code :** 404
    - **Content :**  
        

```json
        {
            "success": false,
            "errors":
            {
                "code": 404,
                "message": "Province not found!"
            },
            "data": [],
        }
```

* ### **DATA RUMAH SAKIT**

  + Contoh json/{"objek_rumah_sakit"} :

    

```json
    {
        "no":"7271014",
        "nama":"RS Umum Daerah Undata Palu",
        "longitude":119.881858,
        "latitude":-0.8578386,
        "jumlah_igd":0,
        "terakhir_diperbarui":"2021-07-24T01:58:08.000000Z",
        "kontak":
        [
            {
                "jenis_kontak":"Telepon",
                "kontak":"0451421270",
                "prefix":"tel:",
                "label":"Telpon"
            }
            
        ],
        "tempat_tidur":
        [
            {
                "jenis_tempat_tidur":"IGD Khusus Covid",
                "total":4,
                "tersedia":0,
                "terisi":4,
                "antrian":0,
                "terakhir_diperbarui":"2021-07-24T01:58:08.000000Z"
            },
        ]
    }
```

  + **GET /rumahsakit**
    >Mengembalikan data rumah sakit rujukan COVID-19 di semua Kabupaten di Sulawesi Tengah.

    - **URL Params**
      * None
    - **Data Params**
      * None
    - **Headers**
      * Content-Type: application/json
    - **Success Response :**
      * **Code :**  200
      * **Content :**
        

```json
        {
          "success": true,
          "errors": [],
          "data":
          [
            {"objek_rumah_sakit"},
            {"objek_rumah_sakit"},
            {"objek_rumah_sakit"},
          ],
        }
```

  + **GET /rumahsakit/:no**
    > Mengembalikan data Rumah Sakit berdasarkan nomor/id yang dipilih.

    - **URL Params**
      * *Required:* `no=[integer]`
    - **Data Params**
      * None
    - **Heders**
      * Content-Type: application/json
    - **Success Response:**
      * **Code :**   200
      * **Content :**
        

```json
        {
            "success": true,
            "errors": [],
            "data": {"objek_rumah_sakit"},
        }
```

  + **Error Response:**
    - **Code :** 404
    - **Content :**  
        

```json
        {
            "success": false,
            "errors":
            {
                "code": 404,
                "message": "Hospital not found!"
            },
            "data" :  [],
        }
```

* ### **STATISTIK**

  Mengembalikan data situasi harian COVID-19 di Sulawesi Tengah sejak tanggal 22 Maret 2020.

  + Contoh json/{"objek_statistik"} :

    

```json
    {
        "day" : 42,
        "date" : "2020-05-02T16:00:00.000000Z",
        "positive" : 12,
        "cumulative_positive" : 59,
        "recovered" : 0,
        "cumulative_recovered" : 11,
        "death" : 0,
        "cumulative_death" : 3,
        "death_percentage" : 5.08,
        "recovered_percentage" : 18.64,
        "under_treatment_percentage" : 76.27,s
    }
```

 + Contoh JSON (v2)/{"objek_statistik"} :

    

```json
    {
        "hari_ke" : 42,
        "tanggal" : "2020-05-02T16:00:00.000000Z",
        "kasus_baru" : {
          "positif": 0,
          "sembuh": 0,
          "meninggal": 0,
          "negatif": 0,
          "ODP": 0,
          "PDP": 0
        },
        "aktif" : {
          "dalam_perawatan": 45,
          "ODP": 161,
          "PDP": 45
        },
        "selesai" : {
          "ODP": 161,
          "PDP": 45
        },
        "kumulatif" : {
          "positif": 59,
          "sembuh": 11,
          "meninggal": 3,
          "negatif": 50,
          "ODP": 724,
          "PDP": 120,
          "selesai_ODP": 563,
          "selesai_PDP": 76
        },
      
        "rekap" : {
          "angka_reproduksi" : {
            "rt_upper": 1.98,
            "rt": 1.2,
            "rt_lower": 0.3
          },
          "persentase": {
            "meninggal": 5.08,
            "sembuh": 18.64,
            "dalam_perawatan": 76.27
          },
        },
    }
```

  + **GET /statistik**
    > Mengembalikan data situasi harian COVID-19 di Sulawesi Tengah.

    - **URL Params**
      * None
    - **Data Params**
      * None
    - **Headers**
      * Content-Type: application/json
    - **Success Response :**
      * **Code :**  200
      * **Content :**
        

```json
        {
          "success": true,
          "errors": [],
          "data":
          [
            {"stats_object"},
            {"stats_object"},
            {"stats_object"},
          ],
        }
  ```

  + **GET /statistik/:day**
     > Mengembalikan data situasi harian COVID-19 di Sulawesi Tengah pada hari yang dipilih.

    - **URL Params**
      * *Required:* `day=[integer]`
    - **Data Params**
      * None
    - **Heders**
      * Content-Type: application/json
    - **Success Response:**
      * **Code :**   200
      * **Content :**
        

```json
        {
            "success": true,
            "errors": [],
            "data": {"stats_object"},
        }
```

  + **Error Response:**
    - **Code :** 404
    - **Content :**  
        

```json
        {
            "success": false,
            "errors":
            {
                "code": 404,
                "message": "Stats not found!"
            },
            "data" :  [],
        }
```

## Fitur

Beberapa fitur yang sudah dibuat :

* Data situasi COVID-19 Kabupaten/Kota di Sulawesi Tengah
* Data situasi COVID-19 Provinsi di Indonesia
* Data posko Tim Gugus Tugas COVID-19 di Sulawesi Tengah
* Data rumah sakit rujukan COVID-19 di Sulawesi Tengah
* Data situasi harian COVID-19 di Sulawesi Tengah

To-do list:

* [X] Data situasi COVID-19 Kabupaten/Kota di Sulawesi Tengah
* [X] Data situasi COVID-19 Provinsi
* [X] Data posko Tim Gugus Tugas COVID-19 Sulawesi Tengah
* [X] Data rumah sakit rujukan COVID-19 di Sulawesi Tengah
* [X] Data situasi harian COVID-19 di Sulawesi Tengah

## Lisensi

Lisensi [MIT](https://github.com/ryanaidilp/PICO_SULTENG_API/blob/master/LICENSE)

Copyright (c) 2020 [Fajrian Aidil Pratama](https://www.linkedin.com/in/ryanaidilp/)

## Kontak

Dibuat oleh [@ryanaidilp_](https://twitter.com/ryanaidilp_) - feel free to contact me!
