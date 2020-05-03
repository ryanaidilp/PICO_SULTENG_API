# PICO SulTeng API

[![License: MIT](https://img.shields.io/github/license/RyanAidilPratama/PICO_SULTENG_API?color=blue)](https://github.com/RyanAidilPratama/PICO_SULTENG_API/blob/master/LICENSE) ![Commits/month](https://img.shields.io/github/commit-activity/m/RyanAidilPratama/PICO_SULTENG_API) ![Stars](https://img.shields.io/github/stars/RyanAidilPratama/PICO_SULTENG_API) [![Website: up](https://img.shields.io/website?url=https%3A%2F%2Fbanuacoders.com%2Fapi%2Fpico)](https://banuacoders.com/api/pico) ![Last Commit](https://img.shields.io/github/last-commit/RyanAidilPratama/PICO_SULTENG_API)

API for [PICO](https://github.com/RyanAidilPratama/PICO_SULTENG_Android) (*Pusat Informasi COVID-19*/COVID-19 Information Center) of Central Sulawesi. This API build using microframework [Lumen](https://lumen.laravel.com).

## Table of contents

[![Language : Id](https://img.shields.io/badge/lang-id-blue)](https://github.com/RyanAidilPratama/PICO_SULTENG_API/blob/master/README.id.md)

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

  * [Website COVID-19 Provinsi Sulawesi Tengah](http://corona.sultengprov.go.id)
  * [Health Department of Central Sulawesi](https://dinkes.sultengprov.go.id)

* ### Data for COVID-19 situation in Indonesia

  * [Kawal Corona](https://kawalcorona.com/api) : Data for COVID-19 cases by Province.
  * [INACOVID-19](https://bnpb-inacovid19.hub.arcgis.com/) : Statistical data on the COVID-19 situation in Indonesia.

## General info

This API was created to provide realtime data on the COVID-19 situation in Central Sulawesi. This API was created because the data provided by the local government is still in the form of static data so that the data cannot be used in my application (PICO).

By making this API, we expected that developers who need realtime data on the COVID-19 situation in Central Sulawesi can be helped by this API.

## Additional Info

* ### JSON Attributes

  | Attribute (in Bahasa) | Description |
  |-----------------------|-------------|
  | **id** | id of the object |
  | **nama** | name of the object |
  | **no_hp/telepon** | phone number |
  | **alamat** | address |
  | **posko** | posts |
  | **kabupaten** | district/district name |
  | **provinsi** | province/province name |
  | **ODP** | person under observation |
  | **PDP** | person under supervision |
  | **positif** | positive COVID-19 |
  | **negatif** | negative COVID-19 |
  | **sembuh** | recovered from COVID-19 |
  | **meninggal** | death caused by COVID-19 |
  | **dalam_pengawasan** | under supervision |
  | **selesai_pengawasan** | completed supervision |
  | **dalam_pemantauan** | under observation |
  | **selesai_pemantauan** | completed observation |

## Build With

* [Lumen](https://lumen.laravel.com/) - version 7.0.2
* [PHP](https://www.php.net) - version 7.3.13

## Setup

* ### API

  * Access the API via <https://banuacoders.com/api/pico> then add the endpoint you want to hit. Here's an example of using endpoints in url:

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
    | Statistics by day | **statistik/:day** | <https://banuacoders.com/api/pico/statistik/12> |

  &nbsp;

* ### Repository

  * Clone this repository to your local machine.
  * Open the terminal / CMD then go to the **root directory** of the clone results.
  * Run this command `cp .env.example .env`
  * Edit the contents of the file **.env** and fill it in according to your local configuration.
  * Run the `composer update` /`composer install` command to install the required *dependencies*.
  * After the dependency installation process is complete, run the `php artisan key:generate` command to generate **APP_KEY**.
  * Run `php artisan migrate` command to migrate your database.
  * After that, run the `php artisan serve` command to run the application.
  * If it is successful and there are no errors in the configuration, the application will run and can be accessed via **127.0.0.1:8000** or **localhost:8000**.

## Response Examples

* ### **POSTS DATA**

  * JSON Example/{"posts_object"} :

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

    >Returning data of the COVID-19 Task Force Command Post in Central Sulawesi.

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
                {"posts_object"},
                {"posts_object"},
                {"posts_object"},
            ]
        }
        ```

* ### **DISTRICT DATA**

  * JSON Example/{"district_object"} :

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

    > Returns data on COVID-19 cases in all districts / cities in Central Sulawesi.

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
                {"district_object"},
                {"district_object"},
                {"district_object"},
            ]
        }
        ```

  * **GET /kabupaten/:id**

    > Returns data on COVID-19 cases in selected district.

    * **URL Params**
      * *Required:* `id=[integer]`
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
            "data": {"district_object"}
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

  * **PUT /kabupaten/:id**

    > Update District data based on district number/id.

    * **URL Params**
      * *Required:* `id=[integer]`
    * **Data Params**

      ```json
      {
          "district_object"
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

* ### **PROVINCE DATA**

    > The **"map_id"** property is used on [AnyChart-Android](https://github.com/AnyChart/AnyChart-Android).

  * JSON Example/{"province_object"} :

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

    > Returns data on COVID-19 cases in all provinces throughout Indonesia.

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
                {"province_object"},
                {"province_object"},
                {"province_object"},
            ],
        }
        ```

  * **GET /provinsi/:code**

    > Returns data on COVID-19 cases in selected province.

    * **URL Params**
      * *Required:* `code=[integer]`
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
            "data": {"province_object"},
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

  * **PUT /provinsi/:code**

    > Update Province data based on province code.

    * **URL Params**
      * *Required:* `code=[integer]`
    * **Data Params**
  
        ```json
        {
          "province_object"
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

* ### **COVID-19 REFERRAL HOSPITAL DATA**

  * JSON Example/{"hospital_object"} :

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

    > Returns data from the COVID-19 referral hospital in Central Sulawesi.

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
            {"hospital_object"},
            {"hospital_object"},
            {"hospital_object"},
          ],
        }
        ```

  * **GET /rumahsakit/:id**
     > Returns Hospital data based on selected number/id.

    * **URL Params**
      * *Required:* `id=[integer]`
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
            "data": {"hospital_object"},
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

* ### **STATISTICS**

  Returns the daily situation data of COVID-19 in Central Sulawesi since March 22, 2020.

  * JSON Example/{"stats_object"} :

    ```json
    {
        "day": "42",
        "date": "2 Mei 2020",
        "positive": 12,
        "cummulative_positive": 59,
        "recovered": 0,
        "cummulative_recovered": 11,
        "death": 0,
        "cummulative_death": 3
    }
    ```

  * **GET /statistik**

    > Returns statistics on daily situation of COVID-19  in Central Sulawesi.

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
            {"stats_object"},
            {"stats_object"},
            {"stats_object"},
          ],
        }
        ```

  * **GET /statistik/:day**
     > Returns statistics of COVID-19 in Central Sulawesi on selected day.

    * **URL Params**
      * *Required:* `day=[integer]`
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
            "data": {"stats_object"},
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

To-do list:

* [X] Data for COVID-19 situation by districts/cities in Central Sulawesi
* [X] Data for COVID-19 situation by Province in Indonesia
* [X] Data of Central Sulawesi COVID-19 Task Force Team post
* [X] Data of COVID-19 referral hospital in Central Sulawesi
* [X] Daily report of COVID-19 situation in Central Sulawesi

## License

[MIT](https://github.com/RyanAidilPratama/PICO_SULTENG_API/blob/master/LICENSE) License

Copyright (c) 2020 [Fajrian Aidil Pratama](https://www.linkedin.com/in/ryanaidilp/)

## Contact

Created by [@ryanidilp_](https://twitter.com/ryanaidilp_) - feel free to contact me!
