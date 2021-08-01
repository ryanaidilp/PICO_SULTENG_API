# PICO SulTeng API

[![License: MIT](https://img.shields.io/github/license/ryanaidilp/PICO_SULTENG_API?color=blue)](https://github.com/ryanaidilp/PICO_SULTENG_API/blob/master/LICENSE) 

![Commits/month](https://img.shields.io/github/commit-activity/m/ryanaidilp/PICO_SULTENG_API) ![Stars](https://img.shields.io/github/stars/ryanaidilp/PICO_SULTENG_API) [![Website: up](https://img.shields.io/website?url=https%3A%2F%2Fbanuacoders.com%2Fapi%2Fpico)](https://banuacoders.com/api/pico) ![Last Commit](https://img.shields.io/github/last-commit/ryanaidilp/PICO_SULTENG_API) [![Coverage](https://img.shields.io/badge/coverage-100%25-brightgreen)](https://github.com/ryanaidilp/PICO_SULTENG_API/tree/master/tests)

API for [PICO](https://github.com/ryanaidilp/PICO_SULTENG_Android) (*Pusat Informasi COVID-19*/COVID-19 Information Center) of Central Sulawesi. This API build using microframework [Lumen](https://lumen.laravel.com).

[![PICO API](https://i.ibb.co/mvb0HVx/pico-api-wide.png)](https://banuacoders.com/api/pico)

## Table of contents

[![Language : Id](https://img.shields.io/badge/lang-id-blue)](https://github.com/ryanaidilp/PICO_SULTENG_API/blob/master/README.id.md)

You are reading the English version of this README. Click on the language badge to switch to another language.

* [Data Source](#data-source)
* [General info](#general-info)
* [Additional info](#additional-info)
* [Build With](#build-with)
* [Setup](#setup)
* [Response Examples](#response-examples)
* [Features](#features)
* [License](#license)
* [Contact](#contact)

## Data Source

* ### Data for COVID-19 situation in Central Sulawesi

  + [Website COVID-19 Provinsi Sulawesi Tengah](http://corona.sultengprov.go.id)
  + [Health Department of Central Sulawesi](https://dinkes.sultengprov.go.id)
  + [Detexi](https://corona.detexi.id)

* ### Data for COVID-19 situation in Indonesia

  + [Kawal Corona](https://kawalcorona.com/api) : Data for COVID-19 cases by Province.
  + [Kawal COVID-19](https://kawalcovid19.id) : Data for COVID-19 in Indonesia.
  + [INACOVID-19](https://bnpb-inacovid19.hub.arcgis.com/) : Statistical data on the COVID-19 situation in Indonesia.

## General info

This API was created to provide realtime data on the COVID-19 situation in Central Sulawesi. This API was created because the data provided by the local government is still in the form of static data so that the data cannot be used in my application (PICO).

By making this API, we expected that developers who need realtime data on the COVID-19 situation in Central Sulawesi can be helped by this API.

## Additional Info

* ### API Version

  | Version | Link |
  |---------|------|
  | 1       |   baseurl/{endpoint}   |
  | 2       |   baseurl/v2/{endpoint}   |
  

## Build With

* [Lumen](https://lumen.laravel.com/) - version 7.0.2
* [PHP](https://www.php.net) - version 7.3.13

## Setup

* ### API

  + Access the API via <https://banuacoders.com/api/pico> then add the endpoint you want to hit. Here's an example of using endpoints in url:

  + **Version 1**
    | Data | Endpoint | URL |
    |------|----------|-----|
    | Posts | **/posko** | <https://banuacoders.com/api/pico/posko> |
    | District | **/kabupaten** | <https://banuacoders.com/api/pico/kabupaten> |
    | District by id | **/kabupaten/:id** | <https://banuacoders.com/api/pico/kabupaten/6> |
    | Province | **/provinsi** |  <https://banuacoders.com/api/pico/provinsi> |
    | Province by province code | **/provinsi/:code** | <https://banuacoders.com/api/pico/provinsi/72> |
    | Hospital | **/rumahsakit** | <https://banuacoders.com/api/pico/rumahsakit> |
    | Hospital by id | **/rumahsakit/:id** | <https://banuacoders.com/api/pico/rumahsakit/1> |
    | Statistics | **/statistik** | <https://banuacoders.com/api/pico/statistik> |
    | Statistics by day | **/statistik/:day** | <https://banuacoders.com/api/pico/statistik/12> |

  + **Version 2**
    | Data | Endpoint | URL |
    |------|----------|-----|
    | Posts | **/v2/posko** | <https://banuacoders.com/api/pico/v2/posko> |
    | District | **/v2/kabupaten** | <https://banuacoders.com/api/pico/v2/kabupaten> |
    | District by id | **/v2/kabupaten/:id** | <https://banuacoders.com/api/pico/v2/kabupaten/6> |
    | Province | **/v2/provinsi** |  <https://banuacoders.com/api/pico/v2/provinsi> |
    | Province by province code | **/v2/provinsi/:code** | <https://banuacoders.com/api/pico/v2/provinsi/72> |
    | Hospital | **/v2/rumahsakit** | <https://banuacoders.com/api/pico/v2/rumahsakit> |
    | Hospital by id | **/v2/rumahsakit/:id** | <https://banuacoders.com/api/pico/v2/rumahsakit/1> |
    | Statistics | **/v2/statistik** | <https://banuacoders.com/api/pico/v2/statistik> |
    | Statistics by day | **/v2/statistik/:day** | <https://banuacoders.com/api/pico/v2/statistik/12> |
    | National Statistics | **/v2/nasional** | <https://banuacoders.com/api/pico/v2/nasional> |
    | National Statistics by day | **/v2/nasional/:day** | <https://banuacoders.com/api/pico/v2/nasional/12> |

    >*) Notes :

    - Every endpoint has it own rate limit (maximum request/minute), you can see the detail in response header :
      * **X-RateLimit-Limit : 20** (Maximum amount request)
      * **X-RateLimit-Remaining: 0** (Request count left before limit)
      * **Retry-After: 80** (Amount of time you need to wait before doing another request)
    - Rate limit for each endpoint :
      * province/*provinsi* : 40 request/minute
      * other : 20 request/minute
    - In version 2, you can add an optional **query param** (lang) to change the language of the data. Supported language so far :
      * **id/no param** : Indonesian/Bahasa Indonesia (default)
      * **en** : English

  &nbsp; 

* ### Repository

  + Clone this repository to your local machine.
  + Open terminal / CMD then go to the **root directory** of the clone results.
  + Run this command `cp .env.example .env`
  + Edit the contents of the file **.env** and fill it in according to your local configuration.
  + To make sure **Throttle Request/Rate Limiter** is working properly, change your `CACHE_DRIVER` in `.env` file to `CACHE_DRIVER=file`.
  + Run the `composer update` /`composer install` command to install the required *dependencies*.
  + After the dependency installation process is complete, run the `php artisan key:generate` command to generate **APP_KEY**.
  + Run `php artisan migrate --seed` command to migrate and seed your database.
  + Make sure your device are connected to the internet, because the seeder using data from internet to seed your local database.
  + After that, run the `php artisan serve` command to run the application.
  + If it is successful and there are no errors in the configuration, the application will run and can be accessed via **127.0.0.1:8000** or **localhost:8000**.

## Response Examples

* ### **TASK FORCE DATA**

  + JSON Example (v1)/{"task_force_object"} :
    

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

  + JSON Example (v2)/{"task_force_object"} :
    

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

  + **GET /posko** (v1)
    >Returning data of the COVID-19 Task Force Command Post in Central Sulawesi.

    - **URL Params**
      * None (v1)
      * *Optional* : `?lang=[string`] (v2)
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
                {"task_force_object"},
                {"task_force_object"},
                {"task_force_object"},
            ]
        }
```

* ### **DISTRICT DATA**

  + JSON Example (v1) /{"district_object"} :
    

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

  + JSON Example (v2) /{"district_object"} :
    

```json
    {
        "no": 7205,
        "kabupaten": "Donggala",
        "updated_at": "2020-04-29T17:00:00.000000Z",
        "positif": 0,
        "negatif": 0,
        "sembuh": 0,
        "meninggal": 0,
        "ODP": 6,
        "selesai_pemantauan": 0,
        "dalam_pemantauan": 0,
        "PDP": 0,
        "selesai_pengawasan": 0,
        "dalam_pengawasan": 6,
        "rasio_kematian": 6,
    }
```

  + **GET /kabupaten**
    > Returns data on COVID-19 cases in all districts / cities in Central Sulawesi.

    - **URL Params**
      * None (v1)
      * *Optional* : `?lang=[string]` (v2)
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
                {"district_object"},
                {"district_object"},
                {"district_object"},
            ]
        }
```

  + **GET /kabupaten/:id**
    > Returns data on COVID-19 cases in selected district.

    - **URL Params**
      * *Required:* `id=[integer]`
      * *Optional* : `?lang=[string`] (v2)
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
    "data": {"district_object"}
}
```

* **Error Response:**
  + **Code :** 404
  + **Content :**  

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

* ### **PROVINCE DATA**
    > The **"map_id"** property is used on [AnyChart-Android](https://github.com/AnyChart/AnyChart-Android).

  + JSON Example (v1)/{"province_object"} :
    

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

  + JSON Example (v2)/{"province_object"} :
    

```json
    {
        "kode_provinsi":31,
        "updated_at": "2020-04-29T17:00:00.000000Z",
        "provinsi":"DKI Jakarta",
        "positif":515,
        "dalam_perawatan":444,
        "sembuh":46,
        "meninggal":25,
        "rasio_kematian":5,
        "map_id":"ID.JR",
    }
```

  + **GET /provinsi**
    > Returns data on COVID-19 cases in all provinces throughout Indonesia.

    - **URL Params**
      * None (v1)
      * *Optional* : `?lang=[string`] (v2)
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
                {"province_object"},
                {"province_object"},
                {"province_object"},
            ],
        }
```

  + **GET /provinsi/:code**
    > Returns data on COVID-19 cases in selected province.

    - **URL Params**
      * *Required:* `code=[integer]`
      * *Optional* : `?lang=[string`] (v2)
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
            "data": {"province_object"},
        }
```

* **Error Response:**
  + **Code :** 404
  + **Content :**  
        

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

* ### **COVID-19 REFERRAL HOSPITAL DATA**

  + JSON Example/{"hospital_object"} :
    

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
    > Returns data from the COVID-19 referral hospital in Central Sulawesi.

    - **URL Params**
      * None
      * *Optional* : `?lang=[string`] (v2)
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
            {"hospital_object"},
            {"hospital_object"},
            {"hospital_object"},
          ],
        }
```

  + **GET /rumahsakit/:id**
     > Returns Hospital data based on selected number/id.

    - **URL Params**
      * *Required:* `id=[integer]`
      * *Optional* : `?lang=[string`] (v2)
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
            "data": {"hospital_object"},
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

* ### **STATISTICS**

  Returns daily data of COVID-19 outbreak in Central Sulawesi since March 22, 2020.

  + JSON Example (v1)/{"stats_object"} :
    

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
        "under_treatment_percentage" : 76.27,
    }
```

  + JSON Example (v2)/{"stats_object"} :
    

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
    > Returns statistics of COVID-19 outbreak in Central Sulawesi.

    - **URL Params**
      * None (v1)
      * *Optional* : `?lang=[string`] (v2)
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
     > Returns statistics of COVID-19 outbreak in Central Sulawesi on selected day.

    - **URL Params**
      * *Required:* `day=[integer]`
      * *Optional* : `?lang=[string`] (v2)
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

## Features

Some features have been made so far :

* Data for COVID-19 situation by districts/cities in Central Sulawesi
* Data for COVID-19 situation by Province in Indonesia
* Data of Central Sulawesi COVID-19 Task Force Team post
* Data of COVID-19 referral hospital in Central Sulawesi
* Daily report of COVID-19 situation in Central Sulawesi
* Daily report of COVID-19 situation in Indonesia

To-do list:

* [X] Data for COVID-19 situation by districts/cities in Central Sulawesi
* [X] Data for COVID-19 situation by Province in Indonesia
* [X] Data of Central Sulawesi COVID-19 Task Force Team post
* [X] Data of COVID-19 referral hospital in Central Sulawesi
* [X] Daily report of COVID-19 situation in Central Sulawesi
* [X] Daily report of COVID-19 situation in Indonesia

## License

[MIT](https://github.com/ryanaidilp/PICO_SULTENG_API/blob/master/LICENSE) License

Copyright (c) 2020 [Fajrian Aidil Pratama](https://www.linkedin.com/in/ryanaidilp/)

## Contact

Created by [@ryanidilp_](https://twitter.com/ryanaidilp_) - feel free to contact me!
