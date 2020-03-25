# PICO SulTeng API
[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

API untuk aplikasi PICO (Pusat Informasi COVID-19) Provinsi Sulawesi Tengah. 

Aplikasi ini dibangun menggunakan microframework [Lumen](https://lumen.laravel.com/)

## #Data Kabupaten

* Objek Kabupaten

```json
{
  "no": 5,
  "kabupaten": "Donggala",
  "ODP": 0,
  "PDP": 0,
  "positif": 0,
  "negatif": 0,
  "meninggal": 0,
  "selesai_pengawasan": 0,
  "dalam_pengawasan": 0,
  "selesai_pemantauan": 0,
  "dalam_pemantauan": 0
}
```

**GET /kabupaten**
----
Mengembalikan data kasus COVID-19 di semua Kabupaten di Sulawesi Tengah.

- **URL Params**
  
  None
- **Data Params**
  
   None

- **Headers**

  Content-Type: application/json

- **Success Response :**
- **Code:**
    
  200
- **Content:**

```
{
   "kabupaten": 
   [
     {<objek_kabupaten>},
     {<objek_kabupaten>},
     {<objek_kabupaten>},
   ],
}
```

**GET /kabupaten/:no**
----

Mengembalikan data Kabupaten yang dipilih.

- **URL Params**
  
  *Required:* `no=[integer]`

- **Data Params**
  
  None

- **Headers**

  Content-Type: application/json

- **Success Response:**
- **Code:** 
  
  200
- **Content**: `{ <objek_kabupaten> }`

- **Error Response:**
  - **Code:** 404

    **Content:**  ``{ "error" : "Data Kabupaten/Kota tidak ditemukan"}``


**PUT /kabupaten/:no**
----
Memperbarui kolom pada data Kabupaten/Kota dan mengembalikan objek yang sudah diperbarui.

- **URL Params**
  
  *Required:* `no=[integer]`
- **Data Params**
  
  ```json
  {
   "no": 5,
   "kabupaten": "Donggala",
   "ODP": 0,
   "PDP": 0,
   "positif": 0,
   "negatif": 0,
   "meninggal": 0,
   "selesai_pengawasan": 0,
   "dalam_pengawasan": 0,
   "selesai_pemantauan": 0,
   "dalam_pemantauan": 0
  }
  ```

- **Headers**

  Content-Type: application/json

- **Success Response:**
- **Code:** 
  
  201
- **Content**: `{ "status": "updated" }`

- **Error Response:**
  - **Code:** 404

    **Content:**  ``{ "error" : "Data Kabupaten/Kota tidak ditemukan"}``

## #Data Rumah Sakit

* Objek Rumah Sakit

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

**GET /rumahsakit**
----
Mengembalikan data rumah sakit rujukan COVID-19 di semua Kabupaten di Sulawesi Tengah.

- **URL Params**
  
  None
  
- **Data Params**
  
   None

- **Headers**

  Content-Type: application/json

- **Success Response :**
- **Code:**

  200
- **Content:**

```
{
   [
     {<objek_rumah_sakit>},
     {<objek_rumah_sakit>},
     {<objek_rumah_sakit>},
   ],
}
```

**GET /rumahsakit/:no**
----

Mengembalikan data Rumah Sakit yang dipilih.

- **URL Params**
  
  *Required:* `no=[integer]`

- **Data Params**
  
  None

- **Headers**

  Content-Type: application/json

- **Success Response:**
- **Code:** 
  
  200
- **Content**: `{ <objek_rumah_sakit> }`

- **Error Response:**
  - **Code:** 404

    **Content:**  ``{ "error" : "Data Rumah Sakit tidak ditemukan"}``

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
