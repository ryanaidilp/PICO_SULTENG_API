# PICO SulTeng API

[![License: MIT](https://img.shields.io/github/license/RyanAidilPratama/PICO_SULTENG_API?color=blue)](https://github.com/RyanAidilPratama/PICO_SULTENG_API/blob/master/LICENSE) ![Commits/month](https://img.shields.io/github/commit-activity/m/RyanAidilPratama/PICO_SULTENG_API) ![Stars](https://img.shields.io/github/stars/RyanAidilPratama/PICO_SULTENG_API) [![Website: up](https://img.shields.io/website?url=https%3A%2F%2Fbanuacoders.com%2Fapi%2Fpico)](https://banuacoders.com/api/pico) ![Last Commit](https://img.shields.io/github/last-commit/RyanAidilPratama/PICO_SULTENG_API)

>API untuk aplikasi [PICO](https://github.com/RyanAidilPratama/PICO_SULTENG_Android) (Pusat Informasi COVID-19) Provinsi Sulawesi Tengah.
Aplikasi ini dibangun menggunakan microframework [Lumen](https://lumen.laravel.com/)  

## Daftar Isi

[![Lang : English](https://img.shields.io/badge/lang-en-yellow)](https://github.com/RyanAidilPratama/PICO_SULTENG_API/blob/master/README.md)

 > Kamu membaca versi Bahasa Indonesia dari README ini. Tekan badge untuk membaca README dalam bahasa yang berbeda.

* [Sumber Data](#sumber-data)
* [Informasi umum](#informasi-umum)
* [Dibangun Dengan](#dibangun-dengan)
* [Instalasi](#instalasi)
* [Contoh Respon](#contoh-respon)
* [Fitur](#fitur)
* [Status](#status)
* [Lisensi](#lisensi)
* [Kontak](#kontak)

## Sumber Data

* **Data COVID-19 Sulawesi Tengah** :
  * [Website COVID-19 Provinsi Sulawesi Tengah](http://corona.sultengprov.go.id)
  * [Dinas Kesehatan Provinsi Sulawesi Tengah](https://dinkes.sultengprov.go.id)
* **Data COVID-19 Nasional** :
  * [Kawal Corona](https://kawalcorona.com/api) : Data kasus COVID-19 per Provinsi.
  * [INACOVID-19](https://bnpb-inacovid19.hub.arcgis.com/) : Data statistik situasi COVID-19 Nasional.

## Informasi umum

API ini dibuat untuk menyediakan data terkini tentang situasi COVID-19 di Sulawesi Tengah. API ini dibuat karena data yang disediakan oleh pemerintah daerah masih berupa data statis sehingga datanya tidak dapat digunakan pada aplikasi saya (PICO).

Dengan membuat API ini, diharapkan pengembang/*developer* yang membutuhkan data situasi COVID-19 di Sulawesi Tengah dapat terbantu dan memanfaatkan API ini.

## Dibangun Dengan

* [Lumen](https://lumen.laravel.com/) - versi 7.0.2
* [PHP](https://www.php.net) - versi 7.3.13

## Instalasi

* **API**
  * Akses API nya melalui <https://banuacoders.com/api/pico> lalu tambahkan endpoint yang ingin di-hit. Contoh penggunaan endpoint pada url :

    | Data | Endpoint | URL |
    |------|----------|-----|
    | Posko | **/posko** | <https://banuacoders.com/api/pico/posko> |
    | Kabupaten | **/kabupaten** | <https://banuacoders.com/api/pico/kabupaten> |
    | Kabupaten berdasarkan no | **/kabupaten/:no** | <https://banuacoders.com/api/pico/kabupaten/6> |
    | Provinsi | **/provinsi** |  <https://banuacoders.com/api/pico/provinsi> |
    | Provinsi berdasarkan kode provinsi | **/provinsi/:kode** | <https://banuacoders.com/api/pico/provinsi/72> |
    | Rumah Sakit | **/rumahsakit** | <https://banuacoders.com/api/pico/rumahsakit> |
    | Rumah Sakit berdasarkan no | **/rumahsakit/:no** | <https://banuacoders.com/api/pico/rumahsakit/1> |

  &nbsp;

* **Repository**
  * Clone repository ini ke local.
  * Buka terminal/CMD lalu masuk ke **root directory** hasil clone.
  * Jalankan perintah `cp .env.example .env`
  * Edit isi file **.env**  dan isikan sesuai dengan konfigurasi local  anda.
  * Jalankan perintah `composer update` / `composer install` untuk meng-install  *dependency* yang dibutuhkan.
  * Setelah proses installasi dependency selesai, jalankan perintah `php artisan key:generate` untuk men-*generate* **APP_KEY**.
  * Setelah itu, jalankan perintah `php artisan serve` untuk menjalankan aplikasi.
  * Jika berhasil dan tidak terdapat kesalahan dalam konfigurasi, maka aplikasi akan berjalan dan dapat diakses melalui ***127.0.0.1:8000*** atau ***localhost:8000***.

## Contoh Respon

* **DATA POSKO**

  * Contoh json/{"objek_posko"} :

    ```json
    {
        "no" : 1,
        "nama": "Banggai",
        "posko" :
        [
            {
                "no": 1,
                "nama": "dr. Anang (Kepala Dinkes Banggai)",
                "no_hp":
                [
                        "081xxxxxxx"
                ]
            },
            {
                "no":  2,
                "nama" : "Ibu Nur Datu Adam (Jubir)",
                "no_hp":
                [
                    "085xxxxxxx"
                ]
            }
        ]
    }
    ```

  * **GET /posko**

    >Mengembalikan data posko Gugus Tugas COVID-19 di semua Kabupaten di Sulawesi Tengah.

    * **URL Params**
      * None
    * **Data Params**
      * None
    * **Headers**
      * Content-Type: application/json
    * **Success Response :**
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

* **DATA KABUPATEN**

  * Contoh json/{"objek_kabupaten"} :

    ```json
    {
        "no": 5,
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

  * **GET /kabupaten**

    > Mengembalikan data kasus COVID-19 di semua Kabupaten/Kota di Sulawesi Tengah.

    * **URL Params**
      * None
    * **Data Params**
      * None
    * **Headers**
      * Content-Type : application/json
    * **Success Response :**
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

  * **GET /kabupaten/:no**

    >Mengembalikan data kasu COVID-19 di Kabupaten/Kota yang dipilih.

    * **URL Params**
      * *Required:* `no=[integer]`
    * **Data Params**
      * None
    * **Headers**
      * Content-Type : application/json
    * **Success Response:**
      * **Code :**  200
      * **Content :**

        ```json
        {
            "success": true,
            "errors": [],
            "data": {"objek_kabupaten"}
        }
        ```

    * **Error Response:**
      * **Code :** 404
      * **Content :**  

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

  * **PUT /kabupaten/:no**

    >Memperbarui data Kabupaten/Kota berdasarkan nomor/id kabupaten.

    * **URL Params**
      * *Required:* `no=[integer]`
    * **Data Params**

      ```json
      {
          "objek_kabupaten"
      }
      ```

    * **Headers**
      * Content-Type : application/json

    * **Success Response:**
      * **Code :**  200
      * **Content** :

        ```json
        {
            "success": true,
            "errors": [],
            "data": "Data updated successfully!"
        }
        ```

    * **Error Response:**
      * **Code :** 404
      * **Content :**  

        ```json
        {
            "success": false,
            "errors":
            {
                "code": 404,
                " message": "District not found!"
            },
            "data": [],
        }
        ```

* **DATA PROVINSI**

    >Properti **"map_id"** digunakan pada [AnyChart-Android](https://github.com/AnyChart/AnyChart-Android) .

  * Contoh json/{"objek_provinsi"} :

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

  * **GET /provinsi**

    >Mengembalikan data kasus COVID-19 di semua Provinsi di Seluruh Indonesia.

    * **URL Params**
      * None
    * **Data Params**
      * None
    * **Headers**
      * Content-Type: application/json
    * **Success Response :**
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

  * **GET /provinsi/:kode**

    >Mengembalikan data kasus COVID-19 di Provinsi yang dipilih.

    * **URL Params**
      * *Required:* `kode=[integer]`
    * **Data Params**
      * None
    * **Headers**
      * Content-Type: application/json
    * **Success Response:**
      * **Code :**  200
      * **Content :**

        ```json
        {
            "success": true,
            "errors": [],
            "data": {"objek_provinsi"},
        }
        ```

    * **Error Response:**
      * **Code :** 404
      * **Content :**  

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

  * **PUT /provinsi/:kode**

    >Memperbarui data Provinsi berdasarkan kode provinsi.

    * **URL Params**
      * *Required:* `kode=[integer]`
    * **Data Params**
  
        ```json
        {
          "objek_provinsi"
        }
        ```

    * **Headers**
      * Content-Type : application/json
    * **Success Response:**
      * **Code :**   200
      * **Content**:

        ```json
        {
            "success": true,
            "errors": [],
            "data": "Data updated successfully!"
        }
        ```

    * **Error Response:**
      * **Code:** 404
      * **Content:**  

        ```json
        {
            "success": false,
            "errors":
            {
                "code": 404,
                "message": "Province not found!"
            },
            "data": []
        }
        ```

* **DATA RUMAH SAKIT**

  * Contoh json/{"objek_rumah_sakit"} :

    ```json
    {
        "no": 1,
        "nama": "RSUD Undata Palu",
        "alamat": "Jl. R. E. Martadinata, Tondo Kecamatan Mantikulore 94119",
        "telpon": "04514908020",
        "email": "rsundata@yahoo.com",
        "longitude": "119.88185800",
        "latitude": "-0.85783860"
    }
    ```

  * **GET /rumahsakit**

    >Mengembalikan data rumah sakit rujukan COVID-19 di semua Kabupaten di Sulawesi Tengah.

    * **URL Params**
      * None
    * **Data Params**
      * None
    * **Headers**
      * Content-Type: application/json
    * **Success Response :**
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

  * **GET /rumahsakit/:no**

    > Mengembalikan data Rumah Sakit berdasarkan nomor/id yang dipilih.

    * **URL Params**
      * *Required:* `no=[integer]`
    * **Data Params**
      * None
    * **Heders**
      * Content-Type: application/json
    * **Success Response:**
      * **Code :**   200
      * **Content :**

        ```json
        {
            "success": true,
            "errors": [],
            "data": {"objek_rumah_sakit"},
        }
        ```

    * **Error Response:**
      * **Code :** 404
      * **Content :**  

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

## Fitur

Beberapa fitur yang sudah dibuat :

* Data situasi COVID-19 Kabupaten/Kota di Sulawesi Tengah
* Data situasi COVID-19 Provinsi
* Data posko Tim Gugus Tugas COVID-19 Sulawesi Tengah
* Data rumah sakit rujukan COVID-19 di Sulawesi Tengah

To-do list:

* [X] Data situasi COVID-19 Kabupaten/Kota di Sulawesi Tengah
* [X] Data situasi COVID-19 Provinsi
* [X] Data posko Tim Gugus Tugas COVID-19 Sulawesi Tengah
* [X] Data rumah sakit rujukan COVID-19 di Sulawesi Tengah
* [ ] Data perkembangan kasus COVID-19 harian Sulawesi Tengah

## Status

Status proyek : _released_

## Lisensi

Lisensi [MIT](https://github.com/RyanAidilPratama/PICO_SULTENG_API/blob/master/LICENSE)

Copyright (c) 2020 [Fajrian Aidil Pratama](https://www.linkedin.com/in/ryanaidilp/)

## Kontak

Dibuat oleh [@ryanaidilp_](https://instagram.com/ryanaidilp_) - feel free to contact me!


