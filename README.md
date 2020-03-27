# PICO SulTeng API
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
  "ODP": 6,
  "PDP": 0,
  "positif": 0,
  "negatif": 0,
  "meninggal": 0,
  "selesai_pengawasan": 0,
  "dalam_pengawasan": 6,
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

```json
{
   "data": 
   [
     <objek_kabupaten>,
     <objek_kabupaten>,
     <objek_kabupaten>,
   ],
   "success": true,
   "errors":[]
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
- **Content**: 
```json
{ 
    "data":
    <objek_kabupaten> ,
    "success": true,
    "errors":[]
}
```

- **Error Response:**
  - **Code:** 404

    **Content:**  
```json
{ 
    "data":[],
    "success":false,
    "errors" : 
    {
        "code": 404,
        "message":"Ditrict not found!"
    }
}
```


**PUT /kabupaten/:no**
----
Memperbarui kolom pada data Kabupaten/Kota dan mengembalikan objek yang sudah diperbarui.

- **URL Params**
  
  *Required:* `no=[integer]`
- **Data Params**
  
  ```json
  {
     <objek_kabupaten>, 
  }
  ```

- **Headers**

  Content-Type: application/json

- **Success Response:**
- **Code:** 
  
  201
- **Content**: 
```json
{ 
    "data":"Data updated successfully!",
    "success":true,
    "errors":[]
}
```

- **Error Response:**
  - **Code:** 404

    **Content:**  
```json
{ 
  "data":[],
  "success":false,
  "errors":
  {
     "code":404,
     "message":"District not found!"
  }
}
```

## #Data Provinsi

Properti Map Id digunakan pada [AnyChart-Android](https://github.com/AnyChart/AnyChart-Android) .

* Objek Provinsi

```json
{
  "kode_provinsi":31,
  "provinsi":"DKI Jakarta",
  "positif":515,
  "sembuh":46,
  "meninggal":25,
  "map_id":"ID.JR" 
}
```

**GET /provinsi**
----
Mengembalikan data kasus COVID-19 di semua Provinsi di Seluruh Indonesia.

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

```json
{
   "data": 
   [
     <objek_provinsi>,
     <objek_provinsi>,
     <objek_provinsi>,
   ],
   "success": true,
   "errors":[]
}
```

**GET /provinsi/:no**
----

Mengembalikan data Provinsi yang dipilih.

- **URL Params**
  
  *Required:* `no=[integer]`

- **Data Params**
  
  None

- **Headers**

  Content-Type: application/json

- **Success Response:**
- **Code:** 
  
  200
- **Content**: 
```json
{ 
    "data":<objek_provinsi> ,
    "success":true,
    "errors":[]
}
```

- **Error Response:**
  - **Code:** 404

    **Content:**  
```json
{ 
    "data":[],
    "success":false,
    "errors" : 
    {
        "code": 404,
        "message":"Province not found!"
    }
}
```


**PUT /provinsi/:no**
----
Memperbarui kolom pada data Provinsi dan mengembalikan objek yang sudah diperbarui.

- **URL Params**
  
  *Required:* `no=[integer]`
- **Data Params**
  
  ```json
  {
      <objek_province>
  }
  ```

- **Headers**

  Content-Type: application/json

- **Success Response:**
- **Code:** 
  
  201
- **Content**: 
```json
{ 
    "data":"Data updated successfully!",
    "success":true,
    "errors":[]
}
```

- **Error Response:**
  - **Code:** 404

    **Content:**  
```json
{ 
  "data":[],
  "success":false,
  "errors":
  {
     "code":404,
     "message":"Province not found!"
  }
}
```


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
   "data":
   [
     {<objek_rumah_sakit>},
     {<objek_rumah_sakit>},
     {<objek_rumah_sakit>},
   ],
   "success":true,
   "errors":[]
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
- **Content**: 
  ```json
  { 
    "data":<objek_rumah_sakit>,
    "success":true,
    "errors":[]
  }
  ```

- **Error Response:**
  - **Code:** 404

    **Content:**  
    ```json
    { 
        "data" : [],
        "success":false,
        "errors":
        {
           "code": 404,
           "message":"Hospital not found!"
        }
    }
    ```
