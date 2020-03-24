# PICO SulTeng API

API untuk aplikasi PICO (Pusat Informasi COVID-19) Provinsi Sulawesi Tengah.

## #Data Kabupaten

* Objek Kabupaten

```
{
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

**GET /kabupaten/:nama_kabupaten**
----

Mengembalikan data Kabupaten yang dipilih.

- **URL Params**
  
  *Required:* `nama_kabupaten=[string]`

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


**PUT /kabupaten/:nama_kabupaten**
----
Memperbarui kolom pada data Kabupaten/Kota dan mengembalikan objek yang sudah diperbarui.

- **URL Params**
  
  *Required:* `nama_kabupaten=[string]`
- **Data Params**
  
  ```
  {
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
  
  200
- **Content**: `{ <objek_kabupaten> }`

- **Error Response:**
  - **Code:** 404

    **Content:**  ``{ "error" : "Data Kabupaten/Kota tidak ditemukan"}``

## #Data Rumah Sakit

* Objek Rumah Sakit

```
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