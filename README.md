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
  "meninggal": 0
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
   "meninggal": 0
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
