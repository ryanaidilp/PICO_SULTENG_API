# PICO SulTeng API

API untuk aplikasi [PICO](https://github.com/RyanAidilPratama/PICO_SULTENG_Android) (Pusat Informasi COVID-19) Provinsi Sulawesi Tengah. 
Aplikasi ini dibangun menggunakan microframework [Lumen](https://lumen.laravel.com/)

## #Penggunaan
   Akses API nya melalui https://banuacoders.com/api/pico lalu tambahkan endpoint yang ingin di-hit. Contoh penggunaan endpoint pada url :
   - Posko

      https://banuacoders.com/api/pico/posko

   - Kabupaten
     
     https://banuacoders.com/api/pico/kabupaten
     
   - Kabupaten berdasarkan no
     
     https://banuacoders.com/api/pico/kabupaten/6
     
   - Provinsi
     
     https://banuacoders.com/api/pico/provinsi
     
   - Provinsi berdasarkan kode provinsi
   
     https://banuacoders.com/api/pico/provinsi/72
     
   - Rumah Sakit 
   
     https://banuacoders.com/api/pico/rumahsakit
     
   - Rumah Sakit berdasarkan no
   
     https://banuacoders.com/api/pico/rumahsakit/1


## # Data Posko

* Objek Posko

```JSON
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
                    "081xxxxxxxx"
             ]
        },
        {
            "no":  2,
            "nama" : "Ibu Nur Datu Adam (Jubir)",
            "no_hp":
            [
                "085xxxxxxxx"
            ]
        }
    ]
}
```

 **GET /posko**
----
Mengembalikan data posko Gugus Tugas COVID-19 di semua Kabupaten di Sulawesi Tengah.
- **URL Params**
  
  None
- **Data Params**
  
   None

- **Headers**

  Content-Type: application/json

- **Success Response :**
  - **Code :**   200
  - **Content:**

    ```json
    {
       "success": true,
       "errors": [],
       "data": 
       [
         <objek_posko>,
         <objek_posko>,
         <objek_posko>,
       ]
    }
    ```

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
  "sembuh": 0,
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
    - **Code :**   200
    - **Content:**

        ```json
        {
           "success": true,
           "errors": [],
           "data": 
           [
             <objek_kabupaten>,
             <objek_kabupaten>,
             <objek_kabupaten>,
           ]
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
    - **Code :**  200
    - **Content**: 
        ```json
        { 
            "success": true,
            "errors": [],
            "data": <objek_kabupaten> 
        }
        ```

- **Error Response:**
    - **Code :** 404
    - **Content:**  
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
  - **Code :**  201
  - **Content**: 
    ```json
    { 
        "success": true,
        "errors": [],
        "data": "Data updated successfully!"
    }
    ```

- **Error Response:**
  - **Code:** 404

   - **Content:**  
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
  - **Code :** 200
  - **Content:**

    ```json
    {
       "success": true,
       "errors": [],
       "data": 
       [
         <objek_provinsi>,
         <objek_provinsi>,
         <objek_provinsi>,
       ],
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
    - **Code :**  200
  - **Content**: 
    ```json
    { 
        "success": true,
        "errors": [],
        "data": <objek_provinsi> ,
    }
    ```

- **Error Response:**
  - **Code :** 404

   - **Content:**  
      ```json
      { 
          "success": false,
          "errors" : 
           {
               "code": 404,
               "message": "Province not found!"
           },
          "data": [],
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
  - **Code :**   201
  - **Content**: 
      ```json
      { 
        "success": true,
        "errors": [],
        "data": "Data updated successfully!"
      }
      ```

- **Error Response:**
  - **Code:** 404

  -  **Content:**  
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
  - **Code :**  200
  - **Content:**

      ```json
      {
         "success": true,
         "errors": [],
         "data":
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
  - **Code :**   200
  - **Content**: 
    ```json
    {
      "success": true,
      "errors": [],
      "data": {<objek_rumah_sakit>},
    }
    ```

- **Error Response:**
  - **Code :** 404

  -    **Content:**  
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
